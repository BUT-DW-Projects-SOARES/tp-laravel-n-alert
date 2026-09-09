<x-layout.base title="All categories">
    <p><a href="{{ route('category.create') }}">create new category</a></p>
    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('category.show', ['category' => $category]) }}">{{ $category->label }}</a></li>
        @endforeach
    </ul>
</x-layout.base>
