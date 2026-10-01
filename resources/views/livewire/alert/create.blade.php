<div>
    @can('create', App\Models\Alert::class)
        <div class="glass-card">
            <h2 class="mb-4">Quick Create Alert</h2>
            <form wire:submit="createAlert">
                <div class="form-group">
                    <label class="form-label">Alert Title</label>
                    <input class="form-input" type="text" placeholder="Title" wire:model="title">
                    <x-form.validation-error value="title" />
                </div>
                
                <div class="form-group">
                    <label class="form-label">Published At</label>
                    <input class="form-input" type="datetime-local" placeholder="Published At" wire:model="published_at">
                    <x-form.validation-error value="published_at" />
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-input" placeholder="Description" wire:model="description" rows="3"></textarea>
                    <x-form.validation-error value="description" />
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-input" wire:model="category_id">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm" type="button" wire:click="showCategoryCreateForm" style="margin-top: 0.5rem;">+ Add new category</button>
                    <x-form.validation-error value="category_id" />
                </div>
                
                @if(count($tags) > 0)
                    <div class="form-group">
                        <label class="form-label mb-2">Tags:</label>
                        <div class="checkbox-group">
                            @foreach ($tags as $tag)
                                <label class="checkbox-label">
                                    <input type="checkbox" wire:model="related_tags" value="{{ $tag->id }}" class="checkbox-input">
                                    {{ $tag->label }}
                                </label>
                            @endforeach
                        </div>
                        <x-form.validation-error value="related_tags" />
                    </div>
                @endif
                
                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Create Alert</button>
                </div>
            </form>
        </div>
    @endcan
</div>
