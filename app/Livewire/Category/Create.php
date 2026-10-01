<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required')]
    public ?string $label = null;

    public $showForm = false;

    public function render()
    {
        return view('livewire.category.create');
    }

    public function save()
    {
        Gate::authorize('create', Category::class);
        $data = $this->validate();
        Category::create($data);
        $this->reset();
        $this->dispatch('category-created');
    }

    #[On('show')]
    public function showForm()
    {
        $this->showForm = true;
    }
}
