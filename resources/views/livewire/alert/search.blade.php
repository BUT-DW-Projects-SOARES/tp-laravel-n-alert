<div>
    <div class="page-header">
        <div>
            <h1>Dashboard</h1>
            <p>Live alert search and filtering.</p>
        </div>
    </div>

    <div class="glass-card mb-8" style="padding: 1.5rem;">
        <form wire:submit="$refresh">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div class="form-group" style="margin: 0;">
                    <input class="form-input" type="text" placeholder="Search keywords..." wire:model="keywords">
                    <x-form.validation-error value="keywords" />
                </div>

                <div class="form-group" style="margin: 0;">
                    <select class="form-input" wire:model="selected_category">
                        <option value="">-- All Categories --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                    <x-form.validation-error value="selected_category" />
                </div>
            </div>
            
            @if(count($tags) > 0)
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label class="form-label mb-2" style="font-size: 0.85rem;">Filter by Tags:</label>
                    <div class="checkbox-group">
                        @foreach ($tags as $tag)
                            <label class="checkbox-label">
                                <input type="checkbox" value="{{ $tag->id }}" wire:model="selected_tags" class="checkbox-input">
                                {{ $tag->label }}
                            </label>
                        @endforeach
                    </div>
                    <x-form.validation-error value="selected_tags" />
                </div>
            @endif

            <div class="flex gap-2" style="justify-content: flex-end;">
                <button type="button" wire:click="resetForm" class="btn btn-secondary">Reset Filters</button>
                <button type="submit" class="btn btn-primary">Search</button>
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

    @can('create', App\Models\Alert::class)
        <div class="glass-card mt-8">
            <h2 class="mb-4">Quick Create Alert</h2>
            <form wire:submit="createAlert">
                <div class="form-group">
                    <label class="form-label">Alert Title</label>
                    <input class="form-input" type="text" placeholder="Title" wire:model="new_alert_title">
                    <x-form.validation-error value="new_alert_title" />
                </div>
                
                <div class="form-group">
                    <label class="form-label">Published At</label>
                    <input class="form-input" type="datetime-local" placeholder="Published At" wire:model="new_alert_published_at">
                    <x-form.validation-error value="new_alert_published_at" />
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-input" placeholder="Description" wire:model="new_alert_description" rows="3"></textarea>
                    <x-form.validation-error value="new_alert_description" />
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-input" wire:model="new_alert_category_id">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                    <x-form.validation-error value="new_alert_category_id" />
                </div>
                
                @if(count($tags) > 0)
                    <div class="form-group">
                        <label class="form-label mb-2">Tags:</label>
                        <div class="checkbox-group">
                            @foreach ($tags as $tag)
                                <label class="checkbox-label">
                                    <input type="checkbox" wire:model="new_alert_tags" value="{{ $tag->id }}" class="checkbox-input">
                                    {{ $tag->label }}
                                </label>
                            @endforeach
                        </div>
                        <x-form.validation-error value="new_alert_tags" />
                    </div>
                @endif
                
                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Create Alert</button>
                </div>
            </form>
        </div>
    @endcan
</div>
