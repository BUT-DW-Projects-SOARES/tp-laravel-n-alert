<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlertRequest;
use App\Http\Requests\UpdateAlertRequest;
use App\Models\Alert;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alerts = Alert::with('category')->get();
        return view('alert.index', ['alerts' => $alerts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alert.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlertRequest $request)
    {
        $alert = Alert::create($request->validated());
        return redirect()->route('alert.show', ['alert' => $alert]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alert $alert)
    {
        return view('alert.show', ['alert' => $alert]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alert $alert)
    {
        return view('alert.edit', ['alert' => $alert]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlertRequest $request, Alert $alert)
    {
        $alert->update($request->validated());
        return redirect()->route('alert.show', ['alert' => $alert]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alert $alert)
    {
        $alert->delete();
        return redirect()->route('alert.index');
    }
}
