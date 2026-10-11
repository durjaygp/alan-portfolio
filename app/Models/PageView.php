<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'path',
        'route_name',
        'page_title',
        'ip_address',
        'user_agent',
        'device_type',
        'browser',
        'platform',
        'referer',
        'referer_host',
        'session_id',
        'user_id',
        'viewed_at',
    ];

    protected function casts(): array
    {
        return [
            'viewed_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope for views recorded today.
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('viewed_at', Carbon::today());
    }

    /**
     * Scope for views recorded yesterday.
     */
    public function scopeYesterday(Builder $query): Builder
    {
        return $query->whereDate('viewed_at', Carbon::yesterday());
    }

    /**
     * Scope for views recorded in the last N days.
     */
    public function scopeLastDays(Builder $query, int $days = 7): Builder
    {
        return $query->where('viewed_at', '>=', Carbon::now()->subDays($days)->startOfDay());
    }

    /**
     * Scope for views this month.
     */
    public function scopeThisMonth(Builder $query): Builder
    {
        return $query->whereYear('viewed_at', Carbon::now()->year)
            ->whereMonth('viewed_at', Carbon::now()->month);
    }

    /**
     * Scope by device type.
     */
    public function scopeDevice(Builder $query, string $device): Builder
    {
        return $query->where('device_type', strtolower($device));
    }

    /**
     * Record a new page view from a request.
     */
    public static function record(Request $request, ?string $pageTitle = null, ?string $routeName = null): ?self
    {
        $path = '/'.ltrim($request->path(), '/');

        // Ignore admin, filament, livewire assets and debug routes
        if ($request->is('admin*', 'filament*', 'livewire*', '_debugbar*', 'telescope*', 'horizon*', 'sanctum*')) {
            return null;
        }

        $userAgent = $request->userAgent() ?? '';
        $deviceInfo = static::detectDevice($userAgent);

        $referer = $request->headers->get('referer');
        $refererHost = null;
        if ($referer) {
            $parsedHost = parse_url($referer, PHP_URL_HOST);
            if ($parsedHost && $parsedHost !== $request->getHost()) {
                $refererHost = $parsedHost;
            }
        }

        $sessionId = null;
        if ($request->hasSession()) {
            $sessionId = $request->session()->getId();
        }

        $routeName = $routeName ?? $request->route()?->getName();
        $pageTitle = $pageTitle ?? static::generateTitleFromRoute($routeName, $path);

        return static::create([
            'url' => $request->fullUrl(),
            'path' => $path,
            'route_name' => $routeName,
            'page_title' => $pageTitle,
            'ip_address' => $request->ip(),
            'user_agent' => $userAgent,
            'device_type' => $deviceInfo['device'],
            'browser' => $deviceInfo['browser'],
            'platform' => $deviceInfo['platform'],
            'referer' => $referer,
            'referer_host' => $refererHost,
            'session_id' => $sessionId,
            'user_id' => $request->user()?->id,
            'viewed_at' => now(),
        ]);
    }

    /**
     * Parse User Agent into device, browser, and platform.
     *
     * @return array{device: string, browser: string, platform: string}
     */
    public static function detectDevice(string $userAgent): array
    {
        $device = 'desktop';
        $browser = 'Unknown';
        $platform = 'Unknown';

        // Detect device
        if (preg_match('/(ipad|tablet|(android(?!.*mobile))|(windows(?!.*phone)(.*touch))|kindle|playbook|silk|(puffin(?!.*(IP|AP|WP))))/i', $userAgent)) {
            $device = 'tablet';
        } elseif (preg_match('/(mobi|iphone|ipod|phone|blackberry|opera mini|iemobile|mobile)/i', $userAgent)) {
            $device = 'mobile';
        } elseif (preg_match('/(bot|crawl|slurp|spider|mediapartners|lighthouse)/i', $userAgent)) {
            $device = 'bot';
        }

        // Detect browser
        if (preg_match('/Edg\/([0-9\.]+)/i', $userAgent)) {
            $browser = 'Edge';
        } elseif (preg_match('/Chrome\/([0-9\.]+)/i', $userAgent)) {
            $browser = 'Chrome';
        } elseif (preg_match('/Safari\/([0-9\.]+)/i', $userAgent) && ! preg_match('/Chrome/i', $userAgent)) {
            $browser = 'Safari';
        } elseif (preg_match('/Firefox\/([0-9\.]+)/i', $userAgent)) {
            $browser = 'Firefox';
        } elseif (preg_match('/Opera|OPR\/([0-9\.]+)/i', $userAgent)) {
            $browser = 'Opera';
        }

        // Detect OS / Platform
        if (preg_match('/windows nt 10/i', $userAgent)) {
            $platform = 'Windows 10/11';
        } elseif (preg_match('/windows/i', $userAgent)) {
            $platform = 'Windows';
        } elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
            $platform = 'iOS';
        } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
            $platform = 'macOS';
        } elseif (preg_match('/android/i', $userAgent)) {
            $platform = 'Android';
        } elseif (preg_match('/linux/i', $userAgent)) {
            $platform = 'Linux';
        }

        return [
            'device' => $device,
            'browser' => $browser,
            'platform' => $platform,
        ];
    }

    /**
     * Generate user-friendly title from route name or path.
     */
    public static function generateTitleFromRoute(?string $routeName, string $path): string
    {
        return match ($routeName) {
            'home' => 'Homepage — Alan Humphreys',
            'home.v2', 'homepage.v2' => 'Homepage V2 — Every Side of the Chair',
            'virtual-sales-consultant' => 'Virtual Sales Consultant',
            'about' => 'About Alan Humphreys — 30+ Years Story',
            'gallery' => 'Transformations & Clinical Showcase',
            'blog' => 'Knowledge Library & Insights',
            'blog.show' => 'Article: '.ucwords(str_replace('-', ' ', basename($path))),
            'products' => 'Products & Solutions',
            'product.show', 'product.details' => 'Product Details',
            default => ucwords(trim(str_replace(['/', '-', '_'], ' ', $path))) ?: 'Homepage',
        };
    }
}
