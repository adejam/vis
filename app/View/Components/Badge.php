<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public $userId;
    public $authUser;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userId, $authUser)
    {
        $this->userId = $userId;
        $this->authUser = $authUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.badge');
    }
}
