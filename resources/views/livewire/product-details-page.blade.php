<div class="relative min-h-screen">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ============ BREADCRUMB HERO ============ -->
    <section class="pt-32 pb-8 bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <span class="mx-1">/</span>
                <a href="{{ route('products') }}" class="hover:underline">Products</a>
                <span class="mx-1">/</span>
                {{ $product?->name ?? 'Complete Hair System Care Kit' }}
            </div>
        </div>
    </section>

    <!-- ============ PRODUCT MAIN SECTION ============ -->
    <section class="py-16 bg-white dark:bg-[#050B14] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

                <!-- Left Column: Image Showcase & Guarantee Card -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="relative bg-slate-100 dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-3xl p-4 overflow-hidden shadow-lg">
                        <img src="{{ uploads_asset($selectedImage, 'alanhumphreys/images/products-kit.jpg') }}"
                             alt="{{ $product?->name ?? 'Product' }}"
                             class="w-full h-auto max-h-[480px] object-contain object-top rounded-2xl bg-white dark:bg-[#070D18] p-2 transition-all duration-300">
                        @if($product?->badge)
                            <span class="absolute top-8 left-8 bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-extrabold text-xs uppercase tracking-wider px-3.5 py-1.5 rounded-lg shadow-md">
                                {{ $product->badge }}
                            </span>
                        @endif
                    </div>

                    <!-- Thumbnails -->
                    <div class="flex flex-wrap gap-4">
                        @if ($product?->thumbnail)
                        <button wire:click="selectImage('{{ $product->thumbnail }}')"
                                type="button"
                                class="w-24 h-24 rounded-xl overflow-hidden border-2 transition-all p-1 bg-slate-100 dark:bg-[#0E1A2D] {{ $selectedImage === $product->thumbnail ? 'border-slate-blue dark:border-slate-blue-light scale-105' : 'border-slate-300 dark:border-slate-800 opacity-70 hover:opacity-100' }}">
                            <img src="{{ uploads_asset($product->thumbnail) }}" alt="{{ $product->name }} thumbnail" class="w-full h-full object-cover rounded-lg">
                        </button>
                        @endif

                        @if ($product && is_array($product->images))
                            @foreach ($product->images as $img)
                            <button wire:click="selectImage('{{ $img }}')"
                                    type="button"
                                    class="w-24 h-24 rounded-xl overflow-hidden border-2 transition-all p-1 bg-slate-100 dark:bg-[#0E1A2D] {{ $selectedImage === $img ? 'border-slate-blue dark:border-slate-blue-light scale-105' : 'border-slate-300 dark:border-slate-800 opacity-70 hover:opacity-100' }}">
                                <img src="{{ uploads_asset($img) }}" alt="Gallery view" class="w-full h-full object-cover rounded-lg">
                            </button>
                            @endforeach
                        @endif
                    </div>

                    <!-- Personal Guarantee Callout -->
                    <div class="bg-slate-100 dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ asset('alanhumphreys/head.jpeg') }}" alt="Alan Humphreys" class="w-12 h-12 rounded-full object-cover border-2 border-slate-blue shadow-sm">
                            <div>
                                <strong class="text-[#0D1B33] dark:text-white text-sm font-bold block">Alan's Personal Guarantee</strong>
                                <span class="text-[0.7rem] font-semibold text-slate-blue dark:text-slate-blue-light uppercase tracking-wider">Certified Trichologist & 25-Year Industry Veteran</span>
                            </div>
                        </div>
                        <p class="text-slate-800 dark:text-slate-300 text-xs sm:text-sm font-medium italic leading-relaxed">
                            "I've worn hair systems myself since 1994. I've tested literally hundreds of adhesives, solvents, and cleansers. This kit represents the exact 4 items I rely on daily to maintain clean bonds, healthy scalp tissue, and zero damage to the base matrix."
                        </p>
                    </div>
                </div>

                <!-- Right Column: Product Details & Purchase Options -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light">
                        {{ $product?->category?->name ?? 'Hair System Care & Maintenance' }}
                    </span>
                    <h1 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight">
                        {{ $product?->name ?? 'Complete Hair System Maintenance & Bond Care Kit' }}
                    </h1>

                    <!-- Rating Stars -->
                    <div class="flex items-center gap-3">
                        <div class="text-amber-500 text-lg">★★★★★</div>
                        <span class="text-xs font-bold text-slate-700 dark:text-slate-300">4.9 / 5.0 — Verified Client Rating</span>
                    </div>

                    <!-- Pricing -->
                    <div class="flex items-center gap-4 py-2 border-y border-slate-200 dark:border-slate-800">
                        <span class="font-heading font-extrabold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white">
                            ${{ number_format($product?->price ?? 129.00, 2) }}
                        </span>
                        @if($product?->original_price && $product->original_price > $product->price)
                            <span class="line-through text-slate-500 font-semibold text-lg">
                                ${{ number_format($product->original_price, 2) }}
                            </span>
                            @php
                                $savings = $product->original_price - $product->price;
                                $percent = round(($savings / $product->original_price) * 100);
                            @endphp
                            <span class="bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300 font-bold text-xs uppercase px-3 py-1 rounded-full border border-green-300">
                                Save ${{ number_format($savings, 2) }} ({{ $percent }}%)
                            </span>
                        @endif
                    </div>

                    <div class="text-slate-800 dark:text-slate-300 text-sm sm:text-base font-medium leading-relaxed">
                        {!! $product?->short_description ?? $product?->description ?? 'The definitive daily and weekly maintenance toolkit engineered for modern lace, skin, and hybrid hair units.' !!}
                    </div>

                    <!-- What's Included -->
                    @if(!empty($product?->included_items) && is_array($product->included_items))
                        <div class="bg-slate-50 dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                            <h4 class="font-bold text-sm text-[#0D1B33] dark:text-white uppercase tracking-wider mb-3">What's Included in the Box:</h4>
                            <ul class="space-y-2 text-xs font-medium text-slate-800 dark:text-slate-200">
                                @foreach($product->included_items as $incItem)
                                    @php
                                        $incTitle = is_array($incItem) ? ($incItem['title'] ?? $incItem['name'] ?? $incItem['item'] ?? '') : $incItem;
                                        $incDesc = is_array($incItem) ? ($incItem['description'] ?? '') : '';
                                    @endphp
                                    <li class="flex items-start gap-2">
                                        <span class="text-slate-blue font-bold">✓</span>
                                        <span><strong class="text-[#0D1B33] dark:text-white">{{ $incTitle }}</strong>@if($incDesc): {{ $incDesc }}@endif</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="bg-slate-50 dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-sm">
                            <h4 class="font-bold text-sm text-[#0D1B33] dark:text-white uppercase tracking-wider mb-3">What's Included in the Box:</h4>
                            <ul class="space-y-2 text-xs font-medium text-slate-800 dark:text-slate-200">
                                <li class="flex items-start gap-2">
                                    <span class="text-slate-blue font-bold">✓</span>
                                    <span><strong class="text-[#0D1B33] dark:text-white">Pro-Bond Medical Adhesive (2oz):</strong> Moisture-resistant 4+ week hold formula.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-slate-blue font-bold">✓</span>
                                    <span><strong class="text-[#0D1B33] dark:text-white">Citrus-Clear Adhesive Remover (4oz):</strong> Fast-acting, non-irritating citrus solvent.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-slate-blue font-bold">✓</span>
                                    <span><strong class="text-[#0D1B33] dark:text-white">Scalp Shield Anti-Perspirant Barrier (2oz):</strong> Prevents sweat breakdown & scalp itch.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-slate-blue font-bold">✓</span>
                                    <span><strong class="text-[#0D1B33] dark:text-white">UV-Protect Leave-In Restorative Spray (6oz):</strong> Blocks fading & keeps hair silky soft.</span>
                                </li>
                            </ul>
                        </div>
                    @endif

                    <!-- Options -->
                    <div class="space-y-4 pt-2">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-slate-200 mb-2">Select Base Compatibility:</label>
                            <div class="flex flex-wrap gap-2">
                                <button wire:click="setBase('All Units (Lace & Poly)')" type="button"
                                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $selectedBase === 'All Units (Lace & Poly)' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'bg-slate-100 dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 border border-slate-300 dark:border-slate-800' }}">
                                    All Units (Lace & Poly)
                                </button>
                                <button wire:click="setBase('Ultra-Thin Skin (0.03mm)')" type="button"
                                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $selectedBase === 'Ultra-Thin Skin (0.03mm)' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'bg-slate-100 dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 border border-slate-300 dark:border-slate-800' }}">
                                    Ultra-Thin Skin (0.03mm)
                                </button>
                                <button wire:click="setBase('Swiss & French Lace')" type="button"
                                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $selectedBase === 'Swiss & French Lace' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'bg-slate-100 dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 border border-slate-300 dark:border-slate-800' }}">
                                    Swiss & French Lace
                                </button>
                            </div>
                        </div>

                        <!-- Quantity Selector -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-slate-200 mb-2">Quantity:</label>
                            <div class="flex items-center gap-3">
                                <div class="inline-flex items-center border border-slate-300 dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-[#050B14] overflow-hidden">
                                    <button wire:click="decrementQty" type="button" class="px-4 py-2 text-slate-800 dark:text-white font-bold hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">-</button>
                                    <span class="px-4 py-2 font-bold text-slate-900 dark:text-white text-sm sm:w-12 text-center">{{ $quantity }}</span>
                                    <button wire:click="incrementQty" type="button" class="px-4 py-2 text-slate-800 dark:text-white font-bold hover:bg-slate-200 dark:hover:bg-slate-800 transition-colors">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action Buttons -->
                    <div class="space-y-3 pt-4">
                        <a href="{{ route('home') }}#contact" class="block w-full text-center bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold py-3.5 px-6 rounded-xl text-xs uppercase tracking-widest shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all">
                            Order Now & Get Free Maintenance Guide →
                        </a>
                        <a href="{{ route('home') }}#contact" class="block w-full text-center border-2 border-slate-blue text-slate-blue dark:text-slate-blue-light hover:bg-slate-blue hover:text-white font-bold py-3 px-6 rounded-xl text-xs uppercase tracking-widest transition-colors">
                            Book a Consultation First
                        </a>
                    </div>

                    <!-- Trust Badges -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-200 dark:border-slate-800">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🚚</span>
                            <div>
                                <strong class="text-xs text-[#0D1B33] dark:text-white font-bold block">Discreet Express Shipping</strong>
                                <span class="text-[0.7rem] text-slate-600 dark:text-slate-400 font-semibold">Plain unbranded packaging</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">🛡️</span>
                            <div>
                                <strong class="text-xs text-[#0D1B33] dark:text-white font-bold block">30-Day Comfort Guarantee</strong>
                                <span class="text-[0.7rem] text-slate-600 dark:text-slate-400 font-semibold">Full refund if not 100% satisfied</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============ DETAILED TABS SECTION ============ -->
    <section class="py-16 bg-slate-100 dark:bg-[#070D18] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Tab Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 mb-8 border-b border-slate-300 dark:border-slate-800 pb-4">
                <button wire:click="setTab('overview')" type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all {{ $activeTab === 'overview' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800' }}">
                    Routine & Instructions
                </button>
                <button wire:click="setTab('ingredients')" type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all {{ $activeTab === 'ingredients' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800' }}">
                    Ingredients & Safety
                </button>
                <button wire:click="setTab('faq')" type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all {{ $activeTab === 'faq' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800' }}">
                    Wearer FAQs
                </button>
                <button wire:click="setTab('reviews')" type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all {{ $activeTab === 'reviews' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white shadow' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800' }}">
                    Client Reviews (142)
                </button>
            </div>

            <!-- Tab 1: Overview -->
            @if ($activeTab === 'overview')
            <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 sm:p-10 shadow-md">
                <h3 class="font-heading font-bold text-2xl text-[#0D1B33] dark:text-white mb-6">
                    The 4-Step Maintenance Routine (Developed by Alan)
                </h3>
                <ol class="space-y-6 text-slate-800 dark:text-slate-300 text-sm font-medium">
                    <li class="pl-4 border-l-4 border-slate-blue">
                        <strong class="text-base text-[#0D1B33] dark:text-white font-bold block mb-1">Step 1: Gentle Release</strong>
                        <p class="leading-relaxed">Spray Citrus-Clear directly along the front lace edge. Allow 60 seconds for the citrus release agents to penetrate. Lift gently without tugging skin or pulling hairs through the lace base.</p>
                    </li>
                    <li class="pl-4 border-l-4 border-slate-blue">
                        <strong class="text-base text-[#0D1B33] dark:text-white font-bold block mb-1">Step 2: Scalp Prep & Detox</strong>
                        <p class="leading-relaxed">Wash your natural scalp with an exfoliating shampoo, then apply Scalp Shield. This creates a micro-invisible layer that blocks perspiration from softening the bond prematurely.</p>
                    </li>
                    <li class="pl-4 border-l-4 border-slate-blue">
                        <strong class="text-base text-[#0D1B33] dark:text-white font-bold block mb-1">Step 3: Precision Re-Bonding</strong>
                        <p class="leading-relaxed">Apply two paper-thin layers of Pro-Bond Medical Adhesive to the perimeter, allowing 3 minutes of tack time between layers. Press the system firmly from front hairline to crown.</p>
                    </li>
                    <li class="pl-4 border-l-4 border-slate-blue">
                        <strong class="text-base text-[#0D1B33] dark:text-white font-bold block mb-1">Step 4: Sun & Hydration Shield</strong>
                        <p class="leading-relaxed">Finish with 2 mists of UV-Protect Spray. This prevents oxidative color turning (orange/red tones) caused by UV rays and tap water minerals.</p>
                    </li>
                </ol>
            </div>
            @endif

            <!-- Tab 2: Ingredients -->
            @if ($activeTab === 'ingredients')
            <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 sm:p-10 shadow-md">
                <h3 class="font-heading font-bold text-2xl text-[#0D1B33] dark:text-white mb-4">Formula Transparency</h3>
                <p class="text-slate-800 dark:text-slate-300 text-sm font-medium leading-relaxed mb-6">
                    Every ingredient is selected for maximum skin compatibility, zero toxic fumes, and zero degradation of delicate hair system base materials.
                </p>
                <ul class="space-y-3 text-sm font-medium text-slate-800 dark:text-slate-200">
                    <li><strong class="text-[#0D1B33] dark:text-slate-blue-light font-bold">Pro-Bond:</strong> Latex-free, acrylic copolymer emulsion, medical-grade, hypoallergenic.</li>
                    <li><strong class="text-[#0D1B33] dark:text-slate-blue-light font-bold">Citrus-Clear:</strong> Organic terpene orange oils, aloe vera extracts, vitamin E.</li>
                    <li><strong class="text-[#0D1B33] dark:text-slate-blue-light font-bold">Scalp Shield:</strong> Isopropyl alcohol, witch hazel extract, aluminum chlorohydrate micro-complex.</li>
                    <li><strong class="text-[#0D1B33] dark:text-slate-blue-light font-bold">UV-Protect Spray:</strong> Argan kernel oil, panthenol (Pro-Vitamin B5), benzophenone-4 UV absorber.</li>
                </ul>
            </div>
            @endif

            <!-- Tab 3: FAQ -->
            @if ($activeTab === 'faq')
            <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 sm:p-10 shadow-md space-y-6">
                <div>
                    <h4 class="font-heading font-bold text-lg text-[#0D1B33] dark:text-white mb-2">Will the Citrus Solvent damage fragile French lace?</h4>
                    <p class="text-slate-800 dark:text-slate-300 text-sm font-medium leading-relaxed">No. Unlike acetone or harsh industrial solvents, Citrus-Clear breaks down bonds without breaking the polyurethane coating or loosening lace knots.</p>
                </div>
                <div class="border-t border-slate-200 dark:border-slate-800 pt-4">
                    <h4 class="font-heading font-bold text-lg text-[#0D1B33] dark:text-white mb-2">How long does one kit last?</h4>
                    <p class="text-slate-800 dark:text-slate-300 text-sm font-medium leading-relaxed">For standard bi-weekly re-attachments, one kit lasts between 3 to 4 months for individual wearers.</p>
                </div>
                <div class="border-t border-slate-200 dark:border-slate-800 pt-4">
                    <h4 class="font-heading font-bold text-lg text-[#0D1B33] dark:text-white mb-2">Can I use this kit if I have sensitive scalp or eczema?</h4>
                    <p class="text-slate-800 dark:text-slate-300 text-sm font-medium leading-relaxed">Yes, but we always recommend performing a 24-hour patch test behind your ear with the adhesive before a full head installation.</p>
                </div>
            </div>
            @endif

            <!-- Tab 4: Reviews -->
            @if ($activeTab === 'reviews')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-md">
                    <div class="text-amber-500 text-lg mb-2">★★★★★</div>
                    <strong class="text-[#0D1B33] dark:text-white font-bold block mb-2">Marcus T. — Verified Client (Denver, CO)</strong>
                    <p class="text-slate-800 dark:text-slate-300 text-sm font-medium italic leading-relaxed">"I was struggling with lifting after just 3 days at the gym. Following Alan's 4-step routine with this exact kit changed everything. I get a solid 3 weeks now with zero lift."</p>
                </div>
                <div class="bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl p-6 shadow-md">
                    <div class="text-amber-500 text-lg mb-2">★★★★★</div>
                    <strong class="text-[#0D1B33] dark:text-white font-bold block mb-2">Dave K. — Studio Owner (Dallas, TX)</strong>
                    <p class="text-slate-800 dark:text-slate-300 text-sm font-medium italic leading-relaxed">"We supply this kit to all our new hair replacement clients. It cuts down client panic calls by 90% because the instructions are simple and foolproof."</p>
                </div>
            </div>
            @endif

        </div>
    </section>

    <!-- ============ RELATED PRODUCTS ============ -->
    <section class="py-16 bg-white dark:bg-[#050B14] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-block font-sans text-xs font-bold tracking-[0.3em] uppercase text-slate-blue dark:text-slate-blue-light mb-2">
                    Complete Your Setup
                </span>
                <h2 class="font-heading font-bold text-3xl sm:text-4xl text-[#0D1B33] dark:text-white leading-tight mb-4">
                    Frequently Purchased Together
                </h2>
                <div class="w-16 h-0.5 bg-gradient-to-r from-slate-blue to-slate-blue-light mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if(isset($relatedProducts) && count($relatedProducts) > 0)
                    @foreach($relatedProducts as $relProd)
                        <a href="{{ route('product.show', $relProd->slug) }}" class="group bg-slate-50 dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:-translate-y-1.5 transition-all">
                            <div class="h-44 bg-gradient-to-br from-[#0D1B33] to-[#586B8C] flex items-center justify-center overflow-hidden relative">
                                @if($relProd->image)
                                    <img src="{{ $relProd->image_url ?? uploads_asset($relProd->image) }}" alt="{{ $relProd->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-5xl opacity-30 select-none">{{ $relProd->icon ?: '🧴' }}</span>
                                @endif
                                @if($relProd->badge)
                                    <span class="absolute top-3 right-3 bg-slate-blue text-white text-[10px] font-bold px-2 py-0.5 rounded">
                                        {{ $relProd->badge }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-6">
                                @if($relProd->category)
                                    <span class="text-[0.7rem] font-bold text-slate-blue dark:text-slate-blue-light uppercase tracking-wider block mb-1">{{ $relProd->category->name }}</span>
                                @endif
                                <h3 class="font-heading font-bold text-base text-[#0D1B33] dark:text-white mb-2">{{ $relProd->name }}</h3>
                                <p class="text-slate-700 dark:text-slate-300 text-xs font-medium leading-relaxed mb-4">{{ Str::limit($relProd->short_description, 80) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-sm text-[#0D1B33] dark:text-white">${{ number_format($relProd->price, 2) }}</span>
                                    <span class="text-xs font-bold text-slate-blue dark:text-slate-blue-light">View Details →</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />
</div>

