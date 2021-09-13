<?php

namespace app\Helpers\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Cart
 * @package app\Helpers\Cart
 * @method static bool has(string $id)
 * @method static Collection all()
 * @method static Cart put(array $value,Model $obj)
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'cart';
    }
}
