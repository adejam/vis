<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommunityNav extends Component
{
    public $communityId;
    public $communityName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($communityId, $communityName)
    {
        $this->communityId = $communityId;
        $this->communityName = $communityName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community-nav');
    }
}
