<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ProductDetailsPage extends Component
{
    public string $slug = 'complete-hair-system-care-kit';

    public string $selectedImage = 'alanhumphreys/images/services-portrait.jpg';

    public string $selectedBase = 'All Units (Lace & Poly)';

    public int $quantity = 1;

    public string $activeTab = 'overview';

    public function mount(?string $slug = null): void
    {
        if ($slug) {
            $this->slug = $slug;
        }

        $product = Product::where('slug', $this->slug)->first()
            ?? Product::first();

        if ($product) {
            $this->selectedImage = $product->thumbnail ?? $product->image ?? 'alanhumphreys/images/products-kit.jpg';
        }
    }

    public function selectImage(string $image): void
    {
        $this->selectedImage = $image;
    }

    public function setBase(string $base): void
    {
        $this->selectedBase = $base;
    }

    public function incrementQty(): void
    {
        if ($this->quantity < 10) {
            $this->quantity++;
        }
    }

    public function decrementQty(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first()
            ?? Product::first();

        $relatedProducts = Product::where('is_active', true)
            ->where('id', '!=', $product?->id)
            ->take(3)
            ->get();

        return view('livewire.product-details-page', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ])
            ->title(($product?->name ?? 'Product Details').' — Alan Humphreys');
    }
}
