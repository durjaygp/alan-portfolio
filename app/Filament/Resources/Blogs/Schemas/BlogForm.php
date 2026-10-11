<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogForm
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
                        Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('user_id')
                            ->label('Author')
                            ->relationship('user', 'name')
                            ->default(fn () => auth()->id())
                            ->searchable()
                            ->preload(),
                        FileUpload::make('image')
                            ->image()
                            ->disk('uploads')
                            ->directory('blogs')
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Short Description / Excerpt')
                            ->rows(3)
                            ->columnSpanFull(),
                        RichEditor::make('main_content')
                            ->label('Main Content')
                            ->columnSpanFull(),
                        Toggle::make('status')
                            ->label('Published')
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
