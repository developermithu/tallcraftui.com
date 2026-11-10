<?php

use App\Livewire\Docs\Components\Table;
use App\Livewire\Docs\Components\Toast;
use App\Livewire\Pages\Analytics;
use App\Support\Docs;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::index')->name('home');
Route::livewire('/docs', 'docs.index')->name('docs');
Route::livewire('/analytics', Analytics::class)->name('analytics');

Route::group(['prefix' => 'docs', 'as' => 'docs.'], function () {
    Route::livewire('/installation', 'docs.installation')->name('installation');
    Route::livewire('/configuration', 'docs.configuration')->name('configuration');
    Route::livewire('/theming', 'docs.theming')->name('theming');
    Route::livewire('/upgrading', 'docs.upgrading')->name('upgrading');
    Route::livewire('/changelog', 'docs.changelog')->name('changelog');
    Route::livewire('/how-to-contribute', 'docs.contribution')->name('contribution');

    // Form Components
    Route::group(['prefix' => 'components', 'as' => 'components.'], function () {
        Route::livewire('/input', 'docs.components.input')->name('input');
        Route::livewire('/textarea', 'docs.components.textarea')->name('textarea');
        Route::livewire('/markdown', 'docs.components.markdown')->name('markdown');
        Route::livewire('/radio', 'docs.components.radio')->name('radio');
        Route::livewire('/checkbox', 'docs.components.checkbox')->name('checkbox');
        Route::livewire('/toggle', 'docs.components.toggle')->name('toggle');
        Route::livewire('/native-select', 'docs.components.native-select')->name('native-select');
        Route::livewire('/select', 'docs.components.select')->name('select');
        Route::livewire('/password', 'docs.components.password')->name('password');
        Route::livewire('/color-picker', 'docs.components.color-picker')->name('color-picker');
        Route::livewire('/range', 'docs.components.range')->name('range');
    });

    // UI Components
    Route::group(['prefix' => 'components', 'as' => 'components.'], function () {
        Route::livewire('/alert', 'docs.components.alert')->name('alert');
        Route::livewire('/avatar', 'docs.components.avatar')->name('avatar');
        Route::livewire('/badge', 'docs.components.badge')->name('badge');
        Route::livewire('/button', 'docs.components.button')->name('button');
        Route::livewire('/breadcrumb', 'docs.components.breadcrumb')->name('breadcrumb');
        Route::livewire('/dropdown', 'docs.components.dropdown')->name('dropdown');
        Route::livewire('/menu', 'docs.components.menu')->name('menu');
        Route::livewire('/modal', 'docs.components.modal')->name('modal');
        Route::livewire('/drawer', 'docs.components.drawer')->name('drawer');
        Route::livewire('/icon', 'docs.components.icon')->name('icon');
        Route::livewire('/rating', 'docs.components.rating')->name('rating');
        Route::livewire('/separator', 'docs.components.separator')->name('separator');
        Route::livewire('/stat', 'docs.components.stat')->name('stat');
        Route::livewire('/spinner', 'docs.components.spinner')->name('spinner');
        Route::livewire('/tab', 'docs.components.tab')->name('tab');
        Route::livewire('/accordion', 'docs.components.accordion')->name('accordion');
        Route::livewire('/card', 'docs.components.card')->name('card');
        Route::livewire('/clipboard', 'docs.components.clipboard')->name('clipboard');
        Route::livewire('/tooltip', 'docs.components.tooltip')->name('tooltip');
        Route::livewire('/progress', 'docs.components.progress')->name('progress');
        Route::livewire('/progress-radial', 'docs.components.progress-radial')->name('progress-radial');
        Route::livewire('/theme-toggle', 'docs.components.theme-toggle')->name('theme-toggle');

        Route::livewire('/table', Table::class)->name('table');
        Route::livewire('/toast', Toast::class)->name('toast');
    });
});

// Search index for the docs command palette (Cmd/Ctrl + K).
Route::get('/search-index.json', fn (Docs $docs) => response()
    ->json($docs->searchIndex())
    ->header('Cache-Control', 'public, max-age=3600'))
    ->name('search.index');

Route::get('clear', function () {
    Artisan::call('optimize:clear');

    return back();
});

Route::get('optimize', function () {
    Artisan::call('optimize');

    return back();
});

Route::get('storage-link', function () {
    Artisan::call('storage:link');

    return back();
});

Route::get('fresh', function () {
    Artisan::call('migrate:fresh --seed --force');

    return back();
});
