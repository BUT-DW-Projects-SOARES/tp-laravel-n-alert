<x-layout.base title="Customers">
    <div class="page-header">
        <div>
            <h1>Customers</h1>
            <p>Manage your company's clients and their contacts.</p>
        </div>
        <a href="{{ route('customer.create') }}" class="btn btn-primary">
            + New Customer
        </a>
    </div>

    <div class="grid-container">
        @forelse ($customers as $customer)
            <a href="{{ route('customer.show', ['customer' => $customer]) }}" class="glass-card">
                <h3 class="card-title">{{ $customer->label }}</h3>
                <p>ID: #{{ $customer->id }} &bull; {{ $customer->contacts->count() }} Contact(s)</p>
                <div style="margin-top: auto; color: var(--text-muted); font-size: 0.85rem;">
                    Click to view details &rarr;
                </div>
            </a>
        @empty
            <div class="glass-card" style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
                <p>No customers found.</p>
                <a href="{{ route('customer.create') }}" class="btn btn-primary mt-4">Create your first customer</a>
            </div>
        @endforelse
    </div>
</x-layout.base>