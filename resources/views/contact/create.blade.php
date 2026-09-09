<x-layout.base title="New Contact for {{ $customer->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('customer.show', ['customer' => $customer]) }}" style="color: var(--accent-blue);">&larr; Back to {{ $customer->label }}</a></p>
            <h1 class="mt-4">Add Secondary Contact</h1>
            <p>For customer: <strong>{{ $customer->label }}</strong></p>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('contact.store', ['customer' => $customer]) }}">
            @csrf
            
            <div class="flex gap-4 mb-4">
                <div class="form-group" style="flex: 1;">
                    <label class="form-label">First Name</label>
                    <input class="form-input" type="text" name="firstname" placeholder="Jane" value="{{ old('firstname') }}">
                    @error('firstname')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label class="form-label">Last Name</label>
                    <input class="form-input" type="text" name="lastname" placeholder="Smith" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input class="form-input" type="text" name="email" placeholder="jane.smith@acme.com" value="{{ old('email') }}">
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group mb-8">
                <label class="form-label">Phone (Optional)</label>
                <input class="form-input" type="text" name="phone" placeholder="+1 555-0200" value="{{ old('phone') }}">
                @error('phone')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Add Contact</button>
        </form>
    </div>
</x-layout.base>
