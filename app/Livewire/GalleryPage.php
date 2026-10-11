<?php

namespace App\Livewire;

use App\Models\GalleryItem;
use App\Models\HomepageSetting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('layouts.guest')]
class GalleryPage extends Component
{
    #[Url(as: 'category')]
    public string $activeCategory = 'all';

    #[Url(as: 'q')]
    public string $search = '';

    public function setCategory(string $category): void
    {
        $this->activeCategory = $category;
    }

    public function resetFilters(): void
    {
        $this->activeCategory = 'all';
        $this->search = '';
    }

    public function render()
    {
        $query = GalleryItem::active()->ordered();

        if ($this->activeCategory !== 'all') {
            $query->where('category', $this->activeCategory);
        }

        if (! empty($this->search)) {
            $term = '%'.$this->search.'%';
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', $term)
                    ->orWhere('subtitle', 'like', $term)
                    ->orWhere('description', 'like', $term)
                    ->orWhere('client_name', 'like', $term)
                    ->orWhere('service_type', 'like', $term);
            });
        }

        $items = $query->get();

        $categories = GalleryItem::active()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        $featuredItems = GalleryItem::active()
            ->where('is_featured', true)
            ->ordered()
            ->take(3)
            ->get();

        $totalCount = GalleryItem::active()->count();
        $transformationCount = GalleryItem::active()->where('category', 'Hair Transformations')->count();

        return view('livewire.gallery-page', [
            'homepage' => HomepageSetting::first(),
            'items' => $items,
            'categories' => $categories,
            'featuredItems' => $featuredItems,
            'totalCount' => $totalCount,
            'transformationCount' => $transformationCount,
        ])->title('Gallery & Client Transformations — Alan Humphreys');
    }
}
