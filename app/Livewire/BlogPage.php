<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class BlogPage extends Component
{
    public string $activeCategory = 'all';

    public string $searchQuery = '';

    #[Rule('required|email', message: 'Please enter a valid email')]
    public string $newsletterEmail = '';

    public bool $subscribed = false;

    public function setCategory(string $category): void
    {
        $this->activeCategory = $category;
    }

    public function subscribeNewsletter(): void
    {
        $this->validate();
        $this->subscribed = true;
        $this->reset('newsletterEmail');
    }

    public function render()
    {
        $query = Blog::with(['category', 'user'])->where('status', true);

        if ($this->activeCategory !== 'all') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->activeCategory)->orWhere('id', $this->activeCategory);
            });
        }

        if ($this->searchQuery !== '') {
            $query->where(function ($q) {
                $q->where('name', 'like', '%'.$this->searchQuery.'%')
                    ->orWhere('description', 'like', '%'.$this->searchQuery.'%')
                    ->orWhere('main_content', 'like', '%'.$this->searchQuery.'%');
            });
        }

        return view('livewire.blog-page', [
            'categories' => BlogCategory::where('status', true)->get(),
            'blogs' => $query->orderByDesc('created_at')->get(),
            'featuredBlog' => Blog::with(['category', 'user'])->where('status', true)->first(),
        ])->title('Blog & Hair Industry Insights — Alan Humphreys');
    }
}
