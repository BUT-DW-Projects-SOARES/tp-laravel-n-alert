<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ApiTokenGenerator extends Component
{

    public ?string $token = null;

    #[Validate('required')]
    public ?string $token_name = null;

    #[Validate('nullable|array')]
    public ?array $token_abilities = [];

    public function render()
    {
        $abilities = [
            'alert.viewAny',
            'alert.view',
            'alert.create',
            'alert.update',
            'alert.delete',
            'contact.viewAny',
            'contact.viewOwned',
            'contact.view',
            'contact.create',
            'contact.update',
            'contact.delete',
        ];
        return view('livewire.api-token-generator', ['abilities' => $abilities]);
    }

    public function generate(Request $request)
    {
        $this->validate();
        $token = $request->user()->createToken($this->token_name, $this->token_abilities ?? []);
        $this->token = $token->plainTextToken;
    }

    public function resetForm()
    {
        $this->reset();
    }
}
