<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    public function changePassword()
    {
        return view('admin.home.change-password');
    }

    public function editeProfile()
    {
        return view('admin.home.edit-profile');
    }
}
