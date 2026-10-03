<?php

/*
|--------------------------------------------------------------------------
| Release history
|--------------------------------------------------------------------------
|
| Transcribed from the GitHub releases and CHANGELOG.md of
| developermithu/tallcraftui. Newest first. Add new releases at the top.
|
| Section keys: requirements, breaking, added, changed, deprecated, fixed,
| security, maintenance. Values are lists of Markdown strings.
|
*/

return [

    [
        'version' => '3.0.0-beta.1',
        'date' => '2026-10-03',
        'prerelease' => true,
        'summary' => 'First beta of TallCraftUI 3.0 with Livewire 4, Laravel 13 and Tailwind CSS 4.1 support, a CSS-first installer and hardened Markdown uploads. Not for production yet.',
        'requirements' => [
            'PHP 8.2+, Laravel 12 or 13, Livewire 4 and Tailwind CSS 4.1+.',
        ],
        'breaking' => [
            'Dropped support for Laravel 10 and 11, Livewire 3 and PHP 8.1.',
            '`<x-select>` and `<x-color-picker>` follow `wire:model` modifiers instead of always syncing immediately. Use `wire:model.live` for the previous behavior.',
            'The Markdown upload endpoint validates file type and size, only accepts disks listed in `tallcraftui.upload.disks`, rejects folder names containing `..` or a leading slash, and expects the CSRF token in a header.',
            '`HasMarkdownImages` only deletes images inside the model\'s markdown folder (`$markdownImageFolder`, default `markdown`).',
            '`WithTcTable::updated()` was renamed to `updatedWithTcTable()`.',
            '`<x-tr href>` no longer navigates when clicking buttons, links or form controls inside the row.',
            'Removed the global Toast helper functions from `window` (`window.toast()` is unchanged).',
            'Replaced the `gehrisandro/tailwind-merge-laravel` dependency with `gehrisandro/tailwind-merge-php`. The `@twMerge` directive and `twMerge()` helper are no longer installed.',
            'The installer no longer edits `tailwind.config.js`.',
        ],
        'added' => [
            '`upload` config section: `enabled`, `middleware`, `disks`, `mimes` and `max_size`.',
            '`tcSortableColumns()` whitelist for `WithTcTable` sorting.',
            '`wire:navigate` and Ctrl/Cmd-click support on `<x-tr href>`.',
            'Default `primary` and `secondary` theme colors, and the component `@source` path, in `tallcraftui.css`.',
            '`tallcraftui-theme-changed` window event, which keeps several `<x-theme-toggle />` instances in sync.',
            '`window.TallCraftUI` namespace for shared JavaScript.',
            '`TallCraftUiServiceProvider::components()` returns the component name map.',
        ],
        'changed' => [
            '`Modal`, `Drawer`, `Tab`, `Accordion`, `Rating`, `Password`, `ColorPicker`, `Markdown` and `Select` bind with `x-modelable` instead of `@entangle`.',
            'Toast error handling uses `Livewire.interceptRequest`.',
            'The installer adds missing `app.css` lines after existing `@import` rules, adds the class-based dark variant, installs packages with the Process facade, detects the package manager from the lockfile, and picks the `tc-` prefix when the app already has components with the same names.',
            '`<x-select>` uses `outline-hidden` instead of `outline-none`.',
        ],
        'deprecated' => [
            'Sorting a `WithTcTable` component without `tcSortableColumns()`. It will be required in 4.0.',
        ],
        'fixed' => [
            '`<x-password>` dropped `wire:model` modifiers such as `.live`.',
            'Two-way bound components failed without `wire:model` or outside a Livewire component.',
            '`<x-select>` didn\'t update when the bound property changed on the server.',
            '`<x-markdown>` initialized the editor twice when loading a value.',
            'Error toasts didn\'t work when the toast first rendered on a `wire:navigate` page.',
            '`WithTcTable` didn\'t run its update hook when the component defined its own `updated()`.',
            'Installing on Laravel 13 apps that use Guzzle 8.',
            'Dark mode flashed light before Alpine started, and wasn\'t reapplied after `wire:navigate`.',
            'The installer duplicated lines when re-run and overwrote a published config.',
            'New config keys were missing when using an older published config.',
            'Removed the Tailwind v3-only `bg-opacity-90` class from `<x-tooltip>`.',
        ],
        'security' => [
            'Markdown uploads: restricted file types (no SVG or HTML), size limit, disk allowlist and folder validation.',
            '`HasMarkdownImages` could delete any file on the disk through user-written markdown.',
            '`WithTcTable` passed the client-controlled `sortCol` to the query, including relation names called as model methods.',
            '`<x-tr href>` rendered the URL into an inline `onclick`, allowing `javascript:` URLs.',
        ],
    ],

    [
        'version' => '2.1.3',
        'date' => '2026-04-03',
        'maintenance' => ['Bumped `league/commonmark` to 2.8.2 and `gehrisandro/tailwind-merge-laravel` to 1.4.0.'],
    ],
    [
        'version' => '2.1.2',
        'date' => '2026-03-18',
        'maintenance' => ['Bumped `league/commonmark` to 2.8.1, `laravel/pint` to 1.29.0 and `blade-ui-kit/blade-heroicons` to 2.7.0.'],
    ],
    [
        'version' => '2.1.1',
        'date' => '2026-02-18',
        'maintenance' => ['Bumped `laravel/pint` to 1.27.1.'],
    ],
    [
        'version' => '2.1.0',
        'date' => '2026-01-31',
        'changed' => ['README links point to the official TallCraftUI website.'],
        'maintenance' => ['Bumped `symfony/process` to 7.4.5.'],
    ],
    [
        'version' => '2.0.9',
        'date' => '2026-01-16',
        'maintenance' => ['Bumped `laravel/pint` to 1.27.0.'],
    ],
    [
        'version' => '2.0.8',
        'date' => '2025-12-03',
        'maintenance' => ['Dependency updates.'],
    ],
    [
        'version' => '2.0.7',
        'date' => '2025-11-26',
        'maintenance' => ['Bumped `laravel/pint` to 1.26.0.'],
    ],
    [
        'version' => '2.0.6',
        'date' => '2025-11-24',
        'maintenance' => ['Bumped `symfony/http-foundation` to 7.3.7.'],
    ],
    [
        'version' => '2.0.5',
        'date' => '2025-10-03',
        'added' => ['**Theme Toggle**: new component, contributed by @IceWolf0110.'],
        'changed' => ['**Menu**: updated ring opacity.'],
    ],
    [
        'version' => '2.0.3',
        'date' => '2025-09-19',
        'maintenance' => ['Bumped `laravel/pint` to 1.25.1.'],
    ],
    [
        'version' => '2.0.2',
        'date' => '2025-07-26',
        'maintenance' => ['Bumped `laravel/pint` to 1.24.0.'],
    ],
    [
        'version' => '2.0.1',
        'date' => '2025-05-11',
        'maintenance' => ['Bumped `league/commonmark` to 2.7.0 and `laravel/pint` to 1.22.1.'],
    ],
    [
        'version' => '2.0.0',
        'date' => '2025-04-20',
        'summary' => 'Tailwind CSS 4 and Laravel 12 support, and a new searchable Select component.',
        'requirements' => ['Tailwind CSS 4.'],
        'breaking' => ['The `select` component was renamed to `native-select`. `<x-select>` is now the new searchable select.'],
        'added' => [
            '**Select**: new component with search, multiple selection and custom option rendering.',
            '**Badge**: slot support.',
            'The installer installs and imports the `@tailwindcss/forms` plugin.',
        ],
        'changed' => [
            'Refactored components for better reusability and maintenance.',
            '**Button**: refactored sizes.',
        ],
    ],
    [
        'version' => '2.0-beta',
        'date' => '2025-02-27',
        'prerelease' => true,
        'added' => [
            'Support for Tailwind CSS 4.',
            'Support for Laravel 12.',
            'The installer installs and imports the `@tailwindcss/forms` plugin.',
        ],
    ],

    [
        'version' => '1.4.6',
        'date' => '2025-04-12',
        'maintenance' => ['Bumped `laravel/pint` to 1.22.0.'],
    ],
    [
        'version' => '1.4.5',
        'date' => '2025-03-28',
        'changed' => ['**Button**: refactored sizes.'],
        'added' => ['**Badge**: slot support.'],
        'maintenance' => ['Dependency updates.'],
    ],
    [
        'version' => '1.4.2',
        'date' => '2025-03-13',
        'maintenance' => ['Dependency updates and Dependabot configuration.'],
    ],
    [
        'version' => '1.4.1',
        'date' => '2025-02-26',
        'added' => ['Laravel 12 compatibility.'],
    ],
    [
        'version' => '1.4.0',
        'date' => '2025-02-17',
        'added' => [
            '**Progress**: new component.',
            '**Progress Radial**: new component.',
        ],
        'changed' => [
            '**Button**: refactored.',
            'The Tailwind `content` path is now `./vendor/developermithu/tallcraftui/src/**/*.php`.',
        ],
        'fixed' => [
            '**Input**: dynamic sizes.',
            '**Select**: dynamic sizes.',
        ],
    ],
    [
        'version' => '1.3.9',
        'date' => '2025-02-11',
        'added' => [
            '**Table**: sort by relationship fields.',
            '**Table**: `no-spinner` prop.',
            '**Table**: target property for the loading spinner.',
        ],
        'changed' => [
            '**Table**: explicit border color.',
            '**Dropdown**: list style and border.',
            '**Toggle** and **Label**: preserve the case of the label.',
        ],
        'fixed' => [
            '**Table**: attribute merging.',
            '**Table**: the search field no longer submits the surrounding form.',
        ],
        'security' => ['Security fixes.'],
    ],
    [
        'version' => '1.3.8',
        'date' => '2024-11-19',
        'added' => [
            '**Rating**: new component.',
            '**Markdown**: new component.',
        ],
        'security' => ['Fixed a security issue.'],
    ],
    [
        'version' => '1.3.6',
        'date' => '2024-11-11',
        'changed' => ['**Toast**: the default type is `success`, so `$this->toast(\'Default toast\')` works without a type.'],
        'security' => ['Fixed security issues.'],
    ],
    [
        'version' => '1.3.5',
        'date' => '2024-10-25',
        'added' => [
            '**Toast**: new component.',
            '**Table**: disable the loading effect with `no-loading`.',
            '**Accordion**: `title` slot, `icon` slot and `class:icon`.',
            '`class:label` in all form components.',
        ],
        'fixed' => ['**Tab**: issue #2.'],
    ],
    [
        'version' => '1.3.3',
        'date' => '2024-10-15',
        'added' => ['**Avatar**: new component.'],
        'changed' => ['**Alert**: adjusted size.'],
    ],
    [
        'version' => '1.3.2',
        'date' => '2024-10-01',
        'added' => [
            '**Tooltip**: new component.',
            '**Range**: new component.',
            '**Clipboard**: new component.',
        ],
        'changed' => ['**Accordion**: no underline when hovering the title.'],
    ],
    [
        'version' => '1.3.0',
        'date' => '2024-09-19',
        'added' => [
            '**Password**: new component.',
            '**Color Picker**: new component.',
            '**Tab**: new component.',
            '**Accordion**: new component.',
            '**Card**: new component.',
        ],
        'fixed' => ['Bug fixes.'],
    ],
    [
        'version' => '1.2.9',
        'date' => '2024-09-12',
        'added' => [
            '**Spinner**: new component.',
            '**Toggle**: color and size variants.',
            '**Table**: `hoverable` attribute.',
        ],
        'changed' => ['**Table**: keeps the page layout after paginating.'],
    ],
    [
        'version' => '1.2.8',
        'date' => '2024-09-10',
        'added' => ['**Table**: new component.'],
        'fixed' => ['**Toggle**: bug fix.'],
    ],
    [
        'version' => '1.2.7',
        'date' => '2024-08-28',
        'fixed' => [
            '**Drawer**: dark mode color and `title` attribute.',
            '**Alert**: title color.',
        ],
    ],
    [
        'version' => '1.2.6',
        'date' => '2024-08-27',
        'added' => [
            '**Drawer**: new component.',
            '**Dropdown**: `fade`, `slide`, `flip` and `rotate` animations.',
            '**Modal**: `without-trap-focus` attribute and `close` event.',
        ],
        'fixed' => ['The `install:tallcraftui` command.'],
    ],
    [
        'version' => '1.2.5',
        'date' => '2024-08-22',
        'added' => [
            '**Modal**: `dismissible` and `blur-none` attributes.',
            '**Dropdown**: `title` and `icon` attributes.',
            '`TALLCRAFTUI_PREFIX` environment variable.',
        ],
        'fixed' => ['Focus border color of the input, textarea and select components.'],
    ],
    [
        'version' => '1.2.4',
        'date' => '2024-08-21',
        'added' => [
            '**Stat**: new component.',
            '**Menu** and **Menu Item**: new components.',
            '**Separator**: new component.',
            '**Dropdown** and **Modal**: `no-transition` attribute.',
        ],
        'changed' => ['Refactored `config/tallcraftui.php`.'],
    ],
    [
        'version' => '1.2.0',
        'date' => '2024-08-10',
        'breaking' => ['Removed the `tertiary`, `warning`, `danger`, `info` and `success` colors. Only `primary` and `secondary` are configured.'],
        'added' => [
            '**Badge**: new component.',
            '**Toggle**: new component.',
            '**Textarea**: `auto-resize` attribute.',
            'Tailwind colors `emerald`, `teal`, `blue`, `indigo` and `violet`.',
            'Support for tailwind-merge-laravel.',
        ],
    ],
    [
        'version' => '1.1.3',
        'date' => '2024-08-03',
        'breaking' => ['**Input**: the `preffix` attribute was renamed to `prefix`.'],
        'changed' => ['**Modal**: the default size changed from `2xl` to `lg`.'],
        'fixed' => [
            '**Input**: the error message broke the layout with `prefix`, `suffix`, `prepend` or `append`.',
            '**Radio**: the primary color didn\'t apply.',
        ],
    ],
    [
        'version' => '1.1.2',
        'date' => '2024-07-30',
        'fixed' => ['Internal components not working.'],
    ],
    [
        'version' => '1.1.1',
        'date' => '2024-07-26',
        'added' => ['**Dropdown**: new component.'],
        'fixed' => ['**Alert**: the `title` attribute didn\'t work.'],
    ],
    [
        'version' => '1.1.0',
        'date' => '2024-07-24',
        'added' => [
            'Tailwind CSS color support.',
            '**Breadcrumb**: new component.',
            '**Modal**: new component.',
        ],
    ],
    [
        'version' => '1.0',
        'date' => '2024-07-17',
        'added' => [
            'Dark mode support.',
            'MIT license.',
        ],
        'changed' => ['Refactored components.'],
    ],
    [
        'version' => '0.9',
        'date' => '2024-07-12',
        'summary' => 'First release.',
        'added' => ['Input, Icon, Button, Textarea, Select, Radio, Checkbox and Alert components.'],
    ],
];
