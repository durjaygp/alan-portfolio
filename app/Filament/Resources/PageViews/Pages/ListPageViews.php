<?php

namespace App\Filament\Resources\PageViews\Pages;

use App\Filament\Resources\PageViews\PageViewResource;
use App\Filament\Widgets\PageViewsChartWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use Filament\Resources\Pages\ListRecords;

class ListPageViews extends ListRecords
{
    protected static string $resource = PageViewResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            PageViewsChartWidget::class,
        ];
    }
}
