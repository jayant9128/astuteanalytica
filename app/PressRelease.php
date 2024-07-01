<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
     protected $primaryKey = 'press_release_id';
    protected $table = 'press_release1';
    protected $fillable = [
        'category_id',
        'press_relase_heading',
        'press_relase_keyword',
        'press_relase_image',
        'press_relase_discription',
        'dake_customer'
            ];
    protected $hidden = [
        '_token',
    ];
}
