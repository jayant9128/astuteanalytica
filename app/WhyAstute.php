<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhyAstute extends Model
{
    protected $primaryKey = 'why_astute_id';
    protected $table = 'why_astute';
    protected $fillable = [
        'icon',
        'number',
        'heading'
            ];
    protected $hidden = [
        '_token',
    ];
}
