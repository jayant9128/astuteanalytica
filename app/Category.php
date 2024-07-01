<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{   
    protected $primaryKey = 'category_id';
    protected $table = 'category';
    protected $fillable = [
        'image',
        'is_active',
        'title',
        'slug',
        'icon',
        'parent_id',
        'meta_title',
        'meta_keyword',
        'description',
        'is_show'
    ];
    protected $hidden = [
        '_token',
    ];
    
    public function childs() {
        return $this->hasMany('App\Category','parent_id','category_id') ;
    }
    
    
    public function reportCount() {
        return DB::table('all_reports')->where('category_id','category_id')->count();
    }
}
