<?php

namespace App\OpenApi\Schemas;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class CartCheckoutSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('CartCheckout')
            ->properties(
                Schema::string('external_id')->example('3fa85f64-5717-4562-b3fc-2c963f66afa6')->format(Schema::FORMAT_UUID)->default(null),
                Schema::string('first_name')->example('Jane')->default(null),
                Schema::string('last_name')->example('Doe')->default(null),
                Schema::string('email')->example('jane.doe@example.com')->default(null),
                Schema::string('address')->example('1234 Main St, 7B - New York - NY - 10018')->default(null),
                Schema::string('cc_number')->example('4007000000027')->default(null),
                Schema::string('cc_expiracy')->example('12/29')->default(null),
                Schema::string('cc_cvv')->example('123')->default(null),
                Schema::string('cc_name')->example('Jane Doe')->default(null)
            );
    }
}
