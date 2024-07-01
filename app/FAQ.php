<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $primaryKey = 'faq_id';
    protected $table = 'faq';
    protected $fillable = [
        'title',
        'decription',
        'report_id',
        ];
    protected $hidden = [
        '_token',
    ];
}
