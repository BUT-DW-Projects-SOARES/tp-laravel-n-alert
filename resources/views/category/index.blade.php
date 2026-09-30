<x-layout.base title="Categories">
    <div class="page-header">
        <div>
            <h1>Categories</h1>
            <p>Manage alert categories.</p>
        </div>
        @can('create', App\Models\Category::class)
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                + New Category
            </a>
        @endcan
    </div>

    <div class="glass-card">
        @if(count($categories) > 0)
            <div class="list-group">
                @foreach ($categories as $category)
                    <div class="list-item flex justify-between items-center">
                        <div>
                            <strong>{{ $category->label }}</strong>
                        </div>
                        <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; padding: 2rem;">No categories found.</p>
        @endif
    </div>
</x-layout.base>
