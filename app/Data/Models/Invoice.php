<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Invoice
 *
 * @property int $id
 * @property int $customer_id
 * @property string $invoice_no
 * @property string $invoice_date
 * @property string $product_name
 * @property float $quantity
 * @property float $unit_price
 * @property float $net_price
 * @property string $vat
 * @property string $discount
 * @property string $sub_total
 * @property string $status
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereInvoiceNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereNetPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Invoice whereSubTotal($value)
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
}
