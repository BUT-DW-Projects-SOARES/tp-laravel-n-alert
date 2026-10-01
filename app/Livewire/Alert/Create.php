<?php

namespace App\Livewire\Alert;

use App\Livewire\Category\Create as CategoryCreate;
use App\Models\Alert;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public ?string $title = null;
    public ?string $published_at = null;
    public ?string $description = null;
    public ?string $category_id = null;
    public array $related_tags = [];

    public function render()
    {
        $categories = Category::orderBy('label')->get();
        $tags = Tag::orderBy('label')->get();
        return view('livewire.alert.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function createAlert()
    {
        Gate::authorize('create', Alert::class);
        $data = $this->validate([
            'title' => 'required',
            'description' => 'nullable',
            'published_at' => 'required|date',
            'category_id' => 'nullable|integer|exists:categories,id',
            'related_tags' => 'nullable|array',
            'related_tags.*' => 'integer|exists:tags,id',
        ]);
        $alert = Alert::create($data);
        $alert->tags()->attach($data['related_tags']);
        $this->reset();
        $this->dispatch('alert-created');
    }

    #[On('category-created')]
    public function refresh() {}

    public function showCategoryCreateForm()
    {
        $this->dispatch('show')->to(CategoryCreate::class);
    }
}
