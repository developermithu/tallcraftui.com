<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Developermithu\Tallcraftui\Traits\WithTcToast;

new #[Layout('components.layouts.home')] #[Title('TallCraftUI - Laravel Blade UI Components Library for TALL Stack')] class extends Component {
    use WithTcToast;

    public string $content = 'Hello **world**!';

    public string $name = '';
    public string $email = '';
    public string $user_id = '';
    public string $password = 'password';
    public string $color = '#14b8a6';
    public string $textarea = '';
    public bool $terms;

    public string $activeTab = 'tab1';
    public bool $openModal = false;
    public bool $openDrawer = false;

    public function showToast()
    {
        $this->success(title: 'User created successfully', description: 'Your changes have been saved permanently.', showCloseIcon: true, showProgress: true, position: 'top-right');
    }

    public function createUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'color' => ['required', 'string', 'hex_color'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'terms' => ['required', 'boolean'],
        ]);

        dd('dd');
    }
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="TallCraftUI - Laravel Blade UI Components Library for TALL Stack"
            description="TallCraftUI is a Laravel blade UI components library for TALL stack, offering 30+ customizable components that seamlessly integrate with Livewire applications." />
    @endslot

    <div class="container relative isolate">
        <div class="grid grid-cols-12 py-12 gap-y-8 lg:gap-x-8 md:py-16">
            <x-home.hero-section />

            {{-- Right Side --}}
            <aside class="space-y-5 md:space-y-6 col-span-full lg:col-span-7">
                <div class="grid items-start grid-cols-12 gap-4">
                    <x-home.accordion-section />
                    <x-home.interactive-components />
                </div>

                <x-range data-pan="range" value="58" teal />

                <div class="grid items-start grid-cols-12 gap-4">
                    <div class="space-y-3 col-span-full lg:col-span-4">
                        <x-home.spinner-section />
                        <x-home.clipboard-section />
                        <x-home.tooltip-section />
                    </div>

                    <div class="space-y-3 col-span-full lg:col-span-8">
                        <x-home.icon-section />
                        <x-home.badge-section />
                        <x-home.button-section />
                    </div>
                </div>

                <x-home.table-section />                

                <div class="grid items-start grid-cols-12 gap-4">
                    <x-home.menu-section />  

                    <div class="space-y-4 col-span-full xl:col-span-7 2xl:col-span-8">
                        <x-home.stat-section /> 
                        <x-home.card-section /> 
                    </div>
                </div>

                <x-home.markdown-section /> 
            </aside>
        </div>
        
        <x-home.framework-comparison />
        <x-home.modals />
    </div>

    @assets
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
        <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    @endassets
</div>
