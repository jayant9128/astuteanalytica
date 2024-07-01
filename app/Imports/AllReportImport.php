<?php

namespace App\Imports;

use App\AllReport;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AllReportImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
   public function model(array $row)
    {
        return new AllReport([
            'report_id' => $row['report_id'],
            'report_code' => $row['report_code'],
            'category_id' => $row['category_id'],
            'report_title' => $row['report_title'],
            'report_description' => $row['report_description'],
            'table_content' => $row['table_content'],
            'list_of_tables' => $row['list_of_tables'],
            'list_of_figure' => $row['list_of_figure'],
            'pages' => $row['pages'],
            'publish_date' => $row['publish_date'],
            'format' => $row['format'],
            'geography' => $row['geography'],
            'key_words' => $row['key_words'],
            'single_user' => $row['single_user'],
            'multi_user' => $row['multi_user'],
            'corporate_user' => $row['corporate_user'],
            'publisher_code' => $row['publisher_code'],
            'treading' => $row['treading'],
        ]);
    }
}
