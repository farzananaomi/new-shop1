<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Invoice
 *
 * @property int $id
 * @property int $product_id
 * @property string $invoice_no
 * @property string $customer_name
 * @property string $customer_address
 * @property string $customer_contact
 * @property string $invoice_date
 * @property string $status
 * @property string $quantity
 * @property string $unit_price
 * @property string $net_price
 * @property string $vat
 * @property string $discount
 * @property string $total
 * @property string $sub_total
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Data\Models\Item[] $items
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereCustomerAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereCustomerContact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereCustomerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereInvoiceNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereNetPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereSubTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereUnitPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereVat($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    public function items()
    {
        return $this->hasMany(Item::class, 'invoice_id', 'id')->orderBy('created_at', 'asc');
    }
}
