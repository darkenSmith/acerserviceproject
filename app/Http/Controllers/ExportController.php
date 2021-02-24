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

     $results = DB::select('select * from  [dbo].[ACERimports](?)', array($batchid));

     $now = strtotime(now());
     $nowdate = date("Y-m-d",$now);

     $filename = 'ACER_Retail-'.$nowdate.'-'.$batchid;
    
  
     $this->createsheet($results, $filename);

     foreach($results as $item){
    

        $casenumber = $item->CaseNumber;
        $MONITORCODE = $item->MONITORCODE;
        $box = $item->BOX;
        $scanned = $item->SCANNED;
        $model = $item->MODEL;
        $missing = $item->MISSING;
        $bookcom = $item->BOOKINGCOMMENT;
        $partnum = $item->PARTNUM;
        $custref = $item->CustomerRef;
        $serialnum = $item->SerialNumber;
     }
    }




    public function createsheet($data, $file){

            // (B) CREATE A NEW SPREADSHEET
    $spreadsheet = new Spreadsheet();

    // (C) GET WORKSHEET
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'CaseNumber');
    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->setCellValue('B1', 'Partnum');
    $sheet->setCellValue('C1', 'Original Box');
    $sheet->setCellValue('D1', 'Monitor Updated Code');
    $sheet->setCellValue('E1', 'Model Number');
    $sheet->setCellValue('F1', 'Date Scanned');
    $sheet->setCellValue('G1', 'Booking in Comments');
    $sheet->setCellValue('H1', 'Original Box');
    $sheet->setCellValue('I1', 'Retailer Return Reference');
    $sheet->setCellValue('J1', 'SerialNumber');
    $sheet->setTitle('Arr');

   

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