<?php

namespace App\View\Components\Admin\Layouts\Partials;

use Illuminate\View\Component;

class SideBarItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $label, public ?string $href = null, public ?string $icon = null, public ?bool $active)
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
        return view('admin.layouts.partials.side-bar-item');
    }
}
