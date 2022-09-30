<?php

namespace App\OpenApi\RequestBodies;

use App\OpenApi\Schemas\CartItemSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class StoreCartRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('StoreCart')
            ->description('Cart item data')
            ->content(
                MediaType::json()->schema(CartItemSchema::ref())
            );
    }
}
