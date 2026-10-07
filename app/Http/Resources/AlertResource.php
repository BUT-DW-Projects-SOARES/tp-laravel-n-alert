<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class AlertResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        'title',
        'published_at',
        'description',
    ];

    /**
     * The resource's relationships.
     */
    public $relationships = [
        'category',
    ];
}
