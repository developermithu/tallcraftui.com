<div class="mx-auto max-w-sm py-2">
    <div class="text-center">
        <x-icon name="building-storefront" class="mx-auto size-9 text-brand-600 dark:text-brand-400" />
        <h3 class="mt-3 text-xl font-semibold text-gray-950 dark:text-white">Sign in to Northwind</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Any valid email and password shows a failed sign-in.</p>
    </div>

    <form wire:submit="signIn" novalidate class="mt-8 space-y-5">
        <x-input label="Email" type="email" wire:model="signInEmail" placeholder="you@example.com" autocomplete="off" />
        <x-password label="Password" wire:model="signInPassword" />

        <div class="flex items-center justify-between">
            <x-checkbox label="Remember me" wire:model="remember" />
            <a href="#showcase" class="text-sm font-medium text-brand-700 hover:underline dark:text-brand-300">Forgot password?</a>
        </div>

        <x-button label="Sign in" spinner="signIn" class="w-full justify-center py-2.5 normal-case tracking-normal" />

        <x-separator title="or" />

        <x-button type="button" gray outline class="w-full justify-center py-2.5 normal-case tracking-normal">
            <x-site.github-icon class="size-4" />
            Continue with GitHub
        </x-button>
    </form>
</div>
