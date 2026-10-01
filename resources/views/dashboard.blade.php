<x-layout.base title="Dashboard">
    <div class="page-header">
        <div>
            <h1>Dashboard</h1>
            <p>Live alert search and creation.</p>
        </div>
    </div>

    <livewire:alert.search />

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem; align-items: start;">
        <livewire:alert.create />
        <livewire:category.create />
    </div>
</x-layout.base>
