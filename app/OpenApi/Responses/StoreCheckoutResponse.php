<?php

namespace App\OpenApi\Responses;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class StoreCheckoutResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::created()->description('Successful response');
    }
}
