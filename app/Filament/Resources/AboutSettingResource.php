<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutSettingResource\Pages;
use App\Models\AboutSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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

class AboutSettingResource extends Resource
{
    protected static ?string $model = AboutSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static ?string $navigationLabel = 'About Page Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('About Page Settings')
                    ->tabs([
                        // 1. Banner Tab
                        Tab::make('Page Banner')
                            ->schema([
                                Section::make('Header Banner Details')
                                    ->schema([
                                        TextInput::make('banner_title')
                                            ->label('Banner Title')
                                            ->placeholder('e.g. The Full Story')
                                            ->columnSpanFull(),
                                        Textarea::make('banner_lead')
                                            ->label('Banner Lead Subtitle')
                                            ->placeholder('e.g. I didn\'t choose the hair industry — it chose me...')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 2. Origin Story Tab
                        Tab::make('Origin Story')
                            ->schema([
                                Section::make('Where It All Started Section')
                                    ->schema([
                                        TextInput::make('origin_label')
                                            ->label('Section Subtitle Badge')
                                            ->placeholder('e.g. Where It All Started'),
                                        TextInput::make('origin_heading')
                                            ->label('Section Main Heading')
                                            ->placeholder('e.g. The $10/Hour Kid Who Bought the Company'),
                                        Textarea::make('origin_para_1')
                                            ->label('Paragraph 1 (First Letter Drop-Cap)')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('origin_para_2')
                                            ->label('Paragraph 2')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('origin_quote')
                                            ->label('Quote / Emphasis Block')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                        Textarea::make('origin_para_3')
                                            ->label('Paragraph 3')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('origin_para_4')
                                            ->label('Paragraph 4')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('origin_para_5')
                                            ->label('Paragraph 5')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        FileUpload::make('origin_photo_1_image')
                                            ->label('Photo 1 (Transformation)')
                                            ->disk('uploads')
                                            ->image(),
                                        TextInput::make('origin_photo_1_caption')
                                            ->label('Photo 1 Caption'),
                                        FileUpload::make('origin_photo_2_image')
                                            ->label('Photo 2 (Portrait / Chair)')
                                            ->disk('uploads')
                                            ->image(),
                                        TextInput::make('origin_photo_2_caption')
                                            ->label('Photo 2 Caption'),
                                    ]),
                            ]),

                        // 3. Career Timeline Tab
                        Tab::make('Career Timeline')
                            ->schema([
                                Section::make('Timeline Configuration')
                                    ->schema([
                                        TextInput::make('timeline_label')
                                            ->label('Section Subtitle Badge')
                                            ->default('Career Timeline'),
                                        TextInput::make('timeline_heading')
                                            ->label('Section Main Heading')
                                            ->default('How It All Unfolded'),
                                        Repeater::make('timeline_items')
                                            ->label('Milestones / Timeline Items')
                                            ->createItemButtonLabel('Add Timeline Item')
                                            ->schema([
                                                TextInput::make('year')
                                                    ->label('Year')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Milestone Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Milestone Summary Description')
                                                    ->required()
                                                    ->rows(2),
                                            ])
                                            ->columns(1)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 4. COVID Story Tab
                        Tab::make('COVID Story')
                            ->schema([
                                Section::make('Surviving COVID Section')
                                    ->schema([
                                        TextInput::make('covid_label')
                                            ->label('Section Subtitle Badge')
                                            ->default('The Hard Part'),
                                        TextInput::make('covid_heading')
                                            ->label('Section Main Heading')
                                            ->default('Surviving COVID — and Coming Out Stronger'),
                                        Textarea::make('covid_para_1')
                                            ->label('Paragraph 1')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('covid_para_2')
                                            ->label('Paragraph 2')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('covid_quote')
                                            ->label('Highlight Quote')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                        Textarea::make('covid_para_3')
                                            ->label('Paragraph 3')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('covid_para_4')
                                            ->label('Paragraph 4')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 5. Philosophy Tab
                        Tab::make('Philosophy')
                            ->schema([
                                Section::make('My Philosophy Section')
                                    ->schema([
                                        TextInput::make('philosophy_label')
                                            ->label('Section Subtitle Badge')
                                            ->default('My Philosophy'),
                                        TextInput::make('philosophy_heading')
                                            ->label('Section Main Heading')
                                            ->default('What I Believe About This Industry'),
                                        Repeater::make('philosophy_items')
                                            ->label('Philosophy Principles / Cards')
                                            ->createItemButtonLabel('Add Philosophy Principle')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Number (e.g. 01)')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Principle Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Principle Details')
                                                    ->required()
                                                    ->rows(3),
                                            ])
                                            ->columns(1)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // 6. CTA Tab
                        Tab::make('Call to Action')
                            ->schema([
                                Section::make('Bottom Call to Action')
                                    ->schema([
                                        TextInput::make('cta_heading')
                                            ->label('CTA Heading')
                                            ->default('Ready to Work Together?'),
                                        Textarea::make('cta_text')
                                            ->label('CTA Paragraph Text')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                        TextInput::make('cta_button_label')
                                            ->label('CTA Button Label')
                                            ->default('Start the Conversation →'),
                                        TextInput::make('cta_button_url')
                                            ->label('CTA Button Link / Anchor')
                                            ->default('#contact'),
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
                Tables\Columns\TextColumn::make('banner_title')
                    ->label('Banner Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('origin_heading')
                    ->label('Origin Heading'),
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
            'index' => Pages\ListAboutSettings::route('/'),
            'edit' => Pages\EditAboutSetting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', 1);
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make('About Page Settings')
                ->url(static::getUrl('edit', ['record' => 1]))
                ->icon('heroicon-o-user')
                ->group('Settings'),
        ];
    }
}
