<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCheckout extends Model
{
    use HasFactory;

    protected $table = 'cart_checkout';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'cc_number' => 'encrypted',
        'cc_cvv' => 'encrypted',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
