<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarrerJobRequest extends Model
{
    protected $primaryKey = 'carrer_job_request_id';
    protected $table = 'carrer_job_request';
    protected $fillable = [
        'career_id',
        'name',
        'phone',
        'email',
        'message',
        'date',
        'image'
            ];
    protected $hidden = [
        '_token',
    ];
}
