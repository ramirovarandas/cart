<?php

namespace App\Domain;

use App\Mail\CheckoutOrderMail;
use App\Models\Cart;
use App\Models\CartCheckout;
use App\Models\CartItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class CheckoutDomain
{
    public function save(array $data): Cart
    {
        $externalId = Arr::pull($data, 'external_id');

        $cart = $this->findByExternalId($externalId);

        if ($cart->checkout === null) {
            $this->create($cart, $data);
        }

        return $this->findByExternalId($externalId);
    }

    protected function findByExternalId($externalId): Cart|null
    {
        return App::make(Cart::class)::with('checkout')->byExternalId($externalId)->first();
    }

    protected function create(Cart $cart, array $data): void
    {
        $item = App::make(CartCheckout::class, ['attributes' => $data]);
        $cart->checkout()->save($item);

        Mail::to($data['email'])->queue(App::make(CheckoutOrderMail::class));
    }
}
