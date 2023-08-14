<x-user-layout>
    <x-slot:title>
        Blog - Deftzone Indonesia - Digital Agency
    </x-slot:title>
    <div class="container py-6 mt-20 md:mt-0">
        <h1 class="text-3xl font-bold mb-2.5">Blog</h1>
        <h3 class="text-base font-semibold text-black/70">All the new posts</h3>
    </div>
    <div class="container grid grid-cols-3 gap-10">
        <div class="flex flex-col order-2 col-span-3 gap-6 md:order-1 md:col-span-2">
            <a href="{{ route('blog.show', $latestPost->slug) }}" class="flex flex-col w-full recent-post group">
                <img src="{{ asset('storage/images/' . $latestPost->thumbnail) }}" alt=""
                    class="w-full mb-6 rounded aspect-video group-hover:shadow-lg">
                <div class="flex flex-col gap-6 description">
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-block px-4 py-1 text-xs font-semibold text-white capitalize bg-red-600 rounded-full">{{ $latestPost->category->name }}</span>
                        <span
                            class="text-xs font-medium">{{ \Carbon\Carbon::parse($latestPost->created_at)->format('F jS, Y') }}</span>
                    </div>
                    <div>
                        <h3>
                            <span class="mb-1 text-2xl font-bold md:text-3xl link-post">
                                {{ $latestPost->title }}
                            </span>
                        </h3>
                        <div class="text-base font-medium line-clamp-3">
                            {!! Str::limit($latestPost->body, 500) !!}
                        </div>
                    </div>
                </div>
            </a>
            @foreach ($articles as $article)
                <a href="{{ route('blog.show', $article->slug) }}"
                    class="flex flex-col items-center w-full gap-6 md:flex-row group">
                    <div class="w-full md:w-5/12">
                        <img src="{{ asset('storage/images/' . $article->thumbnail) }}" alt=""
                            class="w-full mb-6 rounded aspect-video group-hover:shadow-lg">
                    </div>
                    <div class="flex flex-col w-full gap-2 md:w-7/12 description">
                        <div class="flex items-center gap-3">
                            <span
                                class="inline-block px-4 py-1 text-xs font-semibold text-white capitalize bg-purple-600 rounded-full">{{ $article->category->name }}</span>
                            <span
                                class="text-xs font-medium">{{ \Carbon\Carbon::parse($article->created_at)->format('F jS, Y') }}
                            </span>
                        </div>
                        <div>
                            <h3>
                                <span class="mb-1 text-2xl font-bold link-post">
                                    {{ $article->title }}
                                </span>
                            </h3>
                            <p class="text-base font-medium line-clamp-3">
                                {!! Str::limit($article->body, 100) !!}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
            {{-- pagintion --}}
            {{ $articles->links('vendor.pagination.front') }}
        </div>
        <div class="order-1 col-span-3 md:order-2 md:col-span-1">
            <div class="p-4 border rounded-lg md:p-8 md:border-none" x-data="{ show: false }">
                <h3 class="text-lg font-bold md:text-2xl" @click="show=!show">Category</h3>
                <ul class="space-y-2.5 text-sm md:text-base font-semibold mt-6 text-black/70 md:!block"
                    style="display: none" x-show="show" x-transition>
                    @foreach ($categories as $item)
                        <li class="hover:text-black"><a href="#">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-user-layout>
