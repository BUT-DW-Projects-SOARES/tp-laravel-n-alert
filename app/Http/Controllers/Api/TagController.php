<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Tag::class);
        return Tag::paginate(5)->toResourceCollection();
    }

    public function show(Tag $tag)
    {
        Gate::authorize('view', $tag);
        return $tag->toResource();
    }

    public function store(TagRequest $request)
    {
        Gate::authorize('create', Tag::class);
        $data = $request->validated();
        $tag = Tag::create($data);
        return $tag->toResource();
    }

    public function update(TagRequest $request, Tag $tag)
    {
        Gate::authorize('update', $tag);
        $data = $request->validated();
        $tag->update($data);
        return $tag->toResource();
    }

    public function destroy(Tag $tag)
    {
        Gate::authorize('delete', $tag);
        return response()->json($tag->delete());
    }
}
