<x-user-layout>
    <x-slot:title>
        {{ $article->title }} - Deftzone Indonesia Blog
    </x-slot:title>
    <!-- Section Title -->
    <div class="container grid items-end grid-cols-1 gap-10 py-6 mt-20 lg:py-20 lg:mt-0 lg:grid-cols-2">
        <div class="">
            <h1 class="mb-4 text-3xl font-bold">{{ $article->title }}
            </h1>
            <span class="inline-block mb-4 text-base font-medium">Diterbitkan
                {{ \Carbon\Carbon::parse($article->created_at)->format('F jS, Y') }} oleh
                {{ $article->author->name }}</span>
            <div class="flex items-center justify-between">
                <span
                    class="py-1.5 px-3 bg-sky-400 rounded-full text-white font-medium text-xs">{{ $article->category->name }}</span>
                <button
                    class="py-1.5 px-3 bg-black rounded-full text-white font-medium text-xs flex flex-row items-center gap-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em"
                            fill="currentColor" class="shrink-0 align-middle mr-1 h-2.5 w-2.5">
                            <path
                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z">
                            </path>
                        </svg>
                    </span> Bagikan</button>
            </div>
        </div>
        <div class="mt-5 -mx-8 lg:mx-0">
            <div class="">
                <img src="{{ asset('storage/images/' . $article->thumbnail) }}" alt=""
                    class="w-full rounded-none lg:rounded aspect-video">
            </div>
        </div>
    </div>
    <div class="container grid grid-cols-3 gap-10 py-6 border-t border-b border-gray-200">
        <div class="flex flex-col order-2 col-span-3 gap-6 lg:order-1 lg:col-span-2">
            <div class="px-2 blog-content lg:px-6">
                {!! $article->body !!}
            </div>
        </div>
        <div class="order-1 col-span-3 lg:order-2 lg:col-span-1">
            <div class="sticky p-0 lg:px-8 lg:py-0 top-10">
                <h3 class="text-lg font-bold lg:text-2xl">Table of Contents</h3>
                <ul class="space-y-1.5 lg:space-y-2.5 text-sm lg:text-base font-semibold mt-4 lg:mt-6 text-black/70">
                    {{-- <li class="hover:text-black before:content-['#'] before:mr-2 lg:before:content-none"><a
                            href="#">Pendekatan Utility First</a></li>
                    <li class="hover:text-black before:content-['#'] before:mr-2 lg:before:content-none"><a
                            href="#">Ringan dan Cepat</a></li>
                    <li class="hover:text-black before:content-['#'] before:mr-2 lg:before:content-none"><a
                            href="#">Fleksibilitas dan Customisasi</a></li>
                    <li class="hover:text-black before:content-['#'] before:mr-2 lg:before:content-none"><a
                            href="#">Dokumen yang Rapih</a></li>
                    <li class="hover:text-black before:content-['#'] before:mr-2 lg:before:content-none"><a
                            href="#">Komunitas yang Aktif dan Solid</a></li>
                    <li class="hover:text-black before:content-['#'] before:mr-2 lg:before:content-none"><a
                            href="#">Kesimpulan</a></li> --}}
                            {!! $tableOfContents !!}
                </ul>
            </div>
        </div>
    </div>
    <div class="container py-16">
        <h2 class="mb-10 text-3xl font-bold">
            Most Recent
        </h2>
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <div class="">
                <img src="{{ asset('dist/img/blog/thumb-example.png') }}" alt=""
                    class="w-full mb-6 rounded aspect-video">
                <div class="">
                    <span class="inline-block text-sm font-medium mb-2.5">July 21, 2023</span>
                    <h3 class="text-2xl font-bold">
                        <a href="">
                            Judul Postingan Lain
                        </a>
                    </h3>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('dist/img/blog/thumb-example.png') }}" alt=""
                    class="w-full mb-6 rounded aspect-video">
                <div class="">
                    <span class="inline-block text-sm font-medium mb-2.5">July 21, 2023</span>
                    <h3 class="text-2xl font-bold">
                        <a href="">Laravel Livewire v3 is Released</a>
                    </h3>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('dist/img/blog/thumb-example.png') }}" alt=""
                    class="w-full mb-6 rounded aspect-video">
                <div class="">
                    <span class="inline-block text-sm font-medium mb-2.5">July 21, 2023</span>
                    <h3 class="text-2xl font-bold">
                        <a href="">Spekulasi Ilmuwan Tentang teori Flat Earth</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
