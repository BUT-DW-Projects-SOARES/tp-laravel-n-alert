<x-layout.base title="Alert {{ $alert->title }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('alert.index') }}" style="color: var(--text-danger);">&larr; Back to alerts</a></p>
            <h1 class="mt-4">{{ $alert->title }}</h1>
            <p class="text-muted">Alert ID: #{{ $alert->id }}</p>
        </div>
    </div>

    <div class="glass-card mb-8" style="border-color: rgba(239, 68, 68, 0.3);">
        <div class="flex items-center justify-between mb-4">
            <h2 style="color: var(--text-danger);">Alert Details</h2>
            <div class="text-muted text-sm">
                Published: {{ $alert->published_at->isoFormat('L HH:mm') }}
            </div>
        </div>
        
        <p style="font-size: 1.1rem; color: var(--text-main); margin-bottom: 2rem;">
            {{ $alert->description }}
        </p>

        @if ($alert->category)
            <div class="mb-4">
                <span class="form-label" style="display: inline-block; margin-right: 1rem;">Category:</span>
                <span class="badge" style="background: rgba(139, 92, 246, 0.1); color: var(--accent-purple); border-color: rgba(139, 92, 246, 0.2);">
                    {{ $alert->category->label }}
                </span>
            </div>
        @endif

        @if($alert->tags->count() > 0)
            <div>
                <span class="form-label" style="display: inline-block; margin-right: 1rem;">Tags:</span>
                @foreach ($alert->tags as $tag)
                    <a href="{{ route('tag.show', ['tag' => $tag]) }}" class="badge" style="background: rgba(59, 130, 246, 0.1); color: var(--accent-blue); border-color: rgba(59, 130, 246, 0.2); text-decoration: none; margin-right: 0.5rem;">
                        #{{ $tag->label }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layout.base>