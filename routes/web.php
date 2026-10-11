<?php

use App\Livewire\AboutPage;
use App\Livewire\BlogDetailsPage;
use App\Livewire\BlogPage;
use App\Livewire\GalleryPage;
use App\Livewire\HomePage;
use App\Livewire\HomePage2;
use App\Livewire\ProductDetailsPage;
use App\Livewire\ProductsPage;
use App\Livewire\VirtualSalesConsultantPage;
use Illuminate\Support\Facades\Route;


Route::get('/', HomePage2::class)->name('home');
Route::get('/homepage-2', HomePage2::class)->name('homepage.v2');
Route::get('/virtual-sales-consultant', VirtualSalesConsultantPage::class)->name('virtual-sales-consultant');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/gallery', GalleryPage::class)->name('gallery');
Route::get('/blog', BlogPage::class)->name('blog');
Route::get('/blog/{slug}', BlogDetailsPage::class)->name('blog.show');
Route::get('/products', ProductsPage::class)->name('products');
Route::get('/products/details', ProductDetailsPage::class)->name('product.details');
Route::get('/products/{slug}', ProductDetailsPage::class)->name('product.show');
//Route::get('/home-2', HomePage::class)->name('home');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
