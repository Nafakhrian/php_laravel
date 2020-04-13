<?php

namespace App\Exports;

use App\Barang;
use App\Ruangan;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('Barang')
            ->select('barang.id_bar', 'ruangan.nama_rua', 'barang.nama_bar', 'barang.total_bar', 'barang.rusak_bar', 'user1.name as created_by', 'user2.name as updated_by', 'barang.created_at', 'barang.updated_at')
            ->join('user as user1', 'user1.id', '=', 'barang.created_by')
            ->join('user as user2', 'user2.id', '=', 'barang.updated_by')
            ->join('ruangan', 'ruangan.id_rua', '=', 'barang.id_rua')
            ->orderBy('id_bar')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Ruangan',
            'Nama Barang',
            'Total',
            'Rusak',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At'
        ];
    }
}
