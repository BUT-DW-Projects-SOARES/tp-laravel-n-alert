<x-layout.base title="Tag {{ $tag->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('tag.index') }}" style="color: var(--accent-purple);">&larr; Back to tags</a></p>
            <h1 class="mt-4">{{ $tag->label }}</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('tag.edit', ['tag' => $tag]) }}" class="btn btn-secondary">
                Edit Tag
            </a>
            <form action="{{ route('tag.destroy', ['tag' => $tag]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary" style="background: rgba(239, 68, 68, 0.1); color: var(--text-danger); border-color: rgba(239, 68, 68, 0.2);">
                    Delete Tag
                </button>
            </form>
        </div>
    </div>

    <div class="glass-card">
        <p>Currently, this tag is not linked to any alerts (feature coming soon).</p>
    </div>
</x-layout.base>
