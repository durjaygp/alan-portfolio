<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static ?string $navigationLabel = 'Website Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Website Settings Tabs')
                    ->tabs([
                        // Tab 1: General & Branding
                        Tab::make('General & Branding')
                            ->icon('heroicon-o-building-storefront')
                            ->schema([
                                Section::make('Site Identity')
                                    ->description('Configure primary brand title, slogan, and header action details.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('site_name')
                                                ->label('Website Name / Title')
                                                ->required()
                                                ->placeholder('Alan Humphreys'),

                                            TextInput::make('site_tagline')
                                                ->label('Brand Tagline / Slogan')
                                                ->placeholder('Hair Replacement & Trichology Business Consultant'),

                                            TextInput::make('header_cta_text')
                                                ->label('Header CTA Button Label')
                                                ->placeholder('Book a Call'),

                                            TextInput::make('header_cta_url')
                                                ->label('Header CTA Button URL')
                                                ->placeholder('#contact'),

                                            TextInput::make('copyright_text')
                                                ->label('Footer Copyright Notice')
                                                ->placeholder('© 2026 Alan Humphreys. All rights reserved.')
                                                ->columnSpanFull(),
                                        ]),
                                    ]),

                                Section::make('Brand Assets & Favicon')
                                    ->description('Upload custom brand logos and website browser favicon.')
                                    ->schema([
                                        Grid::make(3)->schema([
                                            FileUpload::make('favicon')
                                                ->label('Website Favicon (.ico, .png, .svg)')
                                                ->disk('uploads')
                                                ->directory('settings')
                                                ->image()
                                                ->acceptedFileTypes(['image/x-icon', 'image/vnd.microsoft.icon', 'image/png', 'image/svg+xml', 'image/jpeg'])
                                                ->helperText('Recommended: 32x32px or 64x64px PNG/ICO/SVG'),

                                            FileUpload::make('site_logo')
                                                ->label('Primary Brand Logo (Light Mode)')
                                                ->disk('uploads')
                                                ->directory('settings')
                                                ->image()
                                                ->helperText('Displayed in main header and footer navigation'),

                                            FileUpload::make('site_logo_dark')
                                                ->label('Brand Logo (Dark Mode)')
                                                ->disk('uploads')
                                                ->directory('settings')
                                                ->image()
                                                ->helperText('Optional contrast logo for dark mode theme'),
                                        ]),
                                    ]),
                            ]),

                        // Tab 2: SEO & Meta Tags
                        Tab::make('SEO & Social Meta')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('Search Engine Optimization (SEO)')
                                    ->description('Default meta titles and descriptions used by search engines (Google, Bing, Yahoo).')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Default SEO Title Tag')
                                            ->placeholder('Alan Humphreys — Hair Loss Solutions Expert, Consultant & Industry Innovator')
                                            ->helperText('Optimal length: 50-60 characters')
                                            ->columnSpanFull(),

                                        Textarea::make('meta_description')
                                            ->label('Default Meta Description')
                                            ->rows(3)
                                            ->placeholder('Alan Humphreys — 30+ year veteran in hair loss solutions. Industry expert, certified trichologist, business consultant, and brand ambassador.')
                                            ->helperText('Optimal length: 150-160 characters')
                                            ->columnSpanFull(),

                                        TagsInput::make('meta_keywords')
                                            ->label('SEO Keywords')
                                            ->placeholder('Add keyword and press enter...')
                                            ->helperText('Important search queries and topics for your brand')
                                            ->columnSpanFull(),

                                        TextInput::make('meta_author')
                                            ->label('Meta Author')
                                            ->placeholder('Alan Humphreys'),
                                    ]),

                                Section::make('Social Share Previews (Open Graph & Twitter Cards)')
                                    ->description('Customize how pages appear when shared on LinkedIn, WhatsApp, Facebook, iMessage, and X (Twitter).')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            FileUpload::make('og_image')
                                                ->label('Social Share Image (og:image)')
                                                ->disk('uploads')
                                                ->directory('settings')
                                                ->image()
                                                ->helperText('Recommended: 1200x630px JPG/PNG for crisp previews on Facebook, LinkedIn & Twitter'),

                                            Grid::make(1)->schema([
                                                Select::make('og_type')
                                                    ->label('Open Graph Type')
                                                    ->options([
                                                        'website' => 'Website',
                                                        'profile' => 'Profile',
                                                        'business.business' => 'Business',
                                                        'article' => 'Article',
                                                    ])
                                                    ->default('website'),

                                                Select::make('twitter_card')
                                                    ->label('Twitter Card Type')
                                                    ->options([
                                                        'summary_large_image' => 'Large Image Card (Recommended)',
                                                        'summary' => 'Small Summary Card',
                                                    ])
                                                    ->default('summary_large_image'),

                                                TextInput::make('twitter_handle')
                                                    ->label('Twitter / X Handle')
                                                    ->placeholder('@AlanHumphreys'),
                                            ]),
                                        ]),
                                    ]),
                            ]),

                        // Tab 3: Contact & Social Media
                        Tab::make('Contact & Social')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Section::make('Business Contact Information')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('contact_email')
                                                ->label('Contact Email Address')
                                                ->email()
                                                ->placeholder('alanhumphreys72@gmail.com'),

                                            TextInput::make('contact_phone')
                                                ->label('Direct Phone Number')
                                                ->tel()
                                                ->placeholder('303-718-1870'),

                                            TextInput::make('whatsapp_number')
                                                ->label('WhatsApp Number (with country code)')
                                                ->placeholder('+13037181870'),

                                            TextInput::make('contact_address')
                                                ->label('Physical / Service Location')
                                                ->placeholder('North Palm Beach, Florida (Serving Nationwide)'),
                                        ]),
                                    ]),

                                Section::make('Social Media Profiles')
                                    ->description('Enter direct profile links for icons and footer links across the website.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('linkedin_url')
                                                ->label('LinkedIn Profile URL')
                                                ->url()
                                                ->placeholder('https://linkedin.com/in/...'),

                                            TextInput::make('instagram_url')
                                                ->label('Instagram Profile URL')
                                                ->url()
                                                ->placeholder('https://instagram.com/...'),

                                            TextInput::make('youtube_url')
                                                ->label('YouTube Channel URL')
                                                ->url()
                                                ->placeholder('https://youtube.com/@...'),

                                            TextInput::make('facebook_url')
                                                ->label('Facebook Page URL')
                                                ->url()
                                                ->placeholder('https://facebook.com/...'),

                                            TextInput::make('twitter_url')
                                                ->label('Twitter / X Profile URL')
                                                ->url()
                                                ->placeholder('https://x.com/...'),
                                        ]),
                                    ]),
                            ]),

                        // Tab 4: Analytics & Custom Code Injection
                        Tab::make('Analytics & Scripts')
                            ->icon('heroicon-o-code-bracket')
                            ->schema([
                                Section::make('Google Analytics & Tag Manager')
                                    ->schema([
                                        TextInput::make('google_analytics_id')
                                            ->label('Google Analytics Measurement ID (GA4)')
                                            ->placeholder('G-XXXXXXXXXX')
                                            ->helperText('Enter your GA4 Measurement ID to automatically inject the Google tag.'),
                                    ]),

                                Section::make('Custom Scripts & Tracking Injections')
                                    ->description('Inject custom tracking tags, Meta Pixels, font links, or live chat scripts.')
                                    ->schema([
                                        Textarea::make('custom_head_scripts')
                                            ->label('Header Scripts (Inside <head>...</head>)')
                                            ->rows(6)
                                            ->placeholder("<script>\n  // Google Tag Manager / Meta Pixel / Custom CSS\n</script>")
                                            ->helperText('Raw HTML/Javascript injected directly inside the page <head> section.'),

                                        Textarea::make('custom_body_scripts')
                                            ->label('Footer Scripts (Before </body>)')
                                            ->rows(6)
                                            ->placeholder("<script>\n  // Live chat widget / Conversion event tracking\n</script>")
                                            ->helperText('Raw HTML/Javascript injected directly before the closing </body> tag.'),
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
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Site Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->label('SEO Title')
                    ->limit(40),
                Tables\Columns\TextColumn::make('contact_email')
                    ->label('Email'),
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
            'index' => Pages\ListSiteSettings::route('/'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        SiteSetting::firstOrCreate(['id' => 1]);

        return parent::getEloquentQuery()->where('id', 1);
    }

    public static function getNavigationItems(): array
    {
        $setting = SiteSetting::firstOrCreate(['id' => 1]);

        return [
            NavigationItem::make('Website Settings')
                ->url(static::getUrl('edit', ['record' => $setting->id]))
                ->icon(Heroicon::OutlinedGlobeAlt)
                ->group('Settings')
                ->sort(0),
        ];
    }
}
