<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class ContactResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        'lastname',
        'firstname',
        'email',
    ];

    /**
     * The resource's relationships.
     */
    public $relationships = [
        // ...
    ];
}
