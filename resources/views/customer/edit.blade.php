<x-layout.base title="Edit Customer {{ $customer->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('customer.show', ['customer' => $customer]) }}" style="color: var(--accent-blue);">&larr; Back to customer</a></p>
            <h1 class="mt-4">Edit Customer</h1>
        </div>
    </div>

    <div class="form-container mx-auto">
        <form method="POST" action="{{ route('customer.update', ['customer' => $customer]) }}">
            @csrf
            @method('PUT')
            
            <h2 class="mb-8" style="color: var(--accent-blue);">Company Details</h2>
            <div class="form-group">
                <label class="form-label">Company Name</label>
                <input class="form-input" type="text" name="label" placeholder="e.g. Acme Corp" value="{{ old('label', $customer->label) }}">
                <x-form.validation-error value="label" />
            </div>

            <hr style="border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h2 class="mb-8" style="color: var(--accent-purple);">Primary Contact</h2>
            
            <div class="flex gap-4 mb-4">
                <div class="form-group" style="flex: 1;">
                    <label class="form-label">First Name</label>
                    <input class="form-input" type="text" name="prenom" placeholder="John" value="{{ old('prenom', $contact?->firstname) }}">
                    <x-form.validation-error value="prenom" />
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label class="form-label">Last Name</label>
                    <input class="form-input" type="text" name="nom" placeholder="Doe" value="{{ old('nom', $contact?->lastname) }}">
                    <x-form.validation-error value="nom" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input class="form-input" type="text" name="email" placeholder="john.doe@acme.com" value="{{ old('email', $contact?->email) }}">
                <x-form.validation-error value="email" />
            </div>
            
            <div class="form-group mb-8">
                <label class="form-label">Phone (Optional)</label>
                <input class="form-input" type="text" name="phone" placeholder="+1 555-0198" value="{{ old('phone', $contact?->phone) }}">
                <x-form.validation-error value="phone" />
            </div>

            <button class="btn btn-primary" style="width: 100%;" type="submit">Update Customer</button>
        </form>
    </div>
</x-layout.base>