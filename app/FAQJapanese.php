<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQJapanese extends Model
{
    protected $primaryKey = 'faq_id';
    protected $table = 'japanese_faq';
    protected $fillable = [
        'title',
        'decription',
        'report_id',
        ];
    protected $hidden = [
        '_token',
    ];
}
