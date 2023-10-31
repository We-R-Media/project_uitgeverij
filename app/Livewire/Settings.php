<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        if (Gate::allows('isAdmin', $this->post)) {
            return view('livewire.settings');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
