<?php

namespace App\Http\Controllers\Api;

use App\Domain\CheckoutDomain;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCheckoutRequest;
use App\OpenApi\RequestBodies\StoreCheckoutRequestBody;
use App\OpenApi\Responses\StoreCheckoutResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class CheckoutController extends Controller
{
    public function __construct(protected CheckoutDomain $domain)
    {
    }

    /**
     * Do the checkout of a cart.
     *
     * @param \App\Http\Requests\Api\StoreCheckoutRequest $request
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    #[OpenApi\RequestBody(factory: StoreCheckoutRequestBody::class)]
    #[OpenApi\Response(factory: StoreCheckoutResponse::class, statusCode: 201)]
    public function store(StoreCheckoutRequest $request)
    {
        $data = $request->validated();

        $cart = $this->domain->save($data);

        return response()->json([], 201);
    }
}
