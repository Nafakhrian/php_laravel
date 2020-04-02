<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listFakultas = ['Fakultas Hukum',
                        'Fakultas Ekonomi dan Bisnis',
                        'Fakultas Ilmu Administrasi',
                        'Fakultas Pertanian',
                        'Fakultas Peternakan',
                        'Fakultas Teknik',
                        'Fakultas Kedokteran',
                        'Fakultas Perikanan dan Ilmu Kelautan',
                        'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                        'Fakultas Teknologi Pertanian',
                        'Fakultas Ilmu Sosial dan Ilmu Politik',
                        'Fakultas Ilmu Budaya',
                        'Fakultas Kedokteran Hewan',
                        'Fakultas Ilmu Komputer',
                        'Fakultas Kedokteran Gigi',
                        'Pascasarjana',
                        'Vokasi'];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create([
                'nama_fak' => $fakultas
                ]);
        }
    }
}
