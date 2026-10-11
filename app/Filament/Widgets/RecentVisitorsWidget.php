<?php

namespace App\Filament\Widgets;

use App\Models\PageView;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentVisitorsWidget extends BaseWidget
{
    protected static ?string $heading = 'Live Visitor Activity Stream';

    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = 'full';

    protected ?string $pollingInterval = '10s';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Live Visitor Activity Stream')
            ->query(
                PageView::query()->latest('viewed_at')
            )
            ->columns([
                TextColumn::make('page_title')
                    ->label('Page Visited')
                    ->description(fn (PageView $record) => $record->path)
                    ->searchable(['page_title', 'path']),

                TextColumn::make('device_type')
                    ->label('Device')
                    ->badge()
                    ->colors([
                        'primary' => 'desktop',
                        'success' => 'mobile',
                        'warning' => 'tablet',
                        'gray' => 'bot',
                    ]),

                TextColumn::make('browser')
                    ->label('Browser / OS')
                    ->description(fn (PageView $record) => $record->platform ?: 'Unknown')
                    ->badge()
                    ->color('info'),

                TextColumn::make('referer_host')
                    ->label('Source / Referer')
                    ->placeholder('Direct Traffic')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('viewed_at')
                    ->label('Time Ago')
                    ->since()
                    ->sortable(),
            ])
            ->paginated([5, 10, 25]);
    }
}
