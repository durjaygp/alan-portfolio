<?php

use App\Livewire\HomePage;
use Livewire\Livewire;

it('renders the homepage successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('ALAN');
    $response->assertSee('Humphreys');
});

it('validates required intake form fields', function () {
    Livewire::test(HomePage::class)
        ->call('submitIntake')
        ->assertHasErrors(['firstName', 'lastName', 'email', 'businessType', 'interest']);
});

it('submits intake form successfully with valid data', function () {
    Livewire::test(HomePage::class)
        ->set('firstName', 'John')
        ->set('lastName', 'Doe')
        ->set('email', 'john@example.com')
        ->set('phone', '1234567890')
        ->set('businessType', 'trichology')
        ->set('interest', 'consulting')
        ->set('message', 'Interested in trichology strategy')
        ->call('submitIntake')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);
});
