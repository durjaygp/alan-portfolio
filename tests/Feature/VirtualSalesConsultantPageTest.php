<?php

use App\Livewire\VirtualSalesConsultantPage;
use App\Models\Inquiry;
use Livewire\Livewire;

test('virtual sales consultant page can be rendered', function () {
    $response = $this->get(route('virtual-sales-consultant'));
    $response->assertStatus(200);
});

test('virtual sales consultant page contains core value proposition from audit', function () {
    $response = $this->get(route('virtual-sales-consultant'));

    $response->assertSee('Need a Sales Professional');
    $response->assertSee('extension of your hair-replacement sales team');
    $response->assertSee('How the Virtual Sales Partnership Works');
    $response->assertSee('What Alan Handles');
    $response->assertSee('What Your Studio Provides');
});

test('studio owner can submit virtual sales partnership inquiry', function () {
    Livewire::test(VirtualSalesConsultantPage::class)
        ->set('firstName', 'Julian')
        ->set('lastName', 'Hayes')
        ->set('email', 'julian@chicagohaircustom.com')
        ->set('phone', '312-555-8899')
        ->set('businessName', 'Chicago Custom Hair Studio')
        ->set('monthlyLeads', '30-60 leads/month')
        ->set('message', 'We generate 40 Google inquiries a month but our stylists struggle with the 45-min consultation closing.')
        ->call('submitInquiry')
        ->assertSet('submitted', true);

    $inquiry = Inquiry::where('email', 'julian@chicagohaircustom.com')->first();
    expect($inquiry)->not->toBeNull();
    expect($inquiry->business_type)->toBe('Hair Replacement Company / Studio Owner');
    expect($inquiry->interest)->toBe('Virtual Sales Consulting Support');
    expect($inquiry->message)->toContain('Chicago Custom Hair Studio');
});
