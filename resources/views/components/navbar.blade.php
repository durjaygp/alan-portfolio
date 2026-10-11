<div x-data="{ scrolled: false, mobileMenuOpen: false }"
     @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- ============ NAVBAR (FULL WIDTH) ============ -->
    <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
         :class="scrolled ? 'bg-white/95 dark:bg-[#070D18]/95 backdrop-blur-md shadow-lg shadow-slate-900/5 dark:shadow-none py-3 border-b border-slate-200/80 dark:border-slate-800/80' : 'bg-white/80 dark:bg-[#070D18]/80 backdrop-blur-md py-4 border-b border-slate-200/50 dark:border-slate-800/50'">
        <div class="w-full px-4 sm:px-8 lg:px-12 flex items-center justify-between">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="font-heading font-bold text-2xl sm:text-3xl tracking-wider text-[#0D1B33] dark:text-white transition-colors group flex items-center gap-2">
                @if(!empty($siteSetting->logo_url))
                    <img src="{{ $siteSetting->logo_url }}" alt="{{ $siteSetting->site_name }}" class="h-9 w-auto object-contain dark:hidden">
                    <img src="{{ $siteSetting->logo_dark_url }}" alt="{{ $siteSetting->site_name }}" class="h-9 w-auto object-contain hidden dark:block">
                @else
                    <span>{{ Str::before($siteSetting->site_name ?? 'ALAN HUMPHREYS', ' ') ?: 'ALAN' }}</span>
                    <span class="font-normal text-slate-blue dark:text-slate-blue-light group-hover:text-slate-blue-light transition-colors">
                        {{ Str::after($siteSetting->site_name ?? 'ALAN HUMPHREYS', ' ') ?: 'Humphreys' }}
                    </span>
                @endif
            </a>

            <!-- Desktop Links -->
            <ul class="hidden lg:flex items-center gap-8 text-xs font-bold uppercase tracking-widest text-slate-900 dark:text-slate-200">
                <li>
                    <a href="{{ route('about') }}"
                       class="{{ request()->routeIs('about') ? 'text-slate-blue dark:text-slate-blue-light font-extrabold border-b-2 border-slate-blue dark:border-slate-blue-light pb-1' : 'hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors' }}">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}#services" class="hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors">
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}"
                       class="{{ request()->routeIs('gallery*') ? 'text-slate-blue dark:text-slate-blue-light font-extrabold border-b-2 border-slate-blue dark:border-slate-blue-light pb-1' : 'hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors' }}">
                        Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                       class="{{ request()->routeIs('products*') ? 'text-slate-blue dark:text-slate-blue-light font-extrabold border-b-2 border-slate-blue dark:border-slate-blue-light pb-1' : 'hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors' }}">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}"
                       class="{{ request()->routeIs('blog*') ? 'text-slate-blue dark:text-slate-blue-light font-extrabold border-b-2 border-slate-blue dark:border-slate-blue-light pb-1' : 'hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors' }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}#contact" class="hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors">
                        Contact
                    </a>
                </li>
            </ul>

            <!-- Right Actions (Theme Toggle + CTA) -->
            <div class="hidden lg:flex items-center gap-4">
                <!-- Dark/Light Mode Toggle -->
                <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light')"
                        type="button"
                        class="p-2.5 rounded-full text-slate-800 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-800/70 hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors focus:outline-none shadow-sm cursor-pointer"
                        title="Toggle Light / Dark Mode">
                    <template x-if="darkMode">
                        <svg class="w-5 h-5 text-slate-blue-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </template>
                    <template x-if="!darkMode">
                        <svg class="w-5 h-5 text-[#0D1B33]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </template>
                </button>

                <!-- Book Call CTA -->
                <a href="{{ $siteSetting->header_cta_url ?: route('home').'#contact' }}"
                   class="bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold px-6 py-2.5 rounded-lg text-xs tracking-wider uppercase shadow-md shadow-slate-blue/20 hover:shadow-lg hover:shadow-slate-blue/30 hover:-translate-y-0.5 transition-all duration-300">
                    {{ $siteSetting->header_cta_text ?: 'Book a Call' }}
                </a>
            </div>

            <!-- Mobile Controls -->
            <div class="flex lg:hidden items-center gap-3">
                <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light')"
                        type="button"
                        class="p-2.5 rounded-full text-slate-800 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-800/70 hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors">
                    <template x-if="darkMode">
                        <svg class="w-5 h-5 text-slate-blue-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </template>
                    <template x-if="!darkMode">
                        <svg class="w-5 h-5 text-[#0D1B33]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </template>
                </button>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-[#0D1B33] dark:text-white focus:outline-none" aria-label="Toggle Menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation Drawer Backdrop -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileMenuOpen = false"
         class="fixed inset-0 bg-black/70 z-40 backdrop-blur-sm lg:hidden" x-cloak></div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 w-4/5 max-w-sm h-full bg-[#0D1B33] dark:bg-[#070D18] border-l border-slate-800 z-50 p-6 flex flex-col justify-between overflow-y-auto lg:hidden" x-cloak>
        <div>
            <div class="flex items-center justify-between pb-6 border-b border-slate-800">
                <a href="{{ route('home') }}" class="font-heading font-bold text-xl text-white">
                    ALAN <span class="font-normal text-slate-blue-light">Humphreys</span>
                </a>
                <button @click="mobileMenuOpen = false" class="text-slate-400 hover:text-white p-1 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col gap-6 mt-8 text-sm font-bold tracking-wider uppercase text-slate-200">
                <li>
                    <a href="{{ route('about') }}"
                       @click="mobileMenuOpen = false"
                       class="{{ request()->routeIs('about') ? 'text-slate-blue-light font-extrabold flex items-center gap-2' : 'hover:text-slate-blue-light transition-colors' }}">
                        @if(request()->routeIs('about')) <span class="w-1.5 h-1.5 rounded-full bg-slate-blue-light"></span> @endif About
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}#services"
                       @click="mobileMenuOpen = false"
                       class="hover:text-slate-blue-light transition-colors">
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}"
                       @click="mobileMenuOpen = false"
                       class="{{ request()->routeIs('gallery*') ? 'text-slate-blue-light font-extrabold flex items-center gap-2' : 'hover:text-slate-blue-light transition-colors' }}">
                        @if(request()->routeIs('gallery*')) <span class="w-1.5 h-1.5 rounded-full bg-slate-blue-light"></span> @endif Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                       @click="mobileMenuOpen = false"
                       class="{{ request()->routeIs('products*') ? 'text-slate-blue-light font-extrabold flex items-center gap-2' : 'hover:text-slate-blue-light transition-colors' }}">
                        @if(request()->routeIs('products*')) <span class="w-1.5 h-1.5 rounded-full bg-slate-blue-light"></span> @endif Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}"
                       @click="mobileMenuOpen = false"
                       class="{{ request()->routeIs('blog*') ? 'text-slate-blue-light font-extrabold flex items-center gap-2' : 'hover:text-slate-blue-light transition-colors' }}">
                        @if(request()->routeIs('blog*')) <span class="w-1.5 h-1.5 rounded-full bg-slate-blue-light"></span> @endif Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}#contact"
                       @click="mobileMenuOpen = false"
                       class="hover:text-slate-blue-light transition-colors">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
        <div class="pt-6 border-t border-slate-800 space-y-4">
            <a href="{{ route('home') }}#contact"
               @click="mobileMenuOpen = false"
               class="block text-center bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold px-6 py-3 rounded-lg text-xs tracking-wider uppercase shadow-md">
                Book a Call
            </a>
            <p class="text-center text-xs text-slate-400 font-medium">North Palm Beach, FL</p>
        </div>
    </div>
</div>
