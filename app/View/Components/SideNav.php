<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideNav extends Component
{
    public $tabs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tabs)
    {
        $this->tabs = $tabs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.side-nav');
    }
}
