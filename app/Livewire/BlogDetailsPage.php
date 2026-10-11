<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class BlogDetailsPage extends Component
{
    public string $slug = '';

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $blog = Blog::with(['category', 'user'])
            ->where('slug', $this->slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedBlogs = Blog::with(['category', 'user'])
            ->where('status', true)
            ->where('id', '!=', $blog->id)
            ->when($blog->category_id, function ($q) use ($blog) {
                $q->where('category_id', $blog->category_id);
            })
            ->take(3)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $fallback = Blog::with(['category', 'user'])
                ->where('status', true)
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->take(3 - $relatedBlogs->count())
                ->get();
            $relatedBlogs = $relatedBlogs->merge($fallback);
        }

        return view('livewire.blog-details-page', [
            'blog' => $blog,
            'relatedBlogs' => $relatedBlogs,
        ])->title($blog->name.' — Alan Humphreys Blog');
    }
}
