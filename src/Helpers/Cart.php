<?php

namespace Jonassiewertsen\StatamicButik\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Jonassiewertsen\StatamicButik\Checkout\Item;
use Jonassiewertsen\StatamicButik\Http\Models\Product;

class Cart {
    public static $cart;

    /**
     * A product can be added to the cart
     */
    public static function add(Product $product): void
    {
        static::$cart = static::get();

        if (self::contains($product)) {
            // increase the quanitity
            static::$cart->firstWhere('id', $product->slug)->increase();
        } else {
            // Add new Item
            static::$cart->push(new Item($product));
        }

        static::set(static::$cart);
    }

    /**
     * An item can be reduced or removed from the cart
     */
    public static function reduce(Product $product): void
    {
        static::$cart = static::get();

        static::$cart = static::$cart->filter(function($item) use ($product) {
            // If the quanitity is higher then one, it will only decrease
            if ($item->id === $product->slug && $item->quantity > 1) {
               $item->decrease();
               return true;
            }

            return false;
        });

        static::set(static::$cart);
    }

    /**
     * An item can be completly removed from the cart
     */
    public static function remove(Product $product): void
    {
        static::$cart = static::get();

        static::$cart = static::$cart->filter(function($item) use ($product) {
            return $item->id !== $product->slug;
        });

        static::set(static::$cart);
    }

    /**
     * Clear the complete cart
     */
    public static function clear(): void {
        static::set(static::empty());
    }

    /**
     * Fetch the cart from the session
     */
    public static function get(): Collection
    {
        return Session::get('butik.cart') !== null ?
            Session::get('butik.cart') :
            static::empty();
    }

    /**
     * Set the cart to the session
     */
    private static function set(Collection $cart): void
    {
        Session::put('butik.cart', $cart);
    }

    /**
     * Is this product already saved in the cart?
     *
     * @param Product $product
     * @return bool
     */
    private static function contains(Product $product): bool
    {
        return static::$cart->contains('id', $product->slug);
    }

    /**
     * An empty cart
     *
     * @return Collection
     */
    private static function empty() {
        return collect();
    }
}
