<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
USE Illuminate\Support\Facades\DB;


class import extends Model
{
    use HasFactory;

    protected $feilds;

    public static function addtompl(){
        
       $stock =  DB::table('stock')->get();

       print_r($stock);


        
        
    }
}
