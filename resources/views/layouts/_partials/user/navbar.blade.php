<nav class="container top-0 fixed z-40 bg-gradient-to-b from-white to-white/50 flex flex-row items-center justify-between py-6 lg:relative lg:py-10">
    <div class="relative flex w-full" x-data="{ open: false }">
        <a href="#" class="z-50 block mr-24">
            <img class="max-h-12" src="{{ asset('dist/img/logo.png') }}" alt="logo">
        </a>
        <div class="z-50 block my-auto ml-auto w-7 lg:hidden" @click="open = !open">
            <span class="absolute block h-[3px] transition duration-500 ease-in-out transform rounded w-7 bg-sky-400" :class="{'rotate-45': open,' -translate-y-2': !open }"></span>
            <span class="absolute block h-[3px] transition duration-500 ease-in-out transform rounded w-7 bg-sky-400" :class="{'opacity-0': open } "></span>
            <span class="absolute block h-[3px] transition duration-500 ease-in-out transform rounded w-7 bg-sky-400" :class="{'-rotate-45': open, ' translate-y-2': !open}"></span>
        </div>
        <div class="fixed inset-0 flex items-center w-screen h-screen px-20 lg:px-0 bg-white/95 lg:relative lg:w-auto lg:h-auto lg:!flex" x-show="open">
            <ul class="flex-col items-center gap-10 lg:flex lg:flex-row">
                <li class="mb-4 text-base font-bold uppercase lg:mb-0 lg:font-semibold lg:text-sm opacity-60 hover:opacity-100 transition-all duration-500 nav-link"><a href="#">Home</a></li>
                <li class="mb-4 text-base font-bold uppercase lg:mb-0 lg:font-semibold lg:text-sm opacity-60 hover:opacity-100 transition-all duration-500 nav-link"><a href="#">Services</a></li>
                <li class="mb-4 text-base font-bold uppercase lg:mb-0 lg:font-semibold lg:text-sm opacity-60 hover:opacity-100 transition-all duration-500 nav-link"><a href="#">Portfolio</a></li>
                <li class="mb-4 text-base font-bold uppercase lg:mb-0 lg:font-semibold lg:text-sm opacity-100 nav-link"><a href="#">Blog</a></li>
            </ul>
        </div>
    </div>
    <div class="hidden lg:flex nav-right">
        <button class="px-5 py-3 transition-colors duration-300 border border-black rounded whitespace-nowrap hover:bg-black hover:text-white hover:border-white">
            Get Started
        </button>
    </div>
</nav>
