<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Tag::class);
        return view('tag.index', ['tags' => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Tag::class);
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        Gate::authorize('create', Tag::class);
        $data = $request->validated();
        $tag = Tag::create($data);
        return redirect()->route('tag.show', ['tag' => $tag]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        Gate::authorize('view', $tag);
        return view('tag.show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('tag.show', ['tag' => $tag]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
