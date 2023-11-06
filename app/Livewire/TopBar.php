<?php

namespace App\Livewire;

use Livewire\Component;

class TopBar extends Component
{
    public $pageTitle, $subpages, $pageID;

    public function render()
    {
        return view('livewire.top-bar');
    }
}
