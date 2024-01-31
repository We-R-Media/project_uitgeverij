<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Topbar extends Component
{
    public $pageTitleSection, $pageTitle = null, $subpages, $id = null;

    /**
     * Create a new component instance.
     */
    public function __construct( $pageTitleSection, $pageTitle, $subpages, $id )
    {
        $this->pageTitleSection = $pageTitleSection;
        $this->pageTitle = $pageTitle;
        $this->subpages = $subpages;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.topbar');
    }
}
