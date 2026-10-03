<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @isset($metaTags)
        {{ $metaTags }}
    @endisset

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Algolia Docsearch - makes the first query faster --}}
    <link rel="preconnect" href="https://9UA43QHHYR-dsn.algolia.net" crossorigin />

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Google tag (gtag.js) -->
    @if (config('app.env') === 'production')
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-RZY51979SH"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-RZY51979SH');
        </script>
    @endif
</head>

<body class="flex min-h-full leading-7 font-lato site-gradient" x-data="darkModeToggle()" x-init="initializeTheme()">
    <div class="w-full">
        <x-partials.header />

        <x-toast />

        <div class="container">
            <div class="relative flex justify-center flex-auto w-full mx-auto max-w-8xl sm:px-2 lg:px-8 xl:px-12">
                {{-- Left Sidebar --}}
                @livewire('partials.sidebar')

                <main class="flex-auto max-w-2xl min-w-0 px-4 py-16 lg:max-w-none lg:pl-8 lg:pr-0 xl:px-16">
                    @isset($content)
                        <article>
                            {{ $content }}
                        </article>
                    @else
                        <article> {{ $slot }} </article>
                    @endisset

                    @isset($prevNext)
                        <dl class="flex pt-6 mt-12 border-t border-slate-200 dark:border-slate-800">
                            <div>
                                <dt class="text-sm font-medium font-display text-slate-900 dark:text-white">
                                    Previous
                                </dt>
                                <dd class="mt-1">
                                    <a class="flex flex-row-reverse items-center text-base font-semibold gap-x-1 text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"
                                        href="/">Getting started<svg viewBox="0 0 16 16" aria-hidden="true"
                                            class="flex-none w-4 h-4 fill-current -scale-x-100">
                                            <path
                                                d="m9.182 13.423-1.17-1.16 3.505-3.505H3V7.065h8.517l-3.506-3.5L9.181 2.4l5.512 5.511-5.511 5.512Z">
                                            </path>
                                        </svg></a>
                                </dd>
                            </div>
                            <div class="ml-auto text-right">
                                <dt class="text-sm font-medium font-display text-slate-900 dark:text-white">
                                    Next
                                </dt>
                                <dd class="mt-1">
                                    <a class="flex items-center text-base font-semibold gap-x-1 text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"
                                        href="/docs/understanding-caching">Understanding caching<svg viewBox="0 0 16 16"
                                            aria-hidden="true" class="flex-none w-4 h-4 fill-current">
                                            <path
                                                d="m9.182 13.423-1.17-1.16 3.505-3.505H3V7.065h8.517l-3.506-3.5L9.181 2.4l5.512 5.511-5.511 5.512Z">
                                            </path>
                                        </svg></a>
                                </dd>
                            </div>
                        </dl>
                    @endisset

                    <div class="pt-5 text-sm text-gray-500">
                        Code highlighting powered by <a href="https://torchlight.dev" target="_blank"
                            class="hover:underline">Torchlight</a>
                    </div>
                </main>

                @isset($aside)
                    {{ $aside }}
                @endisset
            </div>
        </div>
    </div>

    <script>
        function darkModeToggle() {
            return {
                sidebarVisible: false,
                isDarkMode: false,
                initializeTheme() {
                    this.isDarkMode = localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) &&
                        window.matchMedia('(prefers-color-scheme: dark)').matches);

                    if (this.isDarkMode) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                },

                toggleDarkMode() {
                    this.isDarkMode = !this.isDarkMode;
                    localStorage.setItem('dark-mode', this.isDarkMode);

                    if (this.isDarkMode) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            }
        }
    </script>

    {{-- Algolia Docsearch --}}
    <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>

    <script type="text/javascript">
        docsearch({
            appId: "9UA43QHHYR",
            apiKey: "fcff6a9653acd0f0fad14396b514f9ec",
            indexName: "tallcraftuielopermithu",
            insights: true,
            container: "#docsearch",
            debug: false
        });
    </script>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetElement = document.querySelector(this.getAttribute('href'));

                window.scrollTo({
                    top: targetElement.offsetTop - document.querySelector('header').offsetHeight +
                        60,
                });

                // Update the hash in the URL manually without jumping
                history.pushState(null, null, this.getAttribute('href'));
            });
        });
    </script>
</body>

</html>
