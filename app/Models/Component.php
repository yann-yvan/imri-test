<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Component
 *
 * @property int         $id
 * @property int         $product_id
 * @property int         $component_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Product     $product
 *
 * @package App\Models
 */
class Component extends BaseModel
{
    use SoftDeletes;

    protected $table = 'components';
    protected $with = ["component"];

    protected $casts = [
        'product_id' => 'int',
        'component_id' => 'int'
    ];

    protected $fillable = [
        'product_id',
        'component_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function component()
    {
        return $this->belongsTo(Product::class);
    }
}
