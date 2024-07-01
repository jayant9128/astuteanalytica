<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\AllReport;
use DB;

class AllReportExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    
    
    public function collection()
    {
        return DB::table('temp_all_report')->get();
    }
    
    public function headings(): array
    {
        return [
            'Sr.no',
            'Report Id',
            'Report Code',
            'Report Title',
            'RD Url',
            'TOC Url',
            'Sample Url',
            ];
    }
    
    /*protected $publisherCode, $categoryCode;*/
    
 /*function __construct($publisherCode, $categoryCode) {
        $this->publisherCode = $publisherCode;
        $this->categoryCode = $categoryCode;
 }*/

    
    /*public function collection()
    {
        if($this->publisherCode != "all" && $this->categoryCode != "all")
        {
            return AllReport::where('publisher_code', $this->publisherCode)->where('category_id', $this->categoryCode)->get();
        }
        elseif($this->publisherCode != "all")
        {
            return AllReport::where('publisher_code', $this->publisherCode)->get();
        }
        elseif($this->categoryCode != "all")
        {
            return AllReport::where('category_id', $this->categoryCode)->get();
        }
        else
        {
           return AllReport::all(); 
        }
        
    }*/
    
   /* public function headings(): array
    {
        return [
            'Sr.no',
            'report_id',
            'report_code',
            'category_id',
            'report_title',
            'report_description',
            'table_content',
            'list_of_tables',
            'list_of_figures',
            'pages',
            'publish_date',
            'format',
            'geography',
            'key_words',
            'single_user',
            'multi_user',
            'corporate_user',
            'publisher',
            'publisher_code', 
            'treading',
            'Token',
            'Updated Time',
            'Created Time',
            ];
    }*/
}
