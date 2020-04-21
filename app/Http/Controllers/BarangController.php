<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Ruangan;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    //ADMIN
    public function index(Request $request){
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_bar', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_rua', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_rua', '=', 'barang.id_rua')
            ->orderBy('id_bar', 'asc')->paginate(5);
        return view('barang.barang', compact('dataBarang'));
    }

    public function create(){
        $dataRuangan = Ruangan::all()->sortBy('id_rua');
        return view('barang.createBarang', compact('dataRuangan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_rua' => 'required',
            'nama_bar' => 'required',
            'total_bar' => 'required',
            'rusak_bar' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);

        $file = $request->file('foto');
		$image = 'ruang-' . $request->id_rua  . '_' . $request->nama_bar . '.' . $file->getClientOriginalExtension();
		$file->move(public_path("img "), $image);

        Barang::create([
            'id_rua' => $request->id_rua,
            'nama_bar' => $request->nama_bar,
            'total_bar' => $request->total_bar,
            'rusak_bar' => $request->rusak_bar,
            'foto' => $insert['foto'] = "$image",
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);

        return redirect('/barang');
    }

    public function delete($id_bar){
        $delete = Barang::find($id_bar);
        $delete->delete();

        return redirect('/barang');
    }

    public function update($id_bar){
        $dataRuangan = Ruangan::all()->sortBy('id_rua');
        $dataBarang = Barang::all()->where('id_bar', '=', $id_bar)
                                    ->first();
        return view('barang.updateBarang', compact('dataBarang', 'dataRuangan'));
    }

    public function updateStore($id_bar, Request $request){
        $this->validate($request, [
            'id_rua' => 'required',
            'nama_bar' => 'required',
            'total_bar' => 'required',
            'rusak_bar' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);

        $table = Barang::find($id_bar);
        if ($file = $request->file('foto')) {
			$usedImage = public_path("img/{ $table->foto }");

			if (File::exists($usedImage)) {
				unlink($usedImage);
            }

            $destPath = 'img/';
		    $image = 'ruang-' . $request->id_rua  . '_' . $request->nama_bar . '.' . $file->getClientOriginalExtension();
		    $file->move($destPath, $image);

            $id_bar = $request['id_bar'];
            $update = Barang::where('id_bar', $id_bar)->first();
            $update->nama_bar = $request['nama_bar'];
            $update->total_bar = $request['total_bar'];
            $update->rusak_bar = $request['rusak_bar'];
            $update->foto = $insert['foto'] = "$image";
            $update->created_by = $request['created_by'];
            $update->updated_by = $request['updated_by'];
            $update->update();
        }

        return redirect('/barang');
    }

    public function export(Request $request){
        return Excel::download(new BarangExport, 'Barang_'.date("d-M-Y").'.xlsx');
    }

}
