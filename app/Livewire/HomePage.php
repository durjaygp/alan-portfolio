<?php

namespace App\Livewire;

use App\Models\HomepageSetting;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class HomePage extends Component
{
    #[Rule('required|min:2', message: 'Please enter your first name')]
    public string $firstName = '';

    #[Rule('required|min:2', message: 'Please enter your last name')]
    public string $lastName = '';

    #[Rule('required|email', message: 'Please enter a valid email address')]
    public string $email = '';

    public string $phone = '';

    #[Rule('required', message: 'Please select your business type')]
    public string $businessType = '';

    #[Rule('required', message: 'Please select your primary interest')]
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
        $homepage = HomepageSetting::first() ?? new HomepageSetting;
        $activeSections = $homepage->getActiveSections();

        return view('livewire.home-page', [
            'homepage' => $homepage,
            'activeSections' => $activeSections,
            'products' => Product::where('status', true)->where('is_active', true)->orderBy('sort_order')->take(3)->get(),
            'posts' => Post::where('status', true)->orderByDesc('created_at')->take(2)->get(),
        ]);
    }
}
