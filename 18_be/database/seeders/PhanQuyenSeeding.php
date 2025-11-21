<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phan_quyens')->delete();

        DB::table('phan_quyens')->truncate();
        
        DB::table('phan_quyens')->insert([
            [
                'id'             =>  1,
                'ten_quyen'      =>  'Admin',
            ],
            [
                'id'             =>  2,
                'ten_quyen'      =>  'Nhân Viên',
            ],
        ]);
    }
}
