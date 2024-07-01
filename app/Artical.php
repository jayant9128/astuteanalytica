<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    protected $primaryKey = 'artical_id';
    protected $table = 'artical';
    protected $fillable = [
        'artical_heading',
        'artical_keyword',
        'artical_image',
        'artical_discription',
        'date'
            ];
    protected $hidden = [
        '_token',
    ];
}
