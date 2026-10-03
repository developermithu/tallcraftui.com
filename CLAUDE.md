# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

Documentation site for the [TallCraftUI](https://github.com/developermithu/tallcraftui) Blade component library (Laravel 13, Livewire 4, Tailwind 4). The `3.x` branch documents TallCraftUI 3 (Livewire 4); `2.x` documents TallCraftUI 2 (Laravel 12, Livewire 3 + Volt). Served locally by Herd at http://tallcraftui-doc.test.

## Commands

- Use **bun** for frontend (`bun install`, `bun run dev`, `bun run build`), not npm/pnpm, even though the README mentions them.
- For GitHub (PRs, issues, reviews), use the GitHub MCP tools; `gh` is not installed. Repo: `developermithu/tallcraftui.developermithu.com`, main branch `2.x`.
- Format PHP with `vendor/bin/pint`. Tests use Pest (`vendor/bin/pest`), but the only tests are the Laravel stubs.

## Build assets

- `public/build` is committed on purpose. Don't run `bun run build` or stage `public/build` changes; the maintainer rebuilds and commits assets separately.
- `public/hot` means the Vite dev server is running.

## Doc pages

- Each component page is a Livewire 4 single-file component (`new class extends Livewire\Component`, no Volt) in `resources/views/livewire/docs/components/<name>.blade.php`, using `#[Layout('components.layouts.app')]` and `#[Title(...)]`. `table` and `toast` are the exceptions; they use class-based Livewire components in `app/Livewire/Docs/Components/`.
- Write examples as `<x-code-block title="...">` wrapping `@verbatim('docs') ... @endverbatim`. The component strips `('docs')`, de-indents the code, shows it with Torchlight, and renders it live with `Blade::render()`. Any `wire:model` property used in an example must be declared on the page's component class. Show those properties to readers in a `@php // public int $x = 3; @endphp` comment inside the snippet.
- `<x-on-this-page.item title="...">` anchors come from `Str::slug($title)`, so each one must match a `<x-code-block>` title exactly.
- Every page sets SEO meta in `@slot('metaTags')` with `<x-meta-tags title=... description=... />`.
- Adding a page means touching four places: the component view, a `Route::livewire()` route in `routes/web.php` (named `docs.components.<name>`), an entry in `resources/views/livewire/partials/sidebar.blade.php`, and a `<url>` in the hand-maintained `public/sitemap.xml`.

## TallCraftUI package

- Components come from `vendor/developermithu/tallcraftui`. Tailwind scans it through `@source` in `resources/css/app.css`; config is in `config/tallcraftui.php`.
- `/packages` is gitignored. The maintainer sometimes symlinks a local tallcraftui checkout there to document unreleased features. Never commit a path repository or other `/packages` changes to `composer.json`.
- When documenting a component's props, check the real Blade component in the package source rather than guessing.
