<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ProductsPage extends Component
{
    public string $activeFilter = 'all';

    public function setFilter(string $filter): void
    {
        $this->activeFilter = $filter;
    }

    public function render()
    {
        $query = Product::with('category')->where('status', true);

        if ($this->activeFilter !== 'all') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->activeFilter)->orWhere('id', $this->activeFilter);
            });
        }

        return view('livewire.products-page', [
            'categories' => ProductCategory::where('status', true)->get(),
            'products' => $query->orderBy('sort_order')->get(),
        ])
            ->title('Products & Professional Resources — Alan Humphreys');
    }
}
