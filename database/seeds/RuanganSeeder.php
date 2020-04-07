<?php

use App\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listRuangan = ['HKM_2101',
                        'MNJ_121',
                        'ADP_901',
                        'AGB_401',
                        'PTR_1298',
                        'ARS_0012',
                        'GZI_532',
                        'BDKL_88',
                        'KIM_23',
                        'BTK_201',
                        'HIN_121',
                        'SJ_901',
                        'PDH_74',
                        'SI_69',
                        'FKG_563',
                        'S2NTR_401',
                        'VKS_205'];
        $jurusan = 1;

        foreach ($listRuangan as $ruangan) {
        	Ruangan::create([
                'id_jur' => $jurusan++,
                'nama_rua' => $ruangan
                ]);
        }
    }
}
