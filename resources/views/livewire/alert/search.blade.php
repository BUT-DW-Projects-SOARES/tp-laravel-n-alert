<div>
    <div class="page-header">
        <div>
            <h1>Dashboard</h1>
            <p>Live alert search and filtering.</p>
        </div>
    </div>

    <div class="glass-card mb-8">
        <form wire:submit="$refresh" class="flex flex-col gap-4">
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Search keywords..." wire:model="keywords">
                <x-form.validation-error value="keywords" />
            </div>

            <div class="form-group">
                <select class="form-input" wire:model="selected_category">
                    <option value="">-- All Categories --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                    @endforeach
                </select>
                <x-form.validation-error value="selected_category" />
            </div>
            
            @if(count($tags) > 0)
                <div class="form-group">
                    <label class="form-label mb-2">Filter by Tags:</label>
                    <div class="flex flex-wrap gap-4" style="padding: 1rem; background: var(--bg-color); border: 1px solid var(--border-color); border-radius: 0.5rem;">
                        @foreach ($tags as $tag)
                            <label style="display: flex; align-items: center; cursor: pointer; color: var(--text-color);">
                                <input type="checkbox" value="{{ $tag->id }}" wire:model="selected_tags" style="margin-right: 0.5rem; accent-color: var(--accent-purple);">
                                {{ $tag->label }}
                            </label>
                        @endforeach
                    </div>
                    <x-form.validation-error value="selected_tags" />
                </div>
            @endif

            <div class="flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Search</button>
                <button type="button" wire:click="resetForm" class="btn btn-secondary">Reset Filters</button>
            </div>
        </form>
    </div>

    <div class="glass-card">
        <h2 class="mb-4">Results ({{ count($alerts) }})</h2>
        @if(count($alerts) > 0)
            <div class="list-group">
                @foreach ($alerts as $alert)
                    <div class="list-item flex justify-between items-center">
                        <div>
                            <strong>{{ $alert->title }}</strong>
                            <div class="mt-2 flex gap-2">
                                @if($alert->category)
                                    <span class="badge" style="background: rgba(139, 92, 246, 0.1); color: var(--accent-purple); border-color: rgba(139, 92, 246, 0.2);">
                                        {{ $alert->category->label }}
                                    </span>
                                @endif
                                @foreach($alert->tags as $tag)
                                    <span class="badge" style="background: rgba(59, 130, 246, 0.1); color: var(--accent-blue); border-color: rgba(59, 130, 246, 0.2);">
                                        #{{ $tag->label }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('alert.show', ['alert' => $alert]) }}" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; padding: 2rem;">No alerts found matching your criteria.</p>
        @endif
    </div>
</div>
