<?php

namespace App\Livewire\Alert;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Session()]
    #[Url('q')]
    public string $keywords = '';

    #[Session()]
    #[Url('tags')]
    #[Validate([
        'selected_tags' => 'array',
        'selected_tags.*' => 'integer|exists:tags,id'
    ])]
    public array $selected_tags = [];

    #[Session()]
    #[Url('c')]
    #[Validate('nullable|integer|exists:categories,id')]
    public ?string $selected_category = null;

    public function render()
    {
        $tags = Tag::all();

        $alerts = Alert::with(['category'])
            ->where('title', 'like', '%' . $this->keywords . '%')
            ->when(!empty($this->selected_tags), function (Builder $query) {
                $query->whereHas('tags', function (Builder $query) {
                    $query->whereIn('id', $this->selected_tags);
                });
            })
            ->when($this->selected_category, function (Builder $query) {
                $query->where('category_id', '=', $this->selected_category);
            })
            ->get();

        return view('livewire.alert.search', ['tags' => $tags, 'categories' => Category::all(), 'alerts' => $alerts]);
    }

    public function resetForm()
    {
        $this->reset();
    }
}
