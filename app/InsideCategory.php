<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsideCategory extends Model
{
    protected $primaryKey = 'inside_cate_id ';
    protected $table = 'inside_category';
    protected $fillable = [
        'title',

        ];
    protected $hidden = [
        '_token',
    ];
}
