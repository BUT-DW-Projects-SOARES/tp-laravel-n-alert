<x-layout.base title="Category {{ $category->label }}">
    <p><a href="{{ route('category.index') }}">back to list</a></p>
    <p><a href="{{ route('category.edit', ['category' => $category]) }}">edit</a></p>
    <h1>{{ $category->label }}</h1>
    <ul>
        @foreach ($category->alerts as $alert)
            <li><a href="{{ route('alert.show', ['alert' => $alert]) }}">{{ $alert->title }}</a></li>
        @endforeach
    </ul>
</x-layout.base>
