<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->columnSpanFull(),
                        Toggle::make('status')
                            ->label('Active')
                            ->default(true)
                            ->required(),
                    ])->columns(2),

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
            ]);
    }
}
