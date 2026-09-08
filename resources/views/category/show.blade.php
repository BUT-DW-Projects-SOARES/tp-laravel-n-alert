<x-layout.base title="Category {{ $category->label }}">
    <p><a href="{{ route('category.index') }}">back to list</a></p>
    <h1>{{ $category->label }}</h1>
</x-layout.base>
