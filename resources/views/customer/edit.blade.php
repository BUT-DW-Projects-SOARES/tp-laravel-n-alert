<x-layout.base title="Edit customer">
    <p><a href="{{ route('customer.index') }}">back to list</a></p>
    <h1>Edit customer</h1>
    <form method="POST" action="{{ route('customer.update', ['customer' => $customer->id]) }}">
        @csrf
        @method('PUT')
        <p>
            <input class="border" type="text" name="label" placeholder="label" value="{{ old('label', $customer->label) }}">
            @error('label')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="nom" placeholder="nom" value="{{ old('nom', $contact?->lastname) }}">
            @error('nom')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="prenom" placeholder="prenom" value="{{ old('prenom', $contact?->firstname) }}">
            @error('prenom')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="email" placeholder="email" value="{{ old('email', $contact?->email) }}">
            @error('email')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input class="border" type="text" name="phone" placeholder="phone" value="{{ old('phone', $contact?->phone) }}">
            @error('phone')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </p>
        <p><button class="border" type="submit">Edit</button></p>
    </form>
</x-layout.base>