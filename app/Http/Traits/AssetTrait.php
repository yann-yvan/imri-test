<?php


namespace App\Http\Traits;


use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AssetTrait implements Castable
{
    public static function castUsing(array $arguments)
    {
        return new class implements CastsAttributes {

            public function get($model, string $key, $value, array $attributes)
            {
                return asset($attributes[$key]);
            }

            public function set($model, string $key, $value, array $attributes)
            {
                return $value;
            }
        };
    }
}
