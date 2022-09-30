<?php

namespace App\Domain;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;


class CartDomain
{

    public function save(array $data): Cart
    {
        $externalId = Arr::pull($data, 'external_id');

        $cart = $this->findByExternalId($externalId);

        $cart ? $this->update($cart, $data) : $this->create($externalId, $data);

        return $this->findByExternalId($externalId);
    }

    protected function findByExternalId($externalId): Cart|null
    {
        return App::make(Cart::class)::with('items')->byExternalId($externalId)->first();
    }

    protected function update(Cart $cart, array $data): void
    {
        $item = $cart->items()->where('sku', $data['sku'])->first();

        if($item) {
            $data['quantity'] < 1 ? $item->delete() : $item->update($data);
            return;
        }

        $item = App::make(CartItem::class, ['attributes' => $data]);
        $cart->items()->save($item);
    }

    protected function create($externalId, array $data): void
    {
        $cart = App::make(Cart::class)::create(['external_id' => $externalId]);

        $item = App::make(CartItem::class, ['attributes' => $data]);
        $cart->items()->save($item);
    }

}
