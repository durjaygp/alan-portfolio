<div class="relative min-h-screen bg-white dark:bg-[#050B14] text-slate-900 dark:text-slate-100 transition-colors duration-300">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ============ PAGE BANNER ============ -->
    <section class="pt-32 pb-16 sm:pt-40 sm:pb-20 bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] border-b border-slate-200 dark:border-slate-800 relative overflow-hidden">
        <!-- Subtle Ambient Glow -->
        <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-96 h-96 bg-slate-blue/10 dark:bg-slate-blue/5 blur-3xl rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="reveal-up text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-4 flex items-center gap-2">
                <a href="{{ route('home') }}" class="hover:underline transition-all">Home</a>
                <span class="text-slate-400 dark:text-slate-600">/</span>
                <span class="text-slate-700 dark:text-slate-300">About</span>
            </div>
            <h1 class="reveal-up font-heading font-extrabold text-4xl sm:text-6xl lg:text-7xl text-[#0D1B33] dark:text-white mb-6 tracking-tight leading-tight">
                {{ $about?->banner_title ?? 'The Full Story' }}
            </h1>
            <p class="reveal-up text-slate-800 dark:text-slate-300 text-lg sm:text-2xl font-medium max-w-3xl leading-relaxed">
                {{ $about?->banner_lead ?? "I didn't choose the hair industry — it chose me. What started as a personal crisis at 18 became a 25-year career that I never could've imagined." }}
            </p>
        </div>
    </section>

    <!-- ============ ORIGIN STORY ============ -->
    <section class="py-16 sm:py-24 lg:py-32 bg-white dark:bg-[#050B14] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Text Column -->
                <div class="lg:col-span-7 space-y-7">
                    <div class="reveal-up">
                        <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-3">
                            {{ $about?->origin_label ?? 'Where It All Started' }}
                        </span>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl lg:text-5xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                            {{ $about?->origin_heading ?? 'The $10/Hour Kid Who Bought the Company' }}
                        </h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-slate-blue to-slate-blue-light rounded-full mb-8"></div>
                    </div>

                    @if($about?->origin_para_1)
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed first-letter:float-left first-letter:text-6xl sm:first-letter:text-7xl first-letter:font-heading first-letter:font-extrabold first-letter:mr-4 first-letter:text-slate-blue dark:first-letter:text-slate-blue-light first-letter:leading-none">
                            {{ $about->origin_para_1 }}
                        </p>
                    @else
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed first-letter:float-left first-letter:text-6xl sm:first-letter:text-7xl first-letter:font-heading first-letter:font-extrabold first-letter:mr-4 first-letter:text-slate-blue dark:first-letter:text-slate-blue-light first-letter:leading-none">
                            I was eighteen years old the first time I noticed my hair thinning. At an age when most guys are worrying about college and girls, I was standing in front of a mirror wondering why my hairline was disappearing. The depression that followed affected every part of my life — my confidence, my social life, everything. I didn't know anyone else going through it, and I sure as hell didn't know what to do about it.
                        </p>
                    @endif

                    @if($about?->origin_para_2)
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            {{ $about->origin_para_2 }}
                        </p>
                    @else
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            By 21, I finally decided I was going to do something about it. I walked into a hair replacement clinic in Denver and became a client. I had to borrow money just for the deposit. But the moment I looked in the mirror after that first appointment, something shifted. I felt like myself again. That feeling — that transformation — is something I've spent my entire career trying to give other people.
                        </p>
                    @endif

                    <!-- Emphasis Block / Quote -->
                    <div class="reveal-scale my-10 p-6 sm:p-8 bg-slate-50 dark:bg-[#0E1A2D] border-l-4 border-slate-blue rounded-r-2xl shadow-md border border-slate-200/80 dark:border-slate-800/80 relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-10 text-slate-blue font-heading text-8xl leading-none select-none pointer-events-none">“</div>
                        <p class="font-heading font-semibold text-lg sm:text-xl lg:text-2xl text-[#0D1B33] dark:text-slate-blue-light italic leading-relaxed relative z-10">
                            "{{ $about?->origin_quote ?? 'The day I got my hair back was the day my real life started. I knew right then that this was bigger than vanity — this was about giving people back a piece of themselves they thought was gone forever.' }}"
                        </p>
                    </div>

                    @if($about?->origin_para_3)
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            {{ $about->origin_para_3 }}
                        </p>
                    @else
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            Trouble was, I couldn't pay off my balance. So the owner hired me to do telemarketing to work off what I owed. Turns out, selling something you actually believe in — something you've experienced firsthand — is a lot easier than selling something you don't. I moved from telemarketing to full-time consultant to manager in about two years.
                        </p>
                    @endif

                    @if($about?->origin_para_4)
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            {{ $about->origin_para_4 }}
                        </p>
                    @else
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            Then came the opportunity that changed everything. The business was failing. Weeks away from closing. I was 24 years old, making $10 an hour, with no business education, no college degree, and not a dollar of my own money. But I found an investor, and in July 1997, I bought the company. Hairlines, Inc. — which I'd later rename <strong class="text-[#0D1B33] dark:text-white font-extrabold">Hair Vital</strong>.
                        </p>
                    @endif

                    @if($about?->origin_para_5)
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            {{ $about->origin_para_5 }}
                        </p>
                    @else
                        <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                            Everyone told me I was crazy. Maybe I was. But I knew two things: I knew this product changed lives because it changed mine, and I knew I could outwork anyone. So that's what I did. I paid off the loan, bought out my investor by 2004, and owned 100% of the company. For the next 25 years, I served over 3,000 clients and built a reputation that took me places I never expected.
                        </p>
                    @endif
                </div>

                <!-- Photos Column -->
                <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-28">
                    <!-- Photo 1 -->
                    <div class="reveal-right bg-slate-50 dark:bg-[#0E1A2D] p-4 sm:p-5 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl group hover:border-slate-blue/50 transition-all duration-300">
                        <div class="image-anime rounded-2xl overflow-hidden bg-white dark:bg-[#070D18] p-3 shadow-inner">
                            <img src="{{ $about?->origin_photo_1_url ?? uploads_asset($about?->origin_photo_1_image, 'alanhumphreys/images/before-after.png') }}"
                                 alt="Alan Humphreys before and after transformation"
                                 class="w-full h-80 object-contain rounded-xl">
                        </div>
                        <p class="text-xs font-bold text-slate-blue dark:text-slate-blue-light text-center mt-4 tracking-wider uppercase">
                            {{ $about?->origin_photo_1_caption ?? 'My personal transformation — what started it all' }}
                        </p>
                    </div>

                    <!-- Photo 2 -->
                    <div class="reveal-right bg-slate-50 dark:bg-[#0E1A2D] p-4 sm:p-5 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl group hover:border-slate-blue/50 transition-all duration-300">
                        <div class="image-anime rounded-2xl overflow-hidden">
                            <img src="{{ $about?->origin_photo_2_url ?? uploads_asset($about?->origin_photo_2_image, 'alanhumphreys/images/services-portrait.jpg') }}"
                                 alt="Alan Humphreys professional portrait"
                                 class="w-full h-auto max-h-[460px] object-cover object-top rounded-xl">
                        </div>
                        <p class="text-xs font-bold text-slate-blue dark:text-slate-blue-light text-center mt-4 tracking-wider uppercase">
                            {{ $about?->origin_photo_2_caption ?? '25 years later, still in the chair' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============ CAREER TIMELINE ============ -->
    <section class="py-20 sm:py-28 lg:py-32 bg-[#091220] dark:bg-[#070D18] text-white transition-colors relative overflow-hidden">
        <!-- Ambient glow -->
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-slate-blue/5 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-24">
                <span class="reveal-up inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue-light mb-3">
                    {{ $about?->timeline_label ?? 'Career Timeline' }}
                </span>
                <h2 class="reveal-up font-heading font-bold text-4xl sm:text-5xl lg:text-6xl text-white leading-tight mb-4">
                    {{ $about?->timeline_heading ?? 'How It All Unfolded' }}
                </h2>
                <div class="reveal-up w-20 h-1 bg-gradient-to-r from-slate-blue/50 via-slate-blue to-slate-blue/50 rounded-full mx-auto"></div>
            </div>

            <!-- Central Timeline Wrapper -->
            <div class="relative">
                <!-- Vertical Line -->
                <div class="absolute left-4 sm:left-8 lg:left-1/2 top-4 bottom-4 w-0.5 bg-gradient-to-b from-slate-blue/20 via-slate-blue/80 to-slate-blue/20 -translate-x-1/2 pointer-events-none"></div>

                <!-- Timeline Items List -->
                <div class="space-y-12 sm:space-y-16 lg:space-y-20">
                    @php
                        $timelineItems = $about?->timeline_items ?? [
                            ['year' => '1994', 'title' => 'Became a Client', 'description' => 'At 21, walked into a hair replacement clinic in Denver. Borrowed money for the deposit. Left feeling like a different person.'],
                            ['year' => '1995', 'title' => 'Hired as Telemarketer', 'description' => "Couldn't afford payments, so the owner put me to work. My real-world experience made me a natural — I went from phones to full-time sales in months."],
                            ['year' => '1997', 'title' => 'Bought the Business', 'description' => 'At 24, with no money and no degree, I found an investor and purchased a failing company that was weeks from closing. Hair Vital was born.'],
                            ['year' => '1998', 'title' => 'Game-Changing Partnership', 'description' => "Met a representative from a wholesale company in Florida. Got certified on new methods. Built relationships with colleagues I'm still close with today."],
                            ['year' => '2000', 'title' => 'Brand Ambassador', 'description' => 'Flew to Florida to model for marketing material. Became brand ambassador for two of the largest wholesale companies — a role I held for over 15 years.'],
                            ['year' => '2001', 'title' => 'Details Magazine + VR Hair Launch', 'description' => 'Full-page feature in Details Magazine. Was the first person to try and model Virtual Reality Hair — technology that would revolutionize the industry.'],
                            ['year' => '2004', 'title' => '100% Owner', 'description' => 'Paid off loan, bought out investor. Full ownership of Hair Vital. No more partners, no more debt — just me and the mission.'],
                            ['year' => '2007', 'title' => 'Good Morning America', 'description' => "Featured on GMA's \"Movie and a Makeover\" segment after a New York Magazine profile. National spotlight on what we'd been building in Denver."],
                            ['year' => '2014', 'title' => 'First Trichology Practice in Colorado', 'description' => 'Brought clinical trichology to Hair Vital — the first company in Colorado to offer it. Opened the door to helping people at the earliest stages of hair loss.'],
                            ['year' => '2018', 'title' => 'Lifetime Visionary Award', 'description' => 'Honored at the Hair Visions International Conference for testing new technology and giving honest feedback. Still one of the proudest moments of my career.'],
                            ['year' => '2022', 'title' => 'Sold the Business', 'description' => "After 25 years and 3,000+ clients, I sold Hair Vital and moved to Florida. But I wasn't done — I was just getting started on the next chapter."],
                            ['year' => '2026', 'title' => 'Clinical Trichologist Certification', 'description' => 'Earned USTI and AMCA trichologist certifications. Now focused on consulting, training, and helping the next generation of industry professionals.']
                        ];
                    @endphp

                    @foreach($timelineItems as $index => $item)
                        @php
                            $isEven = ($index % 2 === 0);
                        @endphp
                        <div class="relative flex flex-col lg:flex-row items-center group">
                            <!-- Bullet marker -->
                            <div class="absolute left-4 sm:left-8 lg:left-1/2 top-8 -translate-x-1/2 w-4 h-4 rounded-full bg-slate-blue ring-4 ring-[#091220] dark:ring-[#070D18] shadow-md shadow-slate-blue/50 z-20 group-hover:scale-125 transition-transform duration-300"></div>

                            @if($isEven)
                                <!-- Left side content -->
                                <div class="w-full lg:w-1/2 pr-0 lg:pr-12 text-left lg:text-right pl-12 sm:pl-16 lg:pl-0">
                                    <div class="reveal-left bg-[#0E1A2D]/90 dark:bg-[#0E1A2D]/95 border border-slate-700/60 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl hover:border-slate-blue/50 hover:shadow-slate-blue/10 transition-all duration-300 inline-block text-left w-full">
                                        <span class="font-heading font-extrabold text-2xl sm:text-3xl text-slate-blue-light mb-2 block">{{ $item['year'] ?? '' }}</span>
                                        <h3 class="font-heading font-bold text-xl sm:text-2xl text-white mb-3">{{ $item['title'] ?? '' }}</h3>
                                        <p class="text-slate-300 text-sm sm:text-base font-normal leading-relaxed">
                                            {{ $item['description'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="hidden lg:block w-1/2"></div>
                            @else
                                <!-- Right side content -->
                                <div class="hidden lg:block w-1/2"></div>
                                <div class="w-full lg:w-1/2 pl-12 sm:pl-16 lg:pl-12 text-left">
                                    <div class="reveal-right bg-[#0E1A2D]/90 dark:bg-[#0E1A2D]/95 border border-slate-700/60 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl hover:border-slate-blue/50 hover:shadow-slate-blue/10 transition-all duration-300 inline-block text-left w-full">
                                        <span class="font-heading font-extrabold text-2xl sm:text-3xl text-slate-blue-light mb-2 block">{{ $item['year'] ?? '' }}</span>
                                        <h3 class="font-heading font-bold text-xl sm:text-2xl text-white mb-3">{{ $item['title'] ?? '' }}</h3>
                                        <p class="text-slate-300 text-sm sm:text-base font-normal leading-relaxed">
                                            {{ $item['description'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ============ COVID STORY ============ -->
    <section class="py-16 sm:py-24 lg:py-32 bg-white dark:bg-[#050B14] transition-colors">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-7">
            <div class="reveal-up">
                <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-3">
                    {{ $about?->covid_label ?? 'The Hard Part' }}
                </span>
                <h2 class="font-heading font-bold text-3xl sm:text-5xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                    {{ $about?->covid_heading ?? 'Surviving COVID — and Coming Out Stronger' }}
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-slate-blue to-slate-blue-light rounded-full mb-8"></div>
            </div>

            @if($about?->covid_para_1)
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    {{ $about->covid_para_1 }}
                </p>
            @else
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    In March 2020, we shut down. Two months with no appointments, no revenue, and a room full of clients who relied on us for something deeply personal. But shutting down didn't mean giving up.
                </p>
            @endif

            @if($about?->covid_para_2)
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    {{ $about->covid_para_2 }}
                </p>
            @else
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    I shipped supplies to clients daily. Drove to their houses to drop off product. Did FaceTime tutorials showing guys how to maintain their hair systems at home — most of them had never done it before. We made it work.
                </p>
            @endif

            <div class="reveal-scale my-10 p-6 sm:p-8 bg-slate-50 dark:bg-[#0E1A2D] border-l-4 border-slate-blue rounded-r-2xl shadow-md border border-slate-200/80 dark:border-slate-800/80 relative overflow-hidden">
                <p class="font-heading font-semibold text-lg sm:text-xl lg:text-2xl text-[#0D1B33] dark:text-slate-blue-light italic leading-relaxed">
                    {{ $about?->covid_quote ?? "When we reopened, we worked 20 straight days to get every single client back in the chair and caught up. Twenty days. No breaks. Because that's what they needed from us." }}
                </p>
            </div>

            @if($about?->covid_para_3)
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    {{ $about->covid_para_3 }}
                </p>
            @else
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    Then the supply crisis hit. Hair wasn't available worldwide. I spent hundreds of thousands building an inventory — a bet that kept us in business for the next two years when most competitors were scrambling. Other studios were calling me, begging for any hair I could spare. Luckily, the relationships I'd built over two decades paid off. My reps gave me a heads-up to buy before anyone else knew what was coming.
                </p>
            @endif

            @if($about?->covid_para_4)
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    {{ $about->covid_para_4 }}
                </p>
            @else
                <p class="reveal-up text-slate-800 dark:text-slate-300 text-base sm:text-lg font-medium leading-relaxed">
                    COVID was the hardest professional challenge I've faced. But it also proved something I'd always believed: relationships and preparation beat everything else. Every time.
                </p>
            @endif
        </div>
    </section>

    <!-- ============ PHILOSOPHY SECTION ============ -->
    <section class="py-16 sm:py-24 lg:py-32 bg-slate-100 dark:bg-[#070D18] transition-colors relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20">
                <span class="reveal-up inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-3">
                    {{ $about?->philosophy_label ?? 'My Philosophy' }}
                </span>
                <h2 class="reveal-up font-heading font-bold text-3xl sm:text-5xl lg:text-6xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                    {{ $about?->philosophy_heading ?? 'What I Believe About This Industry' }}
                </h2>
                <div class="reveal-up w-20 h-1 bg-gradient-to-r from-slate-blue to-slate-blue-light rounded-full mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                @php
                    $philosophyItems = $about?->philosophy_items ?? [
                        ['number' => '01', 'title' => 'Honesty Over Popularity', 'description' => "I'll tell you what I actually think — even if it's not what you want to hear. When manufacturers send me new products, I tell them exactly what works and what doesn't. That honesty is why they kept coming back to me for over 20 years."],
                        ['number' => '02', 'title' => 'Trichology Is the Future', 'description' => "The industry has been too focused on replacement for too long. Trichology opens up a massive untapped market — people with early hair loss, scalp conditions, and people who don't even know what's possible. If you're not offering it, you're leaving money on the table."],
                        ['number' => '03', 'title' => 'Your Staff Is Everything', 'description' => "Clients can feel whether people are happy to work somewhere. A motivated, positive staff is the single biggest competitive advantage you can have. I don't care how good your product is — if your team is miserable, your clients know it."],
                        ['number' => '04', 'title' => 'Never Stop Innovating', 'description' => "The biggest mistake I see is complacency. The businesses that thrive are the ones with leaders who are always looking for an edge — new technology, better systems, a fresh approach. The moment you stop evolving is the moment you start dying."]
                    ];
                @endphp

                @foreach($philosophyItems as $pItem)
                    <div class="reveal-up bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-md hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <span class="font-heading font-extrabold text-5xl text-slate-blue/25 dark:text-slate-blue-light/25 block mb-4">{{ $pItem['number'] ?? '' }}</span>
                            <h3 class="font-heading font-bold text-xl text-[#0D1B33] dark:text-white mb-3">{{ $pItem['title'] ?? '' }}</h3>
                            <p class="text-slate-700 dark:text-slate-300 text-sm font-medium leading-relaxed">
                                {{ $pItem['description'] ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============ CTA SECTION ============ -->
    <section class="py-20 sm:py-28 bg-[#0D1B33] text-center text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-blue/10 via-transparent to-slate-blue/10 pointer-events-none"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10 space-y-6">
            <h2 class="reveal-up font-heading font-bold text-3xl sm:text-5xl lg:text-6xl text-white">
                {{ $about?->cta_heading ?? 'Ready to Work Together?' }}
            </h2>
            <p class="reveal-up text-slate-300 text-base sm:text-xl max-w-xl mx-auto font-medium leading-relaxed">
                {{ $about?->cta_text ?? "I've lived every side of this industry. Let me put that experience to work for you." }}
            </p>
            <div class="reveal-up pt-4">
                @php
                    $ctaUrl = $about?->cta_button_url ?? '#contact';
                    $finalCtaUrl = str_starts_with($ctaUrl, '#') ? route('home') . $ctaUrl : $ctaUrl;
                @endphp
                <a href="{{ $finalCtaUrl }}" class="inline-block bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-extrabold px-9 py-4 rounded-xl text-xs sm:text-sm tracking-widest uppercase shadow-xl shadow-slate-blue/20 hover:shadow-slate-blue/40 hover:-translate-y-1 transition-all duration-300">
                    {{ $about?->cta_button_label ?? 'Start the Conversation →' }}
                </a>
            </div>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />
</div>
