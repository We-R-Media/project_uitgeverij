<?php

namespace App\Livewire;

use Livewire\Component;

class TopBar extends Component
{
    public $pageTitleSection, $pageTitle, $subpages, $id;

    public function mount($subpages, $id)
    {
        $this->id = $id;
        $this->subpages = $subpages;
    }

    public function render()
    {
        return view('livewire.top-bar');
    }
}
