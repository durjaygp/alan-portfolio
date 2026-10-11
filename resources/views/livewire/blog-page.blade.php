<div class="relative min-h-screen">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ============ PAGE BANNER ============ -->
    <section class="pt-32 pb-16 bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-3">
                <a href="{{ route('home') }}" class="hover:underline">Home</a> <span class="mx-1">/</span> Blog
            </div>
            <h1 class="font-heading font-extrabold text-4xl sm:text-6xl text-[#0D1B33] dark:text-white mb-4">
                Real Talk &amp; Industry Insights
            </h1>
            <p class="text-slate-800 dark:text-slate-300 text-base sm:text-xl font-medium max-w-2xl leading-relaxed">
                25 years in the trenches of hair loss, salon management, and trichology. Straightforward thoughts, practical strategies, and personal lessons.
            </p>
        </div>
    </section>

    <!-- ============ FEATURED POST ============ -->
    @if(isset($featuredBlog) && $featuredBlog)
        <section class="py-12 bg-white dark:bg-[#050B14] transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-slate-100 dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-3xl overflow-hidden shadow-lg grid grid-cols-1 lg:grid-cols-12 items-center">
                    <div class="lg:col-span-5 relative h-72 lg:h-full min-h-[300px]">
                        @if($featuredBlog->image)
                            <img src="{{ $featuredBlog->image_url ?? uploads_asset($featuredBlog->image) }}"
                                 alt="{{ $featuredBlog->name }}"
                                 class="w-full h-full object-cover object-top">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-6xl text-slate-blue bg-slate-200 dark:bg-[#070D18]">📰</div>
                        @endif
                        <span class="absolute top-4 left-4 bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold text-[0.7rem] uppercase tracking-wider px-3 py-1 rounded shadow-md">
                            Featured Article
                        </span>
                    </div>
                    <div class="lg:col-span-7 p-6 sm:p-10">
                        <div class="text-xs font-bold text-slate-blue dark:text-slate-blue-light uppercase tracking-wider mb-2">
                            {{ $featuredBlog->category?->name ?? 'Insight' }} · {{ $featuredBlog->created_at ? $featuredBlog->created_at->format('M d, Y') : 'Recent' }}
                        </div>
                        <h2 class="font-heading font-bold text-2xl sm:text-3xl text-[#0D1B33] dark:text-white mb-4 leading-tight">
                            <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors">
                                {{ $featuredBlog->name }}
                            </a>
                        </h2>
                        <p class="text-slate-800 dark:text-slate-300 text-sm sm:text-base font-medium leading-relaxed mb-6">
                            {{ Str::limit(strip_tags($featuredBlog->description ?? $featuredBlog->main_content), 240) }}
                        </p>
                        <div class="flex items-center justify-between flex-wrap gap-4 pt-4 border-t border-slate-300 dark:border-slate-800">
                            <span class="text-xs font-bold text-slate-700 dark:text-slate-300">By {{ $featuredBlog->user?->name ?? 'Alan Humphreys' }}</span>
                            <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold px-5 py-2.5 rounded text-xs uppercase tracking-wider shadow hover:-translate-y-0.5 transition-all">
                                Read Full Article →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- ============ MAIN BLOG SECTION ============ -->
    <section class="py-16 bg-slate-100 dark:bg-[#070D18] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-12">
                <button wire:click="setCategory('all')"
                        type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm
                               {{ $activeCategory === 'all' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white' : 'bg-white dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800 border border-slate-300 dark:border-slate-800' }}">
                    All Articles
                </button>
                @foreach ($categories as $cat)
                <button wire:click="setCategory('{{ $cat->slug }}')"
                        type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm
                               {{ $activeCategory === $cat->slug ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white' : 'bg-white dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800 border border-slate-300 dark:border-slate-800' }}">
                    {{ $cat->name }}
                </button>
                @endforeach
            </div>

            <!-- Articles + Sidebar Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <!-- Articles Column -->
                <div class="lg:col-span-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">

                        @forelse ($blogs as $blog)
                        <article class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <div class="h-48 relative overflow-hidden bg-slate-200 dark:bg-[#070D18]">
                                    @if ($blog->image)
                                        <img src="{{ $blog->image_url ?? uploads_asset($blog->image) }}" alt="{{ $blog->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-4xl bg-slate-100 dark:bg-[#0E1A2D] text-slate-blue">📰</div>
                                    @endif
                                    @if ($blog->category)
                                    <span class="absolute top-3 left-3 bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white text-[0.65rem] font-bold tracking-wider uppercase px-2.5 py-1 rounded">
                                        {{ $blog->category->name }}
                                    </span>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <div class="text-[0.7rem] font-bold text-slate-600 dark:text-slate-400 mb-2">
                                        {{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'Recent' }}
                                    </div>
                                    <h3 class="font-heading font-bold text-lg text-[#0D1B33] dark:text-white mb-3 leading-snug">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="hover:text-slate-blue dark:hover:text-slate-blue-light transition-colors">
                                            {{ $blog->name }}
                                        </a>
                                    </h3>
                                    <p class="text-slate-700 dark:text-slate-300 text-xs font-medium leading-relaxed mb-4">
                                        {{ Str::limit(strip_tags($blog->description ?? $blog->main_content), 140) }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="font-bold text-xs text-slate-blue dark:text-slate-blue-light hover:underline">
                                    Read Story →
                                </a>
                            </div>
                        </article>
                        @empty
                        <div class="col-span-2 py-12 text-center text-slate-500">
                            No articles found matching your criteria.
                        </div>
                        @endforelse

                    </div>
                </div>

                <!-- Sidebar Widget Column -->
                <div class="lg:col-span-4 space-y-8">

                    <!-- Search Widget -->
                    <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-md">
                        <h4 class="font-heading font-bold text-base text-[#0D1B33] dark:text-white mb-4">Search Insights</h4>
                        <div class="relative">
                            <input type="text" wire:model.live="searchQuery" placeholder="Search topics, adhesives..."
                                   class="w-full px-4 py-3 bg-slate-50 dark:bg-[#050B14] border border-slate-300 dark:border-slate-700 rounded-xl text-xs font-medium focus:border-slate-blue focus:ring-2 focus:ring-slate-blue/30 outline-none text-slate-900 dark:text-white">
                            <span class="absolute right-3 top-3 text-sm">🔍</span>
                        </div>
                    </div>

                    <!-- Author Bio Widget -->
                    <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-md text-center">
                        <img src="{{ asset('alanhumphreys/head.jpeg') }}" alt="Alan Humphreys" class="w-20 h-20 rounded-full mx-auto object-cover border-2 border-slate-blue shadow mb-4">
                        <h4 class="font-heading font-bold text-base text-[#0D1B33] dark:text-white mb-1">About Alan Humphreys</h4>
                        <p class="text-xs text-slate-700 dark:text-slate-300 font-medium leading-relaxed mb-4">
                            Certified Trichologist &amp; 25-Year Industry Veteran. I share practical wisdom for hair system wearers and growth strategies for salon owners.
                        </p>
                        <a href="{{ route('about') }}" class="inline-block text-xs font-bold text-slate-blue dark:text-slate-blue-light hover:underline">Read My Full Bio →</a>
                    </div>

                    <!-- Newsletter Signup Widget -->
                    <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-md">
                        <div class="text-2xl mb-2 text-center">✉️</div>
                        <h4 class="font-heading font-bold text-base text-[#0D1B33] dark:text-white text-center mb-1">Alan's Weekly Notes</h4>
                        <p class="text-xs text-slate-700 dark:text-slate-300 font-medium text-center mb-4 leading-relaxed">
                            Get zero-fluff trichology tips and studio growth insights sent straight to your inbox once a week.
                        </p>

                        @if ($subscribed)
                            <div class="bg-green-50 dark:bg-green-900/30 border border-green-300 text-green-800 dark:text-green-300 p-3 rounded-xl text-center text-xs font-bold">
                                ✅ Subscribed! Thank you for joining.
                            </div>
                        @else
                            <form wire:submit.prevent="subscribeNewsletter" class="space-y-3">
                                <div>
                                    <input type="email" wire:model="newsletterEmail" placeholder="Your email address"
                                           class="w-full px-4 py-2.5 bg-slate-50 dark:bg-[#050B14] border border-slate-300 dark:border-slate-700 rounded-xl text-xs font-medium text-slate-900 dark:text-white outline-none focus:border-slate-blue">
                                    @error('newsletterEmail') <span class="text-red-600 text-[0.7rem] block mt-1">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="w-full bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold py-2.5 rounded-xl text-xs uppercase tracking-wider shadow">
                                    Subscribe Free
                                </button>
                            </form>
                        @endif
                        <span class="block text-[0.65rem] text-slate-500 dark:text-slate-400 text-center mt-3">🔒 No spam ever. Unsubscribe anytime.</span>
                    </div>

                    <!-- Topics Cloud -->
                    <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-md">
                        <h4 class="font-heading font-bold text-base text-[#0D1B33] dark:text-white mb-4">Explore Topics</h4>
                        <div class="flex flex-wrap gap-2 text-xs font-bold">
                            @foreach($categories as $cat)
                                <button type="button" wire:click="setCategory('{{ $cat->slug }}')" class="bg-slate-100 dark:bg-[#070D18] text-slate-blue dark:text-slate-blue-light px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-800 hover:border-slate-blue transition-colors">
                                    #{{ $cat->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============ CTA BANNER ============ -->
    <section class="py-20 bg-[#0D1B33] text-center text-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Want Custom Guidance for Your Studio or Hair Journey?</h2>
            <p class="text-slate-300 text-base max-w-lg mx-auto mb-8 font-medium">
                Book a 1-on-1 private consultation call with Alan to review your studio operations or personalized hair restoration roadmap.
            </p>
            <a href="{{ route('home') }}#contact" class="inline-block bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold px-8 py-3.5 rounded text-xs tracking-widest uppercase shadow-lg hover:shadow-slate-blue/30 hover:-translate-y-0.5 transition-all">
                Schedule Private Call
            </a>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />
</div>
