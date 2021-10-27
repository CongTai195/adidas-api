<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Transaction extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'amount',
        'payment',
        'message',
        'security'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'transaction_id', 'id');
    }
}
