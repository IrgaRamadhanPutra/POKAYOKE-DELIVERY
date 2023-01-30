<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToyotaRegulerController extends Controller
{
    public function index()
    {
        return view('pokayoke.TOYOTA.SCAN-REGULER.index');
    }
}
