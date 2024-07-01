<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class AllReportJa extends Model
{
    protected $primaryKey = 'all_reports_id';
    protected $table = 'japanese_reports';
    protected $fillable = [
        'report_id',
        'category_id',
        'report_title',
        'report_slug',
        'base_year',
        'historic_year',
        'forecast_year',
        'table_figure',
        'total_table',
        'pages',
        'publish_date',
        'pdf',
        'excel',
        'ppt',
        'web_formate',
        'single_user',
        'corporate_user',
        'single_user_selling',
        'multi_user_selling',
        'corporate_user_selling',
        'multi_user',
        'image',
        'treading',
        'single_user',
        'top_selling',
        'is_sale',
        'report_description',
        'market_sagment',
        'methodology',
        'list_of_tables',
        'list_of_figure',
        'meta_title',
        'key_words',
        'meta_desc',
        'report_image',
        'is_import',
            ];
    protected $hidden = [
        '_token',
    ];
    public function category() {
        return $this->belongsTo('App\Model\Category','category_id','category_id') ;
    }
}
