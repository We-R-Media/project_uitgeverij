<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Format;

class FormatDropdown extends Component
{
    public $projects;
    public $formats;
    public $selectedValue;
    public $selectedFormat;
    public $currentProject;
    public $currentFormat;
    public $currentFormatPrice;

    public function mount($projects)
    {
        $this->projects = $projects;
        $this->selectedValue = $this->projects->first()->id;
        $this->updateCurrentProjectAndFormat();
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
