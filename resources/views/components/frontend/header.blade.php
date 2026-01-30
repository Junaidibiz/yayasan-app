<header id="navbar"
    class="fixed top-0 w-full z-50 bg-white/80 dark:bg-brand-bgDark/80 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800 transition-all">
    <div class="container mx-auto px-4 h-20 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center text-white font-bold text-xl">D
            </div>
            <span class="font-extrabold text-xl tracking-tight hidden md:block text-zinc-800 dark:text-zinc-100">DAARUL
                <span class="text-brand">MULTAZAM</span></span>
        </div>

        <nav class="hidden lg:flex items-center space-x-8">
            <a href="/" class="font-medium hover:text-brand transition-all">Beranda</a>
            <a href="#" class="font-medium hover:text-brand transition-all">Tentang Kami</a>
            <a href="#" class="font-medium hover:text-brand transition-all">Program</a>
            <a href="#" class="font-medium hover:text-brand transition-all">Media</a>
            <a href="/kontak" class="font-medium text-brand border-b-2 border-brand">Kontak</a>
        </nav>

        <div class="flex items-center space-x-4 text-zinc-800 dark:text-zinc-100">
            <button id="theme-toggle" class="p-2 rounded-full hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-all">
                <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="#"
                class="hidden sm:inline-block px-5 py-2.5 rounded-lg border-2 border-brand text-brand font-semibold hover:bg-brand hover:text-white transition-all duration-300">Pendaftaran</a>
            <a href="#"
                class="hidden sm:inline-block px-5 py-2.5 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all">Donasi</a>
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-zinc-800 dark:text-zinc-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden lg:hidden bg-white dark:bg-brand-bgDark border-b border-zinc-200 dark:border-zinc-800 px-4 py-6 space-y-4">
        <a href="/" class="block font-medium">Beranda</a>
        <a href="#" class="block font-medium">Tentang Kami</a>
        <a href="#" class="block font-medium">Program</a>
        <a href="#" class="block font-medium">Media</a>
        <a href="/kontak" class="block font-medium text-brand">Kontak</a>
        <a href="#"
            class="block w-full py-3 border-2 border-brand text-brand text-center rounded-lg font-bold">Pendaftaran
            PSB</a>
        <a href="#" class="block w-full py-3 bg-brand text-white text-center rounded-lg font-bold">Donasi
            Sekarang</a>
    </div>
</header>
