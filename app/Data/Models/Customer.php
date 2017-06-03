<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Customer
 *
 * @property int $id
 * @property string $customer_name
 * @property string $mobile_no
 * @property string $address
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereCustomerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereMobileNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';
    //
}
