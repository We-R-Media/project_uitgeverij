<?php

// SetEdition.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Format;

class SetEdition extends Component
{
    public $order;
    public $projectVisible = false;
    public $currentProject;
    public $projectCollection;
    public $selectedProjectId;
    public $selectedFormatId;
    public $formatPrice;
    public $discount = 0;
    public $price_with_discount = 0;

    public function mount($order)
    {
        $this->order = $order;

        // Fetch the projects for the order
        $this->projectCollection = Project::where('publisher_id', $this->order->publisher_id)
            ->where('deactivated_at', null)
            ->get();

        if ($this->projectCollection->count() == 1) {
            $this->selectedProjectId = $this->projectCollection->first()->id;
            $this->projectVisible = true;
            $this->updateSelectedProjectId();
        }
    }

    public function displayProjects()
    {
        $this->projectVisible = true;

        if ($this->projectCollection->count() > 1) {
            $this->selectedProjectId = $this->projectCollection->first()->id;
            $this->updateSelectedProjectId();
        }
    }

    public function updateSelectedProjectId()
    {
        $this->currentProject = $this->projectCollection->find($this->selectedProjectId);

        $firstFormat = $this->currentProject->formats->first();
        $this->selectedFormatId = $firstFormat ? $firstFormat->id : null;

        $this->updateSelectedFormatId();
    }

    public function updateSelectedFormatId()
    {
        $format = Format::find($this->selectedFormatId);
        $this->formatPrice = $format ? $format->price : null;
    }

    public function updatedDiscount()
    {
        $formatPrice = is_numeric($this->formatPrice) ? $this->formatPrice : 0;
        $discount = is_numeric($this->discount) ? $this->discount : 0;

        $this->price_with_discount = $formatPrice - $discount;
    }

    public function render()
    {
        return view('livewire.set-edition');
    }
}
