<x-layout.base title="New Customer">
    <p><a href="{{ route('customer.index') }}">back to list</a></p>
    <h1>New Customer</h1>
    <form method="POST" action="{{ route('customer.store') }}">
        @csrf
        <input class="border" type="text" name="label" placeholder="label">
        <button class="border" type="submit">create</button>
    </form>
</x-layout.base>