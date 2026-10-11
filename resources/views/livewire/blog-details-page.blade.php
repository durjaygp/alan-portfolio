<div class="relative min-h-screen bg-white dark:bg-[#050B14] text-slate-900 dark:text-slate-100 transition-colors duration-300">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ============ HEADER / BREADCRUMBS ============ -->
    <section class="pt-32 pb-12 sm:pt-40 sm:pb-16 bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] border-b border-slate-200 dark:border-slate-800 relative overflow-hidden">
        <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-96 h-96 bg-slate-blue/10 dark:bg-slate-blue/5 blur-3xl rounded-full pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <div class="text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-4 flex items-center gap-2 flex-wrap">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <span class="text-slate-400 dark:text-slate-600">/</span>
                <a href="{{ route('blog') }}" class="hover:underline">Blog</a>
                @if($blog->category)
                    <span class="text-slate-400 dark:text-slate-600">/</span>
                    <span class="text-slate-700 dark:text-slate-300">{{ $blog->category->name }}</span>
                @endif
            </div>

            <!-- Category Badge & Read Time -->
            <div class="flex items-center gap-3 mb-4 flex-wrap">
                @if($blog->category)
                    <span class="bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white text-xs font-extrabold tracking-wider uppercase px-3 py-1 rounded-md shadow-sm">
                        {{ $blog->category->name }}
                    </span>
                @endif
                <span class="text-xs font-bold text-slate-500 dark:text-slate-400">
                    {{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'Published Recently' }}
                </span>
                <span class="text-slate-300 dark:text-slate-700">•</span>
                <span class="text-xs font-bold text-slate-500 dark:text-slate-400">
                    {{ max(1, ceil(str_word_count(strip_tags($blog->main_content ?? $blog->description ?? '')) / 200)) }} min read
                </span>
            </div>

            <!-- Title -->
            <h1 class="font-heading font-extrabold text-3xl sm:text-5xl lg:text-6xl text-[#0D1B33] dark:text-white mb-6 leading-tight tracking-tight">
                {{ $blog->name }}
            </h1>

            <!-- Author info -->
            <div class="flex items-center gap-4 pt-4 border-t border-slate-200 dark:border-slate-800/80">
                <img src="{{ asset('alanhumphreys/head.jpeg') }}"
                     alt="Alan Humphreys"
                     class="w-12 h-12 rounded-full object-cover border-2 border-slate-blue shadow-md">
                <div>
                    <div class="font-heading font-bold text-sm text-[#0D1B33] dark:text-white">
                        {{ $blog->user?->name ?? 'Alan Humphreys' }}
                    </div>
                    <div class="text-xs font-semibold text-slate-blue dark:text-slate-blue-light">
                        Certified Trichologist &amp; 25-Year Industry Expert
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ MAIN ARTICLE CONTENT ============ -->
    <section class="py-12 sm:py-16 bg-white dark:bg-[#050B14]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Featured Image -->
            @if($blog->image)
                <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-800 bg-slate-100 dark:bg-[#070D18]">
                    <img src="{{ $blog->image_url ?? uploads_asset($blog->image) }}"
                         alt="{{ $blog->name }}"
                         class="w-full max-h-[500px] object-cover object-top">
                </div>
            @endif

            <!-- Excerpt Callout -->
            @if($blog->description)
                <div class="p-6 sm:p-8 bg-slate-50 dark:bg-[#0E1A2D] border-l-4 border-slate-blue rounded-r-2xl shadow-sm mb-10 text-slate-800 dark:text-slate-200 text-base sm:text-xl font-medium leading-relaxed italic">
                    "{{ $blog->description }}"
                </div>
            @endif

            <!-- Article Body -->
            <div class="prose prose-lg dark:prose-invert max-w-none text-slate-800 dark:text-slate-200 leading-relaxed font-medium space-y-6">
                @if($blog->main_content)
                    {!! $blog->main_content !!}
                @else
                    <p>No detailed content provided for this article yet.</p>
                @endif
            </div>

            <!-- SEO Tags / Topics -->
            @if($blog->seo_keywords || $blog->seo_tags)
                @php
                    $tags = array_filter(array_map('trim', explode(',', $blog->seo_keywords ?? $blog->seo_tags)));
                @endphp
                @if(count($tags) > 0)
                    <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 block mb-3">Topic Keywords:</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <span class="bg-slate-100 dark:bg-[#0E1A2D] text-slate-blue dark:text-slate-blue-light px-3.5 py-1.5 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-800">
                                    #{{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif

            <!-- Author Card at Article End -->
            <div class="mt-12 p-6 sm:p-8 bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 rounded-3xl shadow-lg flex flex-col sm:flex-row items-center gap-6">
                <img src="{{ asset('alanhumphreys/head.jpeg') }}"
                     alt="Alan Humphreys"
                     class="w-24 h-24 rounded-full object-cover border-4 border-slate-blue shadow-md shrink-0">
                <div class="text-center sm:text-left">
                    <h3 class="font-heading font-bold text-xl text-[#0D1B33] dark:text-white mb-2">
                        Written by {{ $blog->user?->name ?? 'Alan Humphreys' }}
                    </h3>
                    <p class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-medium leading-relaxed mb-4">
                        Alan Humphreys is a certified trichologist with over 25 years of hands-on experience in hair restoration, studio management, and sales coaching.
                    </p>
                    <a href="{{ route('about') }}" class="inline-block text-xs font-bold text-slate-blue dark:text-slate-blue-light hover:underline">
                        Learn More About Alan →
                    </a>
                </div>
            </div>

            <!-- Back to Blog Button -->
            <div class="mt-8 text-center sm:text-left">
                <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 font-bold text-xs uppercase tracking-wider text-slate-700 dark:text-slate-300 hover:text-slate-blue transition-colors">
                    ← Back to All Articles
                </a>
            </div>

        </div>
    </section>

    <!-- ============ RELATED ARTICLES ============ -->
    @if(isset($relatedBlogs) && count($relatedBlogs) > 0)
        <section class="py-16 bg-slate-100 dark:bg-[#070D18] transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2">
                        Keep Reading
                    </span>
                    <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white">
                        Related Articles &amp; Insights
                    </h2>
                    <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto mt-4"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedBlogs as $rel)
                        <article class="bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <div class="h-48 relative overflow-hidden bg-slate-200 dark:bg-[#070D18]">
                                    @if($rel->image)
                                        <img src="{{ $rel->image_url ?? uploads_asset($rel->image) }}"
                                             alt="{{ $rel->name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-4xl text-slate-blue">📰</div>
                                    @endif
                                    @if($rel->category)
                                        <span class="absolute top-3 left-3 bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white text-[0.65rem] font-bold tracking-wider uppercase px-2.5 py-1 rounded">
                                            {{ $rel->category->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <div class="text-[0.7rem] font-bold text-slate-500 dark:text-slate-400 mb-2">
                                        {{ $rel->created_at ? $rel->created_at->format('M d, Y') : 'Recent' }}
                                    </div>
                                    <h3 class="font-heading font-bold text-base text-[#0D1B33] dark:text-white mb-2 leading-snug">
                                        <a href="{{ route('blog.show', $rel->slug) }}" class="hover:text-slate-blue transition-colors">
                                            {{ $rel->name }}
                                        </a>
                                    </h3>
                                    <p class="text-slate-700 dark:text-slate-300 text-xs font-medium leading-relaxed line-clamp-3">
                                        {{ Str::limit(strip_tags($rel->description ?? $rel->main_content), 120) }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <a href="{{ route('blog.show', $rel->slug) }}" class="font-bold text-xs text-slate-blue dark:text-slate-blue-light hover:underline">
                                    Read Article →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ============ CTA BANNER ============ -->
    <section class="py-20 bg-[#0D1B33] text-center text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-blue/10 via-transparent to-slate-blue/10 pointer-events-none"></div>
        <div class="max-w-4xl mx-auto px-4 relative z-10 space-y-6">
            <h2 class="font-heading font-bold text-3xl sm:text-5xl text-white">
                Have Questions About Your Hair Studio or Hair Journey?
            </h2>
            <p class="text-slate-300 text-base sm:text-lg max-w-xl mx-auto font-medium leading-relaxed">
                Schedule a 1-on-1 private consultation with Alan to discuss your studio growth, client retention, or trichology services.
            </p>
            <div class="pt-2">
                <a href="{{ route('home') }}#contact" class="inline-block bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-extrabold px-9 py-4 rounded-xl text-xs sm:text-sm tracking-widest uppercase shadow-xl shadow-slate-blue/20 hover:shadow-slate-blue/40 hover:-translate-y-1 transition-all duration-300">
                    Schedule Private Consultation →
                </a>
            </div>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />
</div>
