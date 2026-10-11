<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\GalleryItem;
use App\Models\Homepage2Setting;
use App\Models\Inquiry;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class HomePage2 extends Component
{
    #[Rule('required|min:2', message: 'Please enter your first name')]
    public string $firstName = '';

    #[Rule('required|min:2', message: 'Please enter your last name')]
    public string $lastName = '';

    #[Rule('required|email', message: 'Please enter a valid email address')]
    public string $email = '';

    public string $phone = '';

    #[Rule('required', message: 'Please select your role / business type')]
    public string $businessType = '';

    #[Rule('required', message: 'Please select how Alan can best help you')]
    public string $interest = '';

    public string $message = '';

    public bool $submitted = false;

    public function submitIntake(): void
    {
        $this->validate();

        Inquiry::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'business_type' => $this->businessType,
            'interest' => $this->interest,
            'message' => $this->message,
            'status' => 'new',
        ]);

        $this->submitted = true;
    }

    public function resetForm(): void
    {
        $this->reset(['firstName', 'lastName', 'email', 'phone', 'businessType', 'interest', 'message', 'submitted']);
    }

    public function render()
    {
        $homepage = Homepage2Setting::first() ?? new Homepage2Setting;
        $activeSections = $homepage->getActiveSections();

        $posts = Blog::where('status', true)->orderByDesc('created_at')->take(3)->get();
        $galleryHighlights = GalleryItem::active()->where('is_featured', true)->ordered()->take(3)->get();

        return view('livewire.home-page-2', [
            'homepage' => $homepage,
            'activeSections' => $activeSections,
            'posts' => $posts,
            'galleryHighlights' => $galleryHighlights,
        ])->title($homepage->hero_title ? 'Alan Humphreys — Hair Replacement & Trichology Business Consultant' : 'Alan Humphreys — Hair Replacement & Trichology Business Consultant');
    }
}
