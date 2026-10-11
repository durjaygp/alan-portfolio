<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageSettingResource\Pages;
use App\Models\HomepageSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
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

class HomepageSettingResource extends Resource
{
    protected static ?string $model = HomepageSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?string $navigationLabel = 'Homepage Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Homepage Tabs')
                    ->tabs([
                        // 0. Master Sections Manager Tab
                        Tab::make('Sections Manager')
                            ->schema([
                                Section::make('Homepage Sections Visibility & Ordering')
                                    ->description('Control which sections appear on the homepage and customize their display sequence (1 = top, 10 = bottom).')
                                    ->schema([
                                        Section::make('1. Hero Section')
                                            ->schema([
                                                Toggle::make('hero_status')->label('Show Section')->default(true),
                                                TextInput::make('hero_order')->label('Sort Order')->numeric()->default(1),
                                            ])->columns(2)->collapsible(),

                                        Section::make('2. About / Story Section')
                                            ->schema([
                                                Toggle::make('about_status')->label('Show Section')->default(true),
                                                TextInput::make('about_order')->label('Sort Order')->numeric()->default(2),
                                            ])->columns(2)->collapsible(),

                                        Section::make('3. What I Do / Services Section')
                                            ->schema([
                                                Toggle::make('services_status')->label('Show Section')->default(true),
                                                TextInput::make('services_order')->label('Sort Order')->numeric()->default(3),
                                            ])->columns(2)->collapsible(),

                                        Section::make('4. Watch & Learn / Videos Section')
                                            ->schema([
                                                Toggle::make('videos_status')->label('Show Section')->default(true),
                                                TextInput::make('videos_order')->label('Sort Order')->numeric()->default(4),
                                            ])->columns(2)->collapsible(),

                                        Section::make('5. Testimonials Section')
                                            ->schema([
                                                Toggle::make('testimonials_status')->label('Show Section')->default(true),
                                                TextInput::make('testimonials_order')->label('Sort Order')->numeric()->default(5),
                                            ])->columns(2)->collapsible(),

                                        Section::make('6. Credentials Section')
                                            ->schema([
                                                Toggle::make('credentials_status')->label('Show Section')->default(true),
                                                TextInput::make('credentials_order')->label('Sort Order')->numeric()->default(6),
                                            ])->columns(2)->collapsible(),

                                        Section::make('7. Curated Products Section')
                                            ->schema([
                                                Toggle::make('products_status')->label('Show Section')->default(true),
                                                TextInput::make('products_order')->label('Sort Order')->numeric()->default(7),
                                            ])->columns(2)->collapsible(),

                                        Section::make('8. 3 Distinct Service Models Section')
                                            ->schema([
                                                Toggle::make('service_models_status')->label('Show Section')->default(true),
                                                TextInput::make('service_models_order')->label('Sort Order')->numeric()->default(8),
                                            ])->columns(2)->collapsible(),

                                        Section::make('9. Dual Perspective Advantage Section')
                                            ->schema([
                                                Toggle::make('perspective_status')->label('Show Section')->default(true),
                                                TextInput::make('perspective_order')->label('Sort Order')->numeric()->default(9),
                                            ])->columns(2)->collapsible(),

                                        Section::make('10. Intake Contact Form Section')
                                            ->schema([
                                                Toggle::make('contact_status')->label('Show Section')->default(true),
                                                TextInput::make('contact_order')->label('Sort Order')->numeric()->default(10),
                                            ])->columns(2)->collapsible(),
                                    ])->columns(2),
                            ]),

                        // 1. Hero Section
                        Tab::make('Hero')
                            ->schema([
                                Section::make('Hero Visibility & Order')
                                    ->schema([
                                        Toggle::make('hero_status')->label('Show Hero Section')->default(true),
                                        TextInput::make('hero_order')->label('Sort Order (e.g. 1)')->numeric()->default(1),
                                    ])->columns(2),

                                Section::make('Hero Header & Details')
                                    ->schema([
                                        TextInput::make('hero_subtitle')
                                            ->label('Upper Subtitle / Badge')
                                            ->placeholder('e.g. HAIR LOSS SOLUTIONS EXPERT')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_name')
                                            ->label('Full Name')
                                            ->required()
                                            ->columnSpanFull(),
                                        TextInput::make('hero_designation')
                                            ->label('Designation / Tagline')
                                            ->placeholder('e.g. Expert · Consultant · Innovator')
                                            ->columnSpanFull(),
                                        RichEditor::make('hero_description')
                                            ->label('Short Hero Bio / Description')
                                            ->columnSpanFull(),
                                        FileUpload::make('hero_image')
                                            ->label('Hero Portrait Image')
                                            ->image()
                                            ->disk('uploads')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_button_label')
                                            ->label('Primary CTA Button Label')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_button_url')
                                            ->label('Primary CTA Button URL')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_secondary_button_label')
                                            ->label('Secondary Button Label')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_secondary_button_url')
                                            ->label('Secondary Button URL')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_badge_icon')
                                            ->label('Floating Badge Icon (Emoji)')
                                            ->default('🏆'),
                                        TextInput::make('hero_badge_title')
                                            ->label('Floating Badge Title')
                                            ->placeholder('e.g. Lifetime Visionary Award'),
                                        TextInput::make('hero_badge_subtitle')
                                            ->label('Floating Badge Subtitle')
                                            ->placeholder('e.g. Hair Visions International · 2018'),

                                        Repeater::make('hero_stats')
                                            ->label('Stat Counters Grid')
                                            ->createItemButtonLabel('Add Stat Counter')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Stat Value (e.g. 25+)')
                                                    ->required(),
                                                TextInput::make('label')
                                                    ->label('Stat Label (e.g. Years Experience)')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 2. What I Do / Services Section
                        Tab::make('What I Do')
                            ->schema([
                                Section::make('Services Visibility & Order')
                                    ->schema([
                                        Toggle::make('services_status')->label('Show What I Do Section')->default(true),
                                        TextInput::make('services_order')->label('Sort Order (e.g. 3)')->numeric()->default(3),
                                    ])->columns(2),

                                Section::make('Services & Offerings Cards')
                                    ->schema([
                                        TextInput::make('what_i_do_title')
                                            ->label('Section Badge (e.g. WHAT I DO)')
                                            ->columnSpanFull(),
                                        TextInput::make('what_i_do_heading')
                                            ->label('Section Heading')
                                            ->columnSpanFull(),
                                        Repeater::make('what_i_do_items')
                                            ->label('Service Cards Repeater')
                                            ->createItemButtonLabel('Add Service Card')
                                            ->schema([
                                                TextInput::make('icon')
                                                    ->label('Icon / Emoji')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Card Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Card Description')
                                                    ->required(),
                                            ])
                                            ->columns(1)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 3. About / Biography
                        Tab::make('About')
                            ->schema([
                                Section::make('About Section Visibility & Order')
                                    ->schema([
                                        Toggle::make('about_status')->label('Show About Section')->default(true),
                                        TextInput::make('about_order')->label('Sort Order (e.g. 2)')->numeric()->default(2),
                                    ])->columns(2),

                                Section::make('Biography & Story')
                                    ->schema([
                                        TextInput::make('about_title')
                                            ->label('Section Badge')
                                            ->columnSpanFull(),
                                        TextInput::make('about_heading')
                                            ->label('Section Heading')
                                            ->columnSpanFull(),
                                        RichEditor::make('about_description')
                                            ->label('Story Biography Text')
                                            ->columnSpanFull(),
                                        FileUpload::make('about_image')
                                            ->label('About Portrait / Banner')
                                            ->image()->disk('uploads')
                                            ->columnSpanFull(),
                                        TextInput::make('about_button_label')
                                            ->label('CTA Button Label')
                                            ->columnSpanFull(),
                                        TextInput::make('about_button_url')
                                            ->label('CTA Button URL')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 4. Watch & Learn (Videos Repeater)
                        Tab::make('Watch & Learn')
                            ->schema([
                                Section::make('Videos Section Visibility & Order')
                                    ->schema([
                                        Toggle::make('videos_status')->label('Show Watch & Learn Section')->default(true),
                                        TextInput::make('videos_order')->label('Sort Order (e.g. 4)')->numeric()->default(4),
                                    ])->columns(2),

                                Section::make('Featured Video Insights & Links')
                                    ->schema([
                                        TextInput::make('video_title')
                                            ->label('Section Badge (e.g. WATCH & LEARN)')
                                            ->columnSpanFull(),
                                        TextInput::make('video_heading')
                                            ->label('Section Heading')
                                            ->columnSpanFull(),
                                        Textarea::make('video_description')
                                            ->label('Section Summary Description')
                                            ->columnSpanFull(),
                                        Repeater::make('video_items')
                                            ->label('Video Links Repeater')
                                            ->createItemButtonLabel('Add Video Link')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Video Title')
                                                    ->required(),
                                                TextInput::make('category')
                                                    ->label('Category Badge (e.g. Consultation Strategy)')
                                                    ->required(),
                                                TextInput::make('video_url')
                                                    ->label('Video Link / Embed URL (e.g. YouTube URL)')
                                                    ->url()
                                                    ->required(),
                                                FileUpload::make('thumbnail')
                                                    ->disk('uploads')
                                                    ->label('Video Thumbnail Image')
                                                    ->image(),
                                                Textarea::make('description')
                                                    ->label('Video Description / Summary'),
                                            ])
                                            ->columns(1)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 5. Testimonials Repeater
                        Tab::make('Testimonials')
                            ->schema([
                                Section::make('Testimonials Visibility & Order')
                                    ->schema([
                                        Toggle::make('testimonials_status')->label('Show Testimonials Section')->default(true),
                                        TextInput::make('testimonials_order')->label('Sort Order (e.g. 5)')->numeric()->default(5),
                                    ])->columns(2),

                                Section::make('Client & Leader Testimonials')
                                    ->schema([
                                        TextInput::make('testimonial_title')
                                            ->label('Section Badge (e.g. TESTIMONIALS)')
                                            ->columnSpanFull(),
                                        TextInput::make('testimonial_heading')
                                            ->label('Section Heading')
                                            ->columnSpanFull(),
                                        Repeater::make('testimonial_items')
                                            ->label('Testimonials Repeater')
                                            ->createItemButtonLabel('Add Testimonial')
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label('Client Name')
                                                    ->required(),
                                                TextInput::make('role')
                                                    ->label('Role / Company')
                                                    ->required(),
                                                TextInput::make('avatar_initials')
                                                    ->label('Avatar Initials (e.g. LC)')
                                                    ->required(),
                                                Textarea::make('quote')
                                                    ->label('Testimonial Quote')
                                                    ->required(),
                                                TextInput::make('rating')
                                                    ->label('Rating Stars (1 - 5)')
                                                    ->numeric()
                                                    ->default(5)
                                                    ->required(),
                                            ])
                                            ->columns(1)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 6. Credentials & Media Press
                        Tab::make('Credentials')
                            ->schema([
                                Section::make('Credentials Visibility & Order')
                                    ->schema([
                                        Toggle::make('credentials_status')->label('Show Credentials Section')->default(true),
                                        TextInput::make('credentials_order')->label('Sort Order (e.g. 6)')->numeric()->default(6),
                                    ])->columns(2),

                                Section::make('Credentials Section Header')
                                    ->schema([
                                        TextInput::make('credential_title')
                                            ->label('Section Subtitle Badge')
                                            ->placeholder('e.g. CREDENTIALS')
                                            ->columnSpanFull(),
                                        TextInput::make('credential_heading')
                                            ->label('Section Main Heading')
                                            ->placeholder('e.g. Awards, Certifications & Media')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Awards & Certifications Card')
                                    ->schema([
                                        Repeater::make('awards_items')
                                            ->label('Awards & Certifications List')
                                            ->createItemButtonLabel('Add Award / Certification')
                                            ->schema([
                                                TextInput::make('year')
                                                    ->label('Year')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title / Details')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Media & Press Card')
                                    ->schema([
                                        Repeater::make('media_items')
                                            ->label('Media & Press List')
                                            ->createItemButtonLabel('Add Media Press Item')
                                            ->schema([
                                                TextInput::make('year')
                                                    ->label('Year')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title / Mention Details')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Media & Award Showcase Gallery (4 Cards)')
                                    ->schema([
                                        Repeater::make('credential_showcase_items')
                                            ->label('Showcase Cards')
                                            ->createItemButtonLabel('Add Showcase Card')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Card Image')
                                                    ->disk('uploads')
                                                    ->image(),
                                                TextInput::make('caption')
                                                    ->label('Caption Bar Text')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 7. Products Section
                        Tab::make('Products')
                            ->schema([
                                Section::make('Products Section Visibility & Order')
                                    ->schema([
                                        Toggle::make('products_status')->label('Show Products Section on Homepage')->default(true),
                                        TextInput::make('products_order')->label('Sort Order (e.g. 7)')->numeric()->default(7),
                                    ])->columns(2),
                            ]),

                        // 8. Service Models (3 Ways to Work)
                        Tab::make('Service Models')
                            ->schema([
                                Section::make('Service Models Visibility & Order')
                                    ->schema([
                                        Toggle::make('service_models_status')->label('Show Service Models Section')->default(true),
                                        TextInput::make('service_models_order')->label('Sort Order (e.g. 8)')->numeric()->default(8),
                                    ])->columns(2),

                                Section::make('3 Service Offerings Configuration')
                                    ->schema([
                                        TextInput::make('service_models_title')
                                            ->label('Section Subtitle Badge')
                                            ->placeholder('e.g. THREE DISTINCT SERVICE MODELS')
                                            ->columnSpanFull(),
                                        TextInput::make('service_models_heading')
                                            ->label('Section Main Heading')
                                            ->placeholder('e.g. Specialized Trichology & Sales Solutions')
                                            ->columnSpanFull(),
                                        Repeater::make('service_models_items')
                                            ->label('Service Model Cards')
                                            ->createItemButtonLabel('Add Service Model')
                                            ->schema([
                                                TextInput::make('badge')
                                                    ->label('Upper Badge / Ribbon')
                                                    ->placeholder('e.g. On-Site Assessment Days'),
                                                TextInput::make('icon')
                                                    ->label('Emoji Icon')
                                                    ->placeholder('e.g. 🚗 or 💻 or 🤝'),
                                                TextInput::make('title')
                                                    ->label('Service Title')
                                                    ->placeholder('e.g. 1. Traveling Trichologist')
                                                    ->required(),
                                                TextInput::make('subtitle')
                                                    ->label('Subtitle / Tagline')
                                                    ->placeholder('e.g. Bring Specialized Trichology Directly to Your Salon'),
                                                TextInput::make('tag')
                                                    ->label('Target Audience Tag')
                                                    ->placeholder('e.g. For Local & Regional Salons'),
                                                TextInput::make('button_label')
                                                    ->label('CTA Button Label')
                                                    ->placeholder('e.g. Schedule Salon Assessment Day →'),
                                                TextInput::make('button_url')
                                                    ->label('CTA Button Link')
                                                    ->placeholder('e.g. #contact'),
                                                Textarea::make('description')
                                                    ->label('Full Description')
                                                    ->rows(3)
                                                    ->columnSpanFull(),
                                                TagsInput::make('highlights')
                                                    ->label('Key Highlights / Checkmark Bullets')
                                                    ->placeholder('Add a bullet point and press Enter')
                                                    ->helperText('Press Enter after each bullet point to add it to the list')
                                                    ->columnSpanFull(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 9. Dual Perspective Advantage
                        Tab::make('Dual Perspective')
                            ->schema([
                                Section::make('Dual Perspective Visibility & Order')
                                    ->schema([
                                        Toggle::make('perspective_status')->label('Show Dual Perspective Section')->default(true),
                                        TextInput::make('perspective_order')->label('Sort Order (e.g. 9)')->numeric()->default(9),
                                    ])->columns(2),

                                Section::make('Client & Professional Perspective Section')
                                    ->schema([
                                        TextInput::make('perspective_title')
                                            ->label('Section Subtitle Badge')
                                            ->placeholder('e.g. THE DUAL PERSPECTIVE ADVANTAGE')
                                            ->columnSpanFull(),
                                        TextInput::make('perspective_heading')
                                            ->label('Section Main Heading')
                                            ->placeholder('e.g. 30 Years of Experience — From Both Sides')
                                            ->columnSpanFull(),
                                        Textarea::make('perspective_quote')
                                            ->label('Personal Story Quote')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Repeater::make('perspective_items')
                                            ->label('Core Advantage Pillars')
                                            ->createItemButtonLabel('Add Advantage Pillar')
                                            ->schema([
                                                TextInput::make('number')->label('Number (e.g. 01)'),
                                                TextInput::make('title')->label('Pillar Title')->required(),
                                                Textarea::make('description')->label('Pillar Description')->rows(2)->columnSpanFull(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 10. Intake Form / Contact
                        Tab::make('Contact Form')
                            ->schema([
                                Section::make('Contact Form Visibility & Order')
                                    ->schema([
                                        Toggle::make('contact_status')->label('Show Contact Form Section')->default(true),
                                        TextInput::make('contact_order')->label('Sort Order (e.g. 10)')->numeric()->default(10),
                                    ])->columns(2),

                                Section::make('Intake Form Header & Details')
                                    ->schema([
                                        TextInput::make('contact_title')
                                            ->label('Section Badge')
                                            ->columnSpanFull(),
                                        TextInput::make('contact_heading')
                                            ->label('Section Heading')
                                            ->columnSpanFull(),
                                        Textarea::make('contact_paragraph')
                                            ->label('Short Introduction Paragraph')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Dropdown Options Configuration')
                                    ->schema([
                                        Repeater::make('contact_business_types')
                                            ->label('Business Type Options')
                                            ->createItemButtonLabel('Add Business Type Option')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Option Name / Label')
                                                    ->required(),
                                            ])
                                            ->columnSpanFull(),

                                        Repeater::make('contact_primary_interests')
                                            ->label('Primary Interest Options')
                                            ->createItemButtonLabel('Add Primary Interest Option')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Option Name / Label')
                                                    ->required(),
                                            ])
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 11. Footer Section
                        Tab::make('Footer')
                            ->schema([
                                Section::make('Footer Details & Contact Info')
                                    ->schema([
                                        Textarea::make('footer_description')
                                            ->label('Footer Short Description')
                                            ->columnSpanFull(),
                                        TextInput::make('footer_phone')
                                            ->label('Footer Phone Number')
                                            ->placeholder('e.g. 303-718-1870'),
                                        TextInput::make('footer_location')
                                            ->label('Footer Location')
                                            ->placeholder('e.g. North Palm Beach, FL'),
                                        TextInput::make('footer_email')
                                            ->label('Footer Email Address')
                                            ->email(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_name')
                    ->label('Hero Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_designation')
                    ->label('Designation'),
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
            'index' => Pages\ListHomepageSettings::route('/'),
            'edit' => Pages\EditHomepageSetting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        HomepageSetting::firstOrCreate(['id' => 1]);

        return parent::getEloquentQuery()->where('id', 1);
    }

    public static function getNavigationItems(): array
    {
        $setting = HomepageSetting::firstOrCreate(['id' => 1]);

        return [
            NavigationItem::make('Homepage Settings')
                ->url(static::getUrl('edit', ['record' => $setting->id]))
                ->icon(Heroicon::OutlinedHome)
                ->group('Settings'),
        ];
    }
}
