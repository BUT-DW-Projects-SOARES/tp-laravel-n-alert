<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();
        return view('alert.index', ['alerts' => $alerts]);
    }

    public function show($id)
    {
        $alert = Alert::findOrFail($id);
        return view('alert.show', ['alert' => $alert]);
    }
}
