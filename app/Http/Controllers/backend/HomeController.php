<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class HomeController extends backendController
{
    public function index()
    {
        return view('backend.home');
    }
}
