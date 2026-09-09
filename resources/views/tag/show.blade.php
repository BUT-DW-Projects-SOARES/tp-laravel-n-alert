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

    <div class="glass-card mb-8">
        <h2 class="mb-4">Related Alerts</h2>
        @if($tag->alerts->count() > 0)
            <div class="list-group">
                @foreach ($tag->alerts as $alert)
                    <div class="list-item">
                        <a href="{{ route('alert.show', ['alert' => $alert]) }}" class="nav-item">
                            <strong>{{ $alert->title }}</strong>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="color: var(--text-muted);">This tag is not linked to any alerts.</p>
        @endif
    </div>

    <div class="glass-card">
        <h2 class="mb-4">Related Customers</h2>
        @if($tag->customers->count() > 0)
            <div class="list-group">
                @foreach ($tag->customers as $customer)
                    <div class="list-item">
                        <a href="{{ route('customer.show', ['customer' => $customer]) }}" class="nav-item">
                            <strong>{{ $customer->label }}</strong>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="color: var(--text-muted);">This tag is not linked to any customers.</p>
        @endif
    </div>
</x-layout.base>
