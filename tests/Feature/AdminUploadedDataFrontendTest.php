<?php

use App\Models\AboutSetting;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\GalleryItem;
use App\Models\Homepage2Setting;
use App\Models\HomepageSetting;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SiteSetting;
use App\Models\User;

test('uploads_asset helper resolves paths correctly for all disks and formats', function () {
    expect(uploads_asset(''))
        ->toBeNull()
        ->and(uploads_asset(null, 'alanhumphreys/head.jpeg'))
        ->toBe(asset('alanhumphreys/head.jpeg'))
        ->and(uploads_asset('https://example.com/photo.jpg'))
        ->toBe('https://example.com/photo.jpg')
        ->and(uploads_asset('alanhumphreys/images/hero-headshot.jpg'))
        ->toBe(asset('alanhumphreys/images/hero-headshot.jpg'))
        ->and(uploads_asset('uploads/blogs/sample.jpg'))
        ->toBe(asset('uploads/blogs/sample.jpg'))
        ->and(uploads_asset('blogs/sample.jpg'))
        ->toBe(asset('uploads/blogs/sample.jpg'))
        ->and(uploads_asset('settings/custom_logo.png'))
        ->toBe(asset('uploads/settings/custom_logo.png'));
});

test('uploaded data in HomepageSetting renders on the frontend homepage', function () {
    $homepage = HomepageSetting::first() ?? new HomepageSetting;
    $homepage->fill([
        'hero_name' => 'ALAN HUMPHREYS SPECIAL',
        'hero_subtitle' => 'Exclusive Trichology Leader',
        'hero_image' => 'custom_admin_hero_image.jpg',
        'about_image' => 'custom_admin_about_image.jpg',
    ])->save();

    $response = $this->get('/');
    $response->assertOk();
    $response->assertSee('ALAN');
    $response->assertSee('HUMPHREYS SPECIAL');
    $response->assertSee('Exclusive Trichology Leader');
    $response->assertSee('uploads/custom_admin_hero_image.jpg');
    $response->assertSee('uploads/custom_admin_about_image.jpg');
});

test('uploaded data in Homepage2Setting renders on frontend homepage 2', function () {
    $homepage2 = Homepage2Setting::first() ?? new Homepage2Setting;
    $homepage2->fill([
        'hero_title' => 'TRANSFORMING HAIR BUSINESSES WORLDWIDE',
        'hero_image' => 'homepage2_admin_hero.jpg',
        'story_image' => 'homepage2_admin_story.jpg',
    ])->save();

    $response = $this->get('/home-2');
    $response->assertOk();
    $response->assertSee('TRANSFORMING HAIR BUSINESSES WORLDWIDE');
    $response->assertSee('uploads/homepage2_admin_hero.jpg');
    $response->assertSee('uploads/homepage2_admin_story.jpg');
});

test('uploaded photos and content in AboutSetting render on the about page', function () {
    $about = AboutSetting::firstOrCreate(['id' => 1]);
    $about->update([
        'banner_title' => 'The Complete Alan Humphreys Journey',
        'origin_photo_1_image' => 'about_photos/photo1_uploaded.jpg',
        'origin_photo_2_image' => 'about_photos/photo2_uploaded.jpg',
    ]);

    $response = $this->get('/about');
    $response->assertOk();
    $response->assertSee('The Complete Alan Humphreys Journey');
    $response->assertSee('uploads/about_photos/photo1_uploaded.jpg');
    $response->assertSee('uploads/about_photos/photo2_uploaded.jpg');
});

