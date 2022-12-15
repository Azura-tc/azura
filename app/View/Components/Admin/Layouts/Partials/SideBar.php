<?php

namespace App\View\Components\Admin\Layouts\Partials;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class SideBar extends Component
{
    public array $navigationItems = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $name)
    {
        $this->navigationItems = [
            [
                'label' => 'Navigation',
                'href' => null,
                'icon' => null,
                'active' => null
            ],
            [
                'label' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'icon' => 'mdi mdi-speedometer',
                'active' => Route::is('admin.dashboard'),
            ],
            // [
            //     'label' => 'Settings',
            //     'href' => route('admin.dashboard'),
            //     'icon' => 'ti-shield',
            //     'active' => Route::is('admin.dashboard'),
            // ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.partials.side-bar');
    }
}
