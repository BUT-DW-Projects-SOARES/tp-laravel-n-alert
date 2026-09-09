<x-layout.base title="Edit Tag {{ $tag->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('tag.show', ['tag' => $tag]) }}" style="color: var(--accent-purple);">&larr; Back to tag</a></p>
            <h1 class="mt-4">Edit Tag</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('tag.update', ['tag' => $tag]) }}">
            @csrf
            @method('PATCH')
            
            <div class="form-group mb-8">
                <label class="form-label">Tag Label</label>
                <input class="form-input" type="text" name="label" placeholder="e.g. Urgent" value="{{ old('label', $tag->label) }}">
                <x-form.validation-error value="label" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Update Tag</button>
        </form>
    </div>
</x-layout.base>
