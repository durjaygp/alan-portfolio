<?php

namespace App\Livewire;

use App\Models\HomepageSetting;
use App\Models\Inquiry;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class VirtualSalesConsultantPage extends Component
{
    #[Rule('required|min:2', message: 'Please enter your first name')]
    public string $firstName = '';

    #[Rule('required|min:2', message: 'Please enter your last name')]
    public string $lastName = '';

    #[Rule('required|email', message: 'Please enter a valid business email')]
    public string $email = '';

    public string $phone = '';

    public string $businessName = '';

    public string $monthlyLeads = '';

    public string $message = '';

    public bool $submitted = false;

    public function submitInquiry(): void
    {
        $this->validate();

        $details = [];
        if (! empty($this->businessName)) {
            $details[] = 'Company / Studio: '.$this->businessName;
        }
        if (! empty($this->monthlyLeads)) {
            $details[] = 'Estimated Monthly Leads: '.$this->monthlyLeads;
        }
        if (! empty($this->message)) {
            $details[] = 'Details: '.$this->message;
        }

        Inquiry::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'business_type' => 'Hair Replacement Company / Studio Owner',
            'interest' => 'Virtual Sales Consulting Support',
            'message' => implode("\n", $details),
            'status' => 'new',
        ]);

        $this->submitted = true;
    }

    public function resetForm(): void
    {
        $this->reset(['firstName', 'lastName', 'email', 'phone', 'businessName', 'monthlyLeads', 'message', 'submitted']);
    }

    public function render()
    {
        $homepage = HomepageSetting::first();

        return view('livewire.virtual-sales-consultant-page', [
            'homepage' => $homepage,
        ])->title('Virtual Sales Consultant for Hair Replacement Companies — Alan Humphreys');
    }
}
