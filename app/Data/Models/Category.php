<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Data\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property int $parent_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Data\Models\Category[] $subCategories
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('type', '=', 'sub-category');
    }
}
