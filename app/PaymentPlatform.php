<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlatform extends Model
{
    protected $name;
    protected $image;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image',
    ];

}
