<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $primaryKey = 'service_id';
    protected $table = 'service1';
    protected $fillable = [
        'title',
        'image',
        'decription',
        ];
    protected $hidden = [
        '_token',
    ];
}
