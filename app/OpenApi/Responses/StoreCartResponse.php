<?php

namespace App\OpenApi\Responses;

use App\OpenApi\Schemas\CartItemSchema;
use App\OpenApi\Schemas\CartItemSimpleSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class StoreCartResponse extends ResponseFactory
{
    public function build(): Response
    {
        $response = Schema::object()->properties(
            Schema::string('external_id')->format(Schema::FORMAT_UUID),
            Schema::number('total'),
            Schema::array('items')->items(CartItemSimpleSchema::ref())
        );

        return Response::ok()
            ->description('Successful response')
            ->content(
                MediaType::json()->schema($response)
            );
    }
}
