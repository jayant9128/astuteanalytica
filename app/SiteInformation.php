<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{
    protected $primaryKey = 'site_id';
    protected $table = 'site';
    protected $fillable = [
        'address',
        'email',
        'contact'
            ];
    protected $hidden = [
        '_token',
    ];
}
