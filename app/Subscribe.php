<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $primaryKey = 'subscribe_id';
    protected $table = 'subscribe';
    protected $fillable = [
        'email'
            ];
    protected $hidden = [
        '_token',
    ];
}
