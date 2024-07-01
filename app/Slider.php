<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $primaryKey = 'slider_id';
    protected $table = 'slider1';
    protected $fillable = [
        'image',
        'title',
        'heading',
        'slug_title',
        'slug'
            ];
    protected $hidden = [
        '_token',
    ];
}
