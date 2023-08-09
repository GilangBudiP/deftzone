<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deftzone Indonesia - Digital Agency</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;800&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="dist/js/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" href="dist/icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative font-inter">
    <!-- Navbar -->
    <nav
        class="container fixed top-0 z-40 flex flex-row items-center justify-between py-6 bg-gradient-to-b from-white to-white/50 md:relative md:py-10">
        <div class="relative flex w-full" x-data="{ open: false }">
            <a href="#" class="z-50 block mr-24">
                <img class="max-h-12" src="dist/img/logo.png" alt="logo">
            </a>
            <div class="z-50 block my-auto ml-auto w-7 md:hidden" @click="open = !open">
                <span
                    class="absolute block h-[3px] transition duration-500 ease-in-out transform rounded w-7 bg-sky-400"
                    :class="{ 'rotate-45': open, ' -translate-y-2': !open }"></span>
                <span
                    class="absolute block h-[3px] transition duration-500 ease-in-out transform rounded w-7 bg-sky-400"
                    :class="{ 'opacity-0': open }"></span>
                <span
                    class="absolute block h-[3px] transition duration-500 ease-in-out transform rounded w-7 bg-sky-400"
                    :class="{ '-rotate-45': open, ' translate-y-2': !open }"></span>
            </div>
            <div class="fixed inset-0 flex items-center w-screen h-screen px-20 md:px-0 bg-white/95 md:relative md:w-auto md:h-auto md:!flex"
                x-show="open">
                <ul class="flex-col items-center gap-10 md:flex md:flex-row">
                    <li class="mb-4 text-base font-bold uppercase md:mb-0 md:font-semibold md:text-sm"><a
                            href="{{ route('welcome') }}">Home</a></li>
                    <li class="mb-4 text-base font-bold uppercase md:mb-0 md:font-semibold md:text-sm"><a
                            href="{{ route('welcome') }}#services">Services</a></li>
                    <li class="mb-4 text-base font-bold uppercase md:mb-0 md:font-semibold md:text-sm"><a
                            href="#">Portfolio</a></li>
                    <li class="mb-4 text-base font-bold uppercase md:mb-0 md:font-semibold md:text-sm"><a
                            href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
            </div>
        </div>
        <div class="hidden md:flex nav-right">
            <button
                class="px-5 py-3 transition-colors duration-300 border border-black rounded whitespace-nowrap hover:bg-black hover:text-white hover:border-white">
                Get Started
            </button>
        </div>
    </nav>
    <!-- Section Title -->
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
                        <p class="text-base font-medium">
                            {!! Str::limit($latestPost->body, 100) !!}
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
    <!-- Footer -->
    <footer class="container py-16">
        <div class="relative bg-transparent">
            <div class="mx-auto w-0.5 h-32 bg-emerald-300"></div>
        </div>
        <div class="w-10/12 mx-auto">
            <div class="flex flex-col items-center justify-center gap-6 md:gap-16 md:flex-row">
                <div class="order-2 md:order-1 flex opacity-60 gap-2.5 social-media">
                    <span class="instagram">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4 2.6665H21.6C25.8667 2.6665 29.3333 6.13317 29.3333 10.3998V21.5998C29.3333 23.6508 28.5186 25.6178 27.0683 27.0681C25.618 28.5184 23.651 29.3332 21.6 29.3332H10.4C6.13334 29.3332 2.66667 25.8665 2.66667 21.5998V10.3998C2.66667 8.34883 3.48143 6.38183 4.93171 4.93154C6.38199 3.48126 8.349 2.6665 10.4 2.6665ZM10.1333 5.33317C8.8603 5.33317 7.6394 5.83888 6.73923 6.73906C5.83905 7.63923 5.33334 8.86013 5.33334 10.1332V21.8665C5.33334 24.5198 7.48 26.6665 10.1333 26.6665H21.8667C23.1397 26.6665 24.3606 26.1608 25.2608 25.2606C26.161 24.3604 26.6667 23.1395 26.6667 21.8665V10.1332C26.6667 7.47984 24.52 5.33317 21.8667 5.33317H10.1333ZM23 7.33317C23.442 7.33317 23.866 7.50877 24.1785 7.82133C24.4911 8.13389 24.6667 8.55781 24.6667 8.99984C24.6667 9.44186 24.4911 9.86579 24.1785 10.1783C23.866 10.4909 23.442 10.6665 23 10.6665C22.558 10.6665 22.1341 10.4909 21.8215 10.1783C21.5089 9.86579 21.3333 9.44186 21.3333 8.99984C21.3333 8.55781 21.5089 8.13389 21.8215 7.82133C22.1341 7.50877 22.558 7.33317 23 7.33317ZM16 9.33317C17.7681 9.33317 19.4638 10.0355 20.714 11.2858C21.9643 12.536 22.6667 14.2317 22.6667 15.9998C22.6667 17.7679 21.9643 19.4636 20.714 20.7139C19.4638 21.9641 17.7681 22.6665 16 22.6665C14.2319 22.6665 12.5362 21.9641 11.286 20.7139C10.0357 19.4636 9.33334 17.7679 9.33334 15.9998C9.33334 14.2317 10.0357 12.536 11.286 11.2858C12.5362 10.0355 14.2319 9.33317 16 9.33317ZM16 11.9998C14.9391 11.9998 13.9217 12.4213 13.1716 13.1714C12.4214 13.9216 12 14.939 12 15.9998C12 17.0607 12.4214 18.0781 13.1716 18.8283C13.9217 19.5784 14.9391 19.9998 16 19.9998C17.0609 19.9998 18.0783 19.5784 18.8284 18.8283C19.5786 18.0781 20 17.0607 20 15.9998C20 14.939 19.5786 13.9216 18.8284 13.1714C18.0783 12.4213 17.0609 11.9998 16 11.9998Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span class="twitter">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.9467 8.00016C28.92 8.46683 27.8133 8.7735 26.6667 8.92016C27.84 8.2135 28.7467 7.0935 29.1733 5.74683C28.0667 6.4135 26.84 6.88016 25.5467 7.14683C24.4933 6.00016 23.0133 5.3335 21.3333 5.3335C18.2 5.3335 15.64 7.8935 15.64 11.0535C15.64 11.5068 15.6933 11.9468 15.7867 12.3602C11.04 12.1202 6.81333 9.84016 4 6.38683C3.50666 7.22683 3.22666 8.2135 3.22666 9.2535C3.22666 11.2402 4.22666 13.0002 5.77333 14.0002C4.82666 14.0002 3.94666 13.7335 3.17333 13.3335V13.3735C3.17333 16.1468 5.14666 18.4668 7.76 18.9868C6.92097 19.2164 6.04012 19.2484 5.18666 19.0802C5.5488 20.2168 6.25805 21.2114 7.21468 21.9241C8.17132 22.6368 9.32726 23.0317 10.52 23.0535C8.49817 24.6541 5.99199 25.5192 3.41333 25.5068C2.96 25.5068 2.50666 25.4802 2.05333 25.4268C4.58666 27.0535 7.6 28.0002 10.8267 28.0002C21.3333 28.0002 27.1067 19.2802 27.1067 11.7202C27.1067 11.4668 27.1067 11.2268 27.0933 10.9735C28.2133 10.1735 29.1733 9.16016 29.9467 8.00016Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span class="youtube">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.3333 19.9998L20.2533 15.9998L13.3333 11.9998V19.9998ZM28.7467 9.55984C28.92 10.1865 29.04 11.0265 29.12 12.0932C29.2133 13.1598 29.2533 14.0798 29.2533 14.8798L29.3333 15.9998C29.3333 18.9198 29.12 21.0665 28.7467 22.4398C28.4133 23.6398 27.64 24.4132 26.44 24.7465C25.8133 24.9198 24.6667 25.0398 22.9067 25.1198C21.1733 25.2132 19.5867 25.2532 18.12 25.2532L16 25.3332C10.4133 25.3332 6.93334 25.1198 5.56 24.7465C4.36001 24.4132 3.58667 23.6398 3.25334 22.4398C3.08001 21.8132 2.96001 20.9732 2.88001 19.9065C2.78667 18.8398 2.74667 17.9198 2.74667 17.1198L2.66667 15.9998C2.66667 13.0798 2.88001 10.9332 3.25334 9.55984C3.58667 8.35984 4.36001 7.5865 5.56 7.25317C6.18667 7.07984 7.33334 6.95984 9.09334 6.87984C10.8267 6.7865 12.4133 6.7465 13.88 6.7465L16 6.6665C21.5867 6.6665 25.0667 6.87984 26.44 7.25317C27.64 7.5865 28.4133 8.35984 28.7467 9.55984Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span class="linkedin">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.3333 4C26.0406 4 26.7189 4.28095 27.219 4.78105C27.719 5.28115 28 5.95942 28 6.66667V25.3333C28 26.0406 27.719 26.7189 27.219 27.219C26.7189 27.719 26.0406 28 25.3333 28H6.66667C5.95942 28 5.28115 27.719 4.78105 27.219C4.28095 26.7189 4 26.0406 4 25.3333V6.66667C4 5.95942 4.28095 5.28115 4.78105 4.78105C5.28115 4.28095 5.95942 4 6.66667 4H25.3333ZM24.6667 24.6667V17.6C24.6667 16.4472 24.2087 15.3416 23.3936 14.5264C22.5784 13.7113 21.4728 13.2533 20.32 13.2533C19.1867 13.2533 17.8667 13.9467 17.2267 14.9867V13.5067H13.5067V24.6667H17.2267V18.0933C17.2267 17.0667 18.0533 16.2267 19.08 16.2267C19.5751 16.2267 20.0499 16.4233 20.3999 16.7734C20.75 17.1235 20.9467 17.5983 20.9467 18.0933V24.6667H24.6667ZM9.17333 11.4133C9.76742 11.4133 10.3372 11.1773 10.7573 10.7573C11.1773 10.3372 11.4133 9.76742 11.4133 9.17333C11.4133 7.93333 10.4133 6.92 9.17333 6.92C8.57571 6.92 8.00257 7.1574 7.57999 7.57999C7.1574 8.00257 6.92 8.57571 6.92 9.17333C6.92 10.4133 7.93333 11.4133 9.17333 11.4133ZM11.0267 24.6667V13.5067H7.33333V24.6667H11.0267Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span class="facebook">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 2.72021C8.66667 2.72021 2.66667 8.70688 2.66667 16.0802C2.66667 22.7469 7.54667 28.2802 13.92 29.2802V19.9469H10.5333V16.0802H13.92V13.1335C13.92 9.78688 15.9067 7.94688 18.96 7.94688C20.4133 7.94688 21.9333 8.20022 21.9333 8.20022V11.4935H20.2533C18.6 11.4935 18.08 12.5202 18.08 13.5735V16.0802H21.7867L21.1867 19.9469H18.08V29.2802C21.2219 28.784 24.0829 27.1809 26.1466 24.7603C28.2102 22.3397 29.3405 19.2611 29.3333 16.0802C29.3333 8.70688 23.3333 2.72021 16 2.72021Z"
                                fill="black" />
                        </svg>
                    </span>
                </div>
                <div class="flex flex-col order-1 pt-6 text-center md:py-6 md:order-2 address">
                    <div class="mb-10">
                        <img src="./dist/img/logo.png" class="mx-auto max-h-8 md:max-h-12 grayscale"
                            alt="logo deftzone">
                    </div>
                    <p class="w-5/6 mx-auto text-sm font-medium md:w-full text-black/70">
                        Jalan Pogung Kidul, Sinduadi, Mlati, Kab. Sleman, Daerah Istimewa Yogyakarta
                    </p>
                </div>
                <div class="order-3 font-semibold text-center contact text-black/70">
                    <div class="mb-2.5 text-sm md:text-lg">
                        contact@deftzone.id
                    </div>
                    <div class="flex gap-1 text-sm md:gap-2 md:text-base">
                        <span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.465 8.5925C6.545 10.715 8.285 12.455 10.4075 13.535L12.0575 11.885C12.2675 11.675 12.56 11.615 12.8225 11.6975C13.6625 11.975 14.5625 12.125 15.5 12.125C15.6989 12.125 15.8897 12.204 16.0303 12.3447C16.171 12.4853 16.25 12.6761 16.25 12.875V15.5C16.25 15.6989 16.171 15.8897 16.0303 16.0303C15.8897 16.171 15.6989 16.25 15.5 16.25C12.1185 16.25 8.87548 14.9067 6.48439 12.5156C4.0933 10.1245 2.75 6.88151 2.75 3.5C2.75 3.30109 2.82902 3.11032 2.96967 2.96967C3.11032 2.82902 3.30109 2.75 3.5 2.75H6.125C6.32391 2.75 6.51468 2.82902 6.65533 2.96967C6.79598 3.11032 6.875 3.30109 6.875 3.5C6.875 4.4375 7.025 5.3375 7.3025 6.1775C7.385 6.44 7.325 6.7325 7.115 6.9425L5.465 8.5925Z"
                                    fill="black" fill-opacity="0.6" />
                            </svg>
                        </span>
                        +62 8177 4171 958
                    </div>
                </div>
            </div>
        </div>
        <hr class="w-32 mx-auto h-0.5 bg-emerald-300 my-6">
        <div class="text-center">
            <span class="text-sm font-medium md:text-base text-black/70">
                CV Deft Zone Indonesia © 2023. All rights reserved.
            </span>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script> -->
    <script src="./dist/js/tiny-slider/min/tiny-slider.js"></script>
    <script>
        AOS.init();
    </script>
    {{-- <script src="dist/js/script.js"></script> --}}
</body>

</html>
