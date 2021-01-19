<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowRequirementAccessForm extends Component
{
    public $accessType;
    public $userVehicleId;
    public $communityId;
    public $accessName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $accessType,
        $communityId,
        $userVehicleId,
        $accessName
    ) {
        $this->accessType = $accessType;
        $this->userVehicleId = $userVehicleId;
        $this->communityId = $communityId;
        $this->accessName = $accessName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.show-requirement-access-form');
    }
}
