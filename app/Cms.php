<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = 'cms';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    protected $hidden = [
        '_token',
    ];
}
