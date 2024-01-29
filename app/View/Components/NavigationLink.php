<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationLink extends Component
{
    public $isActivePage, $routeName, $iconName, $linkText;

    /**
     * Create a new component instance.
     *
     * @param  string  $isActivePage
     * @param  string  $routeName
     * @param  string  $iconName
     * @param  string  $linkText
     * @return void
     */
    public function __construct( $isActivePage, $routeName, $iconName, $linkText )
    {
        $this->isActivePage = $isActivePage;
        $this->routeName = $routeName;
        $this->iconName = "/images/sidebar/{$iconName}.svg";
        $this->linkText = $linkText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-link');
    }
}
