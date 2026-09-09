<x-layout.base title="New Customer">
    <p><a href="{{ route('customer.index') }}">back to list</a></p>
    <h1>New Customer</h1>
    <form method="POST" action="{{ route('customer.store') }}">
        @csrf
        <p>
            <input class="border" type="text" name="label" placeholder="Nom de l'entreprise (label)" value="{{ old('label') }}">
            @error('label')<span class="text-red-500 block">{{ $message }}</span>@enderror
        </p>
        <p>
            <input class="border" type="text" name="nom" placeholder="nom" value="{{ old('nom') }}">
            @error('nom')<span class="text-red-500 block">{{ $message }}</span>@enderror
        </p>
        <p>
            <input class="border" type="text" name="prenom" placeholder="prenom" value="{{ old('prenom') }}">
            @error('prenom')<span class="text-red-500 block">{{ $message }}</span>@enderror
        </p>
        <p>
            <input class="border" type="email" name="email" placeholder="email" value="{{ old('email') }}">
            @error('email')<span class="text-red-500 block">{{ $message }}</span>@enderror
        </p>
        <p>
            <input class="border" type="text" name="phone" placeholder="phone" value="{{ old('phone') }}">
            @error('phone')<span class="text-red-500 block">{{ $message }}</span>@enderror
        </p>
        <p><button class="border" type="submit">create</button></p>
    </form>
</x-layout.base>