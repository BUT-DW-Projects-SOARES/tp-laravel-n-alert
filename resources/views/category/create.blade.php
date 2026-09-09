<x-layout.base title="New Category">
    <div class="page-header">
        <div>
            <p><a href="{{ route('category.index') }}" style="color: var(--accent-purple);">&larr; Back to categories</a></p>
            <h1 class="mt-4">New Category</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            
            <div class="form-group mb-8">
                <label class="form-label">Category Label</label>
                <input class="form-input" type="text" name="label" placeholder="e.g. Critical Error" value="{{ old('label') }}">
                @error('label')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Create Category</button>
        </form>
    </div>
</x-layout.base>