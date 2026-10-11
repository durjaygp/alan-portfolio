<?php

use App\Models\PageView;
use App\Models\User;

test('page visits on frontend routes are automatically tracked in database', function () {
    $initialCount = PageView::count();

    $response = $this->get(route('home.v2'));
    $response->assertOk();

    expect(PageView::count())->toBeGreaterThan($initialCount);

    $latest = PageView::latest('id')->first();
    expect($latest->path)->toBe('/home-2')
        ->and($latest->route_name)->toBe('home.v2')
        ->and($latest->device_type)->toBeIn(['desktop', 'mobile', 'tablet', 'bot']);
});

test('page visits on virtual sales consultant are tracked with proper route and title', function () {
    $response = $this->get(route('virtual-sales-consultant'));
    $response->assertOk();

    $latest = PageView::where('path', '/virtual-sales-consultant')->latest('id')->first();
    expect($latest)->not->toBeNull()
        ->and($latest->page_title)->toContain('Virtual Sales Consultant');
});

test('admin and internal routes are excluded from page tracking', function () {
    $countBefore = PageView::count();

    $user = User::first() ?? User::factory()->create();
    $this->actingAs($user)->get('/admin');

    expect(PageView::count())->toBe($countBefore);
});

test('page view model helper detects mobile device and browsers correctly', function () {
    $iphoneUA = 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.3 Mobile/15E148 Safari/604.1';
    $deviceInfo = PageView::detectDevice($iphoneUA);

    expect($deviceInfo['device'])->toBe('mobile')
        ->and($deviceInfo['browser'])->toBe('Safari')
        ->and($deviceInfo['platform'])->toBe('iOS');

    $windowsChromeUA = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36';
    $winInfo = PageView::detectDevice($windowsChromeUA);

    expect($winInfo['device'])->toBe('desktop')
        ->and($winInfo['browser'])->toBe('Chrome')
        ->and($winInfo['platform'])->toBe('Windows 10/11');
});

test('filament admin dashboard loads successfully with custom analytics widgets', function () {
    $user = User::first() ?? User::factory()->create();

    $response = $this->actingAs($user)->get('/admin');
    $response->assertOk();
});

test('filament page views resource page loads successfully', function () {
    $user = User::first() ?? User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/page-views');
    $response->assertOk();
});
