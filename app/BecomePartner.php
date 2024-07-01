<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BecomePartner extends Model
{
    protected $primaryKey = 'become_partner_id';
    protected $table = 'become_partner';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'date',
        'image'
            ];
    protected $hidden = [
        '_token',
    ];
}
