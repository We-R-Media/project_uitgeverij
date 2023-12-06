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
    
        if ($this->format) {
            $initialFormat = $order->project->formats->firstWhere('id', $this->format);
            $this->base_price = $initialFormat ? $initialFormat->price : null;
        }
    }

    private function updateBasePrice()
    {
        $selectedFormat = $this->order->project->formats->firstWhere('id', $this->format);
        $this->base_price = $selectedFormat ? $selectedFormat->price : null;
    }

    public function updatedFormat($formatId)
    {
        $this->updateBasePrice();
    }
    
    public function setDefaultFormat()
    {
        $this->format = $this->order->project->formats->first()->id;
        $this->updateBasePrice();
    }

    public function render()
    {
        return view('livewire.base-price-calculate');
    }
}