<x-layout.base title="New Alert">
    <div class="page-header">
        <div>
            <p><a href="{{ route('alert.index') }}" style="color: var(--accent-blue);">&larr; Back to alerts</a></p>
            <h1 class="mt-4">New Alert</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('alert.store') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Alert Title</label>
                <input class="form-input" type="text" name="title" placeholder="e.g. Server Maintenance" value="{{ old('title') }}">
                <x-form.validation-error value="title" />
            </div>

            <div class="form-group">
                <label class="form-label">Published At</label>
                <input class="form-input" type="datetime-local" name="published_at" value="{{ old('published_at') }}">
                <x-form.validation-error value="published_at" />
            </div>
            
            <div class="form-group mb-8">
                <label class="form-label">Description</label>
                <textarea class="form-input" name="description" placeholder="Enter alert details..." rows="4">{{ old('description') }}</textarea>
                <x-form.validation-error value="description" />
            </div>

            <div class="form-group mb-8">
                <label class="form-label">Category</label>
                <select class="form-input" name="category_id">
                    <option value="">-- No Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->label }}
                        </option>
                    @endforeach
                </select>
                <x-form.validation-error value="category_id" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Create Alert</button>
        </form>
    </div>
</x-layout.base>
