<?php

namespace App\Livewire;

use Livewire\Component;

class MultiStep extends Component
{
    public $firstname, $lastname;
    public $address;
    public $contactNum, $profession, $city, $country, $pincode;
    public $currentStep = 1;
    public $successMessage = '';
    
    public function render()
    {
        return view('livewire.multi-step')->layout('test'); // custom layout add
    }

    public function firstStepSubmit()
    {
        // dd("test");
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'contactNum' => 'required',
            'profession' => 'required',
        ]);

        // $this->currentStep = 2;
        return view('livewire.multi-step2')->layout('test'); // custom layout add
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'jobitle' => 'required',
            'employer' => 'required',
            'location' => 'required',
        ]);
        $this->currentStep = 3;
        return view('livewire.multi-step2')->layout('test');
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }
}
