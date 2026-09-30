<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlertRequest;
use App\Http\Requests\UpdateAlertRequest;
use App\Models\Alert;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Alert::class);
        $alerts = Alert::with('category')->get();
        return view('alert.index', ['alerts' => $alerts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Alert::class);
        $categories = Category::all();
        $tags = Tag::all();
        return view('alert.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlertRequest $request)
    {
        Gate::authorize('create', Alert::class);
        $data = $request->validated();
        $alert = Alert::create($data);
        if (isset($data['tags'])) {
            $alert->tags()->attach($data['tags']);
        }
        return redirect()->route('alert.show', ['alert' => $alert]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alert $alert)
    {
        Gate::authorize('view', $alert);
        return view('alert.show', ['alert' => $alert]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alert $alert)
    {
        Gate::authorize('update', $alert);
        $categories = Category::all();
        $tags = Tag::all();
        return view('alert.edit', ['alert' => $alert, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlertRequest $request, Alert $alert)
    {
        Gate::authorize('update', $alert);
        $data = $request->validated();
        $alert->update($data);
        if (isset($data['tags'])) {
            $alert->tags()->sync($data['tags']);
        } else {
            $alert->tags()->sync([]);
        }
        return redirect()->route('alert.show', ['alert' => $alert]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alert $alert)
    {
        Gate::authorize('delete', $alert);
        $alert->delete();
        return redirect()->route('alert.index');
    }
}
