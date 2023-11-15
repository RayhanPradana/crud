<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function home(){
        return view('home');
    }
    public function produk(){
        return view('produk');
    }
    public function transaksi(){
        return view('transaksi');
    }
    public function laporan(){
        return view('laporan');
    }
}
