<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();

        DB::table('chuc_nangs')->truncate();

        DB::table('chuc_nangs')->insert([
            ['id' => '1', 'ten_chuc_nang' => 'Lấy Danh Sách Các Danh Mục'],
            ['id' => '2', 'ten_chuc_nang' => 'Tạo Mới Danh Mục'],
            ['id' => '3', 'ten_chuc_nang' => 'Kiểm Tra Slug Danh Mục Lúc Tạo Mới'],
            ['id' => '4', 'ten_chuc_nang' => 'Xóa Danh Mục'],
            ['id' => '5', 'ten_chuc_nang' => 'Cập Nhật Danh Mục'],
            ['id' => '6', 'ten_chuc_nang' => 'Đổi Trạng Thái Danh Mục'],
            ['id' => '7', 'ten_chuc_nang' => 'Lấy Danh Sách Các Sản Phẩm'],
            ['id' => '8', 'ten_chuc_nang' => 'Tạo Mới Sản Phẩm'],
            ['id' => '9', 'ten_chuc_nang' => 'Kiểm Tra Slug Sản Phẩm Lúc Tạo Mới'],
            ['id' => '10', 'ten_chuc_nang' => 'Xóa Sản Phẩm'],
            ['id' => '11', 'ten_chuc_nang' => 'Cập Nhật Sản Phẩm'],
            ['id' => '12', 'ten_chuc_nang' => 'Đổi Trạng Thái Bán Sản Phẩm'],
            ['id' => '13', 'ten_chuc_nang' => 'Đổi Trạng Thái Nổi Bật Sản Phẩm'],
            ['id' => '14', 'ten_chuc_nang' => 'Đổi Trạng Thái Flash Sale Sản Phẩm'],
            ['id' => '15', 'ten_chuc_nang' => 'Lấy Danh Sách Các Đại Lý'],
            ['id' => '16', 'ten_chuc_nang' => 'Tạo Mới Đại Lý'],
            ['id' => '17', 'ten_chuc_nang' => 'Xóa Đại Lý'],
            ['id' => '18', 'ten_chuc_nang' => 'Cập Nhật Đại Lý'],
            ['id' => '19', 'ten_chuc_nang' => 'Đổi Trạng Thái Đại Lý'],
            ['id' => '20', 'ten_chuc_nang' => 'Đổi Trạng Thái VIP Đại Lý'],
            ['id' => '21', 'ten_chuc_nang' => 'Kiểm tra email Đại Lý lúc tạo mới'],
            ['id' => '22', 'ten_chuc_nang' => 'Lấy Danh Sách Nhân Viên'],
            ['id' => '23', 'ten_chuc_nang' => 'Tạo Mới Nhân Viên'],
            ['id' => '24', 'ten_chuc_nang' => 'Xóa Nhân Viên'],
            ['id' => '25', 'ten_chuc_nang' => 'Cập Nhật Nhân Viên'],
            ['id' => '26', 'ten_chuc_nang' => 'Đổi Trạng Thái Nhân Viên'],
            ['id' => '27', 'ten_chuc_nang' => 'Kiểm tra email Nhân Viên lúc tạo mới'],
            ['id' => '28', 'ten_chuc_nang' => 'Lấy Danh Sách Khách Hàng'],
            ['id' => '29', 'ten_chuc_nang' => 'Kích Hoạt Tài Khoản Khách Hàng'],
            ['id' => '30', 'ten_chuc_nang' => 'Đổi Trạng Thái Tài Khoản Khách Hàng'],
            ['id' => '31', 'ten_chuc_nang' => 'Cập Nhật Tài Khoản Khách Hàng'],
            ['id' => '32', 'ten_chuc_nang' => 'Xóa Tài Khoản Khách Hàng'],
            ['id' => '33', 'ten_chuc_nang' => 'Lấy Danh Sách Mã Giảm Giá'],
            ['id' => '34', 'ten_chuc_nang' => 'Tạo Mới Mã Giảm Giá'],
            ['id' => '35', 'ten_chuc_nang' => 'Xóa Mã Giảm Giá'],
            ['id' => '36', 'ten_chuc_nang' => 'Cập Nhật Mã Giảm Giá'],
            ['id' => '37', 'ten_chuc_nang' => 'Đối Trạng Thái Mã Giảm Giá'],
            ['id' => '38', 'ten_chuc_nang' => 'Lấy Danh Sách Phân Quyền'],
            ['id' => '39', 'ten_chuc_nang' => 'Tạo Mới Phân Quyền'],
            ['id' => '40', 'ten_chuc_nang' => 'Cập Nhật Phân Quyền'],
            ['id' => '41', 'ten_chuc_nang' => 'Xóa Phân Quyền'],
            ['id' => '42', 'ten_chuc_nang' => 'Lấy Danh Sách Chức Năng'],
            ['id' => '43', 'ten_chuc_nang' => 'Tạo Mới Chi Tiết Phân Quyền'],
            ['id' => '44', 'ten_chuc_nang' => 'Lấy Danh Sách Chi Tiết Phân Quyền'],
            ['id' => '45', 'ten_chuc_nang' => 'Xóa Chi Tiết Phân Quyền'],
            ['id' => '46', 'ten_chuc_nang' => 'Xóa Chi Tiết Phân Quyền'],
            ['id' => '47', 'ten_chuc_nang' => 'Thông Kê Số Lượng Sản Phẩm Của Danh Mục'],
        ]);
    }
}
