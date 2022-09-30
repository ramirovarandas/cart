<?php

namespace Tests\Feature\App\Http\Controllers\Api;

use App\Mail\CheckoutOrderMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_checkout_with_all_required_information()
    {
        Mail::fake();
        Queue::fake();

        $externalId = $this->faker()->uuid();

        $cartData = [
            'external_id' => $externalId,
            'sku' => 100,
            'name' => 'Macbook Pro 2019',
            'quantity' => 1,
            'price' => 899.0,
        ];

        $response = $this->postJson('/api/cart', $cartData);

        $checkoutData = [
            'external_id' => $externalId,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane.doe@example.com',
            'address' => '1234 Main St, 7B - New York - NY - 10018',
            'cc_name' => 'Jane Doe',
            'cc_number' => '4007000000027',
            'cc_expiracy' => '12/29',
            'cc_cvv' => '123',
        ];

        $response = $this->postJson('/api/checkout', $checkoutData);

        $response->assertCreated();

        Mail::assertQueued(CheckoutOrderMail::class);
    }
}
