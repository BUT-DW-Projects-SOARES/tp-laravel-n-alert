<x-layout.base title="Edit category {{ $category->label }}">
    <p><a href="{{ route('category.show', ['category' => $category]) }}">back to category</a></p>
    <h1>Edit category {{ $category->label }}</h1>
    <form method="POST" action="{{ route('category.update', ['category' => $category]) }}">
        @csrf
        @method('PATCH')
        <p>
            <input class="border" type="text" name="label" placeholder="label"
                value="{{ old('label', $category->label) }}">
            @error('label')
                <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p> <button class="border" type="submit">update</button></p>
    </form>
</x-layout.base>
