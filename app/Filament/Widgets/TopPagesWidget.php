<?php

namespace App\Filament\Widgets;

use App\Models\PageView;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\DB;

class TopPagesWidget extends BaseWidget
{
    protected static ?string $heading = 'Top Visited Pages';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 1;

    public function table(Table $table): Table
    {
        $totalAllViews = max(1, PageView::count());

        return $table
            ->heading('Top Visited Pages')
            ->defaultSort('total_views', 'desc')
            ->query(
                PageView::query()->fromSub(
                    PageView::query()
                        ->select(
                            DB::raw('min(id) as id'),
                            'path',
                            DB::raw('max(page_title) as page_title'),
                            DB::raw('count(*) as total_views'),
                            DB::raw('count(distinct ip_address) as unique_visitors'),
                            DB::raw('max(viewed_at) as last_viewed_at')
                        )
                        ->groupBy('path'),
                    'page_views'
                )
            )
            ->columns([
                TextColumn::make('page_title')
                    ->label('Page')
                    ->description(fn ($record) => $record->path)
                    ->searchable(['page_title', 'path']),

                TextColumn::make('total_views')
                    ->label('Views')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('unique_visitors')
                    ->label('Uniques')
                    ->badge()
                    ->color('success'),

                TextColumn::make('share')
                    ->label('Share')
                    ->state(function ($record) use ($totalAllViews) {
                        return round(($record->total_views / $totalAllViews) * 100).'%';
                    })
                    ->badge()
                    ->color('gray'),
            ])
            ->paginated([5, 10]);
    }
}
