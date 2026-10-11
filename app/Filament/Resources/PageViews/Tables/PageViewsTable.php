<?php

namespace App\Filament\Resources\PageViews\Tables;

use App\Models\PageView;
use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PageViewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('viewed_at', 'desc')
            ->columns([
                TextColumn::make('page_title')
                    ->label('Page Visited')
                    ->description(fn (PageView $record) => $record->path)
                    ->searchable(['page_title', 'path', 'url'])
                    ->sortable(),

                TextColumn::make('device_type')
                    ->label('Device')
                    ->badge()
                    ->colors([
                        'primary' => 'desktop',
                        'success' => 'mobile',
                        'warning' => 'tablet',
                        'gray' => 'bot',
                    ])
                    ->sortable(),

                TextColumn::make('browser')
                    ->label('Browser / OS')
                    ->description(fn (PageView $record) => $record->platform ?: 'Unknown')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('referer_host')
                    ->label('Traffic Source')
                    ->placeholder('Direct Traffic')
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('session_id')
                    ->label('Session')
                    ->limit(12)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('viewed_at')
                    ->label('Viewed At')
                    ->dateTime('M d, Y · h:i A')
                    ->since()
                    ->description(fn (PageView $record) => $record->viewed_at?->format('M d, Y h:i A'))
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('device_type')
                    ->label('Device Type')
                    ->options([
                        'desktop' => 'Desktop',
                        'mobile' => 'Mobile',
                        'tablet' => 'Tablet',
                        'bot' => 'Bot / Spider',
                    ]),

                SelectFilter::make('browser')
                    ->label('Browser')
                    ->options([
                        'Chrome' => 'Google Chrome',
                        'Safari' => 'Apple Safari',
                        'Edge' => 'Microsoft Edge',
                        'Firefox' => 'Mozilla Firefox',
                        'Opera' => 'Opera',
                    ]),

                Filter::make('today')
                    ->label('Today Only')
                    ->query(fn (Builder $query): Builder => $query->whereDate('viewed_at', Carbon::today())),

                Filter::make('last_7_days')
                    ->label('Last 7 Days')
                    ->query(fn (Builder $query): Builder => $query->where('viewed_at', '>=', Carbon::now()->subDays(7)->startOfDay())),

                Filter::make('this_month')
                    ->label('This Month')
                    ->query(fn (Builder $query): Builder => $query->whereYear('viewed_at', Carbon::now()->year)->whereMonth('viewed_at', Carbon::now()->month)),
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
