<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', ['title' => 'Main']);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'About']);
    }
}
