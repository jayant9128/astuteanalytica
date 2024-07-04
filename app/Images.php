<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'images';
    protected $fillable = [
        'img'
        ];
}
