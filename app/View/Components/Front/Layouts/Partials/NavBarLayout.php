<?php

namespace App\View\Components\Front\Layouts\Partials;

use Illuminate\View\Component;

class NavBarLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.layouts.partials.nav-bar-layout');
    }
}
