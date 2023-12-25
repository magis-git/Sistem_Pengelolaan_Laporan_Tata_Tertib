<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kelas = new \App\Models\Kelas;
        $kelas->kelas_number = "9A";
        $kelas->kelas_name = "Hanafi";
        $kelas->walikelas_1 = "guru1";
        $kelas->walikelas_2 = "guru2";
        
        
        
        
        $kelas->save();
        $this->command->info("Kelas berhasil diinsert");
    }
}
