<?php

use App\Livewire\HomePage2;
use App\Models\Homepage2Setting;
use App\Models\Inquiry;
use App\Models\User;
use Livewire\Livewire;

test('homepage 2 page can be rendered', function () {
    $response = $this->get('/homepage-2');
    $response->assertStatus(200);

    $response2 = $this->get('/home-2');
    $response2->assertStatus(200);
});

test('homepage 2 contains strategic brand copy from pdf audit and homepage settings', function () {
    $response = $this->get('/home-2');

    $response->assertSee('Every Side of the Chair');
    $response->assertSee('Hair Replacement &amp; Trichology Business Consultant', false);
    $response->assertSee('Years in Industry');
    $response->assertSee('Virtual Sales Consulting');
    $response->assertSee('Traveling Trichologist');
    $response->assertSee('WATCH &amp; LEARN', false);
    $response->assertSee('Awards, Certifications &amp; Media', false);
});

test('homepage 2 respects section visibility toggles from Homepage2Setting', function () {
    $setting = Homepage2Setting::firstOrCreate(['id' => 1]);
    $setting->update(['videos_status' => false]);

    $response = $this->get('/home-2');
    $response->assertDontSee('id="videos"', false);

    // Turn back on
    $setting->update(['videos_status' => true]);
    $responseOn = $this->get('/home-2');
    $responseOn->assertSee('id="videos"', false);
});

test('homepage 2 can submit inquiry form', function () {
    Livewire::test(HomePage2::class)
        ->set('firstName', 'Marcus')
        ->set('lastName', 'Vance')
        ->set('email', 'marcus@salonstudio.com')
        ->set('phone', '303-555-1234')
        ->set('businessType', 'Hair Replacement Studio Owner')
        ->set('interest', 'Virtual Sales Consulting Support')
        ->set('message', 'Need help closing consultations and training our stylists.')
        ->call('submitIntake')
        ->assertSet('submitted', true);

    expect(Inquiry::where('email', 'marcus@salonstudio.com')->exists())->toBeTrue();
});

test('filament homepage 2 settings edit page loads successfully', function () {
    $user = User::first() ?? User::factory()->create();
    $setting = Homepage2Setting::firstOrCreate(['id' => 1]);

    $response = $this->actingAs($user)->get("/admin/homepage2-settings/{$setting->id}/edit");
    $response->assertOk();
});
