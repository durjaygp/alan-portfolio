<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $pageTitle = $title ?? ($siteSetting->meta_title ?: ($siteSetting->site_name . ' — ' . $siteSetting->site_tagline));
        $pageDescription = $metaDescription ?? ($siteSetting->meta_description ?: 'Alan Humphreys — Hair Loss Solutions Expert, Clinical Trichologist & Business Growth Consultant.');
        $pageKeywords = is_array($siteSetting->meta_keywords) ? implode(', ', $siteSetting->meta_keywords) : ($siteSetting->meta_keywords ?: 'Alan Humphreys, hair loss consultant, trichology, hair replacement expert');
        $pageAuthor = $siteSetting->meta_author ?: ($siteSetting->site_name ?: 'Alan Humphreys');
        $ogImage = $siteSetting->og_image_url;
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="{{ $pageKeywords }}">
    <meta name="author" content="{{ $pageAuthor }}">

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:type" content="{{ $siteSetting->og_type ?: 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="{{ $siteSetting->twitter_card ?: 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    @if(!empty($siteSetting->twitter_handle))
        <meta name="twitter:site" content="{{ $siteSetting->twitter_handle }}">
    @endif

    <!-- Dynamic Favicon -->
    <link rel="icon" href="{{ $siteSetting->favicon_url }}">

    <!-- Google Analytics (GA4) -->
    @if(!empty($siteSetting->google_analytics_id))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $siteSetting->google_analytics_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $siteSetting->google_analytics_id }}');
        </script>
    @endif

    <!-- Custom Head Injections -->
    @if(!empty($siteSetting->custom_head_scripts))
        {!! $siteSetting->custom_head_scripts !!}
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-50 dark:bg-[#070D18] text-slate-800 dark:text-slate-100 font-sans antialiased transition-colors duration-300 relative selection:bg-slate-blue selection:text-white">

    <!-- Custom Magnetic Cursor (Desktop) -->
    <div id="cursor-dot" class="custom-cursor-dot hidden lg:block"></div>
    <div id="cursor-circle" class="custom-cursor-circle hidden lg:block"></div>

    {{ $slot }}

    @livewireScripts

    <!-- Animation & Smooth Scroll Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Register GSAP ScrollTrigger
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);

                // 1. Reveal Up Animations
                gsap.utils.toArray('.reveal-up').forEach((el) => {
                    gsap.fromTo(el,
                        { opacity: 0, y: 55 },
                        {
                            opacity: 1,
                            y: 0,
                            duration: 1.1,
                            ease: 'power3.out',
                            scrollTrigger: {
                                trigger: el,
                                start: 'top 88%',
                                toggleActions: 'play none none none'
                            }
                        }
                    );
                });

                // 2. Reveal Left Animations
                gsap.utils.toArray('.reveal-left').forEach((el) => {
                    gsap.fromTo(el,
                        { opacity: 0, x: -60 },
                        {
                            opacity: 1,
                            x: 0,
                            duration: 1.1,
                            ease: 'power3.out',
                            scrollTrigger: {
                                trigger: el,
                                start: 'top 85%',
                                toggleActions: 'play none none none'
                            }
                        }
                    );
                });

                // 3. Reveal Right Animations
                gsap.utils.toArray('.reveal-right').forEach((el) => {
                    gsap.fromTo(el,
                        { opacity: 0, x: 60 },
                        {
                            opacity: 1,
                            x: 0,
                            duration: 1.1,
                            ease: 'power3.out',
                            scrollTrigger: {
                                trigger: el,
                                start: 'top 85%',
                                toggleActions: 'play none none none'
                            }
                        }
                    );
                });

                // 4. Reveal Scale Animations
                gsap.utils.toArray('.reveal-scale').forEach((el) => {
                    gsap.fromTo(el,
                        { opacity: 0, scale: 0.92 },
                        {
                            opacity: 1,
                            scale: 1,
                            duration: 1.0,
                            ease: 'back.out(1.4)',
                            scrollTrigger: {
                                trigger: el,
                                start: 'top 88%',
                                toggleActions: 'play none none none'
                            }
                        }
                    );
                });
            }

            // 5. Custom Magnetic Fluid Cursor
            const dot = document.getElementById('cursor-dot');
            const circle = document.getElementById('cursor-circle');
            
            if (dot && circle && window.innerWidth >= 1024) {
                let mouseX = 0, mouseY = 0;
                let circleX = 0, circleY = 0;

                window.addEventListener('mousemove', (e) => {
                    mouseX = e.clientX;
                    mouseY = e.clientY;
                    
                    dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0)`;
                });

                const renderCursor = () => {
                    circleX += (mouseX - circleX) * 0.15;
                    circleY += (mouseY - circleY) * 0.15;
                    circle.style.transform = `translate3d(${circleX}px, ${circleY}px, 0)`;
                    requestAnimationFrame(renderCursor);
                };
                requestAnimationFrame(renderCursor);

                // Add hover scale on interactive elements
                const interactives = document.querySelectorAll('a, button, input, textarea, [role="button"]');
                interactives.forEach((el) => {
                    el.addEventListener('mouseenter', () => circle.classList.add('cursor-hover'));
                    el.addEventListener('mouseleave', () => circle.classList.remove('cursor-hover'));
                });
            }
        });
    </script>

    <!-- Custom Body Scripts Injected Before </body> -->
    @if(!empty($siteSetting->custom_body_scripts))
        {!! $siteSetting->custom_body_scripts !!}
    @endif

</body>
</html>
