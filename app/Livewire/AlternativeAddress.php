<?php

namespace App\Livewire;

use Livewire\Component;

class AlternativeAddress extends Component
{
    public $advertiser;

    public function mount($advertiser) 
    {
        $this->advertiser = $advertiser;
    }

    public function render()
    {
        return view('livewire.alternative-address');
    }
}
