<x-layout.base title="All Alerts">
    <div class="page-header">
        <div>
            <h1>Alerts</h1>
            <p>Monitor all system and operational alerts.</p>
        </div>
    </div>

    <div class="glass-card">
        @if(count($alerts) > 0)
            <div class="list-group">
                @foreach ($alerts as $alert)
                    <div class="list-item flex justify-between items-center">
                        <div>
                            <strong>{{ $alert->title }}</strong>
                            <div class="mt-2 flex gap-2">
                                @if($alert->category)
                                    <span class="badge" style="background: rgba(139, 92, 246, 0.1); color: var(--accent-purple); border-color: rgba(139, 92, 246, 0.2);">
                                        {{ $alert->category->label }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('alert.show', $alert) }}" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; padding: 2rem;">No alerts found.</p>
        @endif
    </div>
</x-layout.base>