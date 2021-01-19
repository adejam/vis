<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowRequirementAccess extends Component
{
    public $accessRequirement;
    public $communityRequirement;
    public $grantedAccess;
    public $communityId;
    public $userVehicleId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $accessRequirement,
        $communityRequirement,
        $grantedAccess,
        $communityId,
        $userVehicleId
    ) {
        $this->accessRequirement = $accessRequirement;
        $this->communityRequirement = $communityRequirement;
        $this->grantedAccess = $grantedAccess;
        $this->communityId = $communityId;
        $this->userVehicleId = $userVehicleId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.show-requirement-access');
    }
}
