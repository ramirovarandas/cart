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

class CartItemSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('CartItem')
            ->properties(
                Schema::string('external_id')->example('3fa85f64-5717-4562-b3fc-2c963f66afa6')->format(Schema::FORMAT_UUID)->default(null),
                Schema::string('sku')->example('100')->default(null),
                Schema::string('name')->example('Macbook Pro 2019')->default(null),
                Schema::integer('quantity')->example(1)->default(0),
                Schema::number('price')->example(899.0)->format(Schema::FORMAT_FLOAT)->default(0)
            );
    }
}
