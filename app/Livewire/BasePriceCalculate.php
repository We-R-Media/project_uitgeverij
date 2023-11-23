<?php

namespace App\Livewire;

use Livewire\Component;

class BasePriceCalculate extends Component
{
    public $order;
    public $format;
    public $base_price;

    public function mount($order) 
    {
        $this->order = $order;
    }

    public function updatedFormat($formatId)
    {
        $selectedFormat = $this->order->project->formats->firstWhere('id', $formatId);

        $this->base_price = $selectedFormat ? $selectedFormat->price : null;
    }

    public function render()
    {
        return view('livewire.base-price-calculate');
    }
}