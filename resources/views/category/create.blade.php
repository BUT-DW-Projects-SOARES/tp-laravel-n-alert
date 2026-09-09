<x-layout.base title="New category">
    <p><a href="{{ route('category.index') }}">back to list</a></p>
    <h1>New category</h1>
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <input class="border" type="text" name="label" placeholder="label">
        <button class="border" type="submit">create</button>
    </form>
</x-layout.base>