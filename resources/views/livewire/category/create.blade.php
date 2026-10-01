<div>
    @can('create', App\Models\Category::class)
        <div class="glass-card">
            <h2 class="mb-4">Quick Create Category</h2>
            <form wire:submit="save">
                <div class="form-group">
                    <label class="form-label">Category Label</label>
                    <input class="form-input" type="text" placeholder="e.g. Server Issues" wire:model="label">
                    <x-form.validation-error value="label" />
                </div>
                
                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Create Category</button>
                </div>
            </form>
        </div>
    @endcan
</div>
