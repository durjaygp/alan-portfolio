<div x-data="{ scrollTopVisible: false }"
     @scroll.window="scrollTopVisible = (window.pageYOffset > 300)">

    <!-- ============ FOOTER COMPONENT ============ -->
    <footer class="bg-slate-100 dark:bg-[#050B14] py-16 sm:py-20 border-t border-slate-300 dark:border-slate-800 transition-colors relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-300 dark:border-slate-800">
                
                <!-- Brand Info -->
                <div class="md:col-span-2">
                    <a href="{{ route('home') }}" class="font-heading font-bold text-2xl sm:text-3xl text-[#0D1B33] dark:text-white tracking-wider inline-block mb-4 group">
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
                    <p class="text-slate-700 dark:text-slate-300 text-sm font-medium max-w-sm leading-relaxed mb-6">
                        {{ $siteSetting->site_tagline ?: '30+ years of leadership in hair loss solutions, trichology, and business growth strategy.' }}
                    </p>
                    <div class="flex items-center gap-3">
                        @if(!empty($siteSetting->whatsapp_number))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9+]/', '', $siteSetting->whatsapp_number) }}" target="_blank" rel="noopener noreferrer"
                               class="w-11 h-11 rounded-xl bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 flex items-center justify-center text-base text-[#0D1B33] dark:text-white hover:bg-slate-blue hover:text-white shadow-sm transition-all hover:-translate-y-0.5"
                               title="WhatsApp">💬</a>
                        @endif
                        @if(!empty($siteSetting->contact_email))
                            <a href="mailto:{{ $siteSetting->contact_email }}"
                               class="w-11 h-11 rounded-xl bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 flex items-center justify-center text-base text-[#0D1B33] dark:text-white hover:bg-slate-blue hover:text-white shadow-sm transition-all hover:-translate-y-0.5"
                               title="Email">📧</a>
                        @endif
                        @if(!empty($siteSetting->contact_phone))
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSetting->contact_phone) }}"
                               class="w-11 h-11 rounded-xl bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 flex items-center justify-center text-base text-[#0D1B33] dark:text-white hover:bg-slate-blue hover:text-white shadow-sm transition-all hover:-translate-y-0.5"
                               title="Phone">📞</a>
                        @endif
                    </div>
                </div>

                <!-- Navigation Pages Links -->
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-5">Pages</h4>
                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 dark:text-slate-300 font-semibold">
                        <li><a href="{{ route('about') }}" class="hover:text-slate-blue dark:hover:text-white transition-colors">About</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-slate-blue dark:hover:text-white transition-colors">Gallery</a></li>
                        <li><a href="{{ route('products') }}" class="hover:text-slate-blue dark:hover:text-white transition-colors">Products</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-slate-blue dark:hover:text-white transition-colors">Blog</a></li>
                        <li><a href="{{ route('home') }}#contact" class="hover:text-slate-blue dark:hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Services Links -->
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-5">Services</h4>
                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 dark:text-slate-300 font-semibold">
                        <li><a href="{{ route('virtual-sales-consultant') }}" class="hover:text-slate-blue dark:hover:text-white transition-colors">Virtual Sales Consultant</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-slate-blue dark:hover:text-white transition-colors">Traveling Trichologist</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-slate-blue dark:hover:text-white transition-colors">Sales &amp; Staff Training</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-slate-blue dark:hover:text-white transition-colors">Keynote Speaking</a></li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom Bar -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs sm:text-sm text-slate-700 dark:text-slate-400 font-semibold gap-3">
                <p>{{ $siteSetting->copyright_text ?: '© '.date('Y').' Alan Humphreys. All rights reserved.' }}</p>
                <p>{{ $siteSetting->contact_address ?: 'North Palm Beach, FL' }} · <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSetting->contact_phone ?: '303-718-1870') }}" class="hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors">{{ $siteSetting->contact_phone ?: '303-718-1870' }}</a></p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button x-show="scrollTopVisible"
            x-transition
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            type="button"
            class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-gradient-to-r from-slate-blue to-slate-blue-light text-white text-xl flex items-center justify-center shadow-xl shadow-slate-blue/30 hover:-translate-y-1 transition-all z-40 cursor-pointer"
            aria-label="Scroll to top" x-cloak>
        ↑
    </button>
</div>
