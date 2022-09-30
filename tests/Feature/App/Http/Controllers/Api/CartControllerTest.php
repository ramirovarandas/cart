<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CartControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function test_add_item_to_cart_with_all_required_information()
    {
        $externalId = $this->faker()->uuid();

        $data = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'quantity' => 1,
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
                $json
                    ->has('data')
                    ->has('data.total')
                    ->has('data.items', 1)
                    ->where('data.total', 899)
            );
    }

    public function test_add_item_to_cart_with_missing_information()
    {
        $externalId = $this->faker()->uuid();

        $data = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $response
            ->assertStatus(422)
            ->assertJson(fn(AssertableJson $json) =>
                $json
                    ->has('message')
                    ->has('errors.quantity', 1)
                    ->where('message', 'The quantity field is required.')
            );
    }


    public function test_adding_multiple_items_to_cart()
    {
        $externalId = $this->faker()->uuid();

        $data = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'quantity' => 1,
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $data = [
            'external_id' => $externalId,
            'sku' => 200,
            'name' => 'Macbook Air 2022',
            'quantity' => 1,
            'price' => 999.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
            $json
                ->has('data')
                ->has('data.total')
                ->has('data.items', 2)
                ->where('data.total', 1898)
            );
    }

    public function test_updating_item_in_cart_increasing_the_quantity()
    {
        $externalId = $this->faker()->uuid();

        $data = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'quantity' => 1,
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $data['quantity'] = 10;

        $response = $this->postJson('/api/cart', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
            $json
                ->has('data')
                ->has('data.total')
                ->has('data.items', 1)
                ->where('data.total', 8990)
            );
    }

    public function test_updating_item_in_cart_with_the_same_quantity()
    {
        $externalId = $this->faker()->uuid();

        $data = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'quantity' => 1,
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $data['quantity'] = 1;

        $response = $this->postJson('/api/cart', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
            $json
                ->has('data')
                ->has('data.total')
                ->has('data.items', 1)
                ->where('data.total', 899)
            );
    }

    public function test_removing_item_from_cart()
    {
        $externalId = $this->faker()->uuid();

        $data = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'quantity' => 1,
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $data);

        $data['quantity'] = 0;

        $response = $this->postJson('/api/cart', $data);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
            $json
                ->has('data')
                ->has('data.total')
                ->has('data.items', 0)
                ->where('data.total', 0)
            );
    }
}
