<?php

use App\Livewire\GalleryPage;
use App\Models\GalleryItem;
use Livewire\Livewire;

test('gallery page can be rendered', function () {
    $response = $this->get(route('gallery'));

    $response->assertStatus(200);
});

test('gallery displays active items', function () {
    $item = GalleryItem::create([
        'title' => 'Sample Transformation Showcase',
        'subtitle' => 'Precision Lace Base',
        'category' => 'Hair Transformations',
        'image' => 'alanhumphreys/images/before-after.png',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    Livewire::test(GalleryPage::class)
        ->assertSee('Sample Transformation Showcase');
});

test('gallery can filter items by category', function () {
    GalleryItem::create([
        'title' => 'Transformation Alpha',
        'category' => 'Hair Transformations',
        'is_active' => true,
    ]);

    GalleryItem::create([
        'title' => 'Speaking Beta',
        'category' => 'Speaking & Events',
        'is_active' => true,
    ]);

    Livewire::test(GalleryPage::class)
        ->call('setCategory', 'Speaking & Events')
        ->assertSet('activeCategory', 'Speaking & Events')
        ->assertSee('Speaking Beta')
        ->assertDontSee('Transformation Alpha');
});
