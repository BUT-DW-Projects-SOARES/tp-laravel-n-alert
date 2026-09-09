<x-layout.base title="Category {{ $category->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('category.index') }}" style="color: var(--accent-purple);">&larr; Back to categories</a></p>
            <h1 class="mt-4">{{ $category->label }}</h1>
        </div>
        <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-secondary">
            Edit Category
        </a>
    </div>

    <div class="glass-card">
        <h2 class="mb-4">Alerts in this Category</h2>
        
        @if($category->alerts->count() > 0)
            <div class="list-group">
                @foreach ($category->alerts as $alert)
                    <div class="list-item flex justify-between items-center">
                        <div>
                            <strong>{{ $alert->title ?? 'Alert #'.$alert->id }}</strong>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No alerts found in this category.</p>
        @endif
    </div>
</x-layout.base>
