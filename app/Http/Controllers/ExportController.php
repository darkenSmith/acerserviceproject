<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller{

    public function index()
    {
        return view('export');
    }

    public function download(Request $request){
   
     $batchid = $request->get("batch");
     $stat = $request->get("stat");

     $results = DB::select('select * from  [dbo].[ACERimports](?,?)', array($batchid,$stat));

     $now = strtotime(now());
     $nowdate = date("Y-m-d",$now);

     $filename = 'ACER_Retail-'.$nowdate.'-'.$batchid;
    
  
     $this->createsheet($results, $filename, $batchid);


    }

    public function downloadall(){
   
   
        $results = DB::select('select * from [ACER_ALL_imports]()');

        $now = strtotime(now());
        $nowdate = date("Y-m-d",$now);
   
        $filename = 'ACER_Retail-WIP-'.$nowdate;
        $this->createsheet($results, $filename, 'acer WIP');
       }




    public function createsheet($data, $file,$batch){

            // (B) CREATE A NEW SPREADSHEET
    $spreadsheet = new Spreadsheet();

    // (C) GET WORKSHEET
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'CaseNumber');
    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->setCellValue('B1', 'Partnum');
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->setCellValue('C1', 'Original Box');
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->setCellValue('D1', 'Model Number');
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->setCellValue('E1', 'Missing');
    $sheet->getColumnDimension('E')->setWidth(20);
    $sheet->setCellValue('F1', 'Discrpency');
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->setCellValue('G1', 'Scan date');
    $sheet->getColumnDimension('H')->setWidth(20);
    $sheet->setCellValue('H1', 'Damage');
    $sheet->getColumnDimension('H')->setWidth(20);
    $sheet->setCellValue('I1', 'Comments');
    $sheet->getColumnDimension('I')->setWidth(20);
    $sheet->setCellValue('J1', 'SLP/BATCH');
    $sheet->getColumnDimension('J')->setWidth(20);
    $sheet->setCellValue('K1', 'SERIAL NUMBER');
    $sheet->getColumnDimension('K')->setWidth(20);
    $sheet->setCellValue('L1', 'Case description');
    $sheet->getColumnDimension('L')->setWidth(20);
    $sheet->setCellValue('M1', 'STATUS');
    $sheet->getColumnDimension('M')->setWidth(20);
    $sheet->setCellValue('N1', 'Grade');
    $sheet->getColumnDimension('N')->setWidth(20);
    $sheet->setCellValue('O1', 'BER');
    $sheet->getColumnDimension('O')->setWidth(20);
    $sheet->setTitle($batch);

   

    // (D) DATA ARRAY TO WORKSHEET



    $cRow = 1; $cCol = 0;
    foreach ($data as $row) {
    $cRow ++; // NEXT ROW
    $cCol = 65; // RESET COLUMN "A"
    foreach ($row as $cell) {
        $sheet->setCellValue(chr($cCol) . $cRow, $cell);
        $cCol++;
      }
    }

    // (E) OUTPUT
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($file.'.xlsx').'"');
        $writer->save('php://output');
        $writer->save('files/'.$file.'.xlsx');

       // echo "OK!"; 
    }

        


}