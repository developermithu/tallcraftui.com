import './bootstrap';

/**
 * Alpine helpers for the documentation UI. They're plain globals so they're
 * available whenever Livewire starts Alpine, including after wire:navigate.
 */

// Copy button and collapse state for code panels.
window.docsCode = (code, collapsible = false) => ({
    code,
    copied: false,
    collapsed: collapsible,
    index: null,
    timer: null,

    async copy() {
        try {
            await navigator.clipboard.writeText(this.code);
        } catch {
            const textarea = Object.assign(document.createElement('textarea'), { value: this.code });
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            textarea.remove();
        }

        this.copied = true;
        clearTimeout(this.timer);
        this.timer = setTimeout(() => (this.copied = false), 2000);
    },
});

// Highlights the heading currently in view in the table of contents.
window.docsToc = (ids) => ({
    ids,
    active: ids[0] ?? null,
    titles: {},

    init() {
        const update = () => {
            const offset = (parseFloat(getComputedStyle(document.documentElement).scrollPaddingTop) || 88) + 16;
            let current = this.ids[0] ?? null;

            for (const id of this.ids) {
                const element = document.getElementById(id);

                if (element && element.getBoundingClientRect().top - offset <= 0) {
                    current = id;
                }
            }

            // At the bottom of the page, highlight the last heading.
            if (window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 4) {
                current = this.ids[this.ids.length - 1] ?? current;
            }

            this.active = current;
        };

        let ticking = false;
        this.onScroll = () => {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(() => {
                update();
                ticking = false;
            });
        };

        window.addEventListener('scroll', this.onScroll, { passive: true });
        update();
    },

    destroy() {
        window.removeEventListener('scroll', this.onScroll);
    },
});

// Command palette search over /search-index.json.
window.docsSearch = (endpoint, suggestions) => ({
    open: false,
    query: '',
    index: null,
    loading: false,
    selected: 0,
    suggestions,

    async load() {
        if (this.index || this.loading) return;

        this.loading = true;

        try {
            const response = await fetch(endpoint, { headers: { Accept: 'application/json' } });
            this.index = await response.json();
        } catch {
            this.index = [];
        } finally {
            this.loading = false;
        }
    },

    show() {
        this.open = true;
        this.load();
        this.$nextTick(() => this.$refs.input?.focus());
    },

    close() {
        this.open = false;
        this.query = '';
        this.selected = 0;
    },

    get results() {
        const query = this.query.trim().toLowerCase();

        if (!query) {
            return this.suggestions;
        }

        if (!this.index) {
            return [];
        }

        const terms = query.split(/\s+/);

        return this.index
            .map((entry) => ({ entry, score: this.score(entry, query, terms) }))
            .filter((result) => result.score > 0)
            .sort((a, b) => b.score - a.score)
            .slice(0, 12)
            .map((result) => result.entry);
    },

    score(entry, query, terms) {
        const title = entry.title.toLowerCase();
        const haystack = `${title} ${entry.section} ${entry.keywords ?? ''} ${entry.description ?? ''}`.toLowerCase();

        if (!terms.every((term) => haystack.includes(term))) {
            return 0;
        }

        let score = 1;

        if (title === query) score += 100;
        else if (title.startsWith(query)) score += 60;
        else if (title.includes(query)) score += 30;

        if (`${entry.section} ${title}`.toLowerCase().includes(query)) score += 10;
        if ((entry.keywords ?? '').toLowerCase().includes(query)) score += 8;
        if (entry.type === 'Component') score += 6;
        if (entry.type === 'Page') score += 4;

        return score;
    },

    move(step) {
        const count = this.results.length;

        if (!count) return;

        this.selected = (this.selected + step + count) % count;
        this.$nextTick(() => document.getElementById(`search-option-${this.selected}`)?.scrollIntoView({ block: 'nearest' }));
    },

    go(entry = this.results[this.selected]) {
        if (!entry) return;

        this.close();

        const target = new URL(entry.url, window.location.origin);

        if (target.pathname === window.location.pathname && target.hash) {
            history.pushState(null, '', target.hash);
            document.getElementById(target.hash.slice(1))?.scrollIntoView();
            return;
        }

        window.Livewire ? window.Livewire.navigate(entry.url) : (window.location.href = entry.url);
    },
});

// After wire:navigate, make sure a #hash in the URL lands on its heading once the new page has laid out.
document.addEventListener('livewire:navigated', () => {
    if (!window.location.hash) return;

    requestAnimationFrame(() => {
        document.getElementById(decodeURIComponent(window.location.hash.slice(1)))?.scrollIntoView({ block: 'start', behavior: 'instant' });
    });
});
