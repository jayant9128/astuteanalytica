<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';
    protected $table = 'contact';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'date',
            ];
    protected $hidden = [
        '_token',
    ];
}
