<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'hinh_anh'     =>  'https://rypuop.stripocdn.email/content/guids/CABINET_cffa413c5ccab048888fec6cc485b815f8f80028a73882101227ae6949ec8f11/images/387321979_687594463281792_7574468668499025541_n.jpg',
                'ho_va_ten'     =>  'Nguyễn Quốc Long',
                'email'         =>  'xyz@gmail.com',
                'so_dien_thoai' =>  '0708585120',
                'password'      =>  bcrypt('123456'),
                'is_active'     =>  1,
            ],
        ]);
    }
}
