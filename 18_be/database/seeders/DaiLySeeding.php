<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaiLySeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dai_lys')->delete();

        DB::table('dai_lys')->truncate();

        DB::table('dai_lys')->insert([
            [
                'ho_va_ten' => 'Nguyễn Quốc Long',
                'email' => 'quoclongdng@gmail.com',
                'so_dien_thoai' => '0909123456',
                'ngay_sinh' => '1985-01-01',
                'password' => bcrypt('123456'),
                'ten_doanh_nghiep' => 'Cong Ty DZFullStack',
                'ma_so_thue' => '1234567890',
                'dia_chi_kinh_doanh' => '32 Xuân Diệu, Sơn Trà, Đà Nẵng',
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Nguyen Van A',
                'email' => 'nguyenvana@gmail.com',
                'so_dien_thoai' => '0909123456',
                'ngay_sinh' => '1985-01-01',
                'password' => bcrypt('123123'),
                'ten_doanh_nghiep' => 'Cong Ty TNHH ABC',
                'ma_so_thue' => '1234567890',
                'dia_chi_kinh_doanh' => '123 Le Loi, Quan 1, TP. HCM',
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Tran Thi B',
                'email' => 'tranthib@gmail.com',
                'so_dien_thoai' => '0909876543',
                'ngay_sinh' => '1990-02-02',
                'password' => bcrypt('1234567'),
                'ten_doanh_nghiep' => 'Cong Ty Co Phan XYZ',
                'ma_so_thue' => '0987654321',
                'dia_chi_kinh_doanh' => '456 Tran Hung Dao, Quan 5, TP. HCM',
                'is_active' => 0,
            ],
            [
                'ho_va_ten' => 'Le Van C',
                'email' => 'levanc@gmail.com',
                'so_dien_thoai' => '0912345678',
                'ngay_sinh' => '1980-03-03',
                'password' => bcrypt('12345678'),
                'ten_doanh_nghiep' => 'Cong Ty TNHH DICH VU EFG',
                'ma_so_thue' => '1122334455',
                'dia_chi_kinh_doanh' => '789 Ly Thuong Kiet, Quan 10, TP. HCM',
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Pham Thi D',
                'email' => 'phamthid@gmail.com',
                'so_dien_thoai' => '0923456789',
                'ngay_sinh' => '1995-04-04',
                'password' => bcrypt('123456789'),
                'ten_doanh_nghiep' => 'Cong Ty TNHH GHI',
                'ma_so_thue' => '6677889900',
                'dia_chi_kinh_doanh' => '101 Nguyen Trai, Quan 3, TP. HCM',
                'is_active' => 0,
            ],
            [
                'ho_va_ten' => 'Hoang Van E',
                'email' => 'hoangvane@gmail.com',
                'so_dien_thoai' => '0934567890',
                'ngay_sinh' => '1988-05-05',
                'password' => bcrypt('123'),
                'ten_doanh_nghiep' => 'Cong Ty TNHH JKL',
                'ma_so_thue' => '5566778899',
                'dia_chi_kinh_doanh' => '202 Phan Chu Trinh, Quan Tan Binh, TP. HCM',
                'is_active' => 1,
            ]
        ]);
    }
}
