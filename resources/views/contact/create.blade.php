<x-layout.base title="New contact for customer {{ $customer->label }}">
    <p><a href="{{ route('customer.show', ['customer' => $customer]) }}">back to customer</a></p>
    <h1>New contact for customer {{ $customer->label }}</h1>
    <form method="POST" action="{{ route('contact.store', ['customer' => $customer]) }}">
        @csrf
        <p>
            <input class="border" type="text" name="lastname" placeholder="lastname" value="{{ old('lastname') }}">
            @error('lastname')
                <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="firstname" placeholder="firstname"
                value="{{ old('firstname') }}">
            @error('firstname')
                <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="email" placeholder="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="phone" placeholder="phone" value="{{ old('phone') }}">
            @error('phone')
                <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p> <button class="border" type="submit">create</button></p>
    </form>
</x-layout.base>
