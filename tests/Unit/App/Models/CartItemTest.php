<?php

namespace Tests\Unit\App\Models;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartItemTest extends TestCase
{

    use RefreshDatabase;

    public function test_cart_item_relations()
    {
        $item = CartItem::factory()->create();

        $this->assertInstanceOf(Cart::class, $item->cart);
    }
}
