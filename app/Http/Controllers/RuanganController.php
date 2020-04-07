<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(Request $request){
        $dataRuangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('nama_rua', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_jur', 'LIKE', '%'.$request->search.'%');
        })->join('jurusan', 'jurusan.id_jur', '=', 'ruangan.id_jur')
            ->orderBy('id_rua', 'asc')->paginate(5);
        return view('admin.ruangan.ruangan', compact('dataRuangan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(){
        $dataJurusan = Jurusan::all()->sortBy('id_jur');
        return view('admin.ruangan.createRuangan', compact('dataJurusan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_jur' => 'required',
            'nama_rua' => 'required'
        ]);

        Ruangan::create([
            'id_jur' => $request->id_jur,
            'nama_rua' => $request->nama_rua
        ]);

        return redirect('/ruangan');
    }

    public function delete($id_rua){
        $delete = Ruangan::find($id_rua);
        $delete->delete();

        return redirect('/ruangan   ');
    }

    public function update($id_rua){
        $dataRuangan = Ruangan::all()->where('id_rua', '=', $id_rua)
                        ->first();
        $dataJurusan = Jurusan::all()->sortBy('id_jur');
        return view('admin.ruangan.updateRuangan', compact('dataRuangan', 'dataJurusan'));
    }

    public function updateStore($id_rua, Request $request){
        $this->validate($request, [
            'id_rua' => 'required',
            'nama_rua' => 'required'
        ]);

        $table = Jurusan::find($id_rua);

        $id_rua = $request['id_rua'];
        $update = Ruangan::where('id_rua', $id_rua)->first();
        $update->id_jur = $request['id_jur'];
        $update->nama_rua = $request['nama_rua'];
        $update->update();

        return redirect('/ruangan');
    }
}
