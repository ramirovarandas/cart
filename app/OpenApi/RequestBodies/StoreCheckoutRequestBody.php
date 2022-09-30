<?php

namespace App\OpenApi\RequestBodies;

use App\OpenApi\Schemas\CartCheckoutSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class StoreCheckoutRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('StoreCheckout')
            ->description('Checkout item data')
            ->content(
                MediaType::json()->schema(CartCheckoutSchema::ref())
            );
    }
}
