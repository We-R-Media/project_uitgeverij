<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Searchfield extends Component
{
    public $model;
    public $placeholder;

    public function __construct($model, $placeholder = 'Zoeken...')
    {
        $this->model = $model;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-field');
    }
}
