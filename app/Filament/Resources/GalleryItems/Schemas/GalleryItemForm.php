<?php

namespace App\Filament\Resources\GalleryItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->components([
                        TextInput::make('title')
                            ->label('Title / Headline')
                            ->placeholder('e.g. Complete Frontal Hairline Restoration')
                            ->required()
                            ->columnSpan(2),

                        TextInput::make('subtitle')
                            ->label('Subtitle / Technique')
                            ->placeholder('e.g. Custom Non-Surgical Hair Replacement System')
                            ->columnSpan(2),

                        Select::make('category')
                            ->label('Category')
                            ->options([
                                'Hair Transformations' => 'Hair Transformations',
                                'Clinical Trichology' => 'Clinical Trichology',
                                'Speaking & Events' => 'Speaking & Events',
                                'Awards & Recognition' => 'Awards & Recognition',
                                'Media & Press' => 'Media & Press',
                            ])
                            ->default('Hair Transformations')
                            ->required()
                            ->searchable(),

                        TextInput::make('badge')
                            ->label('Badge / Ribbon Text')
                            ->placeholder('e.g. Featured Case, Award Winning, New'),

                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),

                        Toggle::make('is_featured')
                            ->label('Featured Item')
                            ->helperText('Spotlight in top highlights')
                            ->default(false),

                        Toggle::make('is_active')
                            ->label('Visible on Website')
                            ->default(true)
                            ->required(),
                    ])->columns(2),

                Section::make('Visual Assets')
                    ->description('Upload main showcase photo, or enable Before & After comparison images.')
                    ->components([
                        FileUpload::make('image')
                            ->label('Main Display Image')
                            ->image()
                            ->disk('uploads')
                            ->directory('gallery')
                            ->columnSpanFull(),

                        Toggle::make('is_before_after')
                            ->label('Enable Before & After Mode')
                            ->helperText('Show interactive before & after slider / side-by-side view')
                            ->reactive()
                            ->columnSpanFull(),

                        FileUpload::make('before_image')
                            ->label('Before Photo')
                            ->image()
                            ->disk('uploads')
                            ->directory('gallery')
                            ->visible(fn ($get) => (bool) $get('is_before_after')),

                        FileUpload::make('after_image')
                            ->label('After Photo')
                            ->image()
                            ->disk('uploads')
                            ->directory('gallery')
                            ->visible(fn ($get) => (bool) $get('is_before_after')),
                    ])->columns(2),

                Section::make('Case Details & Description')
                    ->components([
                        TextInput::make('client_name')
                            ->label('Client / Location Tag')
                            ->placeholder('e.g. Michael R. (Denver, CO) or Global Hair Summit'),

                        TextInput::make('service_type')
                            ->label('Service / Procedure Type')
                            ->placeholder('e.g. Custom Hair Replacement, Trichology Diagnosis'),

                        TextInput::make('timeframe')
                            ->label('Timeframe / Milestone')
                            ->placeholder('e.g. Day 1 Result, 6 Months Progress'),

                        Textarea::make('description')
                            ->label('Detailed Case Study / Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }
}
