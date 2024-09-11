<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Dropdowncontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    function region(){
       /* $areas = DB::table('area')->get();
        $blogs = DB::table("data_csv")->get();
        return view('are', compact('areas','blogs'));

        */
        $data = DB::table("data_csv as a")
                ->join("area as b","a.Region_id", "=","b.Region_id")
                ->get();
       

        // ดึงแถวที่มีค่า null หรือค่าว่าง ในคอลัมน์ 'GTNJobNo'
        $rowsWithoutData = DB::table('data_csv')
            ->whereNull('GTNJobNo') // ค่าที่เป็น null
            ->orWhere('GTNJobNo', '') // ค่าที่เป็นค่าว่าง
            ->get(); // ดึงแถวที่ตรงกับเงื่อนไข

        $gtn = DB::table("data_csv")->pluck("GTNJobNo");

        // นับจำนวนรายการใน  'gtn' _null
        $gtnCount_null = count($rowsWithoutData);

        // นับจำนวนรายการใน 'gtn' ทั้งหมด
        $gtnCount_total = count($gtn);

        $sum = $gtnCount_total-$gtnCount_null;

         return view('are', compact('data','rowsWithoutData','gtnCount_null','gtnCount_total','sum','gtn'));
    }

}
    
    
