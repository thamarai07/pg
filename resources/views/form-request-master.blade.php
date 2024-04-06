<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Request Master') }}
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 lg:flex gap-4">
                <x-nav-link :href="route('form-request')" :active="request()->routeIs('form-request')" class="bg-blue-500 text-white px-2 py-2 text-center rounded-md text-[18px] flex justify-center items-center gap-2">
                        {{ __('Add new form request') }} <x-antdesign-form-o class="w-5" />
                </x-nav-link>
                <x-nav-link :href="route('form-request-view')" :active="request()->routeIs('form-request-view')" class="bg-green-500 text-white px-2 py-2 text-center rounded-md text-[18px] flex justify-center items-center gap-2">
                        {{ __('View form request') }} <x-carbon-view class="w-5" />
                </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
