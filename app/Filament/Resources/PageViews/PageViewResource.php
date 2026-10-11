<?php

namespace App\Filament\Resources\PageViews;

use App\Filament\Resources\PageViews\Pages\ListPageViews;
use App\Filament\Resources\PageViews\Pages\ViewPageView;
use App\Filament\Resources\PageViews\Schemas\PageViewForm;
use App\Filament\Resources\PageViews\Tables\PageViewsTable;
use App\Models\PageView;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PageViewResource extends Resource
{
    protected static ?string $model = PageView::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static UnitEnum|string|null $navigationGroup = 'Analytics & Insights';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Website Views & Traffic';

    protected static ?string $modelLabel = 'Page View';

    protected static ?string $pluralModelLabel = 'Page Views';

    public static function getNavigationBadge(): ?string
    {
        $today = PageView::today()->count();

        return $today > 0 ? "{$today} today" : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }

    public static function form(Schema $schema): Schema
    {
        return PageViewForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageViewsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPageViews::route('/'),
            'view' => ViewPageView::route('/{record}'),
        ];
    }
}
