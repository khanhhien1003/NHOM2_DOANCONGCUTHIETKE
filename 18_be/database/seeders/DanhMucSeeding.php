<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xoá toàn bộ dữ liệu ở table danh mục
        DB::table('danh_mucs')->delete();
        // Reset ID Danh mục về lại từ 1
        DB::table('danh_mucs')->truncate();
        // Bắt Đầu tạo Dữ Liệu

        DB::table('danh_mucs')->insert([
            [
                'id'        => 1,
                'ten_danh_muc'  => 'Điện Thoại',
                'slug_danh_muc' => 'dien-thoai',
                'icon_danh_muc' =>  '<i class="fa-solid fa-phone-volume"></i>',
                'id_danh_muc_cha' => 0,
                'tinh_trang'    => 1
            ],
            [
                'id'                =>  2,
                'ten_danh_muc'      =>  'Máy Tính',
                'slug_danh_muc'     =>  'may-tinh',
                'icon_danh_muc'     =>  '<i class="fa-solid fa-laptop"></i>',
                'id_danh_muc_cha'   =>  0,
                'tinh_trang'        =>  1
            ],
            [
                'id'                =>  3,
                'ten_danh_muc'      =>  'Phụ Kiện',
                'slug_danh_muc'     =>  'phu-kien',
                'icon_danh_muc'     =>  '<i class="fa-solid fa-headphones"></i>',
                'id_danh_muc_cha'   =>  0,
                'tinh_trang'        =>  0
            ],
            [
                'id'                =>  4,
                'ten_danh_muc'      =>  'Apple',
                'slug_danh_muc'     =>  'apple',
                'icon_danh_muc'     =>  '<i class="fa-brands fa-apple"></i>',
                'id_danh_muc_cha'   =>  0,
                'tinh_trang'        =>  1
            ],
            [
                'id'                =>  5,
                'ten_danh_muc'      =>  'Máy Tính Bảng',
                'slug_danh_muc'     =>  'may-tinh-bang',
                'icon_danh_muc'     =>  '<i class="fa-solid fa-tablet-screen-button"></i>',
                'id_danh_muc_cha'   =>  0,
                'tinh_trang'        =>  0
            ],
            [
                'id'                =>  6,
                'ten_danh_muc'      =>  'Điện Máy Gia Dụng',
                'slug_danh_muc'     =>  'dien-may-gia-dung',
                'icon_danh_muc'     =>  '<i class="fa-solid fa-house-circle-check"></i>',
                'id_danh_muc_cha'   =>  0,
                'tinh_trang'        =>  1
            ],
            [
                'id'                =>  7,
                'ten_danh_muc'      =>  'Chăm Sóc Đời Sống',       
                'slug_danh_muc'     =>  'cham-soc-doi-song',
                'icon_danh_muc'     =>  '<i class="fa-regular fa-address-book"></i>',
                'id_danh_muc_cha'   =>  0,
                'tinh_trang'        =>  1
            ],

        ]);
    }
}
