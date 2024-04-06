<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Request') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="text-center py-6 font-semibold px-4 bg-green-400 text-white rounded">
                {{ session('success') }}
            </div>
            @endif

            @if(session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('form_requests.update', $formRequest->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="form_request_category" class="text-sm">Form Category</label>
                            <input id="form_request_category" class="block mt-1 w-full rounded border border-gray-300" type="text" name="form_request_category" value="{{ $formRequest->form_request_category }}" required />
                        </div>
                        <div>
                            <label for="form_request_filed_name" class="text-sm">Form Filed Name</label>
                            <input id="form_request_filed_name" class="block mt-1 w-full rounded border border-gray-300" type="text" name="form_request_filed_name" value="{{ $formRequest->form_request_filed_name }}" required />
                        </div>
                        <!-- Other form fields -->
                        <div class="flex items-end justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>