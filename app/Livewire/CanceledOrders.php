<?php

namespace App\Livewire;

use Livewire\Component;

class CanceledOrders extends Component
    {
        public $canceled;
        public $canceldate;
        public $order;
    
        public function render()
        {
            return view('livewire.canceled-orders');
        }

        public function mount($order) {
            $this->order = $order;
            $this->canceled = $order->deactivated_at ? 1 : 0;
        }
    
        public function updatedCanceled($value)
        {
            if ($value == 1) {
                $this->canceldate = now()->toDateString();
            } else {
                $this->canceldate = null;
            }
        }
    }