<?php

namespace App\Http\Controllers\Api;

use App\Domain\CartDomain;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCartRequest;
use App\Http\Resources\Api\CartResource;
use App\OpenApi\RequestBodies\StoreCartRequestBody;
use App\OpenApi\Responses\StoreCartResponse;
use Illuminate\Support\Facades\App;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class CartController extends Controller
{
    public function __construct(protected CartDomain $domain)
    {
    }

    /**
     * Insert, update or delete an item in a cart.
     *
     * Returns the current cart information.
     *
     * @param \App\Http\Requests\Api\StoreCartRequest $request
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    #[OpenApi\RequestBody(factory: StoreCartRequestBody::class)]
    #[OpenApi\Response(factory: StoreCartResponse::class, statusCode: 200)]
    public function store(StoreCartRequest $request)
    {
        $data = $request->validated();

        $cart = $this->domain->save($data);

        return App::make(CartResource::class, ['resource' => $cart]);
    }

}
