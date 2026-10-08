<div x-data="{ open: false }">
    <button type="button" class="nav-item" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer; color: var(--text-muted);" x-on:click="open = true">
        <svg style="width: 20px; height: 20px; display: inline-block; margin-right: 10px; vertical-align: text-bottom;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
        Generate API Token
    </button>

    @teleport('body')
        <div>
            <div x-show="open"
                class="absolute top-0 left-0 z-10 w-screen h-screen flex items-center justify-center" style="background: rgba(0,0,0,0.5);">
                <div class="glass-card p-8 space-y-4" style="min-width: 400px; max-height: 90vh; overflow-y: auto;">
                    <form wire:submit="generate">
                        <h2 style="color: var(--text-main); margin-bottom: 1.5rem;">Generate new token</h2>
                        
                        <div class="form-group mb-4">
                            <label class="form-label">Token Name</label>
                            <input class="form-input" placeholder="e.g. Mobile App" wire:model="token_name">
                            <x-form.validation-error value="token_name" />
                        </div>
                        
                        <div class="form-group mb-4">
                            <label class="form-label mb-2 block">Abilities</label>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
                                @foreach ($abilities as $ability)
                                    <label class="checkbox-label" style="display: flex; align-items: center;">
                                        <input wire:model="token_abilities" type="checkbox" value="{{ $ability }}" class="checkbox-input" style="margin-right: 0.5rem;"> 
                                        <span style="font-size: 0.85rem;">{{ $ability }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-form.validation-error value="token_abilities" />
                        </div>
                        
                        <p><button type="submit" class="btn btn-primary" style="width: 100%;">Go!</button></p>
                    </form>
                    
                    @if ($token)
                        <div class="mt-4 p-4 rounded" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);">
                            <p style="color: var(--text-muted); font-size: 0.875rem;">Generated token:</p>
                            <code style="color: var(--text-main); font-size: 1rem; user-select: all; word-break: break-all;">{{ $token }}</code>
                        </div>
                    @endif
                    <div class="mt-4 flex justify-end">
                        <button class="btn btn-secondary" x-on:click="open = false; $wire.resetForm()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endteleport
</div>
