<x-layout.base title="Category {{ $category->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('category.index') }}" style="color: var(--accent-purple);">&larr; Back to categories</a></p>
            <h1 class="mt-4">{{ $category->label }}</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-secondary">
                Edit Category
            </a>
            <form action="{{ route('category.destroy', ['category' => $category]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary" style="background: rgba(239, 68, 68, 0.1); color: var(--text-danger); border-color: rgba(239, 68, 68, 0.2);">
                    Delete Category
                </button>
            </form>
        </div>
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
