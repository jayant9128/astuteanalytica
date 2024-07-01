<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testominal extends Model
{
    protected $primaryKey = 'testominal_id';
    protected $table = 'testominal';
    protected $fillable = [
        'image',
        'name',
        'designation',
        'star',
        'description'
            ];
    protected $hidden = [
        '_token',
    ];
}
