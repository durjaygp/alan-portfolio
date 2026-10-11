<?php

namespace Database\Seeders;

use App\Models\HomepageSetting;
use Illuminate\Database\Seeder;

class HomepageSettingSeeder extends Seeder
{
    public function run(): void
    {
        HomepageSetting::updateOrCreate(
            ['id' => 1],
            [
                // Hero Section
                'hero_subtitle' => 'Hair Loss Solutions Expert',
                'hero_name' => 'ALAN HUMPHREYS',
                'hero_designation' => 'Expert · Consultant · Innovator',
                'hero_description' => '25+ years of leadership in hair loss solutions and business growth strategy. From client to industry pioneer — transforming lives and businesses through innovation, education, and trust.',
                'hero_image' => 'alanhumphreys/head.jpeg',
                'hero_button_label' => 'Book a Consultation',
                'hero_button_url' => '#contact',
                'hero_secondary_button_label' => 'My Story',
                'hero_secondary_button_url' => '#about',
                'hero_badge_icon' => '🏆',
                'hero_badge_title' => 'Lifetime Visionary Award',
                'hero_badge_subtitle' => 'Hair Visions International · 2018',
                'hero_stats' => [
                    ['number' => '25+', 'label' => 'Years Experience'],
                    ['number' => '3,000+', 'label' => 'Clients Served'],
                    ['number' => '80+', 'label' => 'Studios Certified'],
                ],

                // What I Do / Services Section
                'what_i_do_title' => 'What I Offer',
                'what_i_do_heading' => 'Consulting & Services',
                'what_i_do_items' => [
                    [
                        'icon' => '📞',
                        'title' => 'Virtual Consultations',
                        'description' => 'One-on-one strategy sessions for business owners, salon operators, and sales teams looking to improve conversions and client satisfaction.',
                    ],
                    [
                        'icon' => '📈',
                        'title' => 'Sales Training & Coaching',
                        'description' => "Proven techniques from 25+ years of closing. Boost your team's closing percentage, handle objections, and turn first-timers into loyal clients.",
                    ],
                    [
                        'icon' => '🔬',
                        'title' => 'Trichology Training',
                        'description' => 'Learn how to add trichology services to your business — the fastest-growing segment of the industry and the key to expanding your client base.',
                    ],
                    [
                        'icon' => '🏢',
                        'title' => 'Business Strategy & Advisory',
                        'description' => 'Strategic planning for hair loss businesses at any stage. From startup launch to operational turnaround — including staff, environment, and client retention.',
                    ],
                    [
                        'icon' => '🎤',
                        'title' => 'Speaking & Training',
                        'description' => 'Engaging keynote presentations and hands-on training workshops for conferences, industry events, and in-house teams.',
                    ],
                    [
                        'icon' => '🎬',
                        'title' => 'Content Creation & Podcast',
                        'description' => 'Authentic industry content that resonates — from video production and podcast appearances to social media strategy for hair loss professionals.',
                    ],
                ],

                // About Section
                'about_title' => 'My Story',
                'about_heading' => 'From Client to Industry Pioneer',
                'about_description' => '<p class="font-semibold text-lg text-[#0D1B33] dark:text-slate-100 mb-4">I started losing my hair at 18. By 21, I walked into a hair replacement clinic as a client — I had to borrow money just for the deposit. That decision didn\'t just change my appearance. It changed my life.</p><p class="mb-4">When I couldn\'t afford to pay off my balance, the owner hired me as a telemarketer. I quickly moved into sales — because I was living proof that the product worked. Within 2½ years, I found an investor and purchased the company. I was 24 years old, with no business education, no college degree, and no money of my own.</p><p class="mb-4">For the next 25 years, I built <strong>Hair Vital</strong> in Denver into a thriving business serving over 3,000 clients. I became a brand ambassador for two of the largest wholesale companies, graced the cover of industry catalogs, appeared on Good Morning America, and was featured in Details Magazine and New York Magazine. In 2014, I made Hair Vital the first company in Colorado to offer trichology services.</p><p class="mb-4">After selling my business in 2022, I\'m now dedicating this next chapter to helping others in the industry grow — through consulting, training, and sharing 25+ years of lived experience.</p>',
                'about_image' => 'alanhumphreys/images/services-portrait.jpg',
                'about_button_label' => 'Read Full Story',
                'about_button_url' => '/about',

                // Watch & Learn / Videos Section
                'video_title' => 'Content',
                'video_heading' => 'Watch & Learn',
                'video_description' => "Real talk about hair loss, the industry, and building a business — from someone who's lived every side of it.",
                'video_items' => [
                    [
                        'title' => 'Industry Insights',
                        'category' => 'Knowledge Share',
                        'video_url' => 'https://www.youtube.com/watch?v=GCOR4ctSZ8Y',
                        'thumbnail' => 'alanhumphreys/images/services-portrait.jpg',
                        'description' => 'Sharing knowledge from 25+ years in hair loss solutions',
                    ],
                    [
                        'title' => 'Hair Replacement Talk',
                        'category' => 'Hair Loss Talk',
                        'video_url' => 'https://www.youtube.com/watch?v=KXcpk99GYd8',
                        'thumbnail' => 'alanhumphreys/images/head.jpeg',
                        'description' => "Honest conversation about what works and what doesn't",
                    ],
                    [
                        'title' => 'Business Growth Tips',
                        'category' => 'Business Strategy',
                        'video_url' => 'https://www.youtube.com/watch?v=MqH_oaBfKOs',
                        'thumbnail' => 'alanhumphreys/images/conference-stage.jpg',
                        'description' => 'Strategies from building and selling a successful business',
                    ],
                    [
                        'title' => 'Client Confidence',
                        'category' => 'Transformation',
                        'video_url' => 'https://www.youtube.com/watch?v=IMwsLQ8KQto',
                        'thumbnail' => 'alanhumphreys/images/before-after.png',
                        'description' => 'How hair restoration transforms lives beyond appearance',
                    ],
                    [
                        'title' => 'Trichology & The Future',
                        'category' => 'Trichology',
                        'video_url' => 'https://www.youtube.com/watch?v=cAr7KmVXOeM',
                        'thumbnail' => 'alanhumphreys/images/trichology-cert.jpg',
                        'description' => 'Why trichology is the fastest-growing industry segment',
                    ],
                    [
                        'title' => 'Quick Tips',
                        'category' => 'Short Tips',
                        'video_url' => 'https://www.youtube.com/watch?v=UdyhxIxd-YY',
                        'thumbnail' => 'alanhumphreys/images/professional-1.jpg',
                        'description' => 'Bite-sized expertise for professionals and clients',
                    ],
                ],

                // Testimonials Section
                'testimonial_title' => 'Testimonials',
                'testimonial_heading' => 'What Industry Leaders Say',
                'testimonial_items' => [
                    [
                        'name' => 'Lance Centofanti',
                        'role' => 'Industry Professional',
                        'avatar_initials' => 'LC',
                        'quote' => "Alan's knowledge of the hair replacement industry is unmatched. His hands-on experience as both a wearer and a business owner gives him a perspective that no textbook can teach. He's the real deal — honest, direct, and truly passionate about helping people.",
                        'rating' => 5,
                    ],
                    [
                        'name' => 'Lew Hutchinson',
                        'role' => 'Owner, Envisions of Connecticut',
                        'avatar_initials' => 'LH',
                        'quote' => "Alan is one of the most respected professionals in our industry. His ability to connect with clients, train staff, and drive real business results is something I've witnessed firsthand over many years. Anyone who gets to work with him is getting the best.",
                        'rating' => 5,
                    ],
                ],

                // Credentials Section
                'credential_title' => 'CREDENTIALS',
                'credential_heading' => 'Awards, Certifications & Media',
                'awards_items' => [
                    ['year' => '2026', 'title' => 'USTI & AMCA Clinical Trichologist Certification'],
                    ['year' => '2018', 'title' => 'Lifetime Visionary Award — Hair Visions International Conference'],
                    ['year' => '2014', 'title' => 'Capilia Certified Trichology Assistant — First in Colorado'],
                    ['year' => '2000', 'title' => 'Brand Ambassador & Model — On Rite, Hair Visions International'],
                ],
                'media_items' => [
                    ['year' => '2007', 'title' => 'Good Morning America — "Movie and a Makeover" Feature'],
                    ['year' => '2007', 'title' => 'New York Magazine — Feature that led to GMA appearance'],
                    ['year' => '2001', 'title' => 'Details Magazine — Full Page Feature'],
                    ['year' => '2008+', 'title' => 'TV commercials, infomercials & local news affiliates nationwide'],
                ],
                'credential_showcase_items' => [
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
                ],
                'credential_items' => [
                    ['type' => 'certification', 'year' => '2026', 'title' => 'USTI & AMCA Clinical Trichologist Certification', 'subtitle' => 'US Trichology Institute 2026', 'image' => 'alanhumphreys/images/trichology-cert.jpg'],
                    ['type' => 'award', 'year' => '2018', 'title' => 'Lifetime Visionary Award', 'subtitle' => 'Hair Visions International Conference', 'image' => 'alanhumphreys/images/award-ceremony.jpg'],
                    ['type' => 'certification', 'year' => '2014', 'title' => 'Capilia Certified Trichology Assistant', 'subtitle' => 'First in Colorado', 'image' => null],
                    ['type' => 'media', 'year' => '2007', 'title' => 'Good Morning America — "Movie and a Makeover" Feature', 'subtitle' => 'National TV Broadcast', 'image' => null],
                ],

                // Contact Section
                'contact_title' => 'Get in Touch',
                'contact_heading' => "Let's Work Together",
                'contact_paragraph' => "Whether you're a solo operator, a growing studio, or a salon looking to add hair replacement and trichology services — I'd love to hear from you. The first step is simple: tell me about your business.",
                'contact_business_types' => [
                    ['label' => 'Salon / Studio Owner'],
                    ['label' => 'Hair Replacement Specialist'],
                    ['label' => 'Stylist / Barber'],
                    ['label' => 'Individual Client'],
                    ['label' => 'Other'],
                ],
                'contact_primary_interests' => [
                    ['label' => 'Virtual Consultation'],
                    ['label' => 'Sales Coaching'],
                    ['label' => 'Trichology Training'],
                    ['label' => 'Business Strategy'],
                    ['label' => 'General Inquiry'],
                ],

                // 3 Service Models Section
                'service_models_title' => 'THREE DISTINCT SERVICE MODELS',
                'service_models_heading' => 'Specialized Trichology & Sales Solutions for Salons & Hair Studios',
                'service_models_items' => [
                    [
                        'badge' => 'On-Site Assessment Days',
                        'icon' => '🚗',
                        'title' => '1. Traveling Trichologist',
                        'subtitle' => 'Bring Specialized Trichology Directly to Your Salon',
                        'description' => 'I physically visit your salon or hair studio on scheduled assessment days to provide Trichology scalp and hair assessments for your clients. We analyze hair thinning, scalp conditions, and density changes — adding a high-value specialized service to your salon without the cost of a full-time Trichologist.',
                        'tag' => 'For Local & Regional Salons',
                        'button_label' => 'Schedule Salon Assessment Day →',
                        'button_url' => '#contact',
                        'highlights' => [
                            'In-person scalp & hair health evaluation',
                            'No client cannibalization — you keep styling/services',
                            'Zero full-time payroll overhead for salon owners',
                        ],
                    ],
                    [
                        'badge' => 'Nationwide Remote Referrals',
                        'icon' => '💻',
                        'title' => '2. Virtual Trichologist',
                        'subtitle' => 'National Trichology Consultations for Your Salon Clients',
                        'description' => 'Even if your salon isn’t local to me, your clients can still access 30 years of trichology expertise through virtual consultations. Salons refer clients directly for remote scalp assessments, helping them understand their hair loss concerns and determine the right next steps.',
                        'tag' => 'For Salons Nationwide',
                        'button_label' => 'Refer a Client for Virtual Assessment →',
                        'button_url' => '#contact',
                        'highlights' => [
                            'Virtual scalp & thinning assessment',
                            'National reach beyond local geography',
                            'Complements your existing salon client relationship',
                        ],
                    ],
                    [
                        'badge' => 'Virtual Sales & Lead Conversion',
                        'icon' => '🤝',
                        'title' => '3. Hair Replacement Virtual Consultant',
                        'subtitle' => 'In-House Sales Professional Extension for Hair Companies',
                        'description' => 'If you own a hair replacement company or studio without a dedicated sales team, I act as an extension of your business. I meet virtually with prospective clients, listen to their concerns, answer questions they’re afraid to ask, and guide them toward trichology or non-surgical restoration.',
                        'tag' => 'For Hair Replacement Studios & Companies',
                        'button_label' => 'Extend Your Sales Team →',
                        'button_url' => '#contact',
                        'highlights' => [
                            'Converts cold leads & uncertain prospects',
                            'Transition guidance for existing hair system wearers',
                            '30 years experience as client, owner & consultant',
                        ],
                    ],
                ],

                // Dual Perspective Advantage Section
                'perspective_title' => 'THE DUAL PERSPECTIVE ADVANTAGE',
                'perspective_heading' => 'Nearly 30 Years of Experience — From Both Sides of the Consultation Table',
                'perspective_quote' => 'I was a hair-loss client at 21 before I ever entered this industry. I remember sitting on the other side of the consultation, wondering what was happening to my hair, what questions I should be asking, and whether a solution really existed. That’s why I don’t just sell hair — I understand the person first.',
                'perspective_items' => [
                    [
                        'number' => '01',
                        'title' => 'Client-First Empathy',
                        'description' => 'I know the fear, uncertainty, and emotion of hair loss firsthand. I ask the questions clients are often afraid to ask.',
                    ],
                    [
                        'number' => '02',
                        'title' => '30 Years of Industry Mastery',
                        'description' => 'From telemarketer at 21 to business owner at 24, brand ambassador, and Certified Trichologist — I understand every angle of hair restoration.',
                    ],
                    [
                        'number' => '03',
                        'title' => 'Zero-Overhead Partner',
                        'description' => 'I bring high-value trichology assessments and high-converting virtual sales to your studio without adding full-time staff to your payroll.',
                    ],
                ],

                // Footer Section
                'footer_description' => '25+ years of leadership in hair loss solutions, trichology, and business growth strategy. Expert. Consultant. Innovator.',
                'footer_phone' => '303-718-1870',
                'footer_location' => 'North Palm Beach, FL',
                'footer_email' => 'alanhumphreys72@gmail.com',
            ]
        );
    }
}
