<?php

namespace Tests\Unit\App\Models;

use App\Models\Cart;
use App\Models\CartCheckout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CartCheckoutTest extends TestCase
{

    use RefreshDatabase;

    public function test_cart_checkout_relations()
    {
        $checkout = CartCheckout::factory()->create();

        $this->assertInstanceOf(Cart::class, $checkout->cart);
    }
}
