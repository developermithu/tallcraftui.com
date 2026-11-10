{{-- Tabbed group of <x-code tab="..."> snippets. The copy button copies the active tab. --}}
<div {{ $attributes->class('not-prose overflow-hidden rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800') }}
    x-data="{
        ...docsCode(''),
        active: 0,
        tabs: [],
        codes: [],
        register(label, code) {
            this.tabs.push(label);
            this.codes.push(code);
            return this.tabs.length - 1;
        },
        copyActive() {
            this.code = this.codes[this.active];
            this.copy();
        },
    }">
    <div class="code-surface flex h-10 items-center gap-2 border-b border-white/[0.07] pl-2 pr-2">
        <div class="flex h-full items-end gap-1 overflow-x-auto" role="tablist">
            <template x-for="(label, i) in tabs" :key="i">
                <button type="button" role="tab" :aria-selected="(active === i).toString()" @click="active = i"
                    @keydown.arrow-right.prevent="active = (active + 1) % tabs.length; $nextTick(() => $el.parentElement.querySelectorAll('[role=tab]')[active].focus())"
                    @keydown.arrow-left.prevent="active = (active - 1 + tabs.length) % tabs.length; $nextTick(() => $el.parentElement.querySelectorAll('[role=tab]')[active].focus())"
                    :tabindex="active === i ? 0 : -1"
                    :class="active === i ? 'border-brand-400 text-white' : 'border-transparent text-gray-400 hover:text-gray-200'"
                    class="-mb-px whitespace-nowrap border-b-2 px-3 pb-2.5 font-mono text-xs transition-colors"
                    x-text="label"></button>
            </template>
        </div>

        <button type="button" @click="copyActive()"
            class="ml-auto inline-flex h-7 shrink-0 items-center gap-1.5 rounded-md px-2 text-xs font-medium text-gray-400 transition-colors hover:bg-white/10 hover:text-white"
            :aria-label="copied ? 'Copied' : 'Copy code'">
            <x-icon name="clipboard" class="size-4" x-show="!copied" />
            <x-icon name="check" class="size-4 text-brand-300" x-show="copied" x-cloak />
            <span x-text="copied ? 'Copied' : 'Copy'">Copy</span>
        </button>
    </div>

    {{ $slot }}
</div>
