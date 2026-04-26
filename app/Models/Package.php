<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;

    const ACTIVE = '1';

    const INACTIVE = '0';

    protected $fillable = ['service_id', 'name', 'price', 'price_vip', 'price_collaborator', 'min_quantity', 'max_quantity', 'note', 'status', 'provider', 'api_service_id'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', Package::ACTIVE);
    }

    protected function price(): Attribute
    {
        return Attribute::get(function ($value) {
            $user = auth()->user();
            if (! $user) {
                return $value;
            }

            return match ($user->level) {
                User::VIP => $this->price_vip,
                User::COLLABORATOR => $this->price_collaborator,
                default => $value,
            };
        });
    }
}
