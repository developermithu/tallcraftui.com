<section aria-label="Works with" class="border-b border-gray-200 dark:border-gray-800">
    <div class="container flex flex-col gap-4 py-8 md:flex-row md:items-center md:gap-10">
        <p class="shrink-0 text-sm text-gray-500 dark:text-gray-400">Built for the TALL stack</p>

        <ul role="list" class="flex flex-wrap items-center gap-x-8 gap-y-3 text-[15px] font-medium text-gray-800 dark:text-gray-200">
            @foreach ([
                ['Laravel', '12 & 13', 'https://laravel.com'],
                ['Livewire', '4', 'https://livewire.laravel.com'],
                ['Tailwind CSS', '4.1+', 'https://tailwindcss.com'],
                ['Alpine.js', 'via Livewire', 'https://alpinejs.dev'],
                ['Blade', 'components', 'https://laravel.com/docs/blade'],
                ['MIT', 'open source', config('docs.repository').'/blob/'.config('docs.source_branch').'/license.md'],
            ] as [$name, $note, $url])
                <li>
                    <a href="{{ $url }}" target="_blank" rel="noopener" class="group flex items-baseline gap-1.5 hover:text-gray-950 dark:hover:text-white">
                        {{ $name }}
                        <span class="text-xs font-normal text-gray-500 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-gray-300">{{ $note }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
