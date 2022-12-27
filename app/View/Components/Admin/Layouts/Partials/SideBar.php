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
                'active' => null,
                'items' => null,
            ],
            [
                'label' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'icon' => 'mdi mdi-speedometer',
                'active' => Route::is('admin.dashboard'),
                'items' => null,
            ],
            [
                'label' => 'Security',
                'href' => null,
                'icon' => null,
                'active' => null,
                'items' => null,
            ],
            [
                'label' => 'Profile',
                'href' => route('admin.profile'),
                'icon' => 'mdi mdi-cog',
                'active' => Route::is('admin.profile'),
                'items' => null,
            ],
            // [
            //     'label' => 'Settings',
            //     'href' => null,
            //     'icon' => 'mdi mdi-cog',
            //     'active' => Route::is('admin.setting.*'),
            //     'items' => [
            //         [
            //             'label' => "Edit Profile",
            //             'href' => route('admin.setting.edit-profile'),
            //             'active' => Route::is('admin.setting.edit-profile')
            //         ],
            //         [
            //             'label' => "Change Password",
            //             'href' => route('admin.setting.change-password'),
            //             'active' => Route::is('admin.setting.change-password')
            //         ],
            //     ]
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
