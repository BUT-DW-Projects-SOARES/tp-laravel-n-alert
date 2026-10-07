<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class CategoryResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        'created_at',
        'updated_at',
        'label',
    ];

    /**
     * The resource's relationships.
     */
    public $relationships = [
        'alerts',
    ];
}
