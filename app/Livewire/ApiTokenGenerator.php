<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class ApiTokenGenerator extends Component
{

    public ?string $token = null;

    public function render()
    {
        return view('livewire.api-token-generator');
    }

    public function generate(Request $request){
        $token = $request->user()->createToken('');
        $this->token = $token->plainTextToken;
    }
}
