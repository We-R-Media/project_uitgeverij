<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateComplaint extends ModalComponent
{
    public $modalFormVisible = false;
    public $orderline;

    public function mount($orderline)
    {
        $this->orderline = $orderline;
    }

    public function render()
    {
        return view('livewire.create-complaint');
    }

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    } 
}
