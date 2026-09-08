<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = 'home';
        return view('home.index', ['home' => $home]);
    }
}
