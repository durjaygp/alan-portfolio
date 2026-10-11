<?php

namespace App\Filament\Widgets;

use App\Models\PageView;
use Filament\Widgets\ChartWidget;

class DeviceBreakdownChartWidget extends ChartWidget
{
    protected ?string $heading = 'Traffic by Device Type';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 1;

    /**
     * @return array<string, mixed>
     */
    protected function getData(): array
    {
        $desktop = PageView::where('device_type', 'desktop')->count();
        $mobile = PageView::where('device_type', 'mobile')->count();
        $tablet = PageView::where('device_type', 'tablet')->count();
        $bot = PageView::where('device_type', 'bot')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Devices',
                    'data' => [$desktop, $mobile, $tablet, $bot],
                    'backgroundColor' => [
                        '#3b82f6', // Desktop - Blue
                        '#10b981', // Mobile - Emerald
                        '#f59e0b', // Tablet - Amber
                        '#64748b', // Bot / Other - Slate
                    ],
                ],
            ],
            'labels' => ['Desktop', 'Mobile', 'Tablet', 'Crawlers / Bots'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
