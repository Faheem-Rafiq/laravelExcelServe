<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Csv\Writer;
use League\Csv\CannotInsertRecord;

class DownloadCsvController extends Controller
{
    public function downloadCsv(Request $request, $table)
    {
        // Get data from database
        $data = DB::table($table)->get()->toArray();

        // Set headers for CSV file
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename="'.$table.'.csv"'];

        // Create CSV file
        $csv = Writer::createFromString('');

        // Insert data to CSV file
        try {
            $csv->insertOne(array_keys((array) $data[0]));
            foreach ($data as $row) {
                $csv->insertOne((array) $row);
            }
        } catch (CannotInsertRecord $e) {
            report($e);
        }

        // Return CSV file as response
        return response()->streamDownload(function () use ($csv) {
            echo $csv->getContent();
        }, $table.'.csv', $headers);
    }
}
