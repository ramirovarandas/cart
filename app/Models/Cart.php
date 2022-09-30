<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'total' => 'float',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function checkout()
    {
        return $this->hasOne(CartCheckout::class);
    }

    public function scopeByExternalId($query, $externalId)
    {
        return $query->where('external_id', $externalId);
    }

    public function total()
    {
        return $this->items->reduce(fn($carry, $item) => $carry + ($item['quantity'] * $item['price']), 0.0);
    }
}
