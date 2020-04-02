<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index(Request $request){
        $dataFakultas = Fakultas::all();
        $dataJurusan = Jurusan::paginate(5);
        return view('admin.jurusan.jurusan', compact('dataJurusan', 'dataFakultas'));
    }

    public function create(){
        $dataFakultas = Fakultas::all();
        return view('admin.jurusan.createJurusan', compact('dataFakultas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_fak' => 'required',
            'nama_jur' => 'required'
        ]);

        Jurusan::create([
            'id_fak' => $request->id_fak,
            'nama_jur' => $request->nama_jur
        ]);

        return redirect('/jurusan');
    }

    public function delete($id_jur){
        $delete = Jurusan::find($id_jur);
        $delete->delete();

        return redirect('/jurusan');
    }

    public function update($id_jur){
        $dataJurusan = Jurusan::all()->where('id_jur', '=', $id_jur)
                                    ->first();
        $dataFakultas = Fakultas::all();
        return view('admin.jurusan.updateJurusan', compact('dataJurusan', 'dataFakultas'));
    }

    public function updateStore($id_jur, Request $request){
        $this->validate($request, [
            'id_jur' => 'required',
            'nama_jur' => 'required'
        ]);

        $table = Jurusan::find($id_jur);

        $id_jur = $request['id_jur'];
        $update = Jurusan::where('id_jur', $id_jur)->first();
        $update->id_fak = $request['id_fak'];
        $update->nama_jur = $request['nama_jur'];
        $update->update();

        return redirect('/jurusan');
    }

    public function search(Request $request){
        $dataFakultas = Fakultas::all();
        $search = $request->search_jur;
        $searchFakultas = DB::table('fakultas')
                            ->select('id_fak')
                            ->where('nama_fak', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $dataJurusan = DB::table('jurusan')
                            ->where('id_fak', '=', $src)
                            ->paginate(5);

            return view('admin.jurusan.jurusan', compact('dataJurusan', 'dataFakultas'));
        } else{
            $dataJurusan = DB::table('jurusan')
                            ->where('id_fak', '=', null)
                            ->paginate(5);
            return view('admin.jurusan.jurusan', compact('dataJurusan', 'dataFakultas'));
        }

    }
}
