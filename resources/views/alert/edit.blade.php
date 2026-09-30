<x-layout.base title="Edit Alert {{ $alert->title }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('alert.show', ['alert' => $alert]) }}" style="color: var(--accent-blue);">&larr; Back to alert</a></p>
            <h1 class="mt-4">Edit Alert</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('alert.update', ['alert' => $alert]) }}">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label class="form-label">Alert Title</label>
                <input class="form-input" type="text" name="title" placeholder="e.g. Server Maintenance" value="{{ old('title', $alert->title) }}">
                <x-form.validation-error value="title" />
            </div>

            <div class="form-group">
                <label class="form-label">Published At</label>
                <input class="form-input" type="datetime-local" name="published_at" value="{{ old('published_at', $alert->published_at?->format('Y-m-d\TH:i')) }}">
                <x-form.validation-error value="published_at" />
            </div>
            
            <div class="form-group mb-8">
                <label class="form-label">Description</label>
                <textarea class="form-input" name="description" placeholder="Enter alert details..." rows="4">{{ old('description', $alert->description) }}</textarea>
                <x-form.validation-error value="description" />
            </div>

            <div class="form-group mb-8">
                <label class="form-label">Category</label>
                <select class="form-input" name="category_id">
                    <option value="">-- No Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $alert->category_id) == $category->id)>
                            {{ $category->label }}
                        </option>
                    @endforeach
                </select>
                <x-form.validation-error value="category_id" />
            </div>

            <div class="form-group mb-8">
                <label class="form-label">Tags</label>
                <div class="flex flex-wrap gap-4" style="padding: 1rem; background: var(--bg-color); border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    @foreach ($tags as $tag)
                        <label style="display: flex; align-items: center; cursor: pointer; color: var(--text-color);">
                            <input @checked(in_array($tag->id, old('tags', $alert->tags->pluck('id')->all()))) type="checkbox" name="tags[]" value="{{ $tag->id }}" style="margin-right: 0.5rem; accent-color: var(--accent-purple);">
                            {{ $tag->label }}
                        </label>
                    @endforeach
                </div>
                <x-form.validation-error value="tags.*" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Update Alert</button>
        </form>
    </div>
</x-layout.base>
