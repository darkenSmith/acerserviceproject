<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Dash;

Class DashboardContoller extends Controller{
    
    public function index(){

        $res = new Dash();
        $data = $res->showdata();
       return view('dashboard', ['data'=>$data]);
    }

}

?>