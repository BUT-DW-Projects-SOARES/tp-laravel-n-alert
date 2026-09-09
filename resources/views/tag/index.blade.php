<x-layout.base title="Tags">
    <div class="page-header">
        <div>
            <h1>Tags</h1>
            <p>Manage all available tags.</p>
        </div>
        <a href="{{ route('tag.create') }}" class="btn btn-primary">
            + New Tag
        </a>
    </div>

    <div class="glass-card">
        @if(count($tags) > 0)
            <div class="list-group">
                @foreach ($tags as $tag)
                    <div class="list-item flex justify-between items-center">
                        <div>
                            <strong>{{ $tag->label }}</strong>
                        </div>
                        <a href="{{ route('tag.show', ['tag' => $tag]) }}" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; padding: 2rem;">No tags found.</p>
        @endif
    </div>
</x-layout.base>
