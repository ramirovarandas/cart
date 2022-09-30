<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartCheckout>
 */
class CartCheckoutFactory extends Factory
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
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'address' => fake()->address(),
            'cc_name' => fake()->name(),
            'cc_number' => fake()->creditCardNumber(),
            'cc_expiracy' => fake()->creditCardExpirationDateString(),
            'cc_cvv' => '123',
        ];
    }
}
