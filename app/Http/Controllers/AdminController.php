<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function Admin(){
        $totalUsers = User::count();
        return view('/admin', compact('totalUsers')); 
    }

    function Petugas(){
        return view('/petugas');
    }
};
