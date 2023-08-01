<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <div>
                        <h1 class="text-xl font-bold">Artikel List</h1>
                    </div>
                    <div class="flex">
                        <a href="{{ route('articles.create') }}" type="button" id="addProductButton" class="inline-flex items-center px-3 py-2 mb-4 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Tulis Artikel
                        </a>
                    </div>
                </div>
                    <!-- {{ __("You're logged in!") }}       -->
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Author</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $item)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->title  }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->author->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $item->category->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <button type="button" id="deleteProductButton" data-drawer-target="drawer-delete-product-default" data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                        Delete item
                                    </button>
                                    <button type="button" id="deleteProductButton" data-drawer-target="drawer-delete-product-default" data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                        Delete item
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
            </div>
        </div>
    </div>

</x-app-layout>
