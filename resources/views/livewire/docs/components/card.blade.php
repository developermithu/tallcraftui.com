<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Card - TallCraftUI Components')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Card Components for Laravel & TailwindCSS - TallCraftUI"
            description="Build elegant and versatile card components with TallCraftUI. Features customizable headers, footers, and image support with hover effects." />
    @endslot

    <x-heading title="Card" subtitle="UI Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
                <x-card class="max-w-md">
                    <x-card-header title="Create account" subtitle="Create an account and manage your profile." />

                    <x-card-content>
                        <form class="space-y-3">
                            <x-input label="Name" />
                            <x-input label="Email" />
                        </form>
                    </x-card-content>

                    <x-card-footer class="flex items-center justify-between">
                        <x-button label="Cancel" white />
                        <x-button label="Submit" />
                    </x-card-footer>
                </x-card>
        @endverbatim
    </x-code-block>

    <x-code-block title="Card with image">
        @verbatim('docs')
                <x-card class="max-w-md pb-5">
                    <x-card-figure 
                        img="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg" 
                        alt="Photo caption"
                        hoverable 
                        overlay 
                    />
                    
                    <x-card-header 
                        title="Card title" 
                        subtitle="Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ratione placeat deserunt dicta qui! Animi!"
                        class="space-y-2" 
                    />
                </x-card>
        @endverbatim
    </x-code-block>

    <x-code-block title="Pricing card">
        @verbatim('docs')
                <x-card class="max-w-sm p-3">
                    <x-card-header title="Premium plan">
                        <div class="flex items-baseline py-2 dark:text-white">
                            <span class="text-3xl font-semibold">$</span>
                            <span class="text-5xl font-extrabold tracking-tight">29</span>
                            <span class="text-xl ms-1 dark:text-gray-300">/month</span>
                        </div>
                    </x-card-header>

                    <x-card-content>
                        <ul role="list" class="space-y-4">
                            <li class="flex items-center">
                                <x-icon name="check-circle" class="text-primary dark:text-primary" solid />
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">100 Websites</span>
                            </li>
                            
                            <li class="flex items-center">
                                <x-icon name="check-circle" class="text-primary dark:text-primary" solid />
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">250 GB NVMe Storage</span>
                            </li>
                            
                            <li class="flex items-center">
                                <x-icon name="check-circle" class="text-primary dark:text-primary" solid />
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Weekly backups</span>
                            </li>
                            
                            <li class="flex line-through decoration-gray-500">
                                <x-icon name="check-circle" class="text-gray-400 dark:text-gray-500" solid />
                                <span class="text-base font-normal leading-tight text-gray-500 ms-3">Free CDN</span>
                            </li>
                            
                            <li class="flex line-through decoration-gray-500">
                                <x-icon name="check-circle" class="text-gray-400 dark:text-gray-500" solid />
                                <span class="text-base font-normal leading-tight text-gray-500 ms-3">Dedicated IP Address</span>
                            </li>
                            
                            <li class="flex line-through decoration-gray-500">
                                <x-icon name="check-circle" class="text-gray-400 dark:text-gray-500" solid />
                                <span class="text-base font-normal leading-tight text-gray-500 ms-3">Daily Backups</span>
                            </li>
                        </ul>
                    </x-card-content>

                    <x-card-footer>
                        <x-button label="Get Started" class="w-full py-3" />
                    </x-card-footer>
                </x-card>
        @endverbatim
    </x-code-block>

</div>
