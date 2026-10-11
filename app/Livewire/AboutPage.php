<?php

namespace App\Livewire;

use App\Models\AboutSetting;
use App\Models\HomepageSetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.about-page', [
            'homepage' => HomepageSetting::first(),
            'about' => AboutSetting::first(),
        ])
            ->title('The Full Story — Alan Humphreys | 25 Years Hair Loss Expertise');
    }
}
