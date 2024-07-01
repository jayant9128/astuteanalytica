<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOC extends Model
{
    protected $primaryKey = 'toc_id';
    protected $table = 'table_of_content';
    protected $fillable = [
        'title',
        'amount',
        'decription',
        'decription',
        'report_id',
        ];
    protected $hidden = [
        '_token',
    ];
}
