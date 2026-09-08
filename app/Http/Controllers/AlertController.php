<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::with('category')->get();
        return view('alert.index', ['alerts' => $alerts]);
    }

    public function show(Alert $alert)
    {
        return view('alert.show', ['alert' => $alert]);
    }
}
