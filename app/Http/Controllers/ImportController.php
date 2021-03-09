<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\DB;
use SimpleXLSX;
use Illuminate\Support\Str;
use Mockery\Expectation;

class ImportController extends Controller
{
    //
    public function upload(Request $request)
    {
      $user = getenv("username");
      $user = str_replace("."," ",$user);

      if($user == 'alex smith'){

        $user = 'Alex';

      }
      
      $validatedData = $request->validate([
        'file' => 'required|max:10000|mimes:xlx,xls,xlsx',

       ]);
      


       $name = $request->file('file')->getClientOriginalName();
       $path = $request->file('file')->store('public/files');


  try{
    

       if ( $xlsx = SimpleXLSX::parse($request->file('file')) ) {
      
          // Produce array keys from the array values of 1st array element
          $header_values = $rows = [];
          $i = 0;
          foreach ( $xlsx->rows() as $k => $r ) {
          
            if ( $k === 0 ) {
              $header_values = $r;
              continue;
            }
            $rows[] = array_combine( $header_values, $r );
          }
          foreach($rows as $cell){

            $maxcase = DB::table('CASE')->max('CaseId')+1;

           //print_r($cell);
          //  $statement = DB::select("select caseid as caseid from [case]");
        
          //  $nextId = $statement[0]->caseid;
           $nextId = $maxcase;

           if(!isset($cell['Retailer Return Reference'])){
            return redirect('import')->with('err', 'Wrong template Uploaded');
           }else{

            $refnum = $cell['Retailer Return Reference'];
            $serial = $cell['Serial Number']; 
            $slp = $cell['SLP number '];
            $acerpart = $cell['Acer Part Code'];
            $model = $cell['Model Number '];
            $montiorcode = $cell['Monitor Updated Code'];
            $missing = $cell['Accessories Missing '];
            $ogbox = $cell['Original Box'];
            $ogboxtxt = $cell['Original Box'];
            $bookincomment = $cell['Booking in Comments'];
            $discrepancy  = $cell['Discrepancy'];
            $Datescanned = $cell['Date Scanned'];

            if($ogbox == 'yes'){
              $ogbox = 1;
            }else{
              $ogbox = 0;
            }

            if(!empty($serial)){


            
            $guid_1 = Str::uuid();
            $guid_2 = Str::uuid();

            $time = strtotime($Datescanned);
            
            $scandate = date("Y-m-d",$time);

            $now = strtotime(now());
            $nowdate = date("Y-m-d",$now);

            DB::table('CASE')->insert([
              'iDataRowId' => $guid_1,
              'iDataRowId2' =>$guid_2, 
              'casenumber' => $nextId,
              'SerialNumber' => $serial,
              'CreatedDate' => $nowdate,
              'ProductType' => 'Notebook',
              'CallerName' => 'DIXONS STORE GROUP - UNITED KINGDOM', 
              'ContactName' => 'Acer Retail',
              'CaseStatus' => 'Awaiting Inspection',
              'CaseDescription' => 'ACER TEST CASE :',
              'CaseType' => 'Repair Centre', 
              'OrderId'=> 'Repair_ACERRETAI', 
                'OrdrLine' => 1, 
                'SecondFault' => 'General Query', 
                'CustomerRef' => $refnum.'/'.$slp, 
                'AccountCode' => 'ACERRETAIL',
                 'Deadline' => $scandate , 
                 'CreatedBy' => 'Acer.Retail', 
                 'FirstLevelFault' => 'Assistance',
                  'flag' => 'Query',
                  'Chargeable' => 0, 
                  'LastAddress1' => '282 Bath Road',
                  'LastAddress2' => 'Heathrow Boulevard 111',
                   'LastAddress3' => 'West Drayton',
                  'LastCity' => 'MIDDLESEX',
                  'LastPostCode' => 'UB7 0DQ',
                   'PartCode' => '_REP_CENTRE_CHARGE',
                    'Brand' => 'Acer',
                    'CollectionDate' => $scandate, 
                    'BER' => 0, 
                    'CaseSkill' => 'Acer.Retail', 
                    'SLARemains' => '5BD', 
                    'BoxQuantity' => $ogbox, 
                    'ServiceCode' => 42, 
                    'RCName' => 'Stone Group', 
                    'RCAddress1' => 'Granite One Hundred',
                    'RCAddress2' => 'Acton Gate', 
                    'RCAddress3' => 'Stafford', 
                    'RCAddress4' => 'Staffordshire', 
                    'RCPostcode' => 'ST18 9AA', 
                    'RCCollectionMethod' => 'DPD',  
                    'LastAddrLocation' => '282 Bath Road',
          ]);
          
          // $id = DB::getPdo()->lastInsertId();
          // dd($id);


          $guid_3 = Str::uuid();
          $guid_4 = Str::uuid();

          DB::table('CaseHistory')->insert([
            'iDataRowId' => $guid_3,
            'iDataRowId2' =>$guid_4, 
             'CaseNumber' => $nextId, 
             'Summary' => 'New Case created with Status Awaiting Return and assigned to the skill Acer.Retail, Deadline ',
             'Action' => 'New Case',
              'ActionBy' =>'Acer.Retail', 
              'ActionDate' => $nowdate 
         
        ]);


          DB::table('CaseNotes')->insert([
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'DATE SCANNED : '.$scandate, 'CreatedDate' => $nowdate, 'Visibility' => 'Stone Only'],
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'MODEL NUMBER : '.$model, 'CreatedDate' =>  $nowdate , 'Visibility' => 'Stone Only'],
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'BOOKING IN NOTES : '.$bookincomment,  'CreatedDate'  => $nowdate , 'Visibility' => 'Stone Only'],
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'ORIGINAL BOX : '.$ogboxtxt, 'CreatedDate' =>  $nowdate , 'Visibility' => 'Stone Only'],
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'PART NUMBER : '.$acerpart, 'CreatedDate' =>  $nowdate , 'Visibility' => 'Stone Only'],
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'MONITOR CODE : '.$montiorcode, 'CreatedDate' =>  $nowdate , 'Visibility' => 'Stone Only'],
            ['iDataRowId' => Str::uuid(), 'iDataRowId2' => Str::uuid(), 'casenumber' => $nextId, 'Notes' => 'MISSING AC : '.$missing, 'CreatedDate' =>  $nowdate , 'Visibility' => 'Stone Only'],
        ]);

          // $nextId++;
              }
          
            }
          }

/////
        }

      }catch(Expectation $e){

        $messge = $e->getExceptionMessage();
        return redirect('import')->with('status',  $messge);

      }
      return redirect('import')->with('status', 'File Has been uploaded successfully');
    }

}
