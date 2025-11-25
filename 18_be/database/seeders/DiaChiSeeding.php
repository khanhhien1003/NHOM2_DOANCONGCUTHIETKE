<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaChiSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dia_chis')->delete();

        DB::table('dia_chis')->truncate();

        DB::table('dia_chis')->insert([
            [
                'dia_chi'           =>  '202 Võ Nguyên Giáp, Đà Nẵng',
                'ten_nguoi_nhan'    =>  'Quốc Long',
                'so_dien_thoai'     =>  '0905789123',
                'id_khach_hang'     =>  1,
            ],
            [
                'dia_chi'           =>  '32 Xuân Diệu, Đà Nẵng',
                'ten_nguoi_nhan'    =>  'Quốc Long',
                'so_dien_thoai'     =>  '0905789367',
                'id_khach_hang'     =>  1,
            ],
            // [
            //     'dia_chi'           =>  '11 Nguyễn Trãi, Đà Nẵng',
            //     'ten_nguoi_nhan'    =>  'Quốc Huy',
            //     'so_dien_thoai'     =>  '09057894245',
            //     'id_khach_hang'     =>  2,
            // ],
            // [
            //     'dia_chi'           =>  '11 Hàm Nghi, Đà Nẵng',
            //     'ten_nguoi_nhan'    =>  'Văn Mạnh',
            //     'so_dien_thoai'     =>  '0905789280',
            //     'id_khach_hang'     =>  3,
            // ],
            // [
            //     'dia_chi'           =>  '34 Nguyễn Văn Thoại, Đà Nẵng',
            //     'ten_nguoi_nhan'    =>  'Minh Tiến',
            //     'so_dien_thoai'     =>  '0905789754',
            //     'id_khach_hang'     =>  4,
            // ],
            // [
            //     'dia_chi'           =>  '34 Nguyễn Hữu Thọ, Đà Nẵng',
            //     'ten_nguoi_nhan'    =>  'Thanh Trường',
            //     'so_dien_thoai'     =>  '0905789648',
            //     'id_khach_hang'     =>  5,
            // ],
            // [
            //     'dia_chi'           =>  '34 Cổ Mân Cúc 1, Đà Nẵng',
            //     'ten_nguoi_nhan'    =>  'Duy Khánh',
            //     'so_dien_thoai'     =>  '0905789967',
            //     'id_khach_hang'     =>  6,
            // ],
        ]);
    }
}
