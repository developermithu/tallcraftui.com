@props(['title' => null, 'metaTags' => null, 'docs' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @if ($metaTags && trim((string) $metaTags) !== '')
        {{ $metaTags }}
    @else
        <x-meta-tags />
    @endif

    <x-site.structured-data />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#111827" media="(prefers-color-scheme: dark)">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wdth,wght@0,75..100,400..700;1,75..100,400..700&family=JetBrains+Mono:wght@400..600&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Apply the saved theme before first paint to avoid a flash of the wrong theme.
        document.documentElement.classList.toggle('dark', localStorage.getItem('dark-mode') === 'true' ||
            (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches));
    </script>

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

<body class="min-h-screen">
    <a href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-3 focus:z-[100] focus:rounded-md focus:bg-gray-950 focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white dark:focus:bg-white dark:focus:text-gray-950">
        Skip to content
    </a>

    <x-site.header :docs="$docs" />

    <x-toast />

    {{ $slot }}

    <x-site.footer />

    <x-site.mobile-nav />

    <x-docs.search />
</body>

</html>
