<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpressPoint extends Model
{
    protected $primaryKey = 'express_point_id';
    protected $table = 'express_point';
    protected $fillable = [
        'icon',
        'title',
        'heading'
            ];
    protected $hidden = [
        '_token',
    ];
}
