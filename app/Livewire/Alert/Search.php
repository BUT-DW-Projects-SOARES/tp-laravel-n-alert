<?php

namespace App\Livewire\Alert;

use App\Models\Alert;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout.base', ['title' => 'Dashboard'])]
class Search extends Component
{
    public string $keywords = '';
    public array $selected_tags = [];

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
            ->get();

        return view('livewire.alert.search', ['tags' => $tags, 'alerts' => $alerts]);
    }

    public function resetForm()
    {
        $this->reset();
    }
}
