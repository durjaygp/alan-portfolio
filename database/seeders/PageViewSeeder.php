<?php

namespace Database\Seeders;

use App\Models\PageView;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PageView::count() > 0) {
            return;
        }

        $pages = [
            ['path' => '/home-2', 'route' => 'home.v2', 'title' => 'Homepage V2 — Every Side of the Chair', 'weight' => 35],
            ['path' => '/virtual-sales-consultant', 'route' => 'virtual-sales-consultant', 'title' => 'Virtual Sales Consultant Support', 'weight' => 22],
            ['path' => '/gallery', 'route' => 'gallery', 'title' => 'Transformations & Clinical Showcase', 'weight' => 15],
            ['path' => '/about', 'route' => 'about', 'title' => 'About Alan Humphreys — 30+ Years Story', 'weight' => 12],
            ['path' => '/blog', 'route' => 'blog', 'title' => 'Knowledge Library & Insights', 'weight' => 8],
            ['path' => '/', 'route' => 'home', 'title' => 'Homepage — Non-Surgical Hair Solutions', 'weight' => 5],
            ['path' => '/products', 'route' => 'products', 'title' => 'Products & Medical Grade Solutions', 'weight' => 3],
        ];

        $referers = [
            ['referer' => 'https://www.google.com/search?q=hair+replacement+consultant', 'host' => 'google.com', 'weight' => 40],
            ['referer' => 'https://www.linkedin.com/in/alan-humphreys', 'host' => 'linkedin.com', 'weight' => 25],
            ['referer' => 'https://www.instagram.com/alan_humphreys_consulting', 'host' => 'instagram.com', 'weight' => 15],
            ['referer' => 'https://www.youtube.com/@AlanHumphreysHair', 'host' => 'youtube.com', 'weight' => 10],
            ['referer' => null, 'host' => null, 'weight' => 10], // Direct traffic
        ];

        $devices = [
            ['device' => 'desktop', 'browser' => 'Chrome', 'platform' => 'Windows 10/11', 'ua' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0.0.0 Safari/537.36', 'weight' => 52],
            ['device' => 'mobile', 'browser' => 'Safari', 'platform' => 'iOS', 'ua' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3 like Mac OS X) AppleWebKit/605.1.15 Mobile/15E148 Safari/604.1', 'weight' => 33],
            ['device' => 'desktop', 'browser' => 'Safari', 'platform' => 'macOS', 'ua' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 Safari/605.1.15', 'weight' => 8],
            ['device' => 'tablet', 'browser' => 'Safari', 'platform' => 'iOS', 'ua' => 'Mozilla/5.0 (iPad; CPU OS 17_2 like Mac OS X) AppleWebKit/605.1.15 Mobile/15E148', 'weight' => 4],
            ['device' => 'mobile', 'browser' => 'Chrome', 'platform' => 'Android', 'ua' => 'Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 Chrome/121.0.6167.143 Mobile Safari/537.36', 'weight' => 3],
        ];

        $records = [];
        $now = Carbon::now();

        // Seed views spread over the past 30 days with natural variance and growing trend
        for ($day = 30; $day >= 0; $day--) {
            $date = (clone $now)->subDays($day);
            // Day volume increases on weekdays and closer to current date
            $baseViews = rand(15, 30) + (30 - $day);
            if ($date->isWeekend()) {
                $baseViews = (int) ($baseViews * 0.7);
            }

            for ($v = 0; $v < $baseViews; $v++) {
                $hour = rand(8, 23);
                $minute = rand(0, 59);
                $second = rand(0, 59);
                $viewedAt = (clone $date)->setHour($hour)->setMinute($minute)->setSecond($second);

                $page = $this->weightedRandom($pages);
                $device = $this->weightedRandom($devices);
                $refererInfo = $this->weightedRandom($referers);

                $records[] = [
                    'url' => 'http://127.0.0.1:8000'.$page['path'],
                    'path' => $page['path'],
                    'route_name' => $page['route'],
                    'page_title' => $page['title'],
                    'ip_address' => '192.168.'.rand(1, 10).'.'.rand(10, 250),
                    'user_agent' => $device['ua'],
                    'device_type' => $device['device'],
                    'browser' => $device['browser'],
                    'platform' => $device['platform'],
                    'referer' => $refererInfo['referer'],
                    'referer_host' => $refererInfo['host'],
                    'session_id' => Str::random(32),
                    'user_id' => null,
                    'viewed_at' => $viewedAt,
                    'created_at' => $viewedAt,
                    'updated_at' => $viewedAt,
                ];

                if (count($records) >= 200) {
                    PageView::insert($records);
                    $records = [];
                }
            }
        }

        if (count($records) > 0) {
            PageView::insert($records);
        }
    }

    /**
     * Pick random item by weight.
     *
     * @param  array<array<string, mixed>>  $items
     * @return array<string, mixed>
     */
    protected function weightedRandom(array $items): array
    {
        $totalWeight = array_sum(array_column($items, 'weight'));
        $randomWeight = rand(1, $totalWeight);

        $currentWeight = 0;
        foreach ($items as $item) {
            $currentWeight += $item['weight'];
            if ($randomWeight <= $currentWeight) {
                return $item;
            }
        }

        return $items[0];
    }
}
