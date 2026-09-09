<x-layout.base title="Customer {{ $customer->label }}">
    <div class="page-header">
        <div>
            <p><a href="{{ route('customer.index') }}" style="color: var(--accent-blue);">&larr; Back to customers</a></p>
            <h1 class="mt-4">{{ $customer->label }}</h1>
            <p>Customer ID: #{{ $customer->id }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}" class="btn btn-secondary">
                Edit Customer
            </a>
            <form action="{{ route('customer.destroy', ['customer' => $customer->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary" style="background: rgba(239, 68, 68, 0.1); color: var(--text-danger); border-color: rgba(239, 68, 68, 0.2);">
                    Delete Customer
                </button>
            </form>
        </div>
    </div>

    <div class="glass-card mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2>Contacts</h2>
            <a href="{{ route('contact.create', ['customer' => $customer]) }}" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                + Add Contact
            </a>
        </div>
        
        @if($customer->contacts->count() > 0)
            <div class="list-group">
                @foreach ($customer->contacts as $contact)
                    <div class="list-item flex justify-between items-center">
                        <div>
                            <strong>{{ $contact->firstname }} {{ $contact->lastname }}</strong>
                            <div class="mt-2 text-muted" style="font-size: 0.9rem;">
                                <span>📧 {{ $contact->email }}</span>
                                @if($contact->phone)
                                    <span style="margin-left: 1rem;">📱 {{ $contact->phone }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('contact.edit', ['customer' => $customer, 'contact' => $contact]) }}" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Edit</a>
                            <form action="{{ route('contact.destroy', ['customer' => $customer, 'contact' => $contact]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; background: rgba(239, 68, 68, 0.1); color: var(--text-danger); border: 1px solid rgba(239, 68, 68, 0.2);">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No contacts found for this customer.</p>
        @endif
    </div>
</x-layout.base>