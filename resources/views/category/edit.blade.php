<x-layout.base title="Edit Category {{ $category->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('category.show', ['category' => $category]) }}" style="color: var(--accent-purple);">&larr; Back to category</a></p>
            <h1 class="mt-4">Edit Category</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('category.update', ['category' => $category]) }}">
            @csrf
            @method('PATCH')
            
            <div class="form-group mb-8">
                <label class="form-label">Category Label</label>
                <input class="form-input" type="text" name="label" placeholder="e.g. Critical Error" value="{{ old('label', $category->label) }}">
                <x-form.validation-error value="label" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Update Category</button>
        </form>
    </div>
</x-layout.base>
