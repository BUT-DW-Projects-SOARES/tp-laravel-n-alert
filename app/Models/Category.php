<?php

namespace App\Models;

use App\Enums\Enums\UserRole;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'label',
    ];

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    #[Scope]
    protected function userFiltered(Builder $query, ?User $user = null)
    {
        $user ??= Auth::user();
        return $query->when(
            $user?->role === UserRole::Customer,
            fn(Builder $query) => $query
                ->whereHas(
                    'alerts',
                    fn(Builder $query) => $query->userFiltered($user)
                )
        );
    }
}
