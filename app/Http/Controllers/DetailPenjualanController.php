<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    function penjualan(){
        return view('/penjualan');
    }
}
