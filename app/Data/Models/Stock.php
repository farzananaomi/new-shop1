<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Stock
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $product_id
 * @property string $barcode_id
 * @property float $buying_price
 * @property float $sell_price
 * @property float $profit_percent
 * @property float $discount_percent
 * @property float $flat_discount
 * @property float $vat_rate
 * @property float $vat_total
 * @property float $sub_total
 * @property float $stock_in
 * @property float $stock_out
 * @property float $stock_balance
 * @property string $created_by
 * @property string $updated_by
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Data\Models\Category $category
 * @property-read \App\Data\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereBarcodeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereBuyingPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereDiscountPercent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereFlatDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereProfitPercent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereSellPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereStockBalance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereStockIn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereStockOut($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereSubTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereSupplierId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereVatRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Stock whereVatTotal($value)
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
