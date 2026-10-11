<div class="relative min-h-screen">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    @php
        $sectionsToRender = $activeSections ?? ($homepage ? $homepage->getActiveSections() : ['hero', 'about', 'services', 'videos', 'testimonials', 'credentials', 'products', 'service_models', 'perspective', 'contact']);
    @endphp

    @foreach($sectionsToRender as $sectionId)

        {{-- ============ 1. HERO SECTION ============ --}}
        @if($sectionId === 'hero')
            <section id="hero" class="relative min-h-screen pt-28 pb-16 flex items-center bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                        <!-- Left Content -->
                        <div class="text-center lg:text-left">
                            <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-3 reveal-up">
                                {{ $homepage->hero_subtitle ?? 'Hair Loss Solutions Expert' }}
                            </span>

                            <h1 class="text-center reveal-up">
                                <span class="block font-heading font-extrabold text-5xl sm:text-7xl lg:text-8xl tracking-[0.3em] lg:justify-center text-[#0D1B33] dark:text-white leading-none">
                                    {{ Str::before($homepage->hero_name ?? 'ALAN HUMPHREYS', ' ') ?: 'ALAN' }}
                                </span>
                                <span class="flex items-center justify-center lg:justify-center gap-1.5 sm:gap-2 mt-3">
                                    <span class="w-6 sm:w-10 h-[2.5px] bg-slate-blue dark:bg-slate-blue-light shrink-0"></span>
                                    <span class="font-sans font-semibold text-base sm:text-xl lg:text-2xl tracking-[0.38em] text-[#586B8C] dark:text-slate-300 uppercase whitespace-nowrap">
                                        {{ Str::after($homepage->hero_name ?? 'ALAN HUMPHREYS', ' ') ?: 'HUMPHREYS' }}
                                    </span>
                                    <span class="w-6 sm:w-10 h-[2.5px] bg-slate-blue dark:bg-slate-blue-light shrink-0"></span>
                                </span>
                            </h1>

                            <p class="font-sans text-xs sm:text-sm font-bold tracking-[0.25em] uppercase text-slate-blue dark:text-slate-blue-light my-4 reveal-up">
                                {{ $homepage->hero_designation ?? 'Expert · Consultant · Innovator' }}
                            </p>

                            <div class="text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium max-w-xl mx-auto lg:mx-0 leading-relaxed mb-8 reveal-up">
                                {!! $homepage->hero_description ?? '25+ years of leadership in hair loss solutions and business growth strategy.' !!}
                            </div>

                            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 reveal-up">
                                <a href="{{ $homepage->hero_button_url ?? '#contact' }}" class="bg-slate-blue hover:bg-slate-blue-light text-white font-bold px-8 py-3.5 rounded text-xs tracking-widest uppercase shadow-lg shadow-slate-blue/25 hover:-translate-y-0.5 transition-all duration-300">
                                    {{ $homepage->hero_button_label ?? 'Book a Consultation' }}
                                </a>
                                <a href="{{ $homepage->hero_secondary_button_url ?? '#about' }}" class="border-2 border-slate-blue dark:border-slate-blue-light text-slate-blue dark:text-slate-blue-light hover:bg-slate-blue hover:text-white dark:hover:bg-slate-blue-light dark:hover:text-white font-bold px-8 py-3.5 rounded text-xs tracking-widest uppercase transition-all duration-300">
                                    {{ $homepage->hero_secondary_button_label ?? 'My Story' }}
                                </a>
                            </div>

                            <!-- Key Stats Repeater -->
                            @if(!empty($homepage->hero_stats))
                                <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-slate-300 dark:border-slate-800 reveal-up">
                                    @foreach($homepage->hero_stats as $stat)
                                        <div class="text-center lg:text-left">
                                            <div class="font-heading font-extrabold text-3xl sm:text-4xl text-slate-blue dark:text-slate-blue-light leading-none">{{ $stat['number'] ?? '' }}</div>
                                            <div class="text-[0.7rem] sm:text-xs font-bold tracking-wider uppercase text-slate-700 dark:text-slate-400 mt-1">{{ $stat['label'] ?? '' }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Right Hero Image with Floating Badge -->
                        <div class="relative max-w-md lg:max-w-lg mx-auto w-full reveal-right image-anime">
                            <img src="{{ $homepage->hero_image_url ?? uploads_asset($homepage->hero_image, 'alanhumphreys/head.jpeg') }}"
                                 alt="Alan Humphreys"
                                 class="w-full h-auto max-h-[580px] object-contain sm:object-center sm:object-top transition-all duration-300 rounded-2xl">

                            <!-- Floating Award Badge -->
                            <div class="absolute -bottom-6 -left-4 sm:-left-6 bg-white/95 dark:bg-[#0E1A2D]/95 backdrop-blur-md border border-slate-300 dark:border-slate-700/60 p-4 rounded-xl shadow-xl flex items-center gap-3.5 max-w-xs z-20">
                                <div class="w-11 h-11 rounded-full bg-gradient-to-br from-slate-blue to-slate-blue-light text-white flex items-center justify-center text-xl shrink-0 shadow-md">
                                    {{ $homepage?->hero_badge_icon ?? '🏆' }}
                                </div>
                                <div>
                                    <div class="font-bold text-xs uppercase tracking-wider text-slate-blue dark:text-slate-blue-light">
                                        {{ $homepage?->hero_badge_title ?? 'Lifetime Visionary Award' }}
                                    </div>
                                    <div class="text-[0.65rem] font-semibold text-slate-700 dark:text-slate-400">
                                        {{ $homepage?->hero_badge_subtitle ?? 'Hair Visions International · 2018' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        {{-- ============ 2. ABOUT SECTION ============ --}}
        @elseif($sectionId === 'about')
            <section id="about" class="py-20 lg:py-28 bg-slate-100 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                        <!-- Left Image -->
                        <div class="lg:col-span-5 relative reveal-left image-anime">
                            <div class="relative z-10 rounded-xl overflow-hidden shadow-xl border border-slate-300 dark:border-slate-800 bg-white/50 dark:bg-[#0E1A2D]/50 p-2">
                                <img src="{{ $homepage->about_image_url ?? uploads_asset($homepage->about_image, 'alanhumphreys/images/services-portrait.jpg') }}"
                                     alt="Alan Humphreys professional portrait"
                                     class="w-full h-auto max-h-[540px] object-contain sm:object-cover object-top rounded-lg">
                            </div>
                        </div>

                        <!-- Right Text Content -->
                        <div class="lg:col-span-7">
                            <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2 reveal-up">
                                {{ $homepage->about_title ?? 'My Story' }}
                            </span>
                            <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4 reveal-up">
                                {{ $homepage->about_heading ?? 'From Client to Industry Pioneer' }}
                            </h2>
                            <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mb-6 reveal-up"></div>

                            <div class="text-slate-800 dark:text-slate-300 text-sm sm:text-base font-medium leading-relaxed mb-6 reveal-up">
                                {!! $homepage->about_description ?? 'In 1997, I made a decision that changed my life: I bought Hairlines Inc. in Englewood, CO...' !!}
                            </div>

                            @if(!empty($homepage->about_button_label))
                                <a href="{{ $homepage->about_button_url ?? '/about' }}" class="inline-block border-2 border-slate-blue dark:border-slate-blue-light text-slate-blue dark:text-slate-blue-light hover:bg-slate-blue hover:text-white dark:hover:bg-slate-blue-light dark:hover:text-white font-bold px-6 py-2.5 rounded text-xs tracking-widest uppercase transition-all duration-300 reveal-up">
                                    {{ $homepage->about_button_label }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

        {{-- ============ 3. SERVICES SECTION ============ --}}
        @elseif($sectionId === 'services')
            <section id="services" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] transition-colors relative">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2 reveal-up">
                            {{ $homepage->what_i_do_title ?? 'WHAT I DO' }}
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4 reveal-up">
                            {{ $homepage->what_i_do_heading ?? 'Strategic Solutions & Professional Services' }}
                        </h2>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto mb-6 reveal-up"></div>
                    </div>

                    <!-- Services Repeater Cards Grid -->
                    @if(!empty($homepage->what_i_do_items))
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($homepage->what_i_do_items as $item)
                                <div class="group bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:border-slate-blue/50 shadow-md relative overflow-hidden reveal-scale">
                                    <div class="w-12 h-12 rounded-xl bg-slate-blue/15 border border-slate-blue/30 flex items-center justify-center text-2xl mb-6 group-hover:bg-slate-blue/25 group-hover:border-slate-blue transition-colors">
                                        {{ $item['icon'] ?? '📞' }}
                                    </div>
                                    <h3 class="font-heading font-bold text-xl text-[#0D1B33] dark:text-white mb-3">{{ $item['title'] ?? '' }}</h3>
                                    <p class="text-slate-800 dark:text-slate-300 text-sm font-medium leading-relaxed">
                                        {{ $item['description'] ?? '' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

        {{-- ============ 4. VIDEOS / WATCH & LEARN SECTION ============ --}}
        @elseif($sectionId === 'videos')
            <section id="content" class="py-20 lg:py-28 bg-slate-100 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2 reveal-up">
                            {{ $homepage->video_title ?? 'WATCH & LEARN' }}
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4 reveal-up">
                            {{ $homepage->video_heading ?? 'Featured Videos & Video Insights' }}
                        </h2>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto mb-6 reveal-up"></div>
                        <p class="text-slate-800 dark:text-slate-300 text-base font-medium leading-relaxed reveal-up">
                            {{ $homepage->video_description ?? 'Watch Alan Humphreys share industry knowledge, client makeover transformations, and consultation masterclasses.' }}
                        </p>
                    </div>

                    <!-- Repeater Video Links Grid -->
                    @if(!empty($homepage->video_items))
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($homepage->video_items as $video)
                                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col reveal-scale">
                                    <div class="aspect-video relative bg-slate-900 flex items-center justify-center">
                                        @if(!empty($video['video_url']) && (str_contains($video['video_url'], 'youtube.com') || str_contains($video['video_url'], 'youtu.be')))
                                            @php
                                                $videoUrl = $video['video_url'];
                                                $ytId = 'dQw4w9WgXcQ';
                                                if (str_contains($videoUrl, 'v=')) {
                                                    parse_str(parse_url($videoUrl, PHP_URL_QUERY) ?? '', $ytParams);
                                                    $ytId = $ytParams['v'] ?? $ytId;
                                                } elseif (str_contains($videoUrl, 'youtu.be/')) {
                                                    $ytId = basename(parse_url($videoUrl, PHP_URL_PATH));
                                                }
                                            @endphp
                                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $ytId }}" title="{{ $video['title'] ?? 'Video' }}" allowfullscreen loading="lazy"></iframe>
                                        @else
                                            <img src="{{ uploads_asset($video['thumbnail'] ?? null, 'alanhumphreys/images/services-portrait.jpg') }}" class="w-full h-full object-cover" alt="{{ $video['title'] ?? 'Thumbnail' }}">
                                        @endif
                                    </div>
                                    <div class="p-5 flex-1 flex flex-col justify-between">
                                        <div>
                                            <span class="inline-block text-[0.65rem] font-bold tracking-widest uppercase bg-slate-blue/15 text-slate-blue dark:text-slate-blue-light px-2.5 py-1 rounded mb-2">
                                                {{ $video['category'] ?? 'Insight' }}
                                            </span>
                                            <h4 class="font-bold text-[#0D1B33] dark:text-white text-base mb-1">{{ $video['title'] ?? '' }}</h4>
                                            <p class="text-xs text-slate-700 dark:text-slate-400 font-medium leading-relaxed">{{ $video['description'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

        {{-- ============ 5. TESTIMONIALS SECTION ============ --}}
        @elseif($sectionId === 'testimonials')
            <section id="testimonials" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2 reveal-up">
                            {{ $homepage->testimonial_title ?? 'TESTIMONIALS' }}
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4 reveal-up">
                            {{ $homepage->testimonial_heading ?? 'What Industry Leaders Say' }}
                        </h2>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto reveal-up"></div>
                    </div>

                    @if(!empty($homepage->testimonial_items))
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach($homepage->testimonial_items as $t)
                                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-8 relative shadow-md reveal-scale">
                                    <div class="font-heading text-6xl text-slate-blue/25 dark:text-slate-blue-light/25 absolute top-4 left-6 pointer-events-none select-none">“</div>
                                    <p class="text-slate-800 dark:text-slate-200 text-base font-medium italic leading-relaxed mb-6 relative z-10">
                                        "{{ $t['quote'] ?? '' }}"
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-slate-blue to-slate-blue-light text-white flex items-center justify-center font-heading font-bold text-lg shadow-sm">
                                            {{ $t['avatar_initials'] ?? 'AH' }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-sm text-[#0D1B33] dark:text-white">{{ $t['name'] ?? '' }}</div>
                                            <div class="text-xs font-semibold text-slate-600 dark:text-slate-400">{{ $t['role'] ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

        {{-- ============ 6. CREDENTIALS SECTION ============ --}}
        @elseif($sectionId === 'credentials')
            <section id="credentials" class="py-20 lg:py-28 bg-slate-100/80 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2 reveal-up">
                        {{ $homepage->credential_title ?? 'CREDENTIALS' }}
                    </span>
                    <h2 class="font-heading font-bold text-3xl sm:text-5xl text-[#0D1B33] dark:text-white leading-tight mb-4 reveal-up">
                        {{ $homepage->credential_heading ?? 'Awards, Certifications & Media' }}
                    </h2>
                    <div class="w-16 h-1 bg-gradient-to-r from-slate-blue to-slate-blue-light rounded-full mb-12 reveal-up"></div>

                    <!-- Top Grid: Awards & Media Cards (Side by Side) -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                        <!-- Awards & Certifications Card -->
                        @php
                            $awards = $homepage->awards_items ?? [
                                ['year' => '2026', 'title' => 'USTI & AMCA Clinical Trichologist Certification'],
                                ['year' => '2018', 'title' => 'Lifetime Visionary Award — Hair Visions International Conference'],
                                ['year' => '2014', 'title' => 'Capilia Certified Trichology Assistant — First in Colorado'],
                                ['year' => '2000', 'title' => 'Brand Ambassador & Model — On Rite, Hair Visions International'],
                            ];
                        @endphp
                        <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200/90 dark:border-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl reveal-left">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800/80">
                                <span class="text-2xl sm:text-3xl">🏆</span>
                                <h3 class="font-heading font-bold text-xl sm:text-2xl text-[#0D1B33] dark:text-white">Awards &amp; Certifications</h3>
                            </div>
                            <div class="divide-y divide-slate-100 dark:divide-slate-800/80">
                                @foreach($awards as $item)
                                    <div class="py-4 flex items-start gap-4 sm:gap-6 first:pt-0 last:pb-0">
                                        <span class="font-heading font-extrabold text-slate-blue dark:text-slate-blue-light text-base sm:text-lg min-w-[55px] shrink-0">
                                            {{ $item['year'] ?? '' }}
                                        </span>
                                        <span class="text-slate-800 dark:text-slate-200 text-sm sm:text-base font-medium leading-relaxed">
                                            {{ $item['title'] ?? '' }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Media & Press Card -->
                        @php
                            $media = $homepage->media_items ?? [
                                ['year' => '2007', 'title' => 'Good Morning America — "Movie and a Makeover" Feature'],
                                ['year' => '2007', 'title' => 'New York Magazine — Feature that led to GMA appearance'],
                                ['year' => '2001', 'title' => 'Details Magazine — Full Page Feature'],
                                ['year' => '2008+', 'title' => 'TV commercials, infomercials & local news affiliates nationwide'],
                            ];
                        @endphp
                        <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200/90 dark:border-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl reveal-right">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800/80">
                                <span class="text-2xl sm:text-3xl">📺</span>
                                <h3 class="font-heading font-bold text-xl sm:text-2xl text-[#0D1B33] dark:text-white">Media &amp; Press</h3>
                            </div>
                            <div class="divide-y divide-slate-100 dark:divide-slate-800/80">
                                @foreach($media as $item)
                                    <div class="py-4 flex items-start gap-4 sm:gap-6 first:pt-0 last:pb-0">
                                        <span class="font-heading font-extrabold text-slate-blue dark:text-slate-blue-light text-base sm:text-lg min-w-[55px] shrink-0">
                                            {{ $item['year'] ?? '' }}
                                        </span>
                                        <span class="text-slate-800 dark:text-slate-200 text-sm sm:text-base font-medium leading-relaxed">
                                            {{ $item['title'] ?? '' }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Grid: Media Showcase Image Cards (2x2 Grid) -->
                    @php
                        $showcaseCards = $homepage->credential_showcase_items ?? [
                            [
                                'image' => 'alanhumphreys/images/onrite-cover.png',
                                'caption' => "On Rite Men's Catalog — Cover Model",
                            ],
                            [
                                'image' => 'alanhumphreys/images/ortech-brand.png',
                                'caption' => 'OrTech Brand Ambassador — "When Only the Best is Good Enough"',
                            ],
                            [
                                'image' => 'alanhumphreys/images/award-ceremony.jpg',
                                'caption' => 'Lifetime Visionary Award — Hair Visions International 2018',
                            ],
                            [
                                'image' => 'alanhumphreys/images/trichology-cert.jpg',
                                'caption' => 'Clinical Trichologist Certification — US Trichology Institute 2026',
                            ],
                        ];
                    @endphp
                    @if(!empty($showcaseCards))
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8">
                            @foreach($showcaseCards as $card)
                                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200/90 dark:border-slate-800 rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl hover:border-slate-blue/50 transition-all duration-300 group flex flex-col justify-between reveal-scale">
                                    <!-- Image Container -->
                                    <div class="bg-slate-50 dark:bg-[#070D18] h-72 sm:h-80 lg:h-96 p-4 flex items-center justify-center overflow-hidden relative">

                                        <img src="{{ uploads_asset($card['image'] ?? null, 'alanhumphreys/images/onrite-cover.png') }}"
                                             alt="{{ $card['caption'] ?? 'Media Showcase' }}"
                                             class="w-full h-full object-contain rounded-xl transition-transform duration-500 group-hover:scale-105">
                                    </div>

                                    <!-- Caption Bar -->
                                    <div class="p-4 sm:p-5 bg-white dark:bg-[#0E1A2D] border-t border-slate-100 dark:border-slate-800/80">
                                        <p class="text-xs sm:text-sm font-bold text-slate-blue dark:text-slate-blue-light tracking-wide text-left sm:text-center">
                                            {{ $card['caption'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </section>

        {{-- ============ 7. CURATED PRODUCTS SECTION ============ --}}
        @elseif($sectionId === 'products')
            <section id="products" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2 reveal-up">
                            Shop
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4 reveal-up">
                            Curated Products
                        </h2>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto mb-6 reveal-up"></div>
                        <p class="text-slate-800 dark:text-slate-300 text-base font-medium leading-relaxed reveal-up">
                            Hand-selected products and solutions backed by decades of personal testing and professional experience.
                        </p>
                    </div>

                    @if(isset($products) && count($products) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach($products as $prod)
                                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 flex flex-col reveal-scale">
                                    <div class="h-52 bg-gradient-to-br from-[#0D1B33] to-[#586B8C] flex items-center justify-center relative overflow-hidden">
                                        <span class="text-6xl opacity-40 select-none">{{ $prod->icon ?? '🧴' }}</span>
                                        @if($prod->badge)
                                            <span class="absolute top-4 right-4 font-sans text-[0.65rem] font-bold tracking-widest uppercase text-white bg-slate-blue px-3 py-1 rounded shadow-sm">
                                                {{ $prod->badge }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="p-6 flex-1 flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <h3 class="font-heading font-bold text-lg text-[#0D1B33] dark:text-white">{{ $prod->name }}</h3>
                                                <span class="font-bold text-slate-blue dark:text-slate-blue-light text-lg">${{ number_format($prod->price, 2) }}</span>
                                            </div>
                                            <p class="text-slate-700 dark:text-slate-300 text-xs font-medium leading-relaxed mb-6">
                                                {{ $prod->short_description }}
                                            </p>
                                        </div>
                                        <a href="{{ route('product.show', $prod->slug) }}" class="block text-center border-2 border-slate-blue dark:border-slate-blue-light text-slate-blue dark:text-slate-blue-light hover:bg-slate-blue hover:text-white dark:hover:bg-slate-blue-light dark:hover:text-white font-bold py-2.5 rounded text-xs tracking-wider uppercase transition-colors">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

        {{-- ============ 8. SERVICE MODELS SECTION ============ --}}
        @elseif($sectionId === 'service_models')
            <section id="service-models" class="py-20 lg:py-28 bg-slate-50 dark:bg-[#070D18] transition-colors relative overflow-hidden border-t border-slate-200 dark:border-slate-800/60">
                <!-- Ambient Glow Effects -->
                <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-96 h-96 bg-slate-blue/10 dark:bg-slate-blue/5 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-10 right-10 w-72 h-72 bg-blue-500/5 dark:bg-blue-600/5 rounded-full blur-3xl pointer-events-none"></div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <!-- Section Header -->
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-blue/10 border border-slate-blue/30 text-slate-blue dark:text-slate-blue-light text-xs font-semibold tracking-widest uppercase mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                            <span>{{ $homepage->service_models_title ?? 'THREE DISTINCT SERVICE MODELS' }}</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0D1B33] dark:text-white font-serif tracking-tight leading-tight mb-4">
                            {{ $homepage->service_models_heading ?? 'Specialized Trichology & Sales Solutions for Salons & Hair Studios' }}
                        </h2>
                        <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg leading-relaxed">
                            Expand your offering, convert more leads, and provide expert hair loss consultations without adding full-time payroll.
                        </p>
                    </div>

                    <!-- Service Models 3-Column Cards Grid -->
                    @php
                        $serviceModels = $homepage->service_models_items ?? [];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($serviceModels as $index => $model)
                            <div class="group relative bg-white dark:bg-[#0B1528]/80 hover:bg-slate-50 dark:hover:bg-[#0E1B33] border border-slate-200 dark:border-slate-800 hover:border-slate-blue/50 rounded-2xl p-8 transition-all duration-300 shadow-lg dark:shadow-xl flex flex-col justify-between hover:-translate-y-1.5">
                                <!-- Top Accent Line -->
                                <div class="absolute top-0 left-8 right-8 h-1 bg-gradient-to-r from-transparent via-slate-blue/40 to-transparent group-hover:via-slate-blue transition-all duration-300"></div>

                                <div>
                                    <!-- Badge & Icon Header -->
                                    <div class="flex items-center justify-between gap-3 mb-6">
                                        <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-slate-blue/10 text-slate-blue dark:text-slate-blue-light border border-slate-blue/30">
                                            {{ $model['badge'] ?? 'Service Model' }}
                                        </span>
                                    </div>

                                    <!-- Title & Subtitle -->
                                    <h3 class="text-2xl font-bold text-[#0D1B33] dark:text-white font-serif mb-2 group-hover:text-slate-blue dark:group-hover:text-slate-blue-light transition-colors">
                                        {{ $model['title'] ?? '' }}
                                    </h3>
                                    <p class="text-xs font-semibold text-slate-blue dark:text-slate-blue-light tracking-wide uppercase mb-4">
                                        {{ $model['subtitle'] ?? '' }}
                                    </p>

                                    <!-- Description -->
                                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6">
                                        {{ $model['description'] ?? '' }}
                                    </p>

                                    <!-- Key Highlights Bullet Points -->
                                    @if(!empty($model['highlights']) && is_array($model['highlights']))
                                        <div class="space-y-2.5 pt-4 border-t border-slate-200 dark:border-slate-800/80 mb-6">
                                            @foreach($model['highlights'] as $highlight)
                                                @php
                                                    $highlightText = is_array($highlight) ? ($highlight['text'] ?? $highlight['highlight'] ?? $highlight['item'] ?? reset($highlight)) : $highlight;
                                                @endphp
                                                @if(!empty($highlightText) && is_string($highlightText))
                                                    <div class="flex items-start gap-2.5 text-xs text-slate-700 dark:text-slate-300">
                                                        <svg class="w-4 h-4 text-slate-blue dark:text-slate-blue-light shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        <span>{{ $highlightText }}</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Footer Tag & Action -->
                                <div class="pt-4">
                                    <span class="inline-block text-[11px] font-medium text-slate-600 dark:text-slate-400 mb-4 bg-slate-100 dark:bg-slate-900/60 px-2.5 py-1 rounded border border-slate-200 dark:border-slate-800">
                                        {{ $model['tag'] ?? 'For Salons & Studios' }}
                                    </span>
                                    <a href="{{ $model['button_url'] ?? '#contact' }}" class="block w-full text-center bg-slate-900 dark:bg-slate-800/80 hover:bg-slate-blue hover:text-white text-white text-xs font-bold py-3 rounded-lg uppercase tracking-wider transition-all duration-300 border border-slate-700 hover:border-slate-blue shadow-md">
                                        {{ $model['button_label'] ?? 'Learn More →' }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        {{-- ============ 9. DUAL PERSPECTIVE SECTION ============ --}}
        @elseif($sectionId === 'perspective')
            <section id="dual-perspective" class="py-20 lg:py-28 bg-white dark:bg-[#040810] transition-colors relative overflow-hidden border-t border-slate-200 dark:border-slate-800/60">
                <!-- Background Grid Pattern -->
                <div class="absolute inset-0 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] dark:bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:24px_24px] opacity-30 dark:opacity-20 pointer-events-none"></div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <!-- Section Header -->
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-blue/10 border border-slate-blue/30 text-slate-blue dark:text-slate-blue-light text-xs font-semibold tracking-widest uppercase mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <span>{{ $homepage->perspective_title ?? 'THE DUAL PERSPECTIVE ADVANTAGE' }}</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0D1B33] dark:text-white font-serif tracking-tight leading-tight mb-4">
                            {{ $homepage->perspective_heading ?? 'Nearly 30 Years of Experience — From Both Sides of the Consultation Table' }}
                        </h2>
                    </div>

                    <!-- Main Feature Quote Container -->
                    <div class="bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-[#0B1528] dark:via-[#0E1C36] dark:to-[#070D18] border border-slate-blue/30 rounded-3xl p-8 sm:p-12 mb-16 shadow-xl dark:shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-slate-blue/10 rounded-full blur-2xl pointer-events-none"></div>

                        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
                            <div class="shrink-0 text-center">
                                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full p-1 bg-gradient-to-tr from-slate-blue via-slate-blue-light to-slate-blue shadow-xl mx-auto mb-3">
                                    <img src="{{ asset('alanhumphreys/images/alan-profile.jpg') }}" alt="Alan Humphreys" class="w-full h-full object-cover rounded-full" onerror="this.src='https://ui-avatars.com/api/?name=Alan+Humphreys&background=586B8C&color=FFFFFF'">
                                </div>
                                <h4 class="text-[#0D1B33] dark:text-white font-bold font-serif text-lg">Alan Humphreys</h4>
                                <p class="text-slate-blue dark:text-slate-blue-light text-xs uppercase tracking-wider font-semibold">Certified Trichologist</p>
                            </div>

                            <div class="space-y-4 text-center lg:text-left">
                                <div class="inline-block text-slate-blue dark:text-slate-blue-light opacity-50 dark:opacity-40">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                                </div>
                                <p class="text-slate-800 dark:text-slate-200 text-lg sm:text-xl italic font-serif leading-relaxed">
                                    "{{ $homepage->perspective_quote ?? 'I was a client first before I ever entered this industry. I remember sitting on the other side of the consultation wondering what was happening to my hair... That perspective allows me to approach consultations from both sides.' }}"
                                </p>
                                <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-4 text-xs font-semibold text-slate-blue dark:text-slate-blue-light">
                                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Client Perspective (At Age 21)</span>
                                    <span class="text-slate-400 dark:text-slate-600">•</span>
                                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> 30 Years Industry Executive</span>
                                    <span class="text-slate-400 dark:text-slate-600">•</span>
                                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Clinical Trichologist</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Perspective Items Grid -->
                    @php
                        $perspectiveItems = $homepage->perspective_items ?? [];
                    @endphp
                    @if(!empty($perspectiveItems))
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach($perspectiveItems as $pItem)
                                <div class="bg-slate-50 dark:bg-[#0B1528] border border-slate-200 dark:border-slate-800 rounded-2xl p-8 hover:border-slate-blue/40 transition-all duration-300 shadow-md">
                                    <div class="text-3xl font-extrabold text-slate-blue/60 dark:text-slate-blue-light/30 font-serif mb-4">
                                        {{ $pItem['number'] ?? '0'.($loop->iteration) }}
                                    </div>
                                    <h3 class="text-xl font-bold text-[#0D1B33] dark:text-white font-serif mb-3">
                                        {{ $pItem['title'] ?? '' }}
                                    </h3>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                        {{ $pItem['description'] ?? '' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Bottom CTA Banner -->
                    <div class="mt-16 text-center bg-gradient-to-r from-slate-blue/10 via-slate-blue/20 to-slate-blue/10 border border-slate-blue/30 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-[#0D1B33] dark:text-white font-serif mb-2">Ready to Bring 30 Years of Trichology & Sales Expertise to Your Business?</h3>
                        <p class="text-slate-700 dark:text-slate-300 text-sm max-w-2xl mx-auto mb-6">Whether you are a salon owner wanting an in-person assessment day or a hair company looking for a virtual sales consultant, let's connect.</p>
                        <a href="#contact" class="inline-flex items-center justify-center gap-2 bg-slate-blue hover:bg-slate-blue-light text-white font-extrabold px-8 py-3.5 rounded-lg text-xs uppercase tracking-widest shadow-lg shadow-slate-blue/25 transition-all">
                            <span>Contact Alan Humphreys Today</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </section>

        {{-- ============ 10. INTAKE CONTACT FORM SECTION ============ --}}
        @elseif($sectionId === 'contact')
            <section id="contact" class="py-20 lg:py-28 bg-slate-100 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                        <!-- Left Details Column -->
                        <div class="lg:col-span-5 reveal-left">
                            <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2">
                                {{ $homepage->contact_title ?? 'Get in Touch' }}
                            </span>
                            <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                                {{ $homepage->contact_heading ?? "Let's Work Together" }}
                            </h2>
                            <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mb-6"></div>

                            <p class="text-slate-800 dark:text-slate-300 text-sm sm:text-base font-medium leading-relaxed mb-8">
                                {{ $homepage->contact_paragraph ?? "Whether you're a solo operator, a growing studio, or a salon looking to add hair replacement and trichology services — I'd love to hear from you." }}
                            </p>

                            <ul class="space-y-5 mb-8">
                                <li class="flex items-center gap-4">
                                    <div class="w-11 h-11 rounded-xl bg-slate-blue/15 border border-slate-blue/30 flex items-center justify-center text-xl shrink-0">
                                        📧
                                    </div>
                                    <div>
                                        <div class="text-[0.7rem] font-bold tracking-wider uppercase text-slate-blue dark:text-slate-blue-light">Email</div>
                                        <a href="mailto:alanhumphreys72@gmail.com" class="text-[#0D1B33] dark:text-white font-bold hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors text-sm sm:text-base">
                                            alanhumphreys72@gmail.com
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Right Livewire Form -->
                        <div class="lg:col-span-7 bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 sm:p-10 shadow-xl reveal-right">
                            @if($submitted)
                                <div class="text-center py-10">
                                    <div class="w-16 h-16 bg-slate-blue/20 text-slate-blue dark:text-slate-blue-light rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                                        ✓
                                    </div>
                                    <h3 class="font-heading font-bold text-2xl text-[#0D1B33] dark:text-white mb-2">Thank You!</h3>
                                    <p class="text-slate-700 dark:text-slate-300 text-sm mb-6">
                                        Your intake request has been received. Alan will be in touch with you directly.
                                    </p>
                                    <button wire:click="resetForm" class="bg-slate-blue hover:bg-slate-blue-light text-white font-bold px-6 py-2.5 rounded text-xs tracking-wider uppercase">
                                        Send Another Message
                                    </button>
                                </div>
                            @else
                                <form wire:submit.prevent="submitIntake" class="space-y-5">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">First Name *</label>
                                            <input type="text" wire:model.defer="firstName" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue">
                                            @error('firstName') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Last Name *</label>
                                            <input type="text" wire:model.defer="lastName" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue">
                                            @error('lastName') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Email Address *</label>
                                            <input type="email" wire:model.defer="email" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue">
                                            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Phone Number</label>
                                            <input type="tel" wire:model.defer="phone" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Business Type *</label>
                                            @php
                                                $businessTypes = $homepage->contact_business_types ?? [
                                                    ['label' => 'Salon / Studio Owner'],
                                                    ['label' => 'Hair Replacement Specialist'],
                                                    ['label' => 'Stylist / Barber'],
                                                    ['label' => 'Individual Client'],
                                                    ['label' => 'Other'],
                                                ];
                                            @endphp
                                            <select wire:model.defer="businessType" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue">
                                                <option value="">Select your business type</option>
                                                @foreach($businessTypes as $bType)
                                                    @php $bLabel = is_array($bType) ? ($bType['label'] ?? '') : $bType; @endphp
                                                    @if($bLabel)
                                                        <option value="{{ $bLabel }}">{{ $bLabel }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('businessType') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Primary Interest *</label>
                                            @php
                                                $primaryInterests = $homepage->contact_primary_interests ?? [
                                                    ['label' => 'Virtual Consultation'],
                                                    ['label' => 'Sales Coaching'],
                                                    ['label' => 'Trichology Training'],
                                                    ['label' => 'Business Strategy'],
                                                    ['label' => 'General Inquiry'],
                                                ];
                                            @endphp
                                            <select wire:model.defer="interest" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue">
                                                <option value="">Select primary interest</option>
                                                @foreach($primaryInterests as $pInterest)
                                                    @php $pLabel = is_array($pInterest) ? ($pInterest['label'] ?? '') : $pInterest; @endphp
                                                    @if($pLabel)
                                                        <option value="{{ $pLabel }}">{{ $pLabel }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('interest') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Message / Details</label>
                                        <textarea wire:model.defer="message" rows="4" class="w-full bg-slate-50 dark:bg-[#070D18] border border-slate-300 dark:border-slate-700 rounded-lg px-4 py-3 text-sm text-[#0D1B33] dark:text-white focus:outline-none focus:border-slate-blue"></textarea>
                                    </div>

                                    <button type="submit" class="w-full bg-slate-blue hover:bg-slate-blue-light text-white font-bold px-8 py-3.5 rounded text-xs tracking-widest uppercase shadow-lg shadow-slate-blue/25 hover:shadow-slate-blue/45 transition-all">
                                        Submit Consultation Request
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endforeach

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />
</div>
