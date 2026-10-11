<?php

use App\Models\SiteSetting;
use App\Models\User;

test('site setting singleton returns valid default settings', function () {
    $setting = SiteSetting::get();

    expect($setting)->not->toBeNull()
        ->and($setting->site_name)->toBe('Alan Humphreys')
        ->and($setting->favicon_url)->not->toBeEmpty()
        ->and($setting->og_image_url)->not->toBeEmpty();
});

test('frontend layout dynamically renders website title, meta description, and favicon from SiteSetting', function () {
    $setting = SiteSetting::get();
    $setting->update([
        'meta_title' => 'Custom SEO Title — Alan Humphreys Elite',
        'meta_description' => 'Custom SEO Meta Description for hair loss and trichology.',
        'meta_keywords' => 'custom, keywords, test',
        'google_analytics_id' => 'G-TESTGA12345',
        'custom_head_scripts' => '<script id="custom-head-test">console.log("head-test");</script>',
        'custom_body_scripts' => '<script id="custom-body-test">console.log("body-test");</script>',
    ]);

    $response = $this->get('/');
    $response->assertOk();
    $response->assertSee('Custom SEO Title — Alan Humphreys Elite');
    $response->assertSee('Custom SEO Meta Description for hair loss and trichology.');
    $response->assertSee('G-TESTGA12345');
    $response->assertSee('custom-head-test', false);
    $response->assertSee('custom-body-test', false);
});

test('filament website settings edit page loads successfully', function () {
    $user = User::first() ?? User::factory()->create();
    $setting = SiteSetting::get();

    $response = $this->actingAs($user)->get("/admin/site-settings/{$setting->id}/edit");
    $response->assertOk();
    $response->assertSee('Website Settings');
    $response->assertSee('Search Engine Optimization (SEO)');
});
