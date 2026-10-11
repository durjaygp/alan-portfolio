<?php

namespace App\Filament\Resources\GalleryItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class GalleryItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('uploads')
                    ->square()
                    ->defaultImageUrl(fn ($record) => $record?->image_url),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->subtitle),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->colors([
                        'primary' => 'Hair Transformations',
                        'success' => 'Clinical Trichology',
                        'warning' => 'Speaking & Events',
                        'info' => 'Awards & Recognition',
                        'gray' => 'Media & Press',
                    ])
                    ->sortable()
                    ->searchable(),

                IconColumn::make('is_before_after')
                    ->label('B/A Mode')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'Hair Transformations' => 'Hair Transformations',
                        'Clinical Trichology' => 'Clinical Trichology',
                        'Speaking & Events' => 'Speaking & Events',
                        'Awards & Recognition' => 'Awards & Recognition',
                        'Media & Press' => 'Media & Press',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Active Status'),

                TernaryFilter::make('is_featured')
                    ->label('Featured Status'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
