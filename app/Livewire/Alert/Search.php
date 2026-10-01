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

#[Layout('components.layout.base', ['title' => 'Dashboard'])]
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

    public ?string $new_alert_title = null;
    public ?string $new_alert_published_at = null;
    public ?string $new_alert_description = null;
    public ?string $new_alert_category_id = null;
    public array $new_alert_tags = [];

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

    public function createAlert()
    {
        Gate::authorize('create', Alert::class);
        $data = $this->validate([
            'new_alert_title' => 'required',
            'new_alert_description' => 'nullable',
            'new_alert_published_at' => 'required|date',
            'new_alert_category_id' => 'nullable|integer|exists:categories,id',
            'new_alert_tags' => 'nullable|array',
            'new_alert_tags.*' => 'integer|exists:tags,id',
        ]);
        $alert = Alert::create([
            'title' => $data['new_alert_title'],
            'description' => $data['new_alert_description'],
            'published_at' => $data['new_alert_published_at'],
            'category_id' => $data['new_alert_category_id'],
        ]);
        $alert->tags()->attach($data['new_alert_tags']);
        $this->reset(['new_alert_title', 'new_alert_description', 'new_alert_published_at', 'new_alert_category_id', 'new_alert_tags']);
    }
}
