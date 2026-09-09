<x-layout.base title="New Tag">
    <div class="page-header">
        <div>
            <p><a href="{{ route('tag.index') }}" style="color: var(--accent-purple);">&larr; Back to tags</a></p>
            <h1 class="mt-4">New Tag</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('tag.store') }}">
            @csrf
            
            <div class="form-group mb-8">
                <label class="form-label">Tag Label</label>
                <input class="form-input" type="text" name="label" placeholder="e.g. Urgent" value="{{ old('label') }}">
                <x-form.validation-error value="label" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Create Tag</button>
        </form>
    </div>
</x-layout.base>
