<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DaiLySeeding::class,
            DanhMucSeeding::class,
            SanPhamSeeding::class,
            NhanVienSeeding::class,
            KhachHangSeeding::class,
            DiaChiSeeding::class,
            MaGiamGiaSeeding::class,
            ChucNangSeeding::class,
            PhanQuyenSeeding::class,
            ChiTietPhanQuyenSeeding::class,
        ]);
    }
}
