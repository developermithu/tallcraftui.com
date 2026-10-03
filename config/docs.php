<?php

/*
|--------------------------------------------------------------------------
| Documentation registry
|--------------------------------------------------------------------------
|
| The single source of truth for the docs navigation. The sidebar, search
| index, breadcrumbs, previous/next links, docs landing page, homepage
| component overview and API reference tables are all generated from it.
|
| Adding a page: add an entry here, a `Route::livewire()` route with the
| same name and a `<url>` in public/sitemap.xml.
|
| Page keys:
|   route        Route name (also the page identifier).
|   title        Sidebar and heading title.
|   description  One sentence. Used in search, cards and as the meta description fallback.
|   view         Blade file (relative to resources/views) scanned for headings.
|   icon         Heroicon name used on cards.
|   components   Component tags documented on the page (drives the API reference).
|   related      Route names of related pages.
|   keywords     Extra search terms.
|   badge        Optional short label, e.g. "New".
|
*/

return [

    // Canonical domain for SEO URLs (canonical, Open Graph, structured data), whatever host serves the request.
    'site_url' => env('DOCS_SITE_URL', 'https://tallcraftui.com'),

    'repository' => 'https://github.com/developermithu/tallcraftui',
    'docs_repository' => 'https://github.com/developermithu/tallcraftui.com',
    'source_branch' => '3.x',
    'docs_branch' => '3.x',
    'discord' => 'https://discord.gg/gmFTB9YRV6',
    'packagist' => 'https://packagist.org/packages/developermithu/tallcraftui',

    /*
     * Documentation versions shown in the version switcher. The entry marked
     * `current` is the version these docs are built for.
     */
    'versions' => [
        ['label' => '3.x', 'current' => true, 'url' => null, 'note' => 'Livewire 4'],
        ['label' => '2.x', 'current' => false, 'url' => 'https://github.com/developermithu/tallcraftui/tree/2.x', 'note' => 'Livewire 3'],
        ['label' => '1.x', 'current' => false, 'url' => 'https://v1-tallcraftui.developermithu.com', 'note' => 'Legacy'],
    ],

    'sections' => [

        [
            'title' => 'Getting started',
            'pages' => [
                [
                    'route' => 'docs',
                    'title' => 'Introduction',
                    'description' => 'What TallCraftUI is, what it works with and where to start.',
                    'view' => 'livewire/docs/index.blade.php',
                    'icon' => 'book-open',
                    'keywords' => 'overview start docs home',
                ],
                [
                    'route' => 'docs.installation',
                    'title' => 'Installation',
                    'description' => 'Install TallCraftUI in a Laravel 12 or 13 app with Livewire 4 and Tailwind CSS 4.',
                    'view' => 'livewire/docs/installation.blade.php',
                    'icon' => 'arrow-down-tray',
                    'keywords' => 'install composer setup requirements getting started installer artisan',
                ],
                [
                    'route' => 'docs.configuration',
                    'title' => 'Configuration',
                    'description' => 'Publish the config file to set the component prefix, icons and per-component defaults.',
                    'view' => 'livewire/docs/configuration.blade.php',
                    'icon' => 'adjustments-horizontal',
                    'keywords' => 'config publish prefix tc- defaults env settings upload',
                ],
                [
                    'route' => 'docs.theming',
                    'title' => 'Theming',
                    'description' => 'Set brand colors, enable dark mode and override component styles with Tailwind classes.',
                    'view' => 'livewire/docs/theming.blade.php',
                    'icon' => 'swatch',
                    'keywords' => 'theme colors primary secondary dark mode customize css tailwind classes override',
                    'badge' => 'New',
                ],
                [
                    'route' => 'docs.upgrading',
                    'title' => 'Upgrade guide',
                    'description' => 'Upgrade from TallCraftUI 2.x to 3.0, or from 1.x to 2.0.',
                    'view' => 'livewire/docs/upgrading.blade.php',
                    'icon' => 'arrow-up-circle',
                    'keywords' => 'upgrade migrate breaking changes livewire 4 v3 v2',
                ],
            ],
        ],

        [
            'title' => 'Forms',
            'group' => 'components',
            'description' => 'Inputs with labels, hints and validation errors built in.',
            'icon' => 'pencil-square',
            'pages' => [
                [
                    'route' => 'docs.components.input',
                    'title' => 'Input',
                    'description' => 'Text input with label, hint, icons, prefix and suffix, and inline validation errors.',
                    'view' => 'livewire/docs/components/input.blade.php',
                    'components' => ['input'],
                    'related' => ['docs.components.password', 'docs.components.textarea', 'docs.components.select'],
                    'keywords' => 'text field form email',
                ],
                [
                    'route' => 'docs.components.password',
                    'title' => 'Password',
                    'description' => 'Password input with a visibility toggle and an optional password generator.',
                    'view' => 'livewire/docs/components/password.blade.php',
                    'components' => ['password'],
                    'related' => ['docs.components.input'],
                    'keywords' => 'secret show hide generate',
                ],
                [
                    'route' => 'docs.components.textarea',
                    'title' => 'Textarea',
                    'description' => 'Multi-line text input that can grow with its content.',
                    'view' => 'livewire/docs/components/textarea.blade.php',
                    'components' => ['textarea'],
                    'related' => ['docs.components.input', 'docs.components.markdown'],
                    'keywords' => 'multiline auto resize',
                ],
                [
                    'route' => 'docs.components.markdown',
                    'title' => 'Markdown',
                    'description' => 'Markdown editor with toolbar, preview and image uploads.',
                    'view' => 'livewire/docs/components/markdown.blade.php',
                    'components' => ['markdown'],
                    'related' => ['docs.components.textarea'],
                    'keywords' => 'editor easymde wysiwyg upload images',
                ],
                [
                    'route' => 'docs.components.select',
                    'title' => 'Select',
                    'description' => 'Searchable single or multiple select with images, descriptions and clearable options.',
                    'view' => 'livewire/docs/components/select.blade.php',
                    'components' => ['select'],
                    'related' => ['docs.components.native-select', 'docs.components.radio'],
                    'keywords' => 'combobox multiselect search dropdown options',
                ],
                [
                    'route' => 'docs.components.native-select',
                    'title' => 'Native select',
                    'description' => 'The browser select element, styled, with options from arrays, collections or enums.',
                    'view' => 'livewire/docs/components/native-select.blade.php',
                    'components' => ['native-select'],
                    'related' => ['docs.components.select'],
                    'keywords' => 'select option enum',
                ],
                [
                    'route' => 'docs.components.checkbox',
                    'title' => 'Checkbox',
                    'description' => 'Checkbox with label, colors, sizes and alignment options.',
                    'view' => 'livewire/docs/components/checkbox.blade.php',
                    'components' => ['checkbox'],
                    'related' => ['docs.components.radio', 'docs.components.toggle'],
                    'keywords' => 'check tick boolean',
                ],
                [
                    'route' => 'docs.components.radio',
                    'title' => 'Radio',
                    'description' => 'Radio button for picking one option from a set.',
                    'view' => 'livewire/docs/components/radio.blade.php',
                    'components' => ['radio'],
                    'related' => ['docs.components.checkbox', 'docs.components.select'],
                    'keywords' => 'option choice',
                ],
                [
                    'route' => 'docs.components.toggle',
                    'title' => 'Toggle',
                    'description' => 'On/off switch for boolean settings.',
                    'view' => 'livewire/docs/components/toggle.blade.php',
                    'components' => ['toggle'],
                    'related' => ['docs.components.checkbox'],
                    'keywords' => 'switch boolean on off',
                ],
                [
                    'route' => 'docs.components.range',
                    'title' => 'Range',
                    'description' => 'Range slider with min, max, step and color variants.',
                    'view' => 'livewire/docs/components/range.blade.php',
                    'components' => ['range'],
                    'related' => ['docs.components.input'],
                    'keywords' => 'slider min max step',
                ],
                [
                    'route' => 'docs.components.color-picker',
                    'title' => 'Color picker',
                    'description' => 'Color input with a picker and preset swatches.',
                    'view' => 'livewire/docs/components/color-picker.blade.php',
                    'components' => ['color-picker'],
                    'related' => ['docs.components.input'],
                    'keywords' => 'hex colour swatch',
                ],
                [
                    'route' => 'docs.components.rating',
                    'title' => 'Rating',
                    'description' => 'Star rating input with custom icons, totals and sizes.',
                    'view' => 'livewire/docs/components/rating.blade.php',
                    'components' => ['rating'],
                    'related' => ['docs.components.range'],
                    'keywords' => 'stars review score',
                ],
            ],
        ],

        [
            'title' => 'Elements',
            'group' => 'components',
            'description' => 'The building blocks: buttons, badges, avatars, icons and cards.',
            'icon' => 'cube',
            'pages' => [
                [
                    'route' => 'docs.components.button',
                    'title' => 'Button',
                    'description' => 'Buttons and links in 26 colors, three styles and five sizes, with icons and loading spinners.',
                    'view' => 'livewire/docs/components/button.blade.php',
                    'components' => ['button'],
                    'related' => ['docs.components.badge', 'docs.components.spinner', 'docs.components.dropdown'],
                    'keywords' => 'link cta action submit loading spinner',
                ],
                [
                    'route' => 'docs.components.badge',
                    'title' => 'Badge',
                    'description' => 'Small status labels with colors, icons and sizes.',
                    'view' => 'livewire/docs/components/badge.blade.php',
                    'components' => ['badge'],
                    'related' => ['docs.components.button', 'docs.components.avatar'],
                    'keywords' => 'tag label chip pill status',
                ],
                [
                    'route' => 'docs.components.avatar',
                    'title' => 'Avatar',
                    'description' => 'User images or initials, with badges, rings and stacked groups.',
                    'view' => 'livewire/docs/components/avatar.blade.php',
                    'components' => ['avatar', 'avatars'],
                    'related' => ['docs.components.badge'],
                    'keywords' => 'profile picture user image initials group',
                ],
                [
                    'route' => 'docs.components.icon',
                    'title' => 'Icon',
                    'description' => 'Heroicons in outline or solid style, sized with Tailwind classes.',
                    'view' => 'livewire/docs/components/icon.blade.php',
                    'components' => ['icon'],
                    'related' => ['docs.components.button'],
                    'keywords' => 'heroicons svg outline solid',
                ],
                [
                    'route' => 'docs.components.card',
                    'title' => 'Card',
                    'description' => 'Content container with header, figure, content and footer parts.',
                    'view' => 'livewire/docs/components/card.blade.php',
                    'components' => ['card', 'card-header', 'card-figure', 'card-content', 'card-footer'],
                    'related' => ['docs.components.stat'],
                    'keywords' => 'panel box container pricing',
                ],
                [
                    'route' => 'docs.components.separator',
                    'title' => 'Separator',
                    'description' => 'Horizontal divider between groups of content.',
                    'view' => 'livewire/docs/components/separator.blade.php',
                    'components' => ['separator'],
                    'related' => ['docs.components.card'],
                    'keywords' => 'divider hr line rule',
                ],
                [
                    'route' => 'docs.components.clipboard',
                    'title' => 'Clipboard',
                    'description' => 'Copy text to the clipboard with one click.',
                    'view' => 'livewire/docs/components/clipboard.blade.php',
                    'components' => ['clipboard'],
                    'related' => ['docs.components.button', 'docs.components.toast'],
                    'keywords' => 'copy paste',
                ],
                [
                    'route' => 'docs.components.theme-toggle',
                    'title' => 'Theme toggle',
                    'description' => 'A button that switches between light and dark mode and remembers the choice.',
                    'view' => 'livewire/docs/components/theme-toggle.blade.php',
                    'components' => ['theme-toggle'],
                    'related' => ['docs.theming', 'docs.components.button'],
                    'keywords' => 'dark mode light mode theme switcher',
                    'badge' => 'New',
                ],
            ],
        ],

        [
            'title' => 'Navigation',
            'group' => 'components',
            'description' => 'Help people find their way through your app.',
            'icon' => 'map',
            'pages' => [
                [
                    'route' => 'docs.components.breadcrumb',
                    'title' => 'Breadcrumb',
                    'description' => 'Shows where the current page sits in the hierarchy.',
                    'view' => 'livewire/docs/components/breadcrumb.blade.php',
                    'components' => ['breadcrumb', 'breadcrumb-item'],
                    'related' => ['docs.components.menu', 'docs.components.tab'],
                    'keywords' => 'path trail hierarchy',
                ],
                [
                    'route' => 'docs.components.tab',
                    'title' => 'Tab',
                    'description' => 'Switch between views in the same context, as underlined tabs or a segmented switch.',
                    'view' => 'livewire/docs/components/tab.blade.php',
                    'components' => ['tab', 'tab-item', 'tab-content'],
                    'related' => ['docs.components.accordion', 'docs.components.menu'],
                    'keywords' => 'tabs segmented switch panels',
                ],
                [
                    'route' => 'docs.components.menu',
                    'title' => 'Menu',
                    'description' => 'Vertical list of links or actions with icons and badges.',
                    'view' => 'livewire/docs/components/menu.blade.php',
                    'components' => ['menu', 'menu-item'],
                    'related' => ['docs.components.dropdown', 'docs.components.breadcrumb'],
                    'keywords' => 'sidebar nav list links',
                ],
                [
                    'route' => 'docs.components.accordion',
                    'title' => 'Accordion',
                    'description' => 'Collapsible sections that show one panel of content at a time.',
                    'view' => 'livewire/docs/components/accordion.blade.php',
                    'components' => ['accordion', 'accordion-item'],
                    'related' => ['docs.components.tab'],
                    'keywords' => 'collapse disclosure faq expand',
                ],
            ],
        ],

        [
            'title' => 'Overlays',
            'group' => 'components',
            'description' => 'Content that sits above the page: dialogs, drawers, dropdowns and tooltips.',
            'icon' => 'square-2-stack',
            'pages' => [
                [
                    'route' => 'docs.components.modal',
                    'title' => 'Modal',
                    'description' => 'Dialog opened from Livewire or Alpine, with sizes, positions and focus trapping.',
                    'view' => 'livewire/docs/components/modal.blade.php',
                    'components' => ['modal'],
                    'related' => ['docs.components.drawer', 'docs.components.toast'],
                    'keywords' => 'dialog popup confirm overlay',
                ],
                [
                    'route' => 'docs.components.drawer',
                    'title' => 'Drawer',
                    'description' => 'Panel that slides in from any edge of the screen.',
                    'view' => 'livewire/docs/components/drawer.blade.php',
                    'components' => ['drawer'],
                    'related' => ['docs.components.modal'],
                    'keywords' => 'slide over sheet offcanvas panel sidebar',
                ],
                [
                    'route' => 'docs.components.dropdown',
                    'title' => 'Dropdown',
                    'description' => 'Menu of actions or links that opens from a trigger, with positions and animations.',
                    'view' => 'livewire/docs/components/dropdown.blade.php',
                    'components' => ['dropdown', 'dropdown-item'],
                    'related' => ['docs.components.menu', 'docs.components.button'],
                    'keywords' => 'popover menu actions context',
                ],
                [
                    'route' => 'docs.components.tooltip',
                    'title' => 'Tooltip',
                    'description' => 'Short hint shown on hover, in four positions.',
                    'view' => 'livewire/docs/components/tooltip.blade.php',
                    'components' => ['tooltip'],
                    'related' => ['docs.components.dropdown'],
                    'keywords' => 'hint hover title popover',
                ],
            ],
        ],

        [
            'title' => 'Feedback',
            'group' => 'components',
            'description' => 'Tell people what happened and what is happening.',
            'icon' => 'bell-alert',
            'pages' => [
                [
                    'route' => 'docs.components.alert',
                    'title' => 'Alert',
                    'description' => 'Inline messages for success, warnings, errors and information.',
                    'view' => 'livewire/docs/components/alert.blade.php',
                    'components' => ['alert'],
                    'related' => ['docs.components.toast'],
                    'keywords' => 'callout banner message notice error',
                ],
                [
                    'route' => 'docs.components.toast',
                    'title' => 'Toast',
                    'description' => 'Temporary notifications triggered from Livewire or JavaScript.',
                    'view' => 'livewire/docs/components/toast.blade.php',
                    'components' => ['toast'],
                    'related' => ['docs.components.alert', 'docs.components.modal'],
                    'keywords' => 'notification snackbar flash message WithTcToast success error',
                ],
                [
                    'route' => 'docs.components.progress',
                    'title' => 'Progress',
                    'description' => 'Horizontal progress bar with labels, sizes and colors.',
                    'view' => 'livewire/docs/components/progress.blade.php',
                    'components' => ['progress'],
                    'related' => ['docs.components.progress-radial', 'docs.components.spinner'],
                    'keywords' => 'bar percent loading',
                ],
                [
                    'route' => 'docs.components.progress-radial',
                    'title' => 'Progress radial',
                    'description' => 'Circular progress indicator with labels, sizes and colors.',
                    'view' => 'livewire/docs/components/progress-radial.blade.php',
                    'components' => ['progress-radial'],
                    'related' => ['docs.components.progress'],
                    'keywords' => 'circle ring percent',
                ],
                [
                    'route' => 'docs.components.spinner',
                    'title' => 'Spinner',
                    'description' => 'Loading indicators: circle, dots, bars and pulse.',
                    'view' => 'livewire/docs/components/spinner.blade.php',
                    'components' => ['spinner'],
                    'related' => ['docs.components.button', 'docs.components.progress'],
                    'keywords' => 'loader loading busy',
                ],
            ],
        ],

        [
            'title' => 'Data display',
            'group' => 'components',
            'description' => 'Show records and numbers.',
            'icon' => 'table-cells',
            'pages' => [
                [
                    'route' => 'docs.components.table',
                    'title' => 'Table',
                    'description' => 'Data table with searching, sorting, pagination, filters and clickable rows.',
                    'view' => 'livewire/docs/components/table.blade.php',
                    'components' => ['table', 'th', 'tr', 'td', 'not-found'],
                    'related' => ['docs.components.stat', 'docs.components.dropdown'],
                    'keywords' => 'datatable grid rows sort paginate search WithTcTable',
                ],
                [
                    'route' => 'docs.components.stat',
                    'title' => 'Stat',
                    'description' => 'Metric card with title, value, description and icon.',
                    'view' => 'livewire/docs/components/stat.blade.php',
                    'components' => ['stat'],
                    'related' => ['docs.components.card', 'docs.components.table'],
                    'keywords' => 'kpi metric number dashboard',
                ],
            ],
        ],

        [
            'title' => 'Resources',
            'pages' => [
                [
                    'route' => 'docs.changelog',
                    'title' => 'Changelog',
                    'description' => 'Every TallCraftUI release, with what was added, changed and fixed.',
                    'view' => 'livewire/docs/changelog.blade.php',
                    'icon' => 'clock',
                    'keywords' => 'releases versions history whats new',
                ],
                [
                    'route' => 'docs.contribution',
                    'title' => 'Contributing',
                    'description' => 'Set up a local copy of TallCraftUI and send a pull request.',
                    'view' => 'livewire/docs/contribution.blade.php',
                    'icon' => 'code-bracket',
                    'keywords' => 'contribute pull request develop local',
                ],
            ],
        ],
    ],

    /*
     * Pages shown in the "Popular components" lists.
     */
    'popular' => [
        'docs.components.button',
        'docs.components.input',
        'docs.components.select',
        'docs.components.modal',
        'docs.components.table',
        'docs.components.toast',
    ],
];
