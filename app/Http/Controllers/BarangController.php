<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request){
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_bar', 'LIKE', '%'.$request->search.'%');
        })->paginate(5);
        return view('barang.barang', compact('dataBarang'));
    }

    public function create(){
        return view('barang.createBarang');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_bar' => 'required',
            'jumlah_bar' => 'required'
        ]);

        Barang::create([
            'nama_bar' => $request->nama_bar,
            'jumlah_bar' => $request->jumlah_bar
        ]);

        return redirect('/barang');
    }

    public function delete($id_bar){
        $delete = Barang::find($id_bar);
        $delete->delete();

        return redirect('/barang');
    }

    public function update($id_bar){
        $dataBarang = Barang::all()->where('id_bar', '=', $id_bar)
                                    ->first();
        return view('barang.updateBarang', compact('dataBarang'));
    }

    public function updateStore($id_bar, Request $request){
        $this->validate($request, [
            'nama_bar' => 'required',
            'jumlah_bar' => 'required'
        ]);

        $table = Barang::find($id_bar);
        $id_bar = $request['id_bar'];
        $update = Barang::where('id_bar', $id_bar)->first();
        $update->nama_bar = $request['nama_bar'];
        $update->jumlah_bar = $request['jumlah_bar'];
        $update->update();

        return redirect('/barang');
    }
}
