<x-layout.base title="Dashboard">
    <div class="page-header">
        <div>
            <h1>Welcome to N-Altert</h1>
            <p>Your premium alerting and customer management platform.</p>
        </div>
    </div>

    <div class="grid-container">
        <!-- Customers Card -->
        <a href="{{ route('customer.index') }}" class="glass-card">
            <div class="flex items-center gap-4 mb-4">
                <div style="background: rgba(59, 130, 246, 0.1); padding: 1rem; border-radius: var(--radius-md); color: var(--accent-blue);">
                    <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <h3 class="card-title">Customers</h3>
                    <p style="margin: 0; font-size: 0.9rem;">Manage clients & contacts</p>
                </div>
            </div>
            <div style="margin-top: auto; color: var(--accent-blue); font-weight: 500; font-size: 0.9rem;">View All →</div>
        </a>

        <!-- Categories Card -->
        <a href="{{ route('category.index') }}" class="glass-card">
            <div class="flex items-center gap-4 mb-4">
                <div style="background: rgba(139, 92, 246, 0.1); padding: 1rem; border-radius: var(--radius-md); color: var(--accent-purple);">
                    <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                </div>
                <div>
                    <h3 class="card-title">Categories</h3>
                    <p style="margin: 0; font-size: 0.9rem;">Organize your alerts</p>
                </div>
            </div>
            <div style="margin-top: auto; color: var(--accent-purple); font-weight: 500; font-size: 0.9rem;">View All →</div>
        </a>

        <!-- Alerts Card -->
        <a href="{{ route('alert.index') }}" class="glass-card">
            <div class="flex items-center gap-4 mb-4">
                <div style="background: rgba(239, 68, 68, 0.1); padding: 1rem; border-radius: var(--radius-md); color: var(--text-danger);">
                    <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </div>
                <div>
                    <h3 class="card-title">Alerts</h3>
                    <p style="margin: 0; font-size: 0.9rem;">Monitor active systems</p>
                </div>
            </div>
            <div style="margin-top: auto; color: var(--text-danger); font-weight: 500; font-size: 0.9rem;">View All →</div>
        </a>
    </div>

    <div class="mt-8 glass-card">
        <h2>Recent Activity</h2>
        <p>The system is running smoothly. Welcome to the new premium interface.</p>
    </div>
</x-layout.base>