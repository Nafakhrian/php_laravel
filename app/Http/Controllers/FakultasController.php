<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    public function index(Request $request){
        $dataFakultas = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fak', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id_fak', 'asc')->paginate(5);
        return view('admin.fakultas.fakultas', compact('dataFakultas'));
    }

    public function create(){
        return view('admin.fakultas.createFakultas');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_fak' => 'required'
        ]);

        Fakultas::create([
            'nama_fak' => $request->nama_fak
        ]);

        return redirect('/fakultas');
    }

    public function delete($id_fak){
        $delete = Fakultas::find($id_fak);
        $delete->delete();

        return redirect('/fakultas');
    }

    public function update($id_fak){
        $dataFakultas = Fakultas::all()->where('id_fak', '=', $id_fak)
                                    ->first();
        return view('admin.fakultas.updateFakultas', compact('dataFakultas'));
    }

    public function updateStore($id_fak, Request $request){
        $this->validate($request, [
            'nama_fak' => 'required'
        ]);

        $id_fak = $request['id_fak'];
        $update = Fakultas::where('id_fak', $id_fak)->first();
        $update->nama_fak = $request['nama_fak'];
        $update->update();

        return redirect('/fakultas');
    }
}
