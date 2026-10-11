<?php

namespace Database\Seeders;

use App\Models\Homepage2Setting;
use Illuminate\Database\Seeder;

class Homepage2SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homepage2Setting::updateOrCreate(
            ['id' => 1],
            [
                // Section Visibilities
                'hero_status' => true,
                'proof_status' => true,
                'story_status' => true,
                'problem_status' => true,
                'services_status' => true,
                'training_status' => true,
                'why_alan_status' => true,
                'videos_status' => true,
                'credentials_status' => true,
                'gallery_status' => true,
                'blog_status' => true,
                'contact_status' => true,

                // Section Sort Orders
                'hero_order' => 1,
                'proof_order' => 2,
                'story_order' => 3,
                'problem_order' => 4,
                'services_order' => 5,
                'training_order' => 6,
                'why_alan_order' => 7,
                'videos_order' => 8,
                'credentials_order' => 9,
                'gallery_order' => 10,
                'blog_order' => 11,
                'contact_order' => 12,

                // 1. Hero Section
                'hero_badge_text' => 'ALAN HUMPHREYS · 30+ YEARS EXPERIENCE',
                'hero_title' => "I've Been on Every Side of the Chair.",
                'hero_subtitle' => 'Hair Replacement & Trichology Business Consultant',
                'hero_description' => "I've been a hair-loss client, salesperson, business owner, industry ambassador, educator and certified clinical trichologist. Now I use more than three decades of real-world experience to help hair-replacement businesses, salons and hair-loss professionals grow their businesses, improve their sales and deliver a better client experience.",
                'hero_primary_button_text' => 'Work With Alan →',
                'hero_primary_button_url' => '#contact',
                'hero_secondary_button_text' => 'Read My Story',
                'hero_secondary_button_url' => '/about',
                'hero_image' => 'alanhumphreys/images/hero-headshot.jpg',
                'hero_card_title' => 'Proven Experience',
                'hero_card_subtitle' => '3,000+ Clients · Built & Sold Hair Vital',
                'hero_audiences' => [
                    ['label' => 'Hair Replacement Studios'],
                    ['label' => 'Salons Adding Trichology'],
                    ['label' => 'Virtual Sales Support'],
                ],

                // 2. Proof Strip Section
                'proof_heading' => "EXPERIENCE YOU CAN'T LEARN FROM A BOOK",
                'proof_stats' => [
                    ['number' => '30+', 'label' => 'Years in Industry'],
                    ['number' => '3,000+', 'label' => 'Clients Served'],
                    ['number' => '25', 'label' => 'Years Business Owner'],
                    ['number' => '1', 'label' => 'Business Built & Sold'],
                ],
                'proof_media_logos' => [
                    ['name' => 'Good Morning America'],
                    ['name' => 'Details Magazine'],
                    ['name' => 'New York Magazine'],
                    ['name' => 'Hair Visions International'],
                    ['name' => 'OnRite'],
                    ['name' => 'American Hairlines'],
                ],

                // 3. Story Bridge Section
                'story_badge' => 'THE FOUNDATION OF THE BRAND',
                'story_title' => 'I Was a Client Before I Became the Expert.',
                'story_image' => 'alanhumphreys/images/about-portrait.jpg',
                'story_image_quote' => "I didn't choose the hair industry — it chose me. What started as a personal crisis at 18 became a 30-year career I never could've imagined.",
                'story_p1' => 'At 18, I started losing my hair. At 21, I walked into a hair-replacement clinic as a client. I was so determined to find a solution that I had to borrow money just to make the deposit.',
                'story_p2' => "When I couldn't afford to pay off the balance, the owner offered me a job as a telemarketer. I quickly moved into sales, eventually finding an investor and purchasing the company myself at just 24 years old.",
                'story_highlight_quote' => 'I didn\'t have a business degree. I didn\'t have years of management experience. I had something else: I understood what it felt like to sit on the other side of the desk.',
                'story_p3' => 'Over the next 25 years, I built Hair Vital into a premier hair-replacement studio serving more than 3,000 clients, became an industry model/ambassador, appeared on Good Morning America, and introduced clinical trichology to Colorado before successfully selling the company in 2022.',
                'story_button_text' => 'Read My Full Story & Timeline →',
                'story_button_url' => '/about',

                // 4. Problem Section
                'problem_badge' => 'THE CONSULTATION GAP',
                'problem_title' => "Your Business Doesn't Always Need More Leads.",
                'problem_subtitle' => 'Sometimes It Needs Better Conversations.',
                'problem_description' => 'A lead is only the beginning. What happens during the consultation determines whether someone becomes a loyal, long-term client — or walks away.',
                'problem_box_title' => 'Are you experiencing any of these common studio challenges?',
                'problem_items' => [
                    ['text' => 'Leads are coming in, but consultation conversion rates remain low.'],
                    ['text' => 'Staff or stylists feel uncomfortable selling, closing, or asking for deposits.'],
                    ['text' => 'Consultations feel robotic or inconsistent without a proven empathy framework.'],
                    ['text' => "You're losing hair-loss clients because you lack in-house trichology diagnostics."],
                    ['text' => 'You cannot justify the expensive overhead of a full-time in-house sales rep.'],
                    ['text' => "You want to grow revenue, but you aren't sure what system changes to make."],
                ],
                'problem_bottom_callout' => "That's where I come in. Experience turns consultations into high-retention clients.",

                // 5. How I Can Help (3 Core Services)
                'services_badge' => 'PRODUCTIZED ADVISORY SERVICES',
                'services_title' => 'Three Ways We Can Work Together',
                'services_description' => 'Clear, high-impact offerings designed specifically for hair replacement studios, salons, and industry professionals.',
                'services_items' => [
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
                        'button_url' => '/virtual-sales-consultant',
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
                ],

                // 6. Training & Education
                'training_badge' => 'TEAM EMPOWERMENT',
                'training_title' => 'Give Your Team More Confidence.',
                'training_description' => "The best salespeople aren't simply good at selling. They're good at listening. They understand what the client is experiencing, know how to ask the right questions, and explain solutions without making it feel like a pitch.",
                'training_button_text' => 'Inquire About Team Training →',
                'training_button_url' => '#contact',
                'training_items' => [
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
                ],

                // 7. Why Alan
                'why_badge' => 'THE COMPLETE PERSPECTIVE',
                'why_title' => 'Why Work With Alan Humphreys?',
                'why_subtitle' => "I don't teach from textbook theory. I teach from 30 years of real-world experience.",
                'why_items' => [
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
                ],

                // 8. Watch & Learn Videos
                'videos_badge' => 'WATCH & LEARN',
                'videos_title' => 'Industry Insights, Trichology & Business Growth',
                'videos_description' => 'Practical videos and deep dives covering non-surgical hair restoration, consultation techniques, and salon trichology expansion.',
                'video_items' => [
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
                ],

                // 9. Awards, Certifications & Media
                'credentials_badge' => 'CREDENTIALS & INDUSTRY RECOGNITION',
                'credentials_title' => 'Awards, Certifications & Media',
                'credentials_description' => 'Over three decades of recognized excellence in hair replacement, clinical trichology, and media features.',
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

                // 10. Gallery Showcase
                'gallery_badge' => 'VISUAL EVIDENCE',
                'gallery_title' => 'Real Results. Proven Artistry.',
                'gallery_description' => 'Explore real client results and clinical trichology transformations.',
                'gallery_button_text' => 'View Complete Gallery →',
                'gallery_button_url' => '/gallery',

                // 11. Knowledge Library / Blog
                'blog_badge' => "ALAN'S KNOWLEDGE LIBRARY",
                'blog_title' => 'Real Conversations. Real Lessons.',
                'blog_description' => 'Insights from more than three decades in hair replacement, client psychology, trichology, and studio operations.',
                'blog_button_text' => 'Explore All Articles in Knowledge Library →',
                'blog_button_url' => '/blog',

                // 12. Intake Contact
                'contact_badge' => 'START THE CONVERSATION',
                'contact_title' => 'Your Next Chapter Can Start With One Conversation.',
                'contact_description' => "Whether you are a hair-replacement studio owner wanting to increase sales, a salon owner interested in adding traveling or virtual trichology, or an industry organization looking for speaking and education — I'd like to hear what you're working on.",
                'contact_address' => 'North Palm Beach, Florida (Serving Nationwide)',
                'contact_phone' => '303-718-1870',
                'contact_whatsapp_url' => 'https://wa.me/+13037181870',
                'contact_form_title' => 'Book a Strategy Consultation',
                'contact_form_subtitle' => "Tell me where you are now, where you want to go, and what's standing in the way.",
            ]
        );
    }
}
