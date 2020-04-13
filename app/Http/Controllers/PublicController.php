<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Fakultas;
use App\Jurusan;
use App\Ruangan;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $c_fakultas = Fakultas::all()->count();
        $c_jurusan = Jurusan::all()->count();
        $c_ruangan = Ruangan::all()->count();
        $c_barang = Barang::all()->count();

        // dd($c_fakultas.' - Fakultas\n'.
        //     $c_jurusan.' - Jurusan\n'.
        //     $c_ruangan.' - Ruangan\n'.
        //     $c_barang.' - Barang\n');
        return view('welcome', compact('c_fakultas', 'c_jurusan', 'c_ruangan', 'c_barang'));
    }
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
}
