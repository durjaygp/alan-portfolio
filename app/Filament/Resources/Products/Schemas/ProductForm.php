<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Details')
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->prefix('$'),
                        TextInput::make('original_price')
                            ->numeric()
                            ->prefix('$'),
                        TextInput::make('badge')
                            ->placeholder('e.g. Best Seller, New'),
                        TextInput::make('icon')
                            ->required()
                            ->default('🧴'),
                    ])->columns(2),

                Section::make('Product Media & Gallery')
                    ->components([
                        FileUpload::make('image')
                            ->label('Main Featured Image')
                            ->image()
                            ->disk('uploads')
                            ->directory('products'),
                        FileUpload::make('thumbnail')
                            ->label('Product Thumbnail')
                            ->image()
                            ->disk('uploads')
                            ->directory('products'),
                        FileUpload::make('images')
                            ->label('Product Gallery Images (Multiple)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->disk('uploads')
                            ->directory('products')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Product Content & Specs')
                    ->components([
                        Textarea::make('short_description')
                            ->label('Short Summary / Excerpt')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->label('Full Description')
                            ->columnSpanFull(),
                        Textarea::make('included_items')
                            ->label('Included Items')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('overview_instructions')
                            ->label('Usage Instructions')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('ingredients_safety')
                            ->label('Ingredients & Safety Info')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('SEO Content')
                    ->components([
                        Textarea::make('seo_description')
                            ->label('SEO Description')
                            ->rows(2)
                            ->columnSpanFull(),
                        TextInput::make('seo_tags')
                            ->label('SEO Tags (comma-separated)'),
                        TextInput::make('seo_keywords')
                            ->label('SEO Keywords'),
                    ])->columns(2),

                Section::make('Publishing & Display')
                    ->components([
                        TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('status')
                            ->label('Active / Published')
                            ->default(true)
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
