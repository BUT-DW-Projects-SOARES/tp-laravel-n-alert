<?php

namespace App\Models;

use App\Enums\Enums\UserRole;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'published_at',
        'description',
        'category_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    #[Scope]
    protected function userFiltered(Builder $query, ?User $user = null)
    {
        $user ??= Auth::user();
        return $query->when(
            $user?->role === UserRole::Customer,
            fn(Builder $query) => $query
                ->whereHas(
                    'tags',
                    fn($query) => $query->whereIn('id', $user->customer->tags->pluck('id'))
                )
        );
    }
}
