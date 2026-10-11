<div class="relative min-h-screen bg-slate-50 dark:bg-[#070D18] text-[#0D1B33] dark:text-slate-100 transition-colors duration-300">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    @php
        $sectionsToRender = $activeSections ?? ($homepage ? $homepage->getActiveSections() : [
            'hero', 'proof', 'story', 'problem', 'services', 'training', 'why_alan', 'videos', 'credentials', 'gallery', 'blog', 'contact'
        ]);
    @endphp

    @foreach($sectionsToRender as $sectionId)

        {{-- ==================== 1. HERO SECTION ==================== --}}
        @if($sectionId === 'hero')
            <section id="hero" class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#070D18] border-b border-slate-200 dark:border-slate-800">
                <!-- Ambient Glow Elements -->
                <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[450px] bg-gradient-to-tr from-slate-blue/15 via-slate-blue/5 to-transparent blur-3xl rounded-full pointer-events-none -z-10"></div>
                <div class="absolute -top-20 -left-20 w-96 h-96 bg-slate-blue/10 blur-3xl rounded-full pointer-events-none"></div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                        
                        <!-- Left Content Column -->
                        <div class="lg:col-span-7 text-center lg:text-left">
                            <!-- Brand Authority Pill -->
                            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light bg-slate-blue/10 dark:bg-slate-blue/15 border border-slate-blue/25 mb-6 backdrop-blur-sm shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-slate-blue animate-pulse"></span>
                                <span>{{ $homepage->hero_badge_text ?? 'ALAN HUMPHREYS · 30+ YEARS EXPERIENCE' }}</span>
                            </div>

                            <!-- Main Catchphrase Headline -->
                            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight font-heading leading-tight mb-4 text-[#0D1B33] dark:text-white">
                                {{ $homepage->hero_title ?? "I've Been on Every Side of the Chair." }}
                            </h1>

                            <!-- Role / Positioning -->
                            <h2 class="text-lg sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-slate-blue via-slate-blue-light to-blue-400 mb-6">
                                {{ $homepage->hero_subtitle ?? 'Hair Replacement & Trichology Business Consultant' }}
                            </h2>

                            <!-- Lead Story Copy -->
                            <div class="text-base sm:text-lg text-slate-700 dark:text-slate-300 font-medium leading-relaxed max-w-2xl mb-8 mx-auto lg:mx-0">
                                {!! nl2br(e($homepage->hero_description ?? "I've been a hair-loss client, salesperson, business owner, industry ambassador, educator and certified clinical trichologist. Now I use more than three decades of real-world experience to help hair-replacement businesses, salons and hair-loss professionals grow their businesses, improve their sales and deliver a better client experience.")) !!}
                            </div>

                            <!-- Dual CTA Buttons -->
                            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                                <a href="{{ $homepage->hero_primary_button_url ?? '#contact' }}"
                                   class="w-full sm:w-auto text-center bg-gradient-to-r from-slate-blue to-slate-blue-light hover:from-slate-blue-light hover:to-slate-blue text-white font-extrabold px-8 py-4 rounded-xl text-xs sm:text-sm tracking-wider uppercase shadow-xl shadow-slate-blue/25 hover:-translate-y-0.5 transition-all duration-300">
                                    {{ $homepage->hero_primary_button_text ?? 'Work With Alan →' }}
                                </a>
                                <a href="{{ $homepage->hero_secondary_button_url ?? route('about') }}"
                                   class="w-full sm:w-auto text-center px-8 py-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider bg-white dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all shadow-sm">
                                    {{ $homepage->hero_secondary_button_text ?? 'Read My Story' }}
                                </a>
                            </div>

                            <!-- Quick Target Audience Indicators -->
                            @php
                                $audiences = $homepage->hero_audiences ?? [
                                    ['label' => 'Hair Replacement Studios'],
                                    ['label' => 'Salons Adding Trichology'],
                                    ['label' => 'Virtual Sales Support'],
                                ];
                            @endphp
                            @if(!empty($audiences))
                                <div class="pt-8 mt-8 border-t border-slate-200/80 dark:border-slate-800 flex flex-wrap items-center justify-center lg:justify-start gap-y-2 gap-x-6 text-xs text-slate-600 dark:text-slate-400 font-semibold">
                                    @foreach($audiences as $aud)
                                        <span class="flex items-center gap-1.5"><span class="text-slate-blue">✔</span> {{ $aud['label'] ?? '' }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Right Visual Column (Portrait & Trust Badges) -->
                        <div class="lg:col-span-5 relative">
                            <div class="relative mx-auto max-w-md lg:max-w-none">
                                
                                <!-- Glow Halo -->
                                <div class="absolute -inset-1.5 bg-gradient-to-r from-slate-blue via-slate-blue-light to-blue-500 rounded-3xl blur-lg opacity-30 group-hover:opacity-100 transition duration-1000"></div>

                                <!-- Portrait Card -->
                                <div class="relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-200/50 dark:border-slate-700 shadow-2xl">
                                    <img src="{{ uploads_asset($homepage->hero_image, 'alanhumphreys/images/hero-headshot.jpg') }}"
                                         alt="Alan Humphreys — Hair Replacement & Trichology Business Consultant"
                                         class="w-full h-auto object-cover object-top aspect-4/5"
                                         loading="eager">

                                    <!-- Bottom Floating Credential Badge -->
                                    <div class="absolute bottom-4 left-4 right-4 p-4 rounded-2xl bg-black/75 backdrop-blur-md border border-white/15 text-white shadow-xl">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <div class="text-xs font-bold text-slate-blue-light uppercase tracking-wider">{{ $homepage->hero_card_title ?? 'Proven Experience' }}</div>
                                                <div class="text-sm font-extrabold mt-0.5">{{ $homepage->hero_card_subtitle ?? '3,000+ Clients · Built & Sold Hair Vital' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        {{-- ==================== 2. PROOF STRIP SECTION ==================== --}}
        @elseif($sectionId === 'proof')
            <section id="proof" class="py-12 bg-white dark:bg-[#060D1A] border-b border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-8">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                            {{ $homepage->proof_heading ?? "EXPERIENCE YOU CAN'T LEARN FROM A BOOK" }}
                        </span>
                    </div>

                    <!-- 4 Quantitative Proof Metrics -->
                    @php
                        $proofStats = $homepage->proof_stats ?? [
                            ['number' => '30+', 'label' => 'Years in Industry'],
                            ['number' => '3,000+', 'label' => 'Clients Served'],
                            ['number' => '25', 'label' => 'Years Business Owner'],
                            ['number' => '1', 'label' => 'Business Built & Sold'],
                        ];
                    @endphp
                    @if(!empty($proofStats))
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8 mb-10">
                            @foreach($proofStats as $stat)
                                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800/80 text-center shadow-sm">
                                    <div class="text-3xl sm:text-4xl font-extrabold text-slate-blue dark:text-slate-blue-light font-heading">{{ $stat['number'] ?? '' }}</div>
                                    <div class="text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-400 mt-1">{{ $stat['label'] ?? '' }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Media Credibility Badges -->
                    @php
                        $mediaLogos = $homepage->proof_media_logos ?? [
                            ['name' => 'Good Morning America'],
                            ['name' => 'Details Magazine'],
                            ['name' => 'New York Magazine'],
                            ['name' => 'Hair Visions International'],
                            ['name' => 'OnRite'],
                            ['name' => 'American Hairlines'],
                        ];
                    @endphp
                    @if(!empty($mediaLogos))
                        <div class="pt-6 border-t border-slate-200 dark:border-slate-800/80 flex flex-wrap items-center justify-center gap-6 sm:gap-12 text-xs font-extrabold text-slate-500 dark:text-slate-400 tracking-wider uppercase">
                            @foreach($mediaLogos as $index => $logo)
                                <span>{{ $logo['name'] ?? '' }}</span>
                                @if(!$loop->last)
                                    <span>•</span>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

        {{-- ==================== 3. STORY BRIDGE SECTION ==================== --}}
        @elseif($sectionId === 'story')
            <section id="story" class="py-20 lg:py-28 bg-slate-50 dark:bg-[#070D18] relative overflow-hidden transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        
                        <!-- Story Image Grid -->
                        <div class="lg:col-span-5 relative">
                            <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-800">
                                <img src="{{ uploads_asset($homepage->story_image, 'alanhumphreys/images/about-portrait.jpg') }}" alt="Alan Humphreys Story" class="w-full h-full object-cover aspect-4/5">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-6">
                                    <blockquote class="text-white text-sm font-semibold italic leading-relaxed">
                                        "{{ $homepage->story_image_quote ?? "I didn't choose the hair industry — it chose me. What started as a personal crisis at 18 became a 30-year career I never could've imagined." }}"
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <!-- Story Narrative -->
                        <div class="lg:col-span-7 space-y-6">
                            <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                                {{ $homepage->story_badge ?? 'THE FOUNDATION OF THE BRAND' }}
                            </span>
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white leading-tight">
                                {{ $homepage->story_title ?? 'I Was a Client Before I Became the Expert.' }}
                            </h2>

                            <div class="space-y-4 text-base text-slate-700 dark:text-slate-300 font-medium leading-relaxed">
                                <p>
                                    {{ $homepage->story_p1 ?? 'At 18, I started losing my hair. At 21, I walked into a hair-replacement clinic as a client. I was so determined to find a solution that I had to borrow money just to make the deposit.' }}
                                </p>
                                <p>
                                    {{ $homepage->story_p2 ?? "When I couldn't afford to pay off the balance, the owner offered me a job as a telemarketer. I quickly moved into sales, eventually finding an investor and purchasing the company myself at just 24 years old." }}
                                </p>
                                <p class="font-bold text-[#0D1B33] dark:text-white border-l-4 border-slate-blue pl-4 py-1 italic">
                                    "{{ $homepage->story_highlight_quote ?? 'I didn\'t have a business degree. I didn\'t have years of management experience. I had something else: I understood what it felt like to sit on the other side of the desk.' }}"
                                </p>
                                <p>
                                    {{ $homepage->story_p3 ?? 'Over the next 25 years, I built Hair Vital into a premier hair-replacement studio serving more than 3,000 clients, became an industry model/ambassador, appeared on Good Morning America, and introduced clinical trichology to Colorado before successfully selling the company in 2022.' }}
                                </p>
                            </div>

                            <div class="pt-4">
                                <a href="{{ $homepage->story_button_url ?? route('about') }}" class="inline-flex items-center gap-2 text-slate-blue dark:text-slate-blue-light font-bold text-sm uppercase tracking-wider hover:underline">
                                    {{ $homepage->story_button_text ?? 'Read My Full Story & Timeline →' }}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        {{-- ==================== 4. THE CORE PROBLEM (CONSULTATION GAP) ==================== --}}
        @elseif($sectionId === 'problem')
            <section id="problem" class="py-20 lg:py-24 bg-white dark:bg-[#050B14] border-t border-b border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                            {{ $homepage->problem_badge ?? 'THE CONSULTATION GAP' }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                            {{ $homepage->problem_title ?? "Your Business Doesn't Always Need More Leads." }}<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-slate-blue to-slate-blue-light">
                                {{ $homepage->problem_subtitle ?? 'Sometimes It Needs Better Conversations.' }}
                            </span>
                        </h2>
                        <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 font-medium leading-relaxed">
                            {{ $homepage->problem_description ?? 'A lead is only the beginning. What happens during the consultation determines whether someone becomes a loyal, long-term client — or walks away.' }}
                        </p>
                    </div>

                    <!-- Diagnostic Challenge Card Grid -->
                    <div class="bg-slate-50 dark:bg-[#0E1A2D] rounded-3xl p-8 sm:p-12 border border-slate-200 dark:border-slate-800 shadow-xl mb-12">
                        <h3 class="text-lg font-bold text-[#0D1B33] dark:text-white uppercase tracking-wider mb-6 text-center">
                            {{ $homepage->problem_box_title ?? 'Are you experiencing any of these common studio challenges?' }}
                        </h3>
                        @php
                            $problemItems = $homepage->problem_items ?? [
                                ['text' => 'Leads are coming in, but consultation conversion rates remain low.'],
                                ['text' => 'Staff or stylists feel uncomfortable selling, closing, or asking for deposits.'],
                                ['text' => 'Consultations feel robotic or inconsistent without a proven empathy framework.'],
                                ['text' => "You're losing hair-loss clients because you lack in-house trichology diagnostics."],
                                ['text' => 'You cannot justify the expensive overhead of a full-time in-house sales rep.'],
                                ['text' => "You want to grow revenue, but you aren't sure what system changes to make."],
                            ];
                        @endphp
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($problemItems as $item)
                                <div class="flex items-start gap-3 p-4 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-800">
                                    <span class="text-red-500 font-bold text-lg">✕</span>
                                    <div class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">
                                        {{ $item['text'] ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-base font-bold text-slate-blue dark:text-slate-blue-light">
                                {{ $homepage->problem_bottom_callout ?? "That's where I come in. Experience turns consultations into high-retention clients." }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        {{-- ==================== 5. HOW I CAN HELP (3 CORE SERVICES) ==================== --}}
        @elseif($sectionId === 'services')
            <section id="services" class="py-20 lg:py-28 bg-slate-50 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                            {{ $homepage->services_badge ?? 'PRODUCTIZED ADVISORY SERVICES' }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                            {{ $homepage->services_title ?? 'Three Ways We Can Work Together' }}
                        </h2>
                        <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 font-medium leading-relaxed">
                            {{ $homepage->services_description ?? 'Clear, high-impact offerings designed specifically for hair replacement studios, salons, and industry professionals.' }}
                        </p>
                    </div>

                    <!-- 3 Core Service Offerings Cards -->
                    @php
                        $servicesItems = $homepage->services_items ?? [
                            [
                                'badge' => 'Extension of Your Team',
                                'title' => 'Virtual Sales Consulting',
                                'subtitle' => 'Add an Experienced Sales Professional Without Full-Time Payroll',
                                'description' => "Don't have a dedicated salesperson? I become an extension of your company. I meet virtually with your prospective clients, answer their uncomfortable questions, handle objections with empathy, and guide them into the right solution.",
                                'highlights' => [
                                    'Converts cold leads & uncertain prospects',
                                    'Answers questions clients are afraid to ask',
                                    'Zero full-time employment overhead',
                                ],
                                'button_text' => 'Explore Virtual Sales Support →',
                                'button_url' => route('virtual-sales-consultant'),
                                'is_popular' => false,
                            ],
                            [
                                'badge' => 'In-Salon Assessment Days',
                                'title' => 'Traveling Trichologist',
                                'subtitle' => 'Bring Specialized Trichology Directly Into Your Salon',
                                'description' => 'I physically visit your salon or studio on scheduled assessment days to provide comprehensive scalp and hair evaluations for your clients. You keep the styling relationships; I bring the specialized medical-grade trichology expertise.',
                                'highlights' => [
                                    'High-value new service with zero cannibalization',
                                    'In-person dermascope scalp analysis',
                                    'Keeps client retention inside your salon',
                                ],
                                'button_text' => 'Schedule a Salon Assessment Day →',
                                'button_url' => '#contact',
                                'is_popular' => true,
                            ],
                            [
                                'badge' => 'Nationwide Remote Referrals',
                                'title' => 'Virtual Trichology',
                                'subtitle' => 'Professional Trichology Support — Wherever Your Clients Are',
                                'description' => 'Salons nationwide refer clients directly for remote video scalp assessments. I evaluate their hair thinning, medical history, and density changes, providing actionable protocols while supporting their ongoing relationship with your salon.',
                                'highlights' => [
                                    'National reach across the United States',
                                    'Personalized assessment report & next steps',
                                    'Complements existing salon care routines',
                                ],
                                'button_text' => 'Refer a Client for Virtual Assessment →',
                                'button_url' => '#contact',
                                'is_popular' => false,
                            ],
                        ];
                    @endphp
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        @foreach($servicesItems as $service)
                            <div class="rounded-3xl bg-white dark:bg-[#0E1A2D] {{ !empty($service['is_popular']) ? 'border-2 border-slate-blue dark:border-slate-blue-light shadow-xl relative' : 'border border-slate-200 dark:border-slate-800 shadow-lg' }} p-8 flex flex-col justify-between hover:-translate-y-1.5 transition-all duration-300">
                                @if(!empty($service['is_popular']))
                                    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-slate-blue text-white text-[10px] font-extrabold uppercase tracking-widest shadow-md">
                                        Popular For Salons
                                    </div>
                                @endif
                                <div>
                                    <div class="flex items-center justify-between mb-6">
                                        <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-slate-blue/10 text-slate-blue dark:text-slate-blue-light border border-slate-blue/30">
                                            {{ $service['badge'] ?? '' }}
                                        </span>
                                    </div>
                                    <h3 class="text-2xl font-bold font-heading text-[#0D1B33] dark:text-white mb-2">
                                        {{ $service['title'] ?? '' }}
                                    </h3>
                                    <p class="text-xs font-bold text-slate-blue dark:text-slate-blue-light uppercase tracking-wider mb-4">
                                        {{ $service['subtitle'] ?? '' }}
                                    </p>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 font-medium leading-relaxed mb-6">
                                        {{ $service['description'] ?? '' }}
                                    </p>
                                    @if(!empty($service['highlights']) && is_array($service['highlights']))
                                        <div class="space-y-2.5 pt-4 border-t border-slate-100 dark:border-slate-800 text-xs text-slate-700 dark:text-slate-300 font-semibold mb-6">
                                            @foreach($service['highlights'] as $highlight)
                                                <div class="flex items-center gap-2"><span class="text-slate-blue">✔</span> {{ $highlight }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ $service['button_url'] ?? '#contact' }}" class="block w-full py-3.5 px-4 rounded-xl {{ !empty($service['is_popular']) ? 'bg-slate-900 dark:bg-white text-white dark:text-slate-900 hover:bg-slate-blue hover:text-white' : 'bg-gradient-to-r from-slate-blue to-slate-blue-light text-white hover:shadow-lg' }} font-bold text-xs uppercase tracking-wider text-center shadow-md transition-all">
                                        {{ $service['button_text'] ?? 'Explore Service →' }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        {{-- ==================== 6. TRAINING & EDUCATION SECTION ==================== --}}
        @elseif($sectionId === 'training')
            <section id="training" class="py-20 bg-white dark:bg-[#050B14] border-t border-b border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        
                        <div class="lg:col-span-5">
                            <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                                {{ $homepage->training_badge ?? 'TEAM EMPOWERMENT' }}
                            </span>
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-6 leading-tight">
                                {{ $homepage->training_title ?? 'Give Your Team More Confidence.' }}
                            </h2>
                            <p class="text-base text-slate-600 dark:text-slate-300 font-medium leading-relaxed mb-6">
                                {{ $homepage->training_description ?? "The best salespeople aren't simply good at selling. They're good at listening. They understand what the client is experiencing, know how to ask the right questions, and explain solutions without making it feel like a pitch." }}
                            </p>
                            <a href="{{ $homepage->training_button_url ?? '#contact' }}" class="inline-block bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold px-7 py-3.5 rounded-xl text-xs uppercase tracking-wider hover:bg-slate-blue hover:text-white transition-all shadow-md">
                                {{ $homepage->training_button_text ?? 'Inquire About Team Training →' }}
                            </a>
                        </div>

                        @php
                            $trainingItems = $homepage->training_items ?? [
                                [
                                    'icon' => '🎯',
                                    'title' => 'Sales Training',
                                    'description' => 'Improve consultation empathy, objection handling, communication, and ethical closing.',
                                ],
                                [
                                    'icon' => '🔬',
                                    'title' => 'Trichology Training',
                                    'description' => 'Learn how incorporating scalp science expands your high-margin salon service capabilities.',
                                ],
                                [
                                    'icon' => '📈',
                                    'title' => 'Business Training',
                                    'description' => 'Develop bulletproof systems, client retention routines, and identify hidden revenue growth.',
                                ],
                            ];
                        @endphp
                        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-6">
                            @foreach($trainingItems as $tItem)
                                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800">
                                    <div class="w-10 h-10 rounded-xl bg-slate-blue/10 text-slate-blue flex items-center justify-center font-bold mb-4">{{ $tItem['icon'] ?? '🎯' }}</div>
                                    <h4 class="text-lg font-bold text-[#0D1B33] dark:text-white mb-2">{{ $tItem['title'] ?? '' }}</h4>
                                    <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                        {{ $tItem['description'] ?? '' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </section>

        {{-- ==================== 7. WHY ALAN? SECTION ==================== --}}
        @elseif($sectionId === 'why_alan')
            <section id="why-alan" class="py-20 lg:py-28 bg-slate-50 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                            {{ $homepage->why_badge ?? 'THE COMPLETE PERSPECTIVE' }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                            {{ $homepage->why_title ?? 'Why Work With Alan Humphreys?' }}
                        </h2>
                        <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 font-medium">
                            {{ $homepage->why_subtitle ?? "I don't teach from textbook theory. I teach from 30 years of real-world experience." }}
                        </p>
                    </div>

                    @php
                        $whyItems = $homepage->why_items ?? [
                            [
                                'number' => '01',
                                'tag' => 'EMPATHY',
                                'title' => 'Client-First Empathy',
                                'description' => "I've sat in the client's chair with hair loss anxiety. I understand the psychology, fears, and hesitation buyers feel before making a decision.",
                            ],
                            [
                                'number' => '02',
                                'tag' => 'LEADERSHIP',
                                'title' => '25 Years as an Owner',
                                'description' => 'I bought a struggling clinic at 24, managed teams, handled supply chains, survived crises, served 3,000+ clients, and completed a successful exit.',
                            ],
                            [
                                'number' => '03',
                                'tag' => 'CLINICAL EXPERTISE',
                                'title' => 'Certified Clinical Trichology',
                                'description' => 'Beyond styling and systems, I am trained and certified in scalp pathology, hair thinning science, and low-level laser protocols.',
                            ],
                            [
                                'number' => '04',
                                'tag' => 'SALES MASTERY',
                                'title' => 'Ethical Consultation Sales',
                                'description' => 'I teach a consultative sales methodology that converts without high pressure, ensuring clients feel supported and stay for years.',
                            ],
                            [
                                'number' => '05',
                                'tag' => 'INDUSTRY AMBASSADOR',
                                'title' => 'Media & Stage Credibility',
                                'description' => 'Featured on Good Morning America, Details Magazine, New York Magazine, OnRite, and keynote stages before hundreds of salon professionals.',
                            ],
                            [
                                'number' => '06',
                                'tag' => 'PRACTICAL ADVISORY',
                                'title' => 'Practical Execution',
                                'description' => 'No generic corporate jargon. You get actionable frameworks, scripts, assessment tools, and direct sales support you can implement immediately.',
                            ],
                        ];
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($whyItems as $why)
                            <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm">
                                <span class="text-xs font-black text-slate-blue dark:text-slate-blue-light uppercase tracking-widest">{{ $why['number'] ?? '' }} / {{ $why['tag'] ?? '' }}</span>
                                <h4 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mt-2 mb-3">{{ $why['title'] ?? '' }}</h4>
                                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                    {{ $why['description'] ?? '' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        {{-- ==================== 8. WATCH & LEARN / VIDEOS SECTION ==================== --}}
        @elseif($sectionId === 'videos')
            <section id="videos" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] border-t border-b border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2">
                            {{ $homepage->videos_badge ?? 'WATCH & LEARN' }}
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                            {{ $homepage->videos_title ?? 'Industry Insights, Trichology & Business Growth' }}
                        </h2>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto mb-6"></div>
                        <p class="text-slate-700 dark:text-slate-300 text-base font-medium leading-relaxed">
                            {{ $homepage->videos_description ?? 'Practical videos and deep dives covering non-surgical hair restoration, consultation techniques, and salon trichology expansion.' }}
                        </p>
                    </div>

                    @php
                        $videoItems = $homepage->video_items ?? [
                            [
                                'title' => 'The Power of Empathy in Hair Loss Consultations',
                                'description' => 'Why sitting on the other side of the desk transformed my closing rate and client retention.',
                                'category' => 'Consultation Sales',
                                'video_id' => 'dQw4w9WgXcQ',
                                'thumbnail' => 'alanhumphreys/images/about-hero.jpg',
                            ],
                            [
                                'title' => 'How Salons Can Add Trichology in 30 Days',
                                'description' => 'The exact framework to introduce scalp diagnostics without hiring full-time medical staff.',
                                'category' => 'Trichology Growth',
                                'video_id' => 'dQw4w9WgXcQ',
                                'thumbnail' => 'alanhumphreys/images/trichology-banner.jpg',
                            ],
                            [
                                'title' => 'From Telemarketer to Studio Owner: Lessons Learned',
                                'description' => 'The business principles that grew Hair Vital to 3,000+ active clients across 25 years.',
                                'category' => 'Business Story',
                                'video_id' => 'dQw4w9WgXcQ',
                                'thumbnail' => 'alanhumphreys/images/hero-headshot.jpg',
                            ],
                        ];
                    @endphp
                    @if(!empty($videoItems))
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($videoItems as $video)
                                <div class="bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 rounded-3xl overflow-hidden shadow-md hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 flex flex-col">
                                    <div class="aspect-video relative bg-slate-900 flex items-center justify-center overflow-hidden">
                                        @if(!empty($video['video_id']))
                                            @php
                                                $ytId = $video['video_id'];
                                                if (str_contains($ytId, 'v=')) {
                                                    parse_str(parse_url($ytId, PHP_URL_QUERY) ?? '', $ytParams);
                                                    $ytId = $ytParams['v'] ?? $ytId;
                                                } elseif (str_contains($ytId, 'youtu.be/')) {
                                                    $ytId = basename(parse_url($ytId, PHP_URL_PATH));
                                                }
                                            @endphp
                                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $ytId }}" title="{{ $video['title'] ?? 'Video' }}" allowfullscreen loading="lazy"></iframe>
                                        @else
                                            <img src="{{ uploads_asset($video['thumbnail'] ?? null, 'alanhumphreys/images/about-hero.jpg') }}" class="w-full h-full object-cover" alt="{{ $video['title'] ?? 'Thumbnail' }}">
                                        @endif
                                    </div>
                                    <div class="p-6 flex-1 flex flex-col justify-between">
                                        <div>
                                            <span class="inline-block text-[10px] font-extrabold tracking-widest uppercase bg-slate-blue/15 text-slate-blue dark:text-slate-blue-light px-2.5 py-1 rounded mb-3">
                                                {{ $video['category'] ?? 'Insight' }}
                                            </span>
                                            <h4 class="font-bold font-heading text-[#0D1B33] dark:text-white text-lg mb-2">{{ $video['title'] ?? '' }}</h4>
                                            <p class="text-xs text-slate-600 dark:text-slate-400 font-medium leading-relaxed">{{ $video['description'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

        {{-- ==================== 9. AWARDS, CERTIFICATIONS & MEDIA SECTION ==================== --}}
        @elseif($sectionId === 'credentials')
            <section id="credentials" class="py-20 lg:py-28 bg-slate-100/80 dark:bg-[#070D18] transition-colors border-t border-b border-slate-200 dark:border-slate-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2">
                            {{ $homepage->credentials_badge ?? 'CREDENTIALS & INDUSTRY RECOGNITION' }}
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-5xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                            {{ $homepage->credentials_title ?? 'Awards, Certifications & Media' }}
                        </h2>
                        <div class="w-16 h-1 bg-gradient-to-r from-slate-blue to-slate-blue-light rounded-full mx-auto mb-6"></div>
                        <p class="text-slate-700 dark:text-slate-300 text-base font-medium leading-relaxed">
                            {{ $homepage->credentials_description ?? 'Over three decades of recognized excellence in hair replacement, clinical trichology, and media features.' }}
                        </p>
                    </div>

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
                        <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200/90 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl">
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
                        <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200/90 dark:border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl">
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
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($showcaseCards as $card)
                                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
                                    <!-- Image Container -->
                                    <div class="bg-slate-900 h-64 p-3 flex items-center justify-center overflow-hidden relative">
                                        <img src="{{ uploads_asset($card['image'] ?? null, 'alanhumphreys/images/award-ceremony.jpg') }}"
                                             alt="{{ $card['caption'] ?? 'Media Showcase' }}"
                                             class="w-full h-full object-cover rounded-xl transition-transform duration-500 group-hover:scale-105">
                                    </div>

                                    <!-- Caption Bar -->
                                    <div class="p-4 bg-white dark:bg-[#0E1A2D] border-t border-slate-100 dark:border-slate-800/80">
                                        <p class="text-xs font-bold text-slate-blue dark:text-slate-blue-light tracking-wide text-center">
                                            {{ $card['caption'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </section>

        {{-- ==================== 10. FEATURED TRANSFORMATIONS / GALLERY PREVIEW ==================== --}}
        @elseif($sectionId === 'gallery')
            @if($galleryHighlights->isNotEmpty())
            <section id="gallery" class="py-20 bg-white dark:bg-[#050B14] border-t border-b border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row items-center justify-between mb-12 gap-4">
                        <div>
                            <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">{{ $homepage->gallery_badge ?? 'VISUAL EVIDENCE' }}</span>
                            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-1">
                                {{ $homepage->gallery_title ?? 'Real Results. Proven Artistry.' }}
                            </h2>
                        </div>
                        <a href="{{ $homepage->gallery_button_url ?? route('gallery') }}" class="text-xs font-bold uppercase tracking-wider px-5 py-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200 hover:bg-slate-blue hover:text-white transition-all">
                            {{ $homepage->gallery_button_text ?? 'View Complete Gallery →' }}
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($galleryHighlights as $item)
                            <div class="group rounded-2xl overflow-hidden bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all">
                                <div class="relative aspect-4/3 overflow-hidden bg-slate-900">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded bg-black/75 text-white text-[10px] font-extrabold uppercase tracking-widest">
                                        {{ $item->category }}
                                    </span>
                                </div>
                                <div class="p-6">
                                    <h4 class="font-bold text-base text-[#0D1B33] dark:text-white mb-2">{{ $item->title }}</h4>
                                    <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed mb-4">{{ $item->description }}</p>
                                    <a href="{{ route('gallery') }}" class="text-xs font-bold text-slate-blue dark:text-slate-blue-light hover:underline">
                                        View Case Study ↔
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

        {{-- ==================== 11. KNOWLEDGE LIBRARY / INSIGHTS PREVIEW ==================== --}}
        @elseif($sectionId === 'blog')
            @if($posts->isNotEmpty())
            <section id="blog" class="py-20 bg-slate-50 dark:bg-[#070D18] transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-14">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                            {{ $homepage->blog_badge ?? "ALAN'S KNOWLEDGE LIBRARY" }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                            {{ $homepage->blog_title ?? 'Real Conversations. Real Lessons.' }}
                        </h2>
                        <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 font-medium">
                            {{ $homepage->blog_description ?? 'Insights from more than three decades in hair replacement, client psychology, trichology, and studio operations.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                        @foreach($posts as $post)
                            <article class="bg-white dark:bg-[#0E1A2D] rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between hover:shadow-lg transition-all">
                                <div class="p-6">
                                    @if($post->category)
                                        <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-2 block">
                                            {{ $post->category->name }}
                                        </span>
                                    @endif
                                    <h3 class="text-lg font-bold font-heading text-[#0D1B33] dark:text-white mb-3 hover:text-slate-blue transition-colors">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            {{ $post->name }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-3 leading-relaxed">
                                        {{ $post->description }}
                                    </p>
                                </div>
                                <div class="p-6 pt-0 border-t border-slate-100 dark:border-slate-800/80 mt-4 flex items-center justify-between text-xs font-bold text-slate-blue dark:text-slate-blue-light">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="hover:underline">Read Article →</a>
                                    <span class="text-slate-400 text-[11px] font-medium">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="text-center">
                        <a href="{{ $homepage->blog_button_url ?? route('blog') }}" class="inline-block px-7 py-3 rounded-xl bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
                            {{ $homepage->blog_button_text ?? 'Explore All Articles in Knowledge Library →' }}
                        </a>
                    </div>
                </div>
            </section>
            @endif

        {{-- ==================== 12. INTAKE & STRATEGY CALL FORM ==================== --}}
        @elseif($sectionId === 'contact')
            <section id="contact" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] border-t border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                        
                        <!-- Left Details Info -->
                        <div class="lg:col-span-5 space-y-6">
                            <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                                {{ $homepage->contact_badge ?? 'START THE CONVERSATION' }}
                            </span>
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white leading-tight">
                                {{ $homepage->contact_title ?? 'Your Next Chapter Can Start With One Conversation.' }}
                            </h2>
                            <p class="text-base text-slate-600 dark:text-slate-300 font-medium leading-relaxed">
                                {{ $homepage->contact_description ?? "Whether you are a hair-replacement studio owner wanting to increase sales, a salon owner interested in adding traveling or virtual trichology, or an industry organization looking for speaking and education — I'd like to hear what you're working on." }}
                            </p>

                            <div class="space-y-4 pt-4 border-t border-slate-200 dark:border-slate-800 text-sm text-slate-700 dark:text-slate-300">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-base">📍</span>
                                    <div>
                                        <div class="text-xs font-bold uppercase text-slate-400">Headquarters</div>
                                        <div class="font-bold text-[#0D1B33] dark:text-white">{{ $homepage->contact_address ?? 'North Palm Beach, Florida (Serving Nationwide)' }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-base">📞</span>
                                    <div>
                                        <div class="text-xs font-bold uppercase text-slate-400">Direct Phone</div>
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $homepage->contact_phone ?? '303-718-1870') }}" class="font-bold text-slate-blue dark:text-slate-blue-light hover:underline">{{ $homepage->contact_phone ?? '303-718-1870' }}</a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-base">💬</span>
                                    <div>
                                        <div class="text-xs font-bold uppercase text-slate-400">Instant Messaging</div>
                                        <a href="{{ $homepage->contact_whatsapp_url ?? 'https://wa.me/+13037181870' }}" target="_blank" class="font-bold text-emerald-600 dark:text-emerald-400 hover:underline">Chat directly via WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Interactive Form Card -->
                        <div class="lg:col-span-7">
                            <div class="bg-slate-50 dark:bg-[#0E1A2D] rounded-3xl p-8 sm:p-10 border border-slate-200 dark:border-slate-800 shadow-xl">
                                
                                @if($submitted)
                                    <div class="text-center py-12">
                                        <div class="w-16 h-16 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 text-3xl flex items-center justify-center mx-auto mb-4">
                                            ✓
                                        </div>
                                        <h3 class="text-2xl font-bold text-[#0D1B33] dark:text-white font-heading mb-2">Message Received</h3>
                                        <p class="text-sm text-slate-600 dark:text-slate-300 max-w-md mx-auto mb-6">
                                            Thank you for reaching out, {{ $firstName }}. Alan will review your inquiry and connect with you personally within 24–48 hours.
                                        </p>
                                        <button wire:click="resetForm" class="px-6 py-2.5 rounded-xl bg-slate-blue text-white text-xs font-bold uppercase tracking-wider">
                                            Send Another Inquiry
                                        </button>
                                    </div>
                                @else
                                    <h3 class="text-xl font-bold text-[#0D1B33] dark:text-white font-heading mb-2">{{ $homepage->contact_form_title ?? 'Book a Strategy Consultation' }}</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">{{ $homepage->contact_form_subtitle ?? "Tell me where you are now, where you want to go, and what's standing in the way." }}</p>

                                    <form wire:submit="submitIntake" class="space-y-4">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">First Name *</label>
                                                <input type="text" wire:model="firstName" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="John">
                                                @error('firstName') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Last Name *</label>
                                                <input type="text" wire:model="lastName" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="Doe">
                                                @error('lastName') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Email Address *</label>
                                                <input type="email" wire:model="email" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="john@example.com">
                                                @error('email') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Phone Number</label>
                                                <input type="tel" wire:model="phone" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="(555) 000-0000">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Your Role / Business Type *</label>
                                                <select wire:model="businessType" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none">
                                                    <option value="">Select your role...</option>
                                                    <option value="Hair Replacement Studio Owner">Hair Replacement Studio Owner</option>
                                                    <option value="Salon / Hair Studio Owner">Salon / Hair Studio Owner</option>
                                                    <option value="Certified Trichologist">Certified Trichologist</option>
                                                    <option value="Hair-Loss Stylist / Practitioner">Hair-Loss Stylist / Practitioner</option>
                                                    <option value="Industry Manufacturer / Brand">Industry Manufacturer / Brand</option>
                                                    <option value="Individual Seeking Hair Advice">Individual Seeking Hair Advice</option>
                                                    <option value="Event / Podcast Organizer">Event / Podcast Organizer</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @error('businessType') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Primary Interest *</label>
                                                <select wire:model="interest" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none">
                                                    <option value="">Select how Alan can help...</option>
                                                    <option value="Virtual Sales Consulting Support">Virtual Sales Consulting Support</option>
                                                    <option value="Traveling Trichologist (In-Salon Days)">Traveling Trichologist (In-Salon Days)</option>
                                                    <option value="Virtual Trichology Client Referrals">Virtual Trichology Client Referrals</option>
                                                    <option value="Sales & Consultation Team Training">Sales &amp; Consultation Team Training</option>
                                                    <option value="Trichology Implementation Advisory">Trichology Implementation Advisory</option>
                                                    <option value="Studio Business Growth & Strategy">Studio Business Growth &amp; Strategy</option>
                                                    <option value="Keynote Speaking & Education">Keynote Speaking &amp; Education</option>
                                                    <option value="General Inquiry">General Inquiry</option>
                                                </select>
                                                @error('interest') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">How Can Alan Help Your Business?</label>
                                            <textarea wire:model="message" rows="4" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="Tell Alan about your business, your current challenges, and your goals..."></textarea>
                                        </div>

                                        <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-slate-blue to-slate-blue-light hover:from-slate-blue-light hover:to-slate-blue text-white font-extrabold text-xs uppercase tracking-widest shadow-xl shadow-slate-blue/30 transition-all hover:-translate-y-0.5 cursor-pointer">
                                            Submit Strategy Inquiry →
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif

    @endforeach

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />

</div>
