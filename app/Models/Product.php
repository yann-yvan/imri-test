<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @property int                    $id
 * @property string                 $name
 * @property int                    $quantity
 * @property Carbon|null            $created_at
 * @property Carbon|null            $updated_at
 * @property string|null            $deleted_at
 *
 * @property Collection|Component[] $components
 *
 * @package App\Models
 */
class Product extends BaseModel
{
    use SoftDeletes;

    protected $table = 'products';

    protected $with = ["components"];

    protected $appends = ["is_manufacturable"];

    protected $casts = [
        'quantity' => 'int'
    ];

    protected $fillable = [
        'name',
        'quantity'
    ];

    public static function hasAsComponent($componentId, $productId): bool
    {
        if (empty($product = Product::find($productId)) or empty($component = Product::find($componentId))) {
            return false;
        }

        return Product::where("id", $componentId)->whereHas('components', function ($q) use ($productId) {
                $q->where("component_id", $productId);
            })->count() > 0;
    }

    public function components()
    {
        return $this->hasMany(Component::class);
    }

    public function getIsManufacturableAttribute()
    {
        return Product::where("id", $this->id)->whereHas('components', function ($q) {
                $q->whereHas('component', function ($q) {
                    $q->where("quantity", '>', 0);
                });
            })->count() == $this->components->count();
    }
}
