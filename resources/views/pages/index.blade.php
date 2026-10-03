<?php

use Developermithu\Tallcraftui\Traits\WithTcToast;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.home')] #[Title('TallCraftUI - Blade UI components for Laravel and Livewire')] class extends Component
{
    use WithTcToast;

    public string $showcaseTab = 'form';

    // Syntax example
    public string $subscribeEmail = '';

    // Form example
    public string $projectName = '';

    public string $projectDomain = '';

    public string $projectRegion = 'eu-west';

    public string $projectStack = 'livewire';

    public string $projectDescription = '';

    public bool $projectPrivate = true;

    // Table example
    public string $search = '';

    // Settings example
    public string $settingsName = 'Olivia Martin';

    public string $settingsEmail = 'olivia@northwind.test';

    public bool $notifyOrders = true;

    public bool $notifyMentions = true;

    public bool $notifyDigest = false;

    // Sign in example
    public string $signInEmail = '';

    public string $signInPassword = '';

    public bool $remember = false;

    // Dialogs example
    public bool $confirmDelete = false;

    public bool $inviteDrawer = false;

    public string $inviteEmail = '';

    public string $inviteRole = 'member';

    #[Computed]
    public function members(): array
    {
        $members = [
            ['name' => 'Olivia Martin', 'email' => 'olivia@northwind.test', 'role' => 'Owner', 'status' => 'Active', 'active' => 'Just now'],
            ['name' => 'Jackson Lee', 'email' => 'jackson@northwind.test', 'role' => 'Developer', 'status' => 'Active', 'active' => '2 hours ago'],
            ['name' => 'Isabella Nguyen', 'email' => 'isabella@northwind.test', 'role' => 'Designer', 'status' => 'Invited', 'active' => 'Never'],
            ['name' => 'William Kim', 'email' => 'william@northwind.test', 'role' => 'Support', 'status' => 'Active', 'active' => 'Yesterday'],
            ['name' => 'Sofia Davis', 'email' => 'sofia@northwind.test', 'role' => 'Developer', 'status' => 'Suspended', 'active' => '3 weeks ago'],
        ];

        $search = mb_strtolower(trim($this->search));

        return array_values(array_filter($members, fn (array $member) => $search === ''
            || str_contains(mb_strtolower($member['name'].' '.$member['role'].' '.$member['email']), $search)));
    }

    public function subscribe(): void
    {
        $this->validate(['subscribeEmail' => ['required', 'email']], [], ['subscribeEmail' => 'email']);

        $this->reset('subscribeEmail');
        $this->success(title: 'Subscribed', description: 'This is a demo, so nothing was sent.');
    }

    public function createProject(): void
    {
        $this->validate([
            'projectName' => ['required', 'string', 'min:3', 'max:40'],
            'projectDomain' => ['nullable', 'regex:/^[a-z0-9.-]+\.[a-z]{2,}$/i'],
            'projectDescription' => ['nullable', 'string', 'max:200'],
        ], [
            'projectDomain.regex' => 'Enter a domain like northwind.test, without https://.',
        ], [
            'projectName' => 'project name',
            'projectDomain' => 'domain',
            'projectDescription' => 'description',
        ]);

        $this->success(title: 'Project created', description: "{$this->projectName} is ready. This demo doesn't save anything.");
        $this->resetProject();
    }

    public function resetProject(): void
    {
        $this->reset('projectName', 'projectDomain', 'projectDescription');
        $this->resetValidation();
    }

    public function saveSettings(): void
    {
        $this->validate([
            'settingsName' => ['required', 'string', 'max:60'],
            'settingsEmail' => ['required', 'email'],
        ], [], ['settingsName' => 'full name', 'settingsEmail' => 'email']);

        $this->success(title: 'Settings saved');
    }

    public function signIn(): void
    {
        $this->validate([
            'signInEmail' => ['required', 'email'],
            'signInPassword' => ['required', 'min:8'],
        ], [], ['signInEmail' => 'email', 'signInPassword' => 'password']);

        $this->addError('signInEmail', 'These credentials do not match our records.');
    }

    public function deleteProject(): void
    {
        $this->confirmDelete = false;
        $this->success(title: 'Project deleted', description: 'Just kidding, this is a demo.');
    }

    public function sendInvite(): void
    {
        $this->validate(['inviteEmail' => ['required', 'email']], [], ['inviteEmail' => 'email address']);

        $this->inviteDrawer = false;
        $this->success(title: 'Invite sent', description: "{$this->inviteEmail} was invited as ".ucfirst($this->inviteRole).'.');
        $this->reset('inviteEmail');
    }

    public function notify(string $type): void
    {
        match ($type) {
            'error' => $this->error(title: 'Payment failed', description: 'The card was declined. Try another payment method.'),
            'warning' => $this->warning(title: 'Storage almost full', description: "You've used 92% of your plan."),
            'info' => $this->info(title: 'New version available', description: 'Refresh to get the latest features.'),
            default => $this->success(title: 'Changes saved', description: 'Your project settings were updated.'),
        };
    }
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="TallCraftUI - Blade UI components for Laravel, Livewire and Tailwind CSS"
            description="TallCraftUI is an open source Blade UI component library for Laravel, Livewire, Alpine.js and Tailwind CSS. 35 customizable components: forms, tables, modals, toasts and more." />
    @endslot

    @php $members = $this->members; @endphp

    <x-home.hero />
    <x-home.stack />
    <x-home.features />
    @include('partials.home.showcase')
    @include('partials.home.syntax')
    <x-home.comparison />
    <x-home.components />
    <x-home.install />
    <x-home.community />
</div>
