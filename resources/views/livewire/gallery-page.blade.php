<div class="relative min-h-screen bg-slate-50 dark:bg-[#070D18] text-[#0D1B33] dark:text-slate-100 transition-colors duration-300"
     x-data="{
        lightboxOpen: false,
        activeItem: null,
        baSliderPos: 50,
        comparisonMode: 'slider', // 'slider' | 'split' | 'toggle'
        toggleState: 'after',     // 'before' | 'after'
        openLightbox(item) {
            this.activeItem = item;
            this.lightboxOpen = true;
            this.baSliderPos = 50;
            this.comparisonMode = 'slider';
            this.toggleState = 'after';
            document.body.style.overflow = 'hidden';
        },
        closeLightbox() {
            this.lightboxOpen = false;
            this.activeItem = null;
            document.body.style.overflow = 'auto';
        }
     }"
     @keydown.escape.window="closeLightbox()">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ==================== HERO HEADER / BANNER ==================== -->
    <section class="pt-32 pb-14 sm:pt-40 sm:pb-18 bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] border-b border-slate-200 dark:border-slate-800 relative overflow-hidden px-4 sm:px-6 lg:px-8">
        <!-- Background Ambient Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-gradient-to-b from-slate-blue/15 via-slate-blue/5 to-transparent blur-3xl pointer-events-none -z-10"></div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <!-- Breadcrumb Navigation -->
            <div class="text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-4 flex items-center justify-center gap-2">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <span class="text-slate-400 dark:text-slate-600">/</span>
                <span class="text-slate-700 dark:text-slate-300">Gallery & Showcase</span>
            </div>

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light bg-slate-blue/10 dark:bg-slate-blue/15 border border-slate-blue/25 mb-5 backdrop-blur-sm shadow-sm">
                <svg class="w-3.5 h-3.5 text-slate-blue dark:text-slate-blue-light" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                </svg>
                <span>Visual Portfolio & Transformations</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight font-heading leading-tight mb-6">
                Real People. Proven Results.<br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-slate-blue via-slate-blue-light to-blue-400">
                    Undetectable Transformations.
                </span>
            </h1>

            <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto font-medium leading-relaxed mb-8">
                Explore Alan Humphreys’ clinical trichology cases, precision non-surgical hair replacement artistry, international speaking stages, and masterclass certifications.
            </p>

            <!-- Quick Stats Strip -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-6 max-w-4xl mx-auto pt-2">
                <div class="p-4 rounded-2xl bg-white/80 dark:bg-[#0E1A2D]/80 border border-slate-200/80 dark:border-slate-800/80 shadow-sm backdrop-blur-sm">
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-blue dark:text-slate-blue-light font-heading">25+</div>
                    <div class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Years Experience</div>
                </div>
                <div class="p-4 rounded-2xl bg-white/80 dark:bg-[#0E1A2D]/80 border border-slate-200/80 dark:border-slate-800/80 shadow-sm backdrop-blur-sm">
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-blue dark:text-slate-blue-light font-heading">100%</div>
                    <div class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Custom Fit Systems</div>
                </div>
                <div class="p-4 rounded-2xl bg-white/80 dark:bg-[#0E1A2D]/80 border border-slate-200/80 dark:border-slate-800/80 shadow-sm backdrop-blur-sm">
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-blue dark:text-slate-blue-light font-heading">500+</div>
                    <div class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Salons Trained</div>
                </div>
                <div class="p-4 rounded-2xl bg-white/80 dark:bg-[#0E1A2D]/80 border border-slate-200/80 dark:border-slate-800/80 shadow-sm backdrop-blur-sm">
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-blue dark:text-slate-blue-light font-heading">Top Rated</div>
                    <div class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Clinical Trichologist</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FILTER & SEARCH BAR ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 mt-8">
        <div class="p-4 sm:p-5 rounded-2xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
            
            <!-- Category Pills (Horizontal Scrollable on Mobile) -->
            <div class="w-full md:w-auto flex items-center gap-2 overflow-x-auto pb-2 md:pb-0 scrollbar-none">
                <button wire:click="setCategory('all')"
                        class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer {{ $activeCategory === 'all' ? 'bg-gradient-to-r from-slate-blue to-slate-blue-light text-white shadow-md shadow-slate-blue/20' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700' }}">
                    All Items ({{ $totalCount }})
                </button>

                @foreach($categories as $category)
                    <button wire:click="setCategory('{{ $category }}')"
                            class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer {{ $activeCategory === $category ? 'bg-gradient-to-r from-slate-blue to-slate-blue-light text-white shadow-md shadow-slate-blue/20' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700' }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            <!-- Search Input -->
            <div class="w-full md:w-72 relative">
                <input type="text"
                       wire:model.live.debounce.300ms="search"
                       placeholder="Search gallery..."
                       class="w-full pl-10 pr-4 py-2 rounded-xl text-xs bg-slate-50 dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-blue transition-all">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                @if($search)
                    <button wire:click="$set('search', '')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-white text-xs">
                        ✕
                    </button>
                @endif
            </div>

        </div>
    </section>

    <!-- ==================== GALLERY GRID ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if($items->isEmpty())
            <div class="text-center py-20 bg-white dark:bg-[#0E1A2D] rounded-3xl border border-slate-200 dark:border-slate-800 p-8">
                <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center mx-auto mb-4 text-2xl">
                    🔍
                </div>
                <h3 class="text-lg font-bold text-[#0D1B33] dark:text-white mb-2">No Gallery Items Found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 max-w-md mx-auto mb-6">
                    We couldn't find any items matching your filter or search query. Try choosing another category or clearing your search.
                </p>
                <button wire:click="resetFilters"
                        class="px-5 py-2.5 rounded-xl bg-slate-blue text-white text-xs font-bold uppercase tracking-wider hover:bg-slate-blue-light transition-all shadow-md">
                    Reset Filters
                </button>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($items as $item)
                    <div class="group bg-white dark:bg-[#0E1A2D] border border-slate-200/90 dark:border-slate-800/90 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-slate-blue/40 dark:hover:border-slate-blue-light/40 transition-all duration-300 flex flex-col justify-between"
                         data-item-id="{{ $item->id }}">
                        
                        <!-- Media Container / Preview -->
                        <div class="relative aspect-4/3 overflow-hidden bg-slate-950 cursor-pointer"
                             @click="openLightbox({{ Js::from([
                                 'id' => $item->id,
                                 'title' => $item->title,
                                 'subtitle' => $item->subtitle,
                                 'category' => $item->category,
                                 'image' => $item->image_url,
                                 'before_image' => $item->before_image_url,
                                 'after_image' => $item->after_image_url,
                                 'is_before_after' => (bool)($item->is_before_after && $item->before_image_url && $item->after_image_url),
                                 'description' => $item->description,
                                 'client_name' => $item->client_name,
                                 'service_type' => $item->service_type,
                                 'timeframe' => $item->timeframe,
                                 'badge' => $item->badge,
                             ]) }})">
                            
                            @if($item->is_before_after && $item->before_image_url && $item->after_image_url)
                                <!-- Before/After Split Preview Thumbnail with Interactive Indicator -->
                                <div class="w-full h-full relative group-hover:scale-105 transition-transform duration-500">
                                    <div class="w-full h-full grid grid-cols-2">
                                        <div class="relative h-full overflow-hidden border-r-2 border-white/40">
                                            <img src="{{ $item->before_image_url }}" alt="Before {{ $item->title }}" class="w-full h-full object-cover object-center" loading="lazy">
                                            <span class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-black/80 backdrop-blur-xs text-[10px] font-black uppercase text-white tracking-widest border border-white/20">
                                                Before
                                            </span>
                                        </div>
                                        <div class="relative h-full overflow-hidden">
                                            <img src="{{ $item->after_image_url }}" alt="After {{ $item->title }}" class="w-full h-full object-cover object-center" loading="lazy">
                                            <span class="absolute bottom-2 right-2 px-2 py-0.5 rounded bg-slate-blue/95 backdrop-blur-xs text-[10px] font-black uppercase text-white tracking-widest border border-white/20">
                                                After
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Center Drag Indicator Icon -->
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/70 backdrop-blur-sm border border-white/40 text-white flex items-center justify-center text-xs font-bold shadow-lg pointer-events-none">
                                        ↔
                                    </div>
                                </div>
                            @else
                                <!-- Single Image Thumbnail -->
                                <img src="{{ $item->image_url }}"
                                     alt="{{ $item->title }}"
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                                     loading="lazy">
                            @endif

                            <!-- Gradient Overlay on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-between p-4">
                                <span class="text-white text-xs font-bold tracking-wide flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-slate-blue-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    @if($item->is_before_after && $item->before_image_url && $item->after_image_url)
                                        Compare Transformation ↔
                                    @else
                                        View Full Showcase
                                    @endif
                                </span>
                                <span class="w-8 h-8 rounded-full bg-slate-blue text-white flex items-center justify-center text-xs shadow-md font-bold">
                                    ↗
                                </span>
                            </div>

                            <!-- Badges (Top Left & Right) -->
                            <div class="absolute top-3 left-3 flex flex-wrap gap-1.5 pointer-events-none">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wider bg-slate-900/85 backdrop-blur-md text-white border border-white/15 shadow-sm">
                                    {{ $item->category }}
                                </span>
                                @if($item->badge)
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-extrabold uppercase tracking-wider bg-gradient-to-r from-slate-blue to-slate-blue-light text-white shadow-sm">
                                        {{ $item->badge }}
                                    </span>
                                @endif
                            </div>

                            @if($item->is_before_after && $item->before_image_url && $item->after_image_url)
                                <div class="absolute top-3 right-3 pointer-events-none">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-widest bg-emerald-600/90 text-white shadow-sm flex items-center gap-1.5 border border-white/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> B/A Slider
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Content -->
                        <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                            <div>
                                @if($item->service_type)
                                    <div class="text-[11px] font-bold uppercase tracking-wider text-slate-blue dark:text-slate-blue-light mb-1">
                                        {{ $item->service_type }}
                                    </div>
                                @endif

                                <h3 class="text-base sm:text-lg font-bold text-[#0D1B33] dark:text-white font-heading leading-snug mb-2 group-hover:text-slate-blue dark:group-hover:text-slate-blue-light transition-colors">
                                    {{ $item->title }}
                                </h3>

                                @if($item->subtitle)
                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium mb-3 line-clamp-2">
                                        {{ $item->subtitle }}
                                    </p>
                                @endif

                                @if($item->description)
                                    <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 leading-relaxed mb-4">
                                        {{ $item->description }}
                                    </p>
                                @endif
                            </div>

                            <!-- Footer Meta Details -->
                            <div class="pt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400">
                                @if($item->client_name)
                                    <span class="flex items-center gap-1 font-medium truncate max-w-[65%]">
                                        <span>📍</span> {{ $item->client_name }}
                                    </span>
                                @else
                                    <span class="font-medium">Alan Humphreys Clinic</span>
                                @endif

                                @if($item->timeframe)
                                    <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 font-semibold text-[11px] text-slate-700 dark:text-slate-300 whitespace-nowrap">
                                        {{ $item->timeframe }}
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </section>

    <!-- ==================== LIGHTBOX / CASE MODAL ==================== -->
    <div x-show="lightboxOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 lg:p-10 bg-black/90 backdrop-blur-md"
         x-cloak>

        <!-- Modal Card -->
        <div @click.away="closeLightbox()"
             class="relative w-full max-w-5xl max-h-[92vh] bg-white dark:bg-[#0E1A2D] rounded-3xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-800 flex flex-col lg:flex-row">
            
            <!-- Close Button -->
            <button @click="closeLightbox()"
                    class="absolute top-4 right-4 z-30 w-10 h-10 rounded-full bg-black/70 hover:bg-black text-white flex items-center justify-center text-lg font-bold transition-all cursor-pointer shadow-lg border border-white/20"
                    aria-label="Close modal">
                ✕
            </button>

            <!-- Left Visual Showcase (Interactive B/A or Single Image) -->
            <div class="w-full lg:w-3/5 bg-slate-950 flex flex-col items-center justify-center relative min-h-[340px] sm:min-h-[460px] max-h-[55vh] lg:max-h-none overflow-hidden">
                
                <template x-if="activeItem && activeItem.is_before_after">
                    <div class="relative w-full h-full flex flex-col justify-between overflow-hidden select-none bg-slate-950">
                        
                        <!-- Top Comparison Controls Bar -->
                        <div class="absolute top-4 left-4 right-16 z-20 flex items-center justify-between gap-2 pointer-events-none">
                            <!-- Comparison Mode Tabs -->
                            <div class="flex items-center gap-1 p-1 rounded-xl bg-black/75 backdrop-blur-md border border-white/20 shadow-lg pointer-events-auto">
                                <button @click="comparisonMode = 'slider'"
                                        :class="comparisonMode === 'slider' ? 'bg-slate-blue text-white shadow-sm' : 'text-slate-300 hover:text-white'"
                                        class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-wider transition-all cursor-pointer">
                                    ↔ Split Slider
                                </button>
                                <button @click="comparisonMode = 'split'"
                                        :class="comparisonMode === 'split' ? 'bg-slate-blue text-white shadow-sm' : 'text-slate-300 hover:text-white'"
                                        class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-wider transition-all cursor-pointer">
                                    ◫ Side-by-Side
                                </button>
                                <button @click="comparisonMode = 'toggle'"
                                        :class="comparisonMode === 'toggle' ? 'bg-slate-blue text-white shadow-sm' : 'text-slate-300 hover:text-white'"
                                        class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-wider transition-all cursor-pointer">
                                    🔄 Tap Toggle
                                </button>
                            </div>
                        </div>

                        <!-- 1. SLIDER COMPARISON MODE -->
                        <div x-show="comparisonMode === 'slider'"
                             class="relative w-full h-full min-h-[340px] sm:min-h-[460px] flex items-center justify-center overflow-hidden">
                            
                            <!-- After Image (Full background) -->
                            <img :src="activeItem.after_image"
                                 alt="After Result"
                                 class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none">

                            <!-- Before Image (Clipped dynamically via CSS clip-path for 100% pixel-perfect alignment) -->
                            <img :src="activeItem.before_image"
                                 alt="Before Result"
                                 class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none"
                                 :style="`clip-path: polygon(0 0, ${baSliderPos}% 0, ${baSliderPos}% 100%, 0 100%)`">

                            <!-- Split Line & Custom Glow Handle -->
                            <div class="absolute top-0 bottom-0 w-0.5 bg-white shadow-[0_0_12px_rgba(0,0,0,0.8)] pointer-events-none z-10"
                                 :style="`left: ${baSliderPos}%`">
                                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-slate-blue/95 backdrop-blur-sm text-white flex items-center justify-center text-sm shadow-2xl font-black border-2 border-white pointer-events-none">
                                    ↔
                                </div>
                            </div>

                            <!-- Permanent High-Contrast Badges -->
                            <span class="absolute top-16 left-4 z-10 px-3 py-1 rounded-lg bg-black/80 backdrop-blur-md text-white text-xs font-black uppercase tracking-widest pointer-events-none border border-white/20 shadow-md">
                                Before
                            </span>
                            <span class="absolute top-16 right-4 z-10 px-3 py-1 rounded-lg bg-slate-blue/95 backdrop-blur-md text-white text-xs font-black uppercase tracking-widest pointer-events-none border border-white/20 shadow-md">
                                After
                            </span>

                            <!-- Percentage Indicator Pill & Reset Button at Bottom -->
                            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-10 flex items-center gap-2 pointer-events-auto">
                                <div class="px-3 py-1 rounded-full bg-black/80 backdrop-blur-md text-white text-[11px] font-bold tracking-wider border border-white/20 shadow-md">
                                    <span x-text="`${Math.round(baSliderPos)}% Before`"></span> · <span x-text="`${100 - Math.round(baSliderPos)}% After`"></span>
                                </div>
                                <button @click="baSliderPos = 50"
                                        class="px-2.5 py-1 rounded-full bg-slate-800/90 hover:bg-slate-700 text-white text-[10px] font-bold uppercase tracking-wider border border-white/20 cursor-pointer shadow-md transition-all">
                                    Center 50%
                                </button>
                            </div>

                            <!-- Transparent native range input over entire container for smooth touch, mouse drag & arrow keys -->
                            <input type="range"
                                   min="0"
                                   max="100"
                                   step="0.5"
                                   x-model="baSliderPos"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-ew-resize z-10"
                                   aria-label="Before and after comparison slider">
                        </div>

                        <!-- 2. SIDE-BY-SIDE MODE -->
                        <div x-show="comparisonMode === 'split'"
                             class="w-full h-full min-h-[340px] sm:min-h-[460px] grid grid-cols-1 sm:grid-cols-2 gap-2 p-3 pt-16 bg-slate-950">
                            <div class="relative h-full min-h-[200px] rounded-2xl overflow-hidden border border-white/15 bg-black">
                                <img :src="activeItem.before_image" alt="Before" class="w-full h-full object-cover">
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-lg bg-black/80 text-white text-xs font-black uppercase tracking-widest border border-white/20 shadow-md">
                                    Before
                                </span>
                            </div>
                            <div class="relative h-full min-h-[200px] rounded-2xl overflow-hidden border border-white/15 bg-black">
                                <img :src="activeItem.after_image" alt="After" class="w-full h-full object-cover">
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-lg bg-slate-blue/95 text-white text-xs font-black uppercase tracking-widest border border-white/20 shadow-md">
                                    After
                                </span>
                            </div>
                        </div>

                        <!-- 3. INSTANT TAP TOGGLE MODE -->
                        <div x-show="comparisonMode === 'toggle'"
                             class="relative w-full h-full min-h-[340px] sm:min-h-[460px] flex items-center justify-center bg-black pt-12 overflow-hidden">
                            <img :src="toggleState === 'before' ? activeItem.before_image : activeItem.after_image"
                                 :alt="toggleState"
                                 class="w-full h-full object-cover transition-opacity duration-300">
                            
                            <span class="absolute top-16 left-4 px-3 py-1.5 rounded-lg text-white text-xs font-black uppercase tracking-widest shadow-md border border-white/20"
                                  :class="toggleState === 'before' ? 'bg-black/90' : 'bg-slate-blue/95'"
                                  x-text="toggleState === 'before' ? 'VIEWING: BEFORE RESTORATION' : 'VIEWING: AFTER RESTORATION'">
                            </span>

                            <button @click="toggleState = (toggleState === 'before' ? 'after' : 'before')"
                                    class="absolute bottom-5 left-1/2 -translate-x-1/2 px-6 py-2.5 rounded-full bg-white hover:bg-slate-100 text-slate-950 font-extrabold text-xs uppercase tracking-wider shadow-2xl flex items-center gap-2 cursor-pointer transition-all hover:scale-105 border border-slate-300">
                                🔄 Switch to <span class="text-slate-blue" x-text="toggleState === 'before' ? 'AFTER' : 'BEFORE'"></span>
                            </button>
                        </div>

                    </div>
                </template>

                <template x-if="activeItem && !activeItem.is_before_after">
                    <!-- Standard High-Res Image -->
                    <img :src="activeItem.image"
                         :alt="activeItem.title"
                         class="w-full h-full object-contain max-h-[80vh] p-4">
                </template>
            </div>

            <!-- Right Details Panel -->
            <div class="w-full lg:w-2/5 p-6 sm:p-8 flex flex-col justify-between overflow-y-auto max-h-[45vh] lg:max-h-none">
                <div>
                    <!-- Category & Badge -->
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-slate-100 dark:bg-slate-800 text-slate-blue dark:text-slate-blue-light"
                              x-text="activeItem ? activeItem.category : ''"></span>
                        <template x-if="activeItem && activeItem.badge">
                            <span class="px-3 py-1 rounded-md text-xs font-extrabold uppercase tracking-wider bg-gradient-to-r from-slate-blue to-slate-blue-light text-white"
                                  x-text="activeItem.badge"></span>
                        </template>
                    </div>

                    <!-- Title -->
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#0D1B33] dark:text-white font-heading leading-tight mb-2"
                        x-text="activeItem ? activeItem.title : ''"></h2>

                    <!-- Subtitle -->
                    <p class="text-sm font-semibold text-slate-600 dark:text-slate-300 mb-4"
                       x-text="activeItem ? activeItem.subtitle : ''"></p>

                    <!-- Meta Tags Grid -->
                    <div class="grid grid-cols-2 gap-3 p-4 rounded-xl bg-slate-50 dark:bg-[#070D18] border border-slate-200 dark:border-slate-800 mb-5 text-xs">
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Procedure / Service</div>
                            <div class="font-bold text-[#0D1B33] dark:text-white mt-0.5" x-text="activeItem && activeItem.service_type ? activeItem.service_type : 'Hair Restoration'"></div>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Timeframe</div>
                            <div class="font-bold text-[#0D1B33] dark:text-white mt-0.5" x-text="activeItem && activeItem.timeframe ? activeItem.timeframe : 'Clinical Session'"></div>
                        </div>
                        <template x-if="activeItem && activeItem.client_name">
                            <div class="col-span-2 pt-2 border-t border-slate-200 dark:border-slate-800">
                                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Client / Location</div>
                                <div class="font-semibold text-slate-700 dark:text-slate-200 mt-0.5" x-text="activeItem.client_name"></div>
                            </div>
                        </template>
                    </div>

                    <!-- Description -->
                    <div class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                        <p x-text="activeItem ? activeItem.description : ''"></p>
                    </div>
                </div>

                <!-- Action CTA in Modal -->
                <div class="pt-6 mt-6 border-t border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('home') }}#contact"
                       @click="closeLightbox()"
                       class="flex-1 py-3 px-4 rounded-xl bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold text-xs uppercase tracking-wider text-center shadow-md hover:shadow-lg transition-all">
                        Book Similar Consultation
                    </a>
                    <a href="https://wa.me/+13037181870"
                       target="_blank"
                       class="py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider text-center flex items-center justify-center gap-1.5 transition-all">
                        💬 WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== CALL TO ACTION SECTION ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 mb-20">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#0D1B33] via-[#122340] to-[#070D18] p-8 sm:p-12 lg:p-16 text-white border border-slate-800 shadow-2xl">
            <!-- Background Glow -->
            <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-slate-blue/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest text-slate-blue-light bg-slate-blue/20 border border-slate-blue/30 mb-4">
                    Take The First Step
                </span>

                <h2 class="text-2xl sm:text-4xl font-extrabold font-heading tracking-tight mb-4 leading-tight">
                    Ready For Your Own Transformation or Salon Masterclass?
                </h2>

                <p class="text-sm sm:text-base text-slate-300 font-medium leading-relaxed mb-8">
                    Whether you are an individual exploring non-surgical hair replacement options or a salon owner looking to introduce high-revenue trichology services, Alan is available for private virtual and in-person assessments.
                </p>

                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('home') }}#contact"
                       class="bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold px-8 py-3.5 rounded-xl text-xs sm:text-sm tracking-wider uppercase shadow-xl shadow-slate-blue/30 hover:-translate-y-0.5 transition-all duration-300">
                        Schedule a Consultation
                    </a>
                    <a href="tel:+13037181870"
                       class="px-6 py-3.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-white font-bold text-xs sm:text-sm tracking-wider uppercase border border-slate-700 transition-all">
                        Call (303) 718-1870
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />

</div>
