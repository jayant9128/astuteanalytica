<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $primaryKey = 'publisher_id';
    protected $table = 'publisher';
    protected $fillable = [
        'date',
        'name',
        'email',
        'phone',
        'message',
        'job',
        'country',
        'company',
        'company_image'
            ];
    protected $hidden = [
        '_token',
    ];
}
