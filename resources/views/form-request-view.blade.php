<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Request View') }}
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
                    <form action="{{ route('form_requests.search') }}" method="GET">
                        <div class="grid grid-cols-3">
                            <input type="text" name="query" class="block mt-4 w-full rounded border border-gray-300" placeholder="Search...">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-10 m-auto block">Search</button>
                    </form>


                    <table class="table-auto mt-10 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th>Category</th>
                                <th>Field Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formRequests as $formRequest)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <td class="px-6 py-3">{{ $formRequest->form_request_category }}</td>
                                <td class="px-6 py-3">{{ $formRequest->form_request_filed_name }}</td>
                                <td class="px-6 py-3">
                                <a href="{{ route('form_requests.edit', $formRequest->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Display pagination links -->
                    <div class="pagination">
                        {{ $formRequests->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: '{{ route("form_requests.search") }}',
                type: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    // Update the table with search results
                    $('#formRequestTable').html(data);
                }
            });
        });
    });
</script>