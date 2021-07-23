<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('upload-file');
    }

    public function upload()
    {
        if (request()->has('mycsv')) {
            //$data = array_map('str_getcsv', file(request()->mycsv));
            $data = file(request()->mycsv);
            $header = $data[0];
            unset($data[0]);

            // Chunking file
            $chunks = array_chunk($data, 1000);

            // ocnvert 1000 records into  new csv file
            foreach ($chunks as $key => $chunk) {
                $name = "/tmp ($key).csv";
                $path = resource_path('temp');

                file_put_contents($path . $name, $chunk);
            }


            
            /* foreach($data as $value){
                $saleDate = array_combine($header,$value);
                Sales::create($saleDate);
            } */

            return 'Done';
        }
        return "please upload file";
    }

    
}
