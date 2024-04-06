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
                    <form method="POST" action="{{ route('form_submit') }}">
                        @csrf
                        <div>
                            <label for="form_request_category" class="text-sm">Form Category</label>
                            <input id="form_request_category" class="block mt-1 w-full rounded border border-gray-300" type="text" name="form_request_category" required />
                        </div>
                        <div id="filed_names_container" class="mt-4">
                            <div class="flex items-end lg:gap-10 gap-4 filed-name-row">
                                <div class="lg:w-[80%] w-[70%]">
                                    <label for="form_request_filed_name" class="text-sm">Filed Name</label>
                                    <input id="form_request_filed_name" class="block mt-1 w-full rounded border border-gray-300" type="text" name="form_request_filed_name[]" required />
                                </div>
                                <div class="lg:w-[20%] w-[30%] mt-4 lg:block flex justify-center items-center">
                                    <button type="button" onclick="addFiledNameInput()" class="bg-blue-600 m-auto text-white lg:text-lg text-sm lg:px-4 px-1 lg:py-1.5 py-2.5  rounded">Add More</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function addFiledNameInput() {
        const filedNamesContainer = document.getElementById('filed_names_container');
        const newFiledNameRow = document.createElement('div');
        newFiledNameRow.classList.add('flex', 'items-end', 'gap-10', 'filed-name-row');

        const inputWrapper = document.createElement('div');
        inputWrapper.classList.add('w-[80%]','mt-4');

        const inputLabel = document.createElement('label');
        inputLabel.setAttribute('for', 'form_request_filed_name');
        inputLabel.classList.add('text-sm');
        inputLabel.textContent = 'Filed Name';

        const inputField = document.createElement('input');
        inputField.setAttribute('id', 'form_request_filed_name');
        inputField.classList.add('block', 'mt-1', 'w-full', 'rounded', 'border', 'border-gray-300');
        inputField.setAttribute('type', 'text');
        inputField.setAttribute('name', 'form_request_filed_name[]');
        inputField.required = true;

        inputWrapper.appendChild(inputLabel);
        inputWrapper.appendChild(inputField);

        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.classList.add('bg-red-600', 'text-white', 'px-4', 'py-2', 'rounded', 'remove-button', 'w-[50%]');
        removeButton.onclick = function() {
            filedNamesContainer.removeChild(newFiledNameRow);
        };

        const buttonWrapper = document.createElement('div');
        buttonWrapper.classList.add('w-[20%]', 'mt-4');
        buttonWrapper.appendChild(removeButton);

        newFiledNameRow.appendChild(inputWrapper);
        newFiledNameRow.appendChild(buttonWrapper);
        filedNamesContainer.appendChild(newFiledNameRow);
    }
</script>
