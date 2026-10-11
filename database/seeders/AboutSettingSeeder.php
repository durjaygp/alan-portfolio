<?php

namespace Database\Seeders;

use App\Models\AboutSetting;
use Illuminate\Database\Seeder;

class AboutSettingSeeder extends Seeder
{
    public function run(): void
    {
        AboutSetting::updateOrCreate(
            ['id' => 1],
            [
                // Banner
                'banner_title' => 'The Full Story',
                'banner_lead' => "I didn't choose the hair industry — it chose me. What started as a personal crisis at 18 became a 25-year career that I never could've imagined.",

                // Origin Story
                'origin_label' => 'Where It All Started',
                'origin_heading' => 'The $10/Hour Kid Who Bought the Company',
                'origin_para_1' => "I was eighteen years old the first time I noticed my hair thinning. At an age when most guys are worrying about college and girls, I was standing in front of a mirror wondering why my hairline was disappearing. The depression that followed affected every part of my life — my confidence, my social life, everything. I didn't know anyone else going through it, and I sure as hell didn't know what to do about it.",
                'origin_para_2' => "By 21, I finally decided I was going to do something about it. I walked into a hair replacement clinic in Denver and became a client. I had to borrow money just for the deposit. But the moment I looked in the mirror after that first appointment, something shifted. I felt like myself again. That feeling — that transformation — is something I've spent my entire career trying to give other people.",
                'origin_quote' => '"The day I got my hair back was the day my real life started. I knew right then that this was bigger than vanity — this was about giving people back a piece of themselves they thought was gone forever."',
                'origin_para_3' => "Trouble was, I couldn't pay off my balance. So the owner hired me to do telemarketing to work off what I owed. Turns out, selling something you actually believe in — something you've experienced firsthand — is a lot easier than selling something you don't. I moved from telemarketing to full-time consultant to manager in about two years.",
                'origin_para_4' => "Then came the opportunity that changed everything. The business was failing. Weeks away from closing. I was 24 years old, making $10 an hour, with no business education, no college degree, and not a dollar of my own money. But I found an investor, and in July 1997, I bought the company. Hairlines, Inc. — which I'd later rename Hair Vital.",
                'origin_para_5' => "Everyone told me I was crazy. Maybe I was. But I knew two things: I knew this product changed lives because it changed mine, and I knew I could outwork anyone. So that's what I did. I paid off the loan, bought out my investor by 2004, and owned 100% of the company. For the next 25 years, I served over 3,000 clients and built a reputation that took me places I never expected.",
                'origin_photo_1_image' => 'alanhumphreys/images/before-after.png',
                'origin_photo_1_caption' => 'My personal transformation — what started it all',
                'origin_photo_2_image' => 'alanhumphreys/images/services-portrait.jpg',
                'origin_photo_2_caption' => '25 years later, still in the chair',

                // Career Timeline
                'timeline_label' => 'Career Timeline',
                'timeline_heading' => 'How It All Unfolded',
                'timeline_items' => [
                    [
                        'year' => '1994',
                        'title' => 'Became a Client',
                        'description' => 'At 21, walked into a hair replacement clinic in Denver. Borrowed money for the deposit. Left feeling like a different person.',
                    ],
                    [
                        'year' => '1995',
                        'title' => 'Hired as Telemarketer',
                        'description' => "Couldn't afford payments, so the owner put me to work. My real-world experience made me a natural — I went from phones to full-time sales in months.",
                    ],
                    [
                        'year' => '1997',
                        'title' => 'Bought the Business',
                        'description' => 'At 24, with no money and no degree, I found an investor and purchased a failing company that was weeks from closing. Hair Vital was born.',
                    ],
                    [
                        'year' => '1998',
                        'title' => 'Game-Changing Partnership',
                        'description' => "Met a representative from a wholesale company in Florida. Got certified on new methods. Built relationships with colleagues I'm still close with today.",
                    ],
                    [
                        'year' => '2000',
                        'title' => 'Brand Ambassador',
                        'description' => 'Flew to Florida to model for marketing material. Became brand ambassador for two of the largest wholesale companies — a role I held for over 15 years.',
                    ],
                    [
                        'year' => '2001',
                        'title' => 'Details Magazine + VR Hair Launch',
                        'description' => 'Full-page feature in Details Magazine. Was the first person to try and model Virtual Reality Hair — technology that would revolutionize the industry.',
                    ],
                    [
                        'year' => '2004',
                        'title' => '100% Owner',
                        'description' => 'Paid off loan, bought out investor. Full ownership of Hair Vital. No more partners, no more debt — just me and the mission.',
                    ],
                    [
                        'year' => '2007',
                        'title' => 'Good Morning America',
                        'description' => 'Featured on GMA\'s "Movie and a Makeover" segment after a New York Magazine profile. National spotlight on what we\'d been building in Denver.',
                    ],
                    [
                        'year' => '2014',
                        'title' => 'First Trichology Practice in Colorado',
                        'description' => 'Brought clinical trichology to Hair Vital — the first company in Colorado to offer it. Opened the door to helping people at the earliest stages of hair loss.',
                    ],
                    [
                        'year' => '2018',
                        'title' => 'Lifetime Visionary Award',
                        'description' => 'Honored at the Hair Visions International Conference for testing new technology and giving honest feedback. Still one of the proudest moments of my career.',
                    ],
                    [
                        'year' => '2022',
                        'title' => 'Sold the Business',
                        'description' => "After 25 years and 3,000+ clients, I sold Hair Vital and moved to Florida. But I wasn't done — I was just getting started on the next chapter.",
                    ],
                    [
                        'year' => '2026',
                        'title' => 'Clinical Trichologist Certification',
                        'description' => 'Earned USTI and AMCA trichologist certifications. Now focused on consulting, training, and helping the next generation of industry professionals.',
                    ],
                ],

                // COVID Story
                'covid_label' => 'The Hard Part',
                'covid_heading' => 'Surviving COVID — and Coming Out Stronger',
                'covid_para_1' => "In March 2020, we shut down. Two months with no appointments, no revenue, and a room full of clients who relied on us for something deeply personal. But shutting down didn't mean giving up.",
                'covid_para_2' => 'I shipped supplies to clients daily. Drove to their houses to drop off product. Did FaceTime tutorials showing guys how to maintain their hair systems at home — most of them had never done it before. We made it work.',
                'covid_quote' => "When we reopened, we worked 20 straight days to get every single client back in the chair and caught up. Twenty days. No breaks. Because that's what they needed from us.",
                'covid_para_3' => "Then the supply crisis hit. Hair wasn't available worldwide. I spent hundreds of thousands building an inventory — a bet that kept us in business for the next two years when most competitors were scrambling. Other studios were calling me, begging for any hair I could spare. Luckily, the relationships I'd built over two decades paid off. My reps gave me a heads-up to buy before anyone else knew what was coming.",
                'covid_para_4' => "COVID was the hardest professional challenge I've faced. But it also proved something I'd always believed: relationships and preparation beat everything else. Every time.",

                // Philosophy
                'philosophy_label' => 'My Philosophy',
                'philosophy_heading' => 'What I Believe About This Industry',
                'philosophy_items' => [
                    [
                        'number' => '01',
                        'title' => 'Honesty Over Popularity',
                        'description' => "I'll tell you what I actually think — even if it's not what you want to hear. When manufacturers send me new products, I tell them exactly what works and what doesn't. That honesty is why they kept coming back to me for over 20 years.",
                    ],
                    [
                        'number' => '02',
                        'title' => 'Trichology Is the Future',
                        'description' => "The industry has been too focused on replacement for too long. Trichology opens up a massive untapped market — people with early hair loss, scalp conditions, and people who don't even know what's possible. If you're not offering it, you're leaving money on the table.",
                    ],
                    [
                        'number' => '03',
                        'title' => 'Your Staff Is Everything',
                        'description' => "Clients can feel whether people are happy to work somewhere. A motivated, positive staff is the single biggest competitive advantage you can have. I don't care how good your product is — if your team is miserable, your clients know it.",
                    ],
                    [
                        'number' => '04',
                        'title' => 'Never Stop Innovating',
                        'description' => 'The biggest mistake I see is complacency. The businesses that thrive are the ones with leaders who are always looking for an edge — new technology, better systems, a fresh approach. The moment you stop evolving is the moment you start dying.',
                    ],
                ],

                // CTA Section
                'cta_heading' => 'Ready to Work Together?',
                'cta_text' => "I've lived every side of this industry. Let me put that experience to work for you.",
                'cta_button_label' => 'Start the Conversation →',
                'cta_button_url' => '#contact',
            ]
        );
    }
}
