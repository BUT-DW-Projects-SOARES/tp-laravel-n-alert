<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function store(TagRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return $tag;
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        return response()->json($tag->delete());
    }
}
