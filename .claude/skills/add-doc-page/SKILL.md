---
name: add-doc-page
description: Scaffold a new TallCraftUI component documentation page — Volt view, route, sidebar entry, and sitemap URL. Use when adding docs for a new component.
disable-model-invocation: true
---

Add a documentation page for the component: $ARGUMENTS

1. **Read the component source** in `vendor/developermithu/tallcraftui/src/` (or `/packages/...` if a local checkout is symlinked) to learn its real props, slots, and variants. Don't invent props.

2. **Create** `resources/views/livewire/docs/components/<name>.blade.php`, using an existing page such as `rating.blade.php` as the template:
   - Volt class with `#[Layout('components.layouts.app')]` and `#[Title('<Name> components - Tallcraftui')]`. Declare every public property that a `wire:model` example uses.
   - `@slot('metaTags')` with `<x-meta-tags title="..." description="..." />` (SEO-oriented, matching the tone of existing pages).
   - `<x-heading title="<Name>" subtitle="Form Components|UI Components|Dialog Components" />`
   - One `<x-code-block title="...">` per example, with the body inside `@verbatim('docs') ... @endverbatim`. Start with "Basic usage". Pass `new` for features added in the latest release.
   - `@slot('aside')` with `<x-on-this-page>` items whose titles exactly match the code-block titles, in the same order.

3. **Route**: add `Volt::route('/<name>', 'docs.components.<name>')->name('<name>');` to the matching Form/UI group in `routes/web.php`.

4. **Sidebar**: add `<x-sidebar-menu.item title="<name in lowercase words>" :href="route('docs.components.<name>')" />` under the matching section in `resources/views/livewire/partials/sidebar.blade.php`, keeping the existing order.

5. **Sitemap**: add a `<url>` entry to `public/sitemap.xml` next to the other components (`changefreq` monthly, `priority` 0.7).

6. **Verify**: run `php artisan route:list --name=docs.components.<name>`, then fetch `http://tallcraftui.test/docs/components/<name>` with curl and check it returns 200 with no Blade errors.

Don't run `bun run build` or touch `public/build`; the maintainer builds assets.
