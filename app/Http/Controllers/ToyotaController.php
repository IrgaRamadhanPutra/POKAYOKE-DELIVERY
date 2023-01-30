<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ToyotaController extends Controller
{
    public function index()
    {
        return view('pokayoke.TOYOTA.SCAN.index');
    }
    public  function validasitoyota(Request $request)
    {
        // dd($request);
        $part_no = DB::connection('db_tbs')->table('gohin_toyota')
            ->where('dn_no', $request->input1)
            // ->where('job_no', $request->job_no)
            ->select('job_no', 'part_no')
            ->first();
        // dd($part_no);
        $data  = [
            empty($part_no) ? '-' : $part_no,

        ];

        // dd($data);
        return response()->json($data);
    }
    public static function getEkanbanAdmoutSp6(Request $request)
    {
        // dd($request);
        $input1 = $request->input1;
        $job_no = $request->job_no;
        $part_no =  $request->part_no;
        $input2 = $request->input2;
        $price = explode(",", $input2);
        $kanban_no = $price[0];
        $squence = $price[1];
        $itemcode = $price[3];
        $qty = $price[4];
        $T06 = $price[5];
        $user = '';
        $str_date = '';
        $kosong = '';
        $date =  Carbon::now()->format('d');
        $value = [
            $kanban_no, $input1, $squence, $user, $qty, $itemcode, $str_date, $date, $kosong, $part_no, $T06, $job_no

        ];
        // dd($value);
        $query = DB::connection('ekanban')
            ->select("call ekanban_admout_sp_6(?,?,?,?,?,?,?,?,?,?,?,?)", $value);
        // dd($query);
        $ambildata = $query[0]->retval;
        // dd($ambildata);
        return response()->json($ambildata);
    }
}
