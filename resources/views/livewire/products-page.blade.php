<div class="relative min-h-screen">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ============ PAGE BANNER ============ -->
    <section class="pt-32 pb-16 bg-gradient-to-br from-slate-100 via-white to-slate-200 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#080F1E] border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-3">
                <a href="{{ route('home') }}" class="hover:underline">Home</a> <span class="mx-1">/</span> Products
            </div>
            <h1 class="font-heading font-extrabold text-4xl sm:text-6xl text-[#0D1B33] dark:text-white mb-4">
                Curated Products
            </h1>
            <p class="text-slate-800 dark:text-slate-300 text-base sm:text-xl font-medium max-w-2xl leading-relaxed">
                Everything here has been personally tested, used, or developed by me over 25 years. I don't recommend anything I wouldn't use on myself.
            </p>
        </div>
    </section>

    <!-- ============ PRODUCTS CATALOG ============ -->
    <section class="py-16 bg-slate-100 dark:bg-[#070D18] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Category Filter Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-12">
                <button wire:click="setFilter('all')"
                        type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm
                               {{ $activeFilter === 'all' ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white' : 'bg-white dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800 border border-slate-300 dark:border-slate-800' }}">
                    All Products
                </button>
                @foreach ($categories as $cat)
                <button wire:click="setFilter('{{ $cat->slug }}')"
                        type="button"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm
                               {{ $activeFilter === $cat->slug ? 'bg-[#0D1B33] text-white dark:bg-slate-blue-light dark:text-white' : 'bg-white dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800 border border-slate-300 dark:border-slate-800' }}">
                    {{ $cat->name }}
                </button>
                @endforeach
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($products as $product)
                <a href="{{ route('product.details') }}" class="group bg-white dark:bg-[#0E1A2D] border border-slate-300 dark:border-slate-800 rounded-2xl overflow-hidden shadow-md hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="h-52 bg-gradient-to-br from-[#0D1B33] to-[#586B8C] flex items-center justify-center relative overflow-hidden">
                        @if ($product->image)
                            <img src="{{ $product->image_url ?? uploads_asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-6xl opacity-30 select-none">{{ $product->icon ?: '🧴' }}</span>
                        @endif
                        @if ($product->badge)
                        <span class="absolute top-4 right-4 bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold text-[0.65rem] uppercase tracking-wider px-3 py-1 rounded shadow">
                            {{ $product->badge }}
                        </span>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            @if ($product->category)
                            <span class="text-[0.7rem] font-bold text-slate-blue dark:text-slate-blue-light uppercase tracking-wider block mb-1">
                                {{ $product->category->name }}
                            </span>
                            @endif
                            <h3 class="font-heading font-bold text-lg text-[#0D1B33] dark:text-white mb-2 group-hover:text-slate-blue dark:group-hover:text-slate-blue-light transition-colors">
                                {{ $product->name }}
                            </h3>
                            <p class="text-slate-700 dark:text-slate-300 text-xs font-medium leading-relaxed mb-6">
                                {{ Str::limit($product->short_description, 120) }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-200 dark:border-slate-800 pt-4">
                            <span class="font-bold text-sm text-[#0D1B33] dark:text-white">${{ number_format($product->price, 2) }}</span>
                            <span class="text-xs font-bold text-slate-blue dark:text-slate-blue-light flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                Learn More →
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 py-12 text-center text-slate-500">
                    No products found in this category.
                </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- ============ CTA BANNER ============ -->
    <section class="py-20 bg-[#0D1B33] text-center text-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Can't Find What You Need?</h2>
            <p class="text-slate-300 text-base max-w-lg mx-auto mb-8 font-medium">
                I'm always happy to make specific recommendations based on your situation. Drop me a line.
            </p>
            <a href="{{ route('home') }}#contact" class="inline-block bg-gradient-to-r from-slate-blue to-slate-blue-light text-white font-bold px-8 py-3.5 rounded text-xs tracking-widest uppercase shadow-lg hover:shadow-slate-blue/30 hover:-translate-y-0.5 transition-all">
                Get in Touch →
            </a>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />
</div>

