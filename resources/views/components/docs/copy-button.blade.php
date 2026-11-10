<button type="button" @click="copy()"
    class="inline-flex h-7 items-center gap-1.5 rounded-md px-2 text-xs font-medium text-gray-400 transition-colors hover:bg-white/10 hover:text-white focus-visible:outline-brand-400"
    :aria-label="copied ? 'Copied' : 'Copy code'">
    <x-icon name="clipboard" class="size-4" x-show="!copied" />
    <x-icon name="check" class="size-4 text-brand-300" x-show="copied" x-cloak />
    <span x-text="copied ? 'Copied' : 'Copy'">Copy</span>
    <span class="sr-only" aria-live="polite" x-text="copied ? 'Code copied to clipboard' : ''"></span>
</button>
