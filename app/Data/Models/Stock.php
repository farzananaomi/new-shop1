<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Stock
 *
 * @property int $id
 * @property int $category_id
 * @property int $product_id
 * @property int $stock_in
 * @property int $sold
 * @property int $stock_out
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereSold($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereStockIn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereStockOut($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocks';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
