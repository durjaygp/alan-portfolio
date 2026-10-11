<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Homepage2SettingResource\Pages;
use App\Models\Homepage2Setting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Homepage2SettingResource extends Resource
{
    protected static ?string $model = Homepage2Setting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $navigationLabel = 'Homepage 2 Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Homepage 2 Tabs')
                    ->tabs([
                        // 0. Sections Manager
                        Tab::make('Sections Manager')
                            ->schema([
                                Section::make('Homepage 2 Sections Visibility & Ordering')
                                    ->description('Toggle visibility on/off and define sort order sequence (1 = top of page, 12 = bottom of page).')
                                    ->schema([
                                        Section::make('1. Hero Section')
                                            ->schema([
                                                Toggle::make('hero_status')->label('Show Section')->default(true),
                                                TextInput::make('hero_order')->label('Sort Order')->numeric()->default(1),
                                            ])->columns(2)->collapsible(),

                                        Section::make('2. Proof Strip Section')
                                            ->schema([
                                                Toggle::make('proof_status')->label('Show Section')->default(true),
                                                TextInput::make('proof_order')->label('Sort Order')->numeric()->default(2),
                                            ])->columns(2)->collapsible(),

                                        Section::make('3. Story Bridge Section')
                                            ->schema([
                                                Toggle::make('story_status')->label('Show Section')->default(true),
                                                TextInput::make('story_order')->label('Sort Order')->numeric()->default(3),
                                            ])->columns(2)->collapsible(),

                                        Section::make('4. The Consultation Gap (Problem) Section')
                                            ->schema([
                                                Toggle::make('problem_status')->label('Show Section')->default(true),
                                                TextInput::make('problem_order')->label('Sort Order')->numeric()->default(4),
                                            ])->columns(2)->collapsible(),

                                        Section::make('5. How I Can Help (3 Core Services) Section')
                                            ->schema([
                                                Toggle::make('services_status')->label('Show Section')->default(true),
                                                TextInput::make('services_order')->label('Sort Order')->numeric()->default(5),
                                            ])->columns(2)->collapsible(),

                                        Section::make('6. Training & Education Section')
                                            ->schema([
                                                Toggle::make('training_status')->label('Show Section')->default(true),
                                                TextInput::make('training_order')->label('Sort Order')->numeric()->default(6),
                                            ])->columns(2)->collapsible(),

                                        Section::make('7. Why Alan? Section')
                                            ->schema([
                                                Toggle::make('why_alan_status')->label('Show Section')->default(true),
                                                TextInput::make('why_alan_order')->label('Sort Order')->numeric()->default(7),
                                            ])->columns(2)->collapsible(),

                                        Section::make('8. Watch & Learn Videos Section')
                                            ->schema([
                                                Toggle::make('videos_status')->label('Show Section')->default(true),
                                                TextInput::make('videos_order')->label('Sort Order')->numeric()->default(8),
                                            ])->columns(2)->collapsible(),

                                        Section::make('9. Awards, Certifications & Media Section')
                                            ->schema([
                                                Toggle::make('credentials_status')->label('Show Section')->default(true),
                                                TextInput::make('credentials_order')->label('Sort Order')->numeric()->default(9),
                                            ])->columns(2)->collapsible(),

                                        Section::make('10. Gallery Transformations Preview Section')
                                            ->schema([
                                                Toggle::make('gallery_status')->label('Show Section')->default(true),
                                                TextInput::make('gallery_order')->label('Sort Order')->numeric()->default(10),
                                            ])->columns(2)->collapsible(),

                                        Section::make('11. Knowledge Library (Blog) Preview Section')
                                            ->schema([
                                                Toggle::make('blog_status')->label('Show Section')->default(true),
                                                TextInput::make('blog_order')->label('Sort Order')->numeric()->default(11),
                                            ])->columns(2)->collapsible(),

                                        Section::make('12. Strategy Intake & Contact Section')
                                            ->schema([
                                                Toggle::make('contact_status')->label('Show Section')->default(true),
                                                TextInput::make('contact_order')->label('Sort Order')->numeric()->default(12),
                                            ])->columns(2)->collapsible(),
                                    ])->columns(2),
                            ]),

                        // 1. Hero
                        Tab::make('Hero')
                            ->schema([
                                Section::make('Hero Header & Details')
                                    ->schema([
                                        TextInput::make('hero_badge_text')->label('Badge Pill Text'),
                                        TextInput::make('hero_title')->label('Main Headline (Catchphrase)')->required(),
                                        TextInput::make('hero_subtitle')->label('Role / Subtitle')->required(),
                                        Textarea::make('hero_description')->label('Lead Story Description')->rows(3)->required(),
                                    ])->columns(2),

                                Section::make('Hero Action Buttons')
                                    ->schema([
                                        TextInput::make('hero_primary_button_text')->label('Primary CTA Text'),
                                        TextInput::make('hero_primary_button_url')->label('Primary CTA URL'),
                                        TextInput::make('hero_secondary_button_text')->label('Secondary Button Text'),
                                        TextInput::make('hero_secondary_button_url')->label('Secondary Button URL'),
                                    ])->columns(2),

                                Section::make('Hero Visual & Credential Card')
                                    ->schema([
                                        FileUpload::make('hero_image')
                                            ->label('Hero Portrait Image')
                                            ->disk('uploads')
                                            ->directory('alanhumphreys/images')
                                            ->image(),
                                        TextInput::make('hero_card_title')->label('Floating Card Badge'),
                                        TextInput::make('hero_card_subtitle')->label('Floating Card Highlight Text'),
                                        Repeater::make('hero_audiences')
                                            ->label('Target Audience Checkmarks')
                                            ->schema([
                                                TextInput::make('label')->label('Audience / Feature Item')->required(),
                                            ])
                                            ->defaultItems(3)
                                            ->collapsible(),
                                    ])->columns(2),
                            ]),

                        // 2. Proof Strip
                        Tab::make('Proof Strip')
                            ->schema([
                                Section::make('Proof Strip Heading')
                                    ->schema([
                                        TextInput::make('proof_heading')->label('Section Heading')->required(),
                                    ]),

                                Section::make('Quantitative Metric Stats')
                                    ->schema([
                                        Repeater::make('proof_stats')
                                            ->label('Metric Counter Cards')
                                            ->schema([
                                                TextInput::make('number')->label('Stat Number (e.g. 30+, 3,000+)')->required(),
                                                TextInput::make('label')->label('Stat Label (e.g. Years in Industry)')->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),

                                Section::make('Media Proof Strip Badges')
                                    ->schema([
                                        Repeater::make('proof_media_logos')
                                            ->label('Media Outlets & Publications')
                                            ->schema([
                                                TextInput::make('name')->label('Media Name')->required(),
                                            ])
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 3. Story Bridge
                        Tab::make('Story Bridge')
                            ->schema([
                                Section::make('Story Bridge Content')
                                    ->schema([
                                        TextInput::make('story_badge')->label('Eyebrow Badge'),
                                        TextInput::make('story_title')->label('Headline')->required(),
                                        FileUpload::make('story_image')
                                            ->label('Portrait Image')
                                            ->disk('uploads')
                                            ->directory('alanhumphreys/images')
                                            ->image(),
                                        Textarea::make('story_image_quote')->label('Image Overlay Quote')->rows(2),
                                        Textarea::make('story_p1')->label('Paragraph 1 (Hair loss crisis at 18 & 21)')->rows(3),
                                        Textarea::make('story_p2')->label('Paragraph 2 (Telemarketer to owner at 24)')->rows(3),
                                        Textarea::make('story_highlight_quote')->label('Highlighted Quote (Understood the other side of the desk)')->rows(2),
                                        Textarea::make('story_p3')->label('Paragraph 3 (Building & Selling Hair Vital)')->rows(3),
                                        TextInput::make('story_button_text')->label('Timeline Link Text'),
                                        TextInput::make('story_button_url')->label('Timeline Link URL'),
                                    ])->columns(2),
                            ]),

                        // 4. Consultation Gap / Problem
                        Tab::make('Consultation Gap')
                            ->schema([
                                Section::make('Problem & Consultation Gap')
                                    ->schema([
                                        TextInput::make('problem_badge')->label('Eyebrow Badge'),
                                        TextInput::make('problem_title')->label('Headline Part 1'),
                                        TextInput::make('problem_subtitle')->label('Headline Part 2 (Gradient Highlight)'),
                                        Textarea::make('problem_description')->label('Lead Description')->rows(2),
                                        TextInput::make('problem_box_title')->label('Challenge Box Heading'),
                                        Textarea::make('problem_bottom_callout')->label('Bottom Callout Message')->rows(2),
                                    ])->columns(2),

                                Section::make('Diagnostic Studio Challenges')
                                    ->schema([
                                        Repeater::make('problem_items')
                                            ->label('Challenge Points (✕ Items)')
                                            ->schema([
                                                TextInput::make('text')->label('Challenge Point Description')->required(),
                                            ])
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 5. How I Can Help (3 Core Services)
                        Tab::make('Core Services')
                            ->schema([
                                Section::make('Services Section Header')
                                    ->schema([
                                        TextInput::make('services_badge')->label('Eyebrow Badge'),
                                        TextInput::make('services_title')->label('Section Heading')->required(),
                                        Textarea::make('services_description')->label('Section Description')->rows(2),
                                    ])->columns(2),

                                Section::make('3 Productized Advisory Offerings')
                                    ->schema([
                                        Repeater::make('services_items')
                                            ->label('Service Cards')
                                            ->schema([
                                                TextInput::make('badge')->label('Card Eyebrow Badge')->required(),
                                                TextInput::make('title')->label('Service Title')->required(),
                                                TextInput::make('subtitle')->label('Service Subtitle / Slogan')->required(),
                                                Textarea::make('description')->label('Overview Description')->rows(3)->required(),
                                                TagsInput::make('highlights')->label('Key Feature Checkmarks')->placeholder('Add highlight...'),
                                                TextInput::make('button_text')->label('Button Label')->required(),
                                                TextInput::make('button_url')->label('Button Link URL')->required(),
                                                Toggle::make('is_popular')->label('Highlight as Featured / Popular')->default(false),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 6. Training & Education
                        Tab::make('Training & Education')
                            ->schema([
                                Section::make('Training Header')
                                    ->schema([
                                        TextInput::make('training_badge')->label('Eyebrow Badge'),
                                        TextInput::make('training_title')->label('Section Heading')->required(),
                                        Textarea::make('training_description')->label('Section Description')->rows(3)->required(),
                                        TextInput::make('training_button_text')->label('Button Label'),
                                        TextInput::make('training_button_url')->label('Button URL'),
                                    ])->columns(2),

                                Section::make('Training Focus Areas')
                                    ->schema([
                                        Repeater::make('training_items')
                                            ->label('Training Modules')
                                            ->schema([
                                                TextInput::make('icon')->label('Icon / Emoji')->default('🎯'),
                                                TextInput::make('title')->label('Module Title')->required(),
                                                Textarea::make('description')->label('Description')->rows(2)->required(),
                                            ])
                                            ->columns(3)
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 7. Why Alan?
                        Tab::make('Why Alan')
                            ->schema([
                                Section::make('Why Alan Header')
                                    ->schema([
                                        TextInput::make('why_badge')->label('Eyebrow Badge'),
                                        TextInput::make('why_title')->label('Section Heading')->required(),
                                        Textarea::make('why_subtitle')->label('Subtitle / Credibility Slogan')->rows(2),
                                    ])->columns(2),

                                Section::make('The 6 Core Advantage Pillars')
                                    ->schema([
                                        Repeater::make('why_items')
                                            ->label('Advantage Pillars')
                                            ->schema([
                                                TextInput::make('number')->label('Number (e.g. 01, 02)')->required(),
                                                TextInput::make('tag')->label('Category Tag (e.g. EMPATHY, LEADERSHIP)')->required(),
                                                TextInput::make('title')->label('Pillar Title')->required(),
                                                Textarea::make('description')->label('Explanation')->rows(3)->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 8. Watch & Learn Videos
                        Tab::make('Watch & Learn Videos')
                            ->schema([
                                Section::make('Videos Header')
                                    ->schema([
                                        TextInput::make('videos_badge')->label('Eyebrow Badge'),
                                        TextInput::make('videos_title')->label('Section Heading')->required(),
                                        Textarea::make('videos_description')->label('Section Description')->rows(2),
                                    ])->columns(2),

                                Section::make('Video Items')
                                    ->schema([
                                        Repeater::make('video_items')
                                            ->label('Educational Videos')
                                            ->schema([
                                                TextInput::make('title')->label('Video Title')->required(),
                                                TextInput::make('category')->label('Category / Topic (e.g. Consultation Sales, Trichology)'),
                                                TextInput::make('video_id')->label('YouTube Video ID / URL Code (e.g. dQw4w9WgXcQ)')->required(),
                                                FileUpload::make('thumbnail')
                                                    ->label('Custom Thumbnail')
                                                    ->disk('uploads')
                                                    ->directory('alanhumphreys/images')
                                                    ->image(),
                                                Textarea::make('description')->label('Video Summary')->rows(2),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 9. Awards, Certifications & Media
                        Tab::make('Awards & Media')
                            ->schema([
                                Section::make('Credentials Header')
                                    ->schema([
                                        TextInput::make('credentials_badge')->label('Eyebrow Badge'),
                                        TextInput::make('credentials_title')->label('Section Heading')->required(),
                                        Textarea::make('credentials_description')->label('Section Description')->rows(2),
                                    ])->columns(2),

                                Section::make('Awards & Certifications List')
                                    ->schema([
                                        Repeater::make('awards_items')
                                            ->label('Awards / Certifications')
                                            ->schema([
                                                TextInput::make('year')->label('Year')->required(),
                                                TextInput::make('title')->label('Achievement / Credential')->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),

                                Section::make('Media & Press List')
                                    ->schema([
                                        Repeater::make('media_items')
                                            ->label('Media Features')
                                            ->schema([
                                                TextInput::make('year')->label('Year')->required(),
                                                TextInput::make('title')->label('Media Outlet / Feature')->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),

                                Section::make('Media & Credential Showcase Cards')
                                    ->schema([
                                        Repeater::make('credential_showcase_items')
                                            ->label('Showcase Media Cards (Image + Caption)')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Showcase Image')
                                                    ->disk('uploads')
                                                    ->directory('alanhumphreys/images')
                                                    ->image()
                                                    ->required(),
                                                TextInput::make('caption')->label('Caption Text')->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible(),
                                    ]),
                            ]),

                        // 10. Gallery Showcase
                        Tab::make('Gallery Preview')
                            ->schema([
                                Section::make('Gallery Header & Link')
                                    ->schema([
                                        TextInput::make('gallery_badge')->label('Eyebrow Badge'),
                                        TextInput::make('gallery_title')->label('Section Heading')->required(),
                                        Textarea::make('gallery_description')->label('Section Description')->rows(2),
                                        TextInput::make('gallery_button_text')->label('Gallery Button Label'),
                                        TextInput::make('gallery_button_url')->label('Gallery Button URL'),
                                    ])->columns(2),
                            ]),

                        // 11. Knowledge Library / Blog
                        Tab::make('Blog Preview')
                            ->schema([
                                Section::make('Blog Section Header')
                                    ->schema([
                                        TextInput::make('blog_badge')->label('Eyebrow Badge'),
                                        TextInput::make('blog_title')->label('Section Heading')->required(),
                                        Textarea::make('blog_description')->label('Section Description')->rows(2),
                                        TextInput::make('blog_button_text')->label('Blog Button Label'),
                                        TextInput::make('blog_button_url')->label('Blog Button URL'),
                                    ])->columns(2),
                            ]),

                        // 12. Intake & Contact
                        Tab::make('Intake & Contact')
                            ->schema([
                                Section::make('Contact Information & Form Copy')
                                    ->schema([
                                        TextInput::make('contact_badge')->label('Eyebrow Badge'),
                                        TextInput::make('contact_title')->label('Section Heading')->required(),
                                        Textarea::make('contact_description')->label('Description Paragraph')->rows(3)->required(),
                                        TextInput::make('contact_address')->label('Location Address'),
                                        TextInput::make('contact_phone')->label('Phone Number'),
                                        TextInput::make('contact_whatsapp_url')->label('WhatsApp Link'),
                                        TextInput::make('contact_form_title')->label('Form Title'),
                                        Textarea::make('contact_form_subtitle')->label('Form Subtitle')->rows(2),
                                    ])->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')
                    ->label('Hero Headline')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_subtitle')
                    ->label('Subtitle'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepage2Settings::route('/'),
            'edit' => Pages\EditHomepage2Setting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        Homepage2Setting::firstOrCreate(['id' => 1]);

        return parent::getEloquentQuery()->where('id', 1);
    }

    public static function getNavigationItems(): array
    {
        $setting = Homepage2Setting::firstOrCreate(['id' => 1]);

        return [
            NavigationItem::make('Homepage 2 Settings')
                ->url(static::getUrl('edit', ['record' => $setting->id]))
                ->icon(Heroicon::OutlinedSparkles)
                ->group('Settings'),
        ];
    }
}
