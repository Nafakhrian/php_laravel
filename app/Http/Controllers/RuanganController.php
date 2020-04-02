<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(){
        return view('admin.ruangan.ruangan');
    }

    public function create(){
        return view('admin.ruangan.createRuangan');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_rua' => 'required'
        ]);

        Ruangan::create([
            'nama_rua' => $request->nama_rua
        ]);

        return redirect('/ruangan');
    }
}
