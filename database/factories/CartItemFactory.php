<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cart_id' => Cart::factory(),
            'sku' => fake()->ean8(),
            'name' => fake()->words(3, true),
            'quantity' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(10, 999),
        ];
    }
}
