<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AstuteInside extends Model
{
    protected $primaryKey = 'astute_inside_id';
    protected $table = 'astute_inside';
    protected $fillable = [
        'astute_inside_heading',
        'astute_inside_keyword',
        'astute_inside_image',
        'author_image',
        'astute_inside_discription',
        'dake_customer'
            ];
    protected $hidden = [
        '_token',
    ];
}
