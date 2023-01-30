<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DnToyotaRegulerController extends Controller
{
    public function index()
    {
        return view('pokayoke.TOYOTA.checkdn-reguler.index');
    }
}
