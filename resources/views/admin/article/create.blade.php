<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h1 class="text-xl font-bold">Tulis Artikel</h1>
                    </div>
                    <form class="" action="{{ route('articles.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="Title"
                                    class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" autocomplete="on" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="slug"
                                    class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                                <div class="mt-2">
                                    <input type="text" name="slug" id="slug" autocomplete=""
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Cover
                                    photo</label>
                                <div class="mt-2">
                                    <input type="file" name="thumbnail" id="thumbnail" autocomplete="on" required
                                        accept="image/*"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="body"
                                    class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                                <div class="mt-2">
                                    <input type="hidden" name="body" value="{{ old('body') }}">
                                    <div id="quill-editor">
                                    </div>
                                    {{-- <textarea name="body" id="body" cols="30" rows="10"></textarea> --}}
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
                                    Kategori
                                    {{-- <button id="openModalButton" class="px-2 py-1 ml-2 font-light text-white bg-green-500 rounded hover:bg-green-700 button">
                                Tambah Kategori
                                </button> --}}
                                </label>

                                <div class="mt-2">
                                    <select id="category_id" name="category_id" autocomplete="on" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="slug"
                                    class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                <div class="mt-2">
                                    <select id="status" name="status" autocomplete="on" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ old('status') ? 'selected' : '' }}>Published</option>
                                        <option value="0" {{ old('status') === false ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-x-6">
                            <button type="submit"
                                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#quill-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['link', 'image', 'video'],
                        [{
                            'align': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['clean']
                    ]
                }
            });

            quill.on('text-change', function(delta, oldDelta, source) {
                document.querySelector("input[name='body']").value = quill.root.innerHTML;
                updateTableOfContents();
                console.log('changed')
            });

            function updateTableOfContents() {
                // Get the current headings in the editor
                const headings = document.querySelectorAll('#quill-editor h1, #quill-editor h2, #quill-editor h3, #quill-editor h4, #quill-editor h5, #quill-editor h6');
                const tableOfContents = document.querySelector('#table-of-contents ul');

                tableOfContents.innerHTML = ''; // Clear existing table of contents

                // Generate the table of contents
                headings.forEach((heading, index) => {
                    const level = parseInt(heading.tagName.charAt(1));
                    const anchor = heading.innerText.trim().replace(/\s+/g, '-');
                    tableOfContents.innerHTML += `<li><a href="#${anchor}">${heading.innerText}</a></li>`;
                    heading.id = anchor;
                });
            }
        </script>
    @endpush


</x-app-layout>
