<?php

namespace App\Filament\Widgets;

use App\Models\GalleryItem;
use App\Models\Inquiry;
use App\Models\PageView;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = '15s';

    /**
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        $totalViews = PageView::count();
        $todayViews = PageView::whereDate('viewed_at', Carbon::today())->count();
        $yesterdayViews = PageView::whereDate('viewed_at', Carbon::yesterday())->count();

        // Calculate today vs yesterday growth %
        $todayDiff = $todayViews - $yesterdayViews;
        $todayDiffText = $todayDiff >= 0 ? "+{$todayDiff} vs yesterday" : "{$todayDiff} vs yesterday";
        $todayDiffIcon = $todayDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $todayDiffColor = $todayDiff >= 0 ? 'success' : 'danger';

        // 7-day trend sparkline
        $trend = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $trend[] = PageView::whereDate('viewed_at', $date)->count();
        }

        $uniqueVisitors = PageView::distinct('ip_address')->count('ip_address');
        $totalInquiries = Inquiry::count();
        $unreadInquiries = Inquiry::where('status', 'new')->orWhereNull('status')->count();
        $activeCases = GalleryItem::where('is_active', true)->count();

        $mobileViews = PageView::where('device_type', 'mobile')->count();
        $mobileShare = $totalViews > 0 ? round(($mobileViews / $totalViews) * 100) : 0;

        return [
            Stat::make('Total Website Views', number_format($totalViews))
                ->description('All recorded traffic')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->chart($trend)
                ->color('primary'),

            Stat::make("Today's Page Views", number_format($todayViews))
                ->description($todayDiffText)
                ->descriptionIcon($todayDiffIcon)
                ->color($todayDiffColor),

            Stat::make('Unique Visitors', number_format($uniqueVisitors))
                ->description('Distinct IP / Client Sessions')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Consultation Leads', number_format($totalInquiries))
                ->description("{$unreadInquiries} pending review")
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color($unreadInquiries > 0 ? 'warning' : 'success'),

            Stat::make('Mobile Share', "{$mobileShare}%")
                ->description('Smartphone & Tablet Traffic')
                ->descriptionIcon('heroicon-m-device-phone-mobile')
                ->color('gray'),

            Stat::make('Published Showcase Cases', number_format($activeCases))
                ->description('Client Transformations')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success'),
        ];
    }
}
