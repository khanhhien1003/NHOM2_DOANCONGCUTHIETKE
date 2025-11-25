<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietPhanQuyenSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chi_tiet_phan_quyens')->delete();

        DB::table('chi_tiet_phan_quyens')->truncate();
        
        DB::table('chi_tiet_phan_quyens')->insert([
            ['id_chuc_nang' => '1', 'id_quyen' => 1],
            ['id_chuc_nang' => '2', 'id_quyen' => 1],
            ['id_chuc_nang' => '3', 'id_quyen' => 1],
            ['id_chuc_nang' => '4', 'id_quyen' => 1],
            ['id_chuc_nang' => '5', 'id_quyen' => 1],
            ['id_chuc_nang' => '6', 'id_quyen' => 1],
            ['id_chuc_nang' => '7', 'id_quyen' => 1],
            ['id_chuc_nang' => '8', 'id_quyen' => 1],
            ['id_chuc_nang' => '9', 'id_quyen' => 1],
            ['id_chuc_nang' => '10', 'id_quyen' => 1],
            ['id_chuc_nang' => '11', 'id_quyen' => 1],
            ['id_chuc_nang' => '12', 'id_quyen' => 1],
            ['id_chuc_nang' => '13', 'id_quyen' => 1],
            ['id_chuc_nang' => '14', 'id_quyen' => 1],
            ['id_chuc_nang' => '15', 'id_quyen' => 1],
            ['id_chuc_nang' => '16', 'id_quyen' => 1],
            ['id_chuc_nang' => '17', 'id_quyen' => 1],
            ['id_chuc_nang' => '18', 'id_quyen' => 1],
            ['id_chuc_nang' => '19', 'id_quyen' => 1],
            ['id_chuc_nang' => '20', 'id_quyen' => 1],
            ['id_chuc_nang' => '21', 'id_quyen' => 1],
            ['id_chuc_nang' => '22', 'id_quyen' => 1],
            ['id_chuc_nang' => '23', 'id_quyen' => 1],
            ['id_chuc_nang' => '24', 'id_quyen' => 1],
            ['id_chuc_nang' => '25', 'id_quyen' => 1],
            ['id_chuc_nang' => '26', 'id_quyen' => 1],
            ['id_chuc_nang' => '27', 'id_quyen' => 1],
            ['id_chuc_nang' => '28', 'id_quyen' => 1],
            ['id_chuc_nang' => '29', 'id_quyen' => 1],
            ['id_chuc_nang' => '30', 'id_quyen' => 1],
            ['id_chuc_nang' => '31', 'id_quyen' => 1],
            ['id_chuc_nang' => '32', 'id_quyen' => 1],
            ['id_chuc_nang' => '33', 'id_quyen' => 1],
            ['id_chuc_nang' => '34', 'id_quyen' => 1],
            ['id_chuc_nang' => '35', 'id_quyen' => 1],
            ['id_chuc_nang' => '36', 'id_quyen' => 1],
            ['id_chuc_nang' => '37', 'id_quyen' => 1],
            ['id_chuc_nang' => '38', 'id_quyen' => 1],
            ['id_chuc_nang' => '39', 'id_quyen' => 1],
            ['id_chuc_nang' => '40', 'id_quyen' => 1],
            ['id_chuc_nang' => '41', 'id_quyen' => 1],
            ['id_chuc_nang' => '42', 'id_quyen' => 1],
            ['id_chuc_nang' => '43', 'id_quyen' => 1],
            ['id_chuc_nang' => '44', 'id_quyen' => 1],
            ['id_chuc_nang' => '45', 'id_quyen' => 1],
            ['id_chuc_nang' => '46', 'id_quyen' => 1],
            ['id_chuc_nang' => '47', 'id_quyen' => 1],
        ]);
    }
}
