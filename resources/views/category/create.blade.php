<x-layout.base title="New category">
    <p><a href="{{ route('category.index') }}">back to list</a></p>
    <h1>New category</h1>
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <p>
            <input class="border" type="text" name="label" placeholder="label" value="{{ old('label') }}">
            @error('label')
                <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p> <button class="border" type="submit">create</button></p>
    </form>
</x-layout.base>