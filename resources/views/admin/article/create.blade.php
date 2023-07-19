<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h1 class="text-xl font-bold">Tulis Artikel</h1>
                    </div>
                    <form class="" action="#" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="Title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" autocomplete="on" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                            <div class="mt-2">
                                <input type="text" name="slug" id="slug" autocomplete="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
                            <div class="mt-2">
                                <input type="file" name="thumbnail" id="thumbnail" autocomplete="on" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                            <div class="mt-2">
                                <div id="body">
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
                                Kategori
                                {{-- <button id="openModalButton" class="bg-green-500 hover:bg-green-700 text-white font-light py-1 px-2 rounded ml-2 button">
                                Tambah Kategori
                                </button> --}}
                            </label>
                            
                            <div class="mt-2">
                            <select id="category" name="category" autocomplete="on" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option>General</option>
                                <option>Laravel</option>
                                <option>Vue</option>
                            </select>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                            <div class="mt-2">
                            <select id="status" name="status" autocomplete="on" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option>Draft</option>
                                <option>Publish</option>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
{{-- <!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
  <!-- Modal Content -->
  <div class="bg-white rounded-lg p-4">
    <!-- Konten Modal -->
    <h2 class="text-xl font-bold mb-4">Modal Tambah Kategori</h2>
    <!-- Form Tambah Kategori -->
    <form action="#" method="post">
      <!-- Isian Form Kategori -->
      <div class="mb-4">
        <label for="categoryName" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori:</label>
        <input id="categoryName" type="text" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-indigo-500">
      </div>
      <!-- Tombol Simpan -->
      <div class="flex justify-end">
        <button id="closeModalButton" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
      </div>
    </form>
  </div>
</div> --}}
</x-app-layout>