<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $primaryKey = 'career_id';
    protected $table = 'career';
    protected $fillable = [
        'designtation',
        'description',
        'date',
        'job_title'
            ];
    protected $hidden = [
        '_token',
    ];
}
