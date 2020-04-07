<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request){
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_bar', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_rua', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_rua', '=', 'barang.id_rua')
            ->orderBy('id_bar', 'asc')->paginate(5);
        return view('staff.barangStaff', compact('dataBarang'));
    }
}
