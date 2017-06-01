<?php

namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Data\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $role
 * @property string $username
 * @property string $contact
 * @property string $additional_no
 * @property string $address
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereAdditionalNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereContact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