test('uploaded blog image and data render on blog index and details pages', function () {
    $user = User::first() ?? User::factory()->create();
    $category = BlogCategory::firstOrCreate(['slug' => 'testing-cat'], ['name' => 'Testing Category']);

    $blog = Blog::updateOrCreate(
        ['slug' => 'test-admin-uploaded-blog'],
        [
            'name' => 'Admin Uploaded Blog Test Article',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'image' => 'blogs/uploaded_blog_banner.jpg',
            'description' => 'A unique description for the admin uploaded blog.',
            'main_content' => '<p>Detailed article content uploaded from admin panel.</p>',
            'status' => true,
            'is_published' => true,
        ]
    );

    $responseList = $this->get('/blog');
    $responseList->assertOk();
    $responseList->assertSee('Admin Uploaded Blog Test Article');
    $responseList->assertSee('uploads/blogs/uploaded_blog_banner.jpg');

    $responseShow = $this->get('/blog/'.$blog->slug);
    $responseShow->assertOk();
    $responseShow->assertSee('Admin Uploaded Blog Test Article');
    $responseShow->assertSee('uploads/blogs/uploaded_blog_banner.jpg');
    $responseShow->assertSee('Detailed article content uploaded from admin panel.', false);
});

test('uploaded product images and details render on products index and details pages', function () {
    $category = ProductCategory::firstOrCreate(['slug' => 'scalp-care'], ['name' => 'Scalp Care']);

    $product = Product::updateOrCreate(
        ['slug' => 'test-admin-curated-product'],
        [
            'name' => 'Admin Test Laser Scalp Serum',
            'category_id' => $category->id,
            'price' => 89.50,
            'original_price' => 110.00,
            'badge' => 'New Formula',
            'image' => 'products/laser_serum.jpg',
            'thumbnail' => 'products/laser_serum_thumb.jpg',
            'short_description' => 'Advanced follicle nourishing formula.',
            'description' => '<p>Full clinical breakdown of the laser scalp serum.</p>',
            'included_items' => [
                ['title' => 'Laser Serum Bottle 100ml', 'description' => 'Daily drop applicator'],
                ['title' => 'Scalp Massager', 'description' => 'Soft silicone nodes'],
            ],
            'status' => true,
            'is_active' => true,
        ]
    );

    $responseList = $this->get('/products');
    $responseList->assertOk();
    $responseList->assertSee('Admin Test Laser Scalp Serum');
    $responseList->assertSee('uploads/products/laser_serum.jpg');
    $responseList->assertSee('$89.50');

    $responseShow = $this->get('/products/'.$product->slug);
    $responseShow->assertOk();
    $responseShow->assertSee('Admin Test Laser Scalp Serum');
    $responseShow->assertSee('uploads/products/laser_serum_thumb.jpg');
    $responseShow->assertSee('$89.50');
    $responseShow->assertSee('$110.00');
    $responseShow->assertSee('Laser Serum Bottle 100ml');
});

test('uploaded gallery items render on gallery page', function () {
    $galleryItem = GalleryItem::updateOrCreate(
        ['title' => 'Admin Uploaded Transformation Case'],
        [
            'subtitle' => 'French Lace Hair Restoration',
            'category' => 'Hair Systems',
            'image' => 'gallery/main_case_01.jpg',
            'before_image' => 'gallery/before_case_01.jpg',
            'after_image' => 'gallery/after_case_01.jpg',
            'is_before_after' => true,
            'is_active' => true,
            'service_type' => 'Full Custom Unit',
        ]
    );

    $response = $this->get('/gallery');
    $response->assertOk();
    $response->assertSee('Admin Uploaded Transformation Case');
    $response->assertSee('uploads/gallery/before_case_01.jpg');
    $response->assertSee('uploads/gallery/after_case_01.jpg');
});

test('uploaded site logo and favicon in SiteSetting render on frontend views', function () {
    $setting = SiteSetting::get();
    $setting->update([
        'site_logo' => 'settings/custom_light_logo.png',
        'site_logo_dark' => 'settings/custom_dark_logo.png',
        'favicon' => 'settings/custom_favicon.png',
    ]);

    $response = $this->get('/');
    $response->assertOk();
    $response->assertSee('uploads/settings/custom_light_logo.png');
    $response->assertSee('uploads/settings/custom_dark_logo.png');
    $response->assertSee('uploads/settings/custom_favicon.png');
});
