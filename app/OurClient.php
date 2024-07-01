<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    protected $primaryKey = 'our_client_id';
    protected $table = 'our_client';
    protected $fillable = [
        'image',
        'company_name'
            ];
    protected $hidden = [
        '_token',
    ];
}
