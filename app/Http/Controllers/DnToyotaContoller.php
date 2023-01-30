<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DnToyotaContoller extends Controller
{
    public function index()
    {
        return view('pokayoke.TOYOTA.check-dn.index');
    }

    public function getcek_dn(Request $request)
    {
        // dd($request);
        // $dn_no = $request->dn_no;
        // $part_no = DB::table('db_tbs.gohin_toyota as a')
        //     ->leftjoin('ekanban.ekanban_admout_tbl as b', 'a.dn_no', 'b.dn_no')
        //     ->select('a.dn_no', 'b.part_no', 'a.quantity', DB::raw('ifnull(sum(b.ekanban_qty), 0) as qty'), DB::raw('GROUP_CONCAT(DISTINCT b.ekanban_qty) as qty'))
        //     ->where('b.customer', 'T06')
        //     ->where('a.dn_no', $dn_no)
        //     ->groupBy('a.dn_no', 'b.part_no')
        //     ->get();
        $dn_no = $request->dn_no;
        $part_no = DB::table('db_tbs.gohin_toyota as a')
            // ->select('a.dn_no', 'b.part_no', 'a.quantity', DB::raw('GROUP_CONCAT(DISTINCT b.ekanban_qty) as qty'))
            // ->leftjoin(DB::raw('ekanban.ekanban_admout_tbl as b', DB::raw('ifnull(SUM(b.ekanban_qty), 0) as qty'), GROUP BY `part_no`,`dn_no`), function ($join) {
            //     $join->on('a.part_no', '=', 'b.part_no')
            //         ->on('a.dn_no', '=', 'b.dn_no');
            // })
            ->select('a.dn_no', 'a.part_no', 'a.quantity')
            ->select('a.dn_no', 'a.part_no', 'a.quantity', DB::raw('IFNULL(SUM(b.ekanban_qty), 0) as qty'))
            ->leftjoin('ekanban.ekanban_admout_tbl as b', function ($join) {
                $join->on('a.part_no', '=', 'b.part_no')
                    ->on('a.dn_no', '=', 'b.dn_no');
            })
            // ->where('b.customer', 'A01')
            ->where('a.dn_no', $dn_no)
            ->groupBy('a.dn_no', 'a.part_no')
            ->get();
        // dd($part_no);
        $data  = [
            empty($part_no) ? '-' : $part_no,

        ];

        // dd($data);
        return response()->json($data);
    }
}
