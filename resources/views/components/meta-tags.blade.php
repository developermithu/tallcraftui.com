@props([
    'title' => null,
    'description' => null,
    'keywords' => 'laravel, livewire, alpine.js, tailwindcss, tall stack, blade components, ui components, livewire 4, ui library',
    'image' => null,
    'type' => null,
])

@inject('docs', 'App\Support\Docs')

@php
    $page = $docs->current();
    $title ??= $page ? $page['title'].' - TallCraftUI' : 'TallCraftUI - Blade UI components for Laravel and Livewire';
    $description ??= $page['description'] ?? 'TallCraftUI is a Blade UI component library for Laravel, Livewire, Alpine.js and Tailwind CSS, with 35+ customizable components.';
    $image ??= $docs->canonicalUrl('/assets/img/og-image.png');
    $type ??= $page ? 'article' : 'website';
    $canonical = $docs->canonicalUrl();
@endphp

<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="developermithu">
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:site_name" content="TallCraftUI">
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@DeveloperMithu">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
