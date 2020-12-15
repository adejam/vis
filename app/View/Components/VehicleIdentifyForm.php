<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VehicleIdentifyForm extends Component
{
    public $communityId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($communityId)
    {
        $this->communityId = $communityId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.vehicle-identify-form');
    }
}
