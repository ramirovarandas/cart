<?php

namespace Tests\Unit\App\Models;

use App\Models\Cart;
use App\Models\CartItem;
use Tests\TestCase;

class CartItemTest extends TestCase
{

    public function test_cart_item_relations()
    {
        $item = CartItem::factory()->create();

        $this->assertInstanceOf(Cart::class, $item->cart);
    }
}
