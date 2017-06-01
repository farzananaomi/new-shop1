<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Item
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $product_id
 * @property string $quantity
 * @property float $unit_price
 * @property string $vat
 * @property string $discount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereInvoiceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereUnitPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Item whereVat($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';
}
