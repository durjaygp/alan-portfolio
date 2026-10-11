<div class="relative min-h-screen bg-slate-50 dark:bg-[#070D18] text-[#0D1B33] dark:text-slate-100 transition-colors duration-300"
     x-data="{
        faqOpen: null,
        toggleFaq(idx) {
            this.faqOpen = this.faqOpen === idx ? null : idx;
        }
     }">

    <!-- ============ NAVIGATION COMPONENT ============ -->
    <x-navbar />

    <!-- ==================== 1. HERO SECTION ==================== -->
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-[#050B14] dark:via-[#0D1B33] dark:to-[#070D18] border-b border-slate-200 dark:border-slate-800">
        <!-- Ambient Glow -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-to-tr from-slate-blue/15 via-slate-blue/5 to-transparent blur-3xl rounded-full pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left Content -->
                <div class="lg:col-span-7 text-center lg:text-left">
                    <!-- Breadcrumbs -->
                    <div class="text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light mb-4 flex items-center justify-center lg:justify-start gap-2">
                        <a href="{{ route('home') }}" class="hover:underline">Home</a>
                        <span class="text-slate-400 dark:text-slate-600">/</span>
                        <span>Services</span>
                        <span class="text-slate-400 dark:text-slate-600">/</span>
                        <span class="text-slate-700 dark:text-slate-300">Virtual Sales Consultant</span>
                    </div>

                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light bg-slate-blue/10 dark:bg-slate-blue/15 border border-slate-blue/25 mb-6 backdrop-blur-sm shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>PRODUCTIZED B2B SERVICE FOR HAIR STUDIOS</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight font-heading leading-tight mb-4 text-[#0D1B33] dark:text-white">
                        Need a Sales Professional but Don't Need Another Employee?
                    </h1>

                    <!-- Subtitle -->
                    <h2 class="text-lg sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-slate-blue via-slate-blue-light to-blue-400 mb-6">
                        I'll become an extension of your hair-replacement sales team.
                    </h2>

                    <!-- Pitch -->
                    <p class="text-base sm:text-lg text-slate-700 dark:text-slate-300 font-medium leading-relaxed max-w-2xl mb-8 mx-auto lg:mx-0">
                        You generate the lead. I handle the consultation. I meet virtually with your prospects, answer the uncomfortable questions they're afraid to ask, build trust through 30 years of client empathy, and hand back a closed, deposit-paid booking.
                    </p>

                    <!-- Dual CTAs -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="#partner-inquiry"
                           class="w-full sm:w-auto text-center bg-gradient-to-r from-slate-blue to-slate-blue-light hover:from-slate-blue-light hover:to-slate-blue text-white font-extrabold px-8 py-4 rounded-xl text-xs sm:text-sm tracking-wider uppercase shadow-xl shadow-slate-blue/25 hover:-translate-y-0.5 transition-all duration-300">
                            Apply for Sales Partnership →
                        </a>
                        <a href="#how-it-works"
                           class="w-full sm:w-auto text-center px-8 py-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider bg-white dark:bg-[#0E1A2D] text-slate-800 dark:text-slate-200 border border-slate-300 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all shadow-sm">
                            How It Works
                        </a>
                    </div>

                    <!-- Quick Bullet Highlights -->
                    <div class="pt-8 mt-8 border-t border-slate-200/80 dark:border-slate-800 flex flex-wrap items-center justify-center lg:justify-start gap-y-2 gap-x-6 text-xs text-slate-600 dark:text-slate-400 font-semibold">
                        <span class="flex items-center gap-1.5"><span class="text-slate-blue">✔</span> Zero Full-Time Payroll Overhead</span>
                        <span class="flex items-center gap-1.5"><span class="text-slate-blue">✔</span> 3,000+ Consultations Experience</span>
                        <span class="flex items-center gap-1.5"><span class="text-slate-blue">✔</span> High-Converting Empathy Framework</span>
                    </div>
                </div>

                <!-- Right Visual Presentation -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <!-- Glow Halo -->
                        <div class="absolute -inset-1.5 bg-gradient-to-r from-slate-blue via-slate-blue-light to-blue-500 rounded-3xl blur-lg opacity-30"></div>

                        <!-- Card Mockup -->
                        <div class="relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-200/50 dark:border-slate-700 shadow-2xl p-6 sm:p-8 text-white space-y-6">
                            
                            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-blue flex items-center justify-center font-bold text-white text-sm">
                                        AH
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold">Virtual Sales Extension</div>
                                        <div class="text-[11px] text-slate-400">Live Video Consultation Suite</div>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                    Active Studio Partner
                                </span>
                            </div>

                            <!-- Live Workflow Visual -->
                            <div class="space-y-3 text-xs">
                                <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700 flex items-center justify-between">
                                    <span class="text-slate-300 font-medium">1. Studio Lead Enters</span>
                                    <span class="font-bold text-slate-blue-light">Automatic Sync</span>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700 flex items-center justify-between">
                                    <span class="text-slate-300 font-medium">2. 45-Min Video Consultation</span>
                                    <span class="font-bold text-emerald-400">Alan Conducts</span>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700 flex items-center justify-between">
                                    <span class="text-slate-300 font-medium">3. Objections Answered &amp; Deposit Paid</span>
                                    <span class="font-bold text-amber-400">Deposit Secured</span>
                                </div>
                                <div class="p-3.5 rounded-xl bg-gradient-to-r from-slate-blue/40 to-slate-blue-light/40 border border-slate-blue-light/60 flex items-center justify-between">
                                    <span class="text-white font-bold">4. Client In-Salon Application</span>
                                    <span class="font-bold text-white">Your Calendar Booked</span>
                                </div>
                            </div>

                            <!-- Bottom Stat Box -->
                            <div class="p-4 rounded-2xl bg-black/60 border border-white/10 flex items-center justify-between text-xs">
                                <div>
                                    <div class="text-slate-400 text-[10px] uppercase font-bold">Average Conversion Lift</div>
                                    <div class="text-xl font-extrabold text-white mt-0.5">+35% to +60%</div>
                                </div>
                                <div>
                                    <div class="text-slate-400 text-[10px] uppercase font-bold">Your Payroll Cost</div>
                                    <div class="text-xl font-extrabold text-emerald-400 mt-0.5">$0 Fixed Salary</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 2. THE PROBLEM (THE STUDIO OWNER'S DILEMMA) ==================== -->
    <section class="py-20 bg-white dark:bg-[#060D1A] border-b border-slate-200 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                    THE INDUSTRY BOTTLENECK
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                    Why Most Hair Studios Struggle to Close Leads
                </h2>
                <p class="text-base text-slate-600 dark:text-slate-300 font-medium">
                    Hair loss is one of the most emotionally charged purchases in the world. Traditional sales tactics fail because prospects are nervous, skeptical, and terrified of making a mistake.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 flex items-center justify-center font-bold text-lg mb-4">
                        💸
                    </div>
                    <h3 class="text-lg font-bold text-[#0D1B33] dark:text-white mb-2">High Payroll Risk</h3>
                    <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                        Hiring a dedicated in-house salesperson costs $80,000–$120,000 annually plus commissions and benefits before knowing if they can sell hair.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 flex items-center justify-center font-bold text-lg mb-4">
                        ✂️
                    </div>
                    <h3 class="text-lg font-bold text-[#0D1B33] dark:text-white mb-2">Stylists Dislike Selling</h3>
                    <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                        Your stylists are master craftspeople. Forcing them to conduct high-ticket sales consultations creates awkwardness and lost deposits.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 flex items-center justify-center font-bold text-lg mb-4">
                        ⏳
                    </div>
                    <h3 class="text-lg font-bold text-[#0D1B33] dark:text-white mb-2">Owner Time Burnout</h3>
                    <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                        You spend your evenings and weekends doing consultations instead of managing operations, ordering hair inventory, or growing the business.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 flex items-center justify-center font-bold text-lg mb-4">
                        🚪
                    </div>
                    <h3 class="text-lg font-bold text-[#0D1B33] dark:text-white mb-2">Unanswered Objections</h3>
                    <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                        Prospects leave consultations saying "I need to think about it" because their unvoiced fears about maintenance, sweat, and wind weren't addressed.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 3. WHO THIS IS FOR ==================== -->
    <section class="py-20 bg-slate-50 dark:bg-[#070D18] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                    IDEAL FIT
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                    Who Is the Virtual Sales Consultant For?
                </h2>
                <p class="text-base text-slate-600 dark:text-slate-300 font-medium">
                    This service is tailored specifically for businesses operating in the non-surgical hair restoration and hair replacement market.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="text-3xl mb-4">🏢</div>
                        <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mb-2">Hair Replacement Studios</h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                            Independent hair system studios that generate steady leads from Google or social media but lack dedicated consultation closers during peak hours.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-bold text-slate-blue dark:text-slate-blue-light">
                        Maximize lead ROI &amp; deposit conversion
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="text-3xl mb-4">💇‍♂️</div>
                        <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mb-2">Salons Adding Hair Systems</h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                            Upscale salons launching non-surgical hair replacement services that need an experienced industry veteran to handle initial client qualification.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-bold text-slate-blue dark:text-slate-blue-light">
                        Eliminate the fear of selling new services
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="text-3xl mb-4">🌐</div>
                        <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mb-2">Regional / Virtual Hair Brands</h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                            Companies selling custom hair systems or maintenance programs who need a trusted national face to conduct high-authority virtual consultations.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-bold text-slate-blue dark:text-slate-blue-light">
                        National authority with high client retention
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 4. HOW IT WORKS (STEP-BY-STEP) ==================== -->
    <section id="how-it-works" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] border-t border-b border-slate-200 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                    THE WORKFLOW
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                    How the Virtual Sales Partnership Works
                </h2>
                <p class="text-base text-slate-600 dark:text-slate-300 font-medium">
                    A smooth, integrated 4-step workflow that feels 100% natural and transparent to your prospective clients.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
                
                <!-- Step 1 -->
                <div class="p-8 rounded-3xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 relative">
                    <span class="text-4xl font-black text-slate-300 dark:text-slate-700 font-heading">01</span>
                    <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mt-3 mb-2">You Generate the Lead</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Leads arrive through your website, local Google campaigns, or social media. Instead of a generic contact form, they are routed to a private consultation calendar.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="p-8 rounded-3xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 relative">
                    <span class="text-4xl font-black text-slate-300 dark:text-slate-700 font-heading">02</span>
                    <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mt-3 mb-2">Alan Hosts Video Session</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        I meet with the prospect over private video under your brand partnership. I discuss their hair history, examine photos, and establish deep rapport.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="p-8 rounded-3xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 relative">
                    <span class="text-4xl font-black text-slate-300 dark:text-slate-700 font-heading">03</span>
                    <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mt-3 mb-2">Objections Handled &amp; Closed</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        I address their unspoken fears about detection, lifestyle, workouts, and cost. I present your studio's custom package and collect the initial deposit.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="p-8 rounded-3xl bg-slate-50 dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 relative">
                    <span class="text-4xl font-black text-slate-blue dark:text-slate-blue-light font-heading">04</span>
                    <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white mt-3 mb-2">In-Studio Fitting Booking</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        The client is scheduled directly on your studio calendar with complete consultation notes, base specifications, and full excitement for their application day.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 5. WHAT ALAN DOES VS WHAT YOU PROVIDE ==================== -->
    <section class="py-20 bg-slate-50 dark:bg-[#070D18] transition-colors">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                    CLEAR ROLES &amp; RESPONSIBILITIES
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4 leading-tight">
                    A Clear, Synergistic Partnership
                </h2>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 font-medium">
                    You focus on master styling and client retention; I handle high-ticket conversion.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- What Alan Handles -->
                <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1A2D] border-2 border-slate-blue dark:border-slate-blue-light shadow-xl">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-10 h-10 rounded-xl bg-slate-blue text-white flex items-center justify-center font-bold">AH</span>
                        <div>
                            <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white">What Alan Handles</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Virtual Sales Advisory</p>
                        </div>
                    </div>
                    <ul class="space-y-3.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300 font-medium">
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-500 font-bold">✓</span>
                            <span>Conducts thorough 45-minute virtual video consultations</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-500 font-bold">✓</span>
                            <span>Explains hair system options (Lace, Poly, Hybrid, Density)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-500 font-bold">✓</span>
                            <span>Answers emotional fears, maintenance questions, and objections</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-500 font-bold">✓</span>
                            <span>Presents your studio pricing and collects the deposit payment</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-500 font-bold">✓</span>
                            <span>Delivers full consultation intake sheets to your styling team</span>
                        </li>
                    </ul>
                </div>

                <!-- What You Provide -->
                <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-10 h-10 rounded-xl bg-slate-200 dark:bg-slate-800 text-[#0D1B33] dark:text-white flex items-center justify-center font-bold">YOU</span>
                        <div>
                            <h3 class="text-xl font-bold font-heading text-[#0D1B33] dark:text-white">What Your Studio Provides</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">In-Studio Operations</p>
                        </div>
                    </div>
                    <ul class="space-y-3.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300 font-medium">
                        <li class="flex items-start gap-3">
                            <span class="text-slate-blue font-bold">✓</span>
                            <span>Your studio marketing, local SEO, and prospect lead flow</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-slate-blue font-bold">✓</span>
                            <span>Your standard studio pricing packages and deposit terms</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-slate-blue font-bold">✓</span>
                            <span>In-person physical template making &amp; hair ordering</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-slate-blue font-bold">✓</span>
                            <span>System cut-in, custom styling, and application service</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-slate-blue font-bold">✓</span>
                            <span>Ongoing monthly maintenance and salon care revenue (100% yours)</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 6. THE PROSPECT'S EXPERIENCE ==================== -->
    <section class="py-20 bg-white dark:bg-[#050B14] border-t border-b border-slate-200 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-slate-900 via-[#0B1528] to-slate-950 text-white rounded-3xl p-8 sm:p-14 border border-slate-800 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-slate-blue/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 max-w-3xl">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue-light">
                        THE PROSPECT PERSPECTIVE
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold font-heading tracking-tight mt-2 mb-6 leading-tight text-white">
                        "Finally, someone who understands what I'm going through."
                    </h2>
                    <p class="text-sm sm:text-base text-slate-300 font-medium leading-relaxed mb-6">
                        When a client talks with Alan, they aren't speaking with a telemarketer reading a script. They are speaking with a man who sat in their chair at 21, wore hair systems for 30 years, built a business serving 3,000+ clients, and appeared on Good Morning America.
                    </p>
                    <p class="text-sm sm:text-base text-slate-300 font-medium leading-relaxed">
                        That immediate trust eliminates the fear of being "scammed" and turns nervous inquiries into excited, committed studio clients.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 7. FAQ SECTION ==================== -->
    <section class="py-20 bg-slate-50 dark:bg-[#070D18] transition-colors">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                    FREQUENTLY ASKED QUESTIONS
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-2 mb-4">
                    Everything You Need to Know
                </h2>
            </div>

            <div class="space-y-4">
                
                <!-- FAQ 1 -->
                <div class="rounded-2xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                    <button @click="toggleFaq(1)" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-[#0D1B33] dark:text-white cursor-pointer">
                        <span>How does compensation work for the Virtual Sales Consultant service?</span>
                        <span class="text-slate-blue text-lg" x-text="faqOpen === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="faqOpen === 1" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium leading-relaxed border-t border-slate-100 dark:border-slate-800/60 pt-3" x-cloak>
                        We operate on a simple, performance-aligned model combining a low monthly management retainer with a success fee per closed client deposit. You only succeed when clients book and pay. Full specifics are tailored to your studio's average ticket size during our initial strategy call.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="rounded-2xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                    <button @click="toggleFaq(2)" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-[#0D1B33] dark:text-white cursor-pointer">
                        <span>Will Alan quote our studio's specific pricing and packages?</span>
                        <span class="text-slate-blue text-lg" x-text="faqOpen === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="faqOpen === 2" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium leading-relaxed border-t border-slate-100 dark:border-slate-800/60 pt-3" x-cloak>
                        Yes, 100%. During onboarding, we map out your exact system options (custom vs stock, lace vs poly), membership programs, and deposit requirements. I present your studio's exact numbers with total clarity.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="rounded-2xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                    <button @click="toggleFaq(3)" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-[#0D1B33] dark:text-white cursor-pointer">
                        <span>How quickly can we launch this for our studio?</span>
                        <span class="text-slate-blue text-lg" x-text="faqOpen === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="faqOpen === 3" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium leading-relaxed border-t border-slate-100 dark:border-slate-800/60 pt-3" x-cloak>
                        Typically within 5 to 7 business days. Onboarding includes reviewing your studio offerings, setting up your branded booking calendar link, and testing the intake routing before opening calendar slots.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="rounded-2xl bg-white dark:bg-[#0E1A2D] border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                    <button @click="toggleFaq(4)" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-[#0D1B33] dark:text-white cursor-pointer">
                        <span>What video consultation platform is used?</span>
                        <span class="text-slate-blue text-lg" x-text="faqOpen === 4 ? '−' : '+'"></span>
                    </button>
                    <div x-show="faqOpen === 4" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium leading-relaxed border-t border-slate-100 dark:border-slate-800/60 pt-3" x-cloak>
                        High-definition Zoom or Google Meet with automated SMS and email reminders sent to the prospect, minimizing no-show rates and ensuring a frictionless video experience on mobile or desktop.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 8. PARTNERSHIP INTAKE FORM ==================== -->
    <section id="partner-inquiry" class="py-20 lg:py-28 bg-white dark:bg-[#050B14] border-t border-slate-200 dark:border-slate-800 transition-colors">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-50 dark:bg-[#0E1A2D] rounded-3xl p-8 sm:p-12 border border-slate-200 dark:border-slate-800 shadow-2xl">
                
                <div class="text-center mb-8">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-slate-blue dark:text-slate-blue-light">
                        START YOUR EXTENSION
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold font-heading text-[#0D1B33] dark:text-white mt-1 mb-2">
                        Apply for Virtual Sales Consulting Support
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 max-w-lg mx-auto">
                        Tell Alan about your studio and lead volume to discuss calendar availability and partnership terms.
                    </p>
                </div>

                @if($submitted)
                    <div class="text-center py-12">
                        <div class="w-16 h-16 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 text-3xl flex items-center justify-center mx-auto mb-4">
                            ✓
                        </div>
                        <h3 class="text-2xl font-bold text-[#0D1B33] dark:text-white font-heading mb-2">Partnership Application Received</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300 max-w-md mx-auto mb-6">
                            Thank you, {{ $firstName }}. Alan will review your studio details and schedule a private partnership exploration call within 24 hours.
                        </p>
                        <button wire:click="resetForm" class="px-6 py-2.5 rounded-xl bg-slate-blue text-white text-xs font-bold uppercase tracking-wider cursor-pointer">
                            Submit Another Inquiry
                        </button>
                    </div>
                @else
                    <form wire:submit="submitInquiry" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">First Name *</label>
                                <input type="text" wire:model="firstName" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="First Name">
                                @error('firstName') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Last Name *</label>
                                <input type="text" wire:model="lastName" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="Last Name">
                                @error('lastName') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Work / Studio Email *</label>
                                <input type="email" wire:model="email" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="owner@yourstudio.com">
                                @error('email') <span class="text-[11px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Phone Number</label>
                                <input type="tel" wire:model="phone" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="(555) 000-0000">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Company / Studio Name</label>
                                <input type="text" wire:model="businessName" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="e.g. Denver Hair Studio">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Monthly Inquiry Volume</label>
                                <select wire:model="monthlyLeads" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none">
                                    <option value="">Select approximate monthly leads...</option>
                                    <option value="5-15 leads/month">5–15 inquiries / month</option>
                                    <option value="15-30 leads/month">15–30 inquiries / month</option>
                                    <option value="30-60 leads/month">30–60 inquiries / month</option>
                                    <option value="60+ leads/month">60+ inquiries / month</option>
                                    <option value="Just launching new studio">Just launching new studio</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-1.5">Current Sales Challenges or Questions</label>
                            <textarea wire:model="message" rows="4" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#070D18] border border-slate-200 dark:border-slate-700 text-xs text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-blue focus:outline-none" placeholder="Tell Alan about your current closing rates, how consultations are handled today, and your growth goals..."></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-slate-blue to-slate-blue-light hover:from-slate-blue-light hover:to-slate-blue text-white font-extrabold text-xs uppercase tracking-widest shadow-xl shadow-slate-blue/30 transition-all hover:-translate-y-0.5 cursor-pointer">
                            Submit Partnership Application →
                        </button>
                    </form>
                @endif

            </div>
        </div>
    </section>

    <!-- ============ FOOTER COMPONENT ============ -->
    <x-footer />

</div>
