<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Format;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FormatDropdown extends Component
{
    public $projects;
    public $formats;
    public $selectedValue;
    public $selectedFormat;
    public $currentProject;
    public $currentFormat;
    public $currentFormatPrice;

    public function mount()
    {
        $userId = Auth::user()->id;

        if(Gate::allows('isSeller')) {
            $this->projects = Project::where('user_id', $userId)->whereNull('deactivated_at')->get();
        }
        else {
            $this->projects = Project::whereNull('deactivated_at')->get();
        }

        if ($this->projects->isNotEmpty()) {
            $this->selectedValue = $this->projects->first()->id;
            $this->updateCurrentProjectAndFormat();
        } else {
            $this->selectedValue = null;
            $this->currentProject = null;
            $this->selectedFormat = null;
            $this->currentFormat = null;
            $this->currentFormatPrice = null;
        }
    }

    public function updatedSelectedValue()
    {
        $this->updateCurrentProjectAndFormat();
    }

    public function updatedSelectedFormat()
    {
        $this->currentFormat = Format::find($this->selectedFormat);
        $this->currentFormatPrice = $this->currentFormat->price;
    }

    private function updateCurrentProjectAndFormat()
    {
        $this->currentProject = Project::find($this->selectedValue);

        if ($this->currentProject) {
            $this->selectedFormat = $this->currentProject->formats->first()->id;
            $this->updatedSelectedFormat();
        }
    }

    public function render()
    {
        return view('livewire.format-dropdown', [
            'currentProject' => $this->currentProject,
            'currentFormat' => $this->currentFormat,
        ]);
    }
}
