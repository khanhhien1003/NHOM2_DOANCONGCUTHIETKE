<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function thongKe1(Request $request)
    {
        $id_chuc_nang = 47;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $data = DanhMuc::join('san_phams', 'danh_mucs.id', 'san_phams.id_danh_muc')
                       ->whereDate('san_phams.created_at', ">=", $request->tu_ngay)
                       ->whereDate('san_phams.created_at', "<=", $request->den_ngay)
                       ->select('danh_mucs.ten_danh_muc', DB::raw("sum(san_phams.so_luong) as so_luong"))
                       ->groupBy('danh_mucs.ten_danh_muc')
                       ->get();
        $array_ten_danh_muc   = [];
        $array_tong_so_luong   = [];

        foreach ($data as $key => $value) {
            array_push($array_ten_danh_muc, $value->ten_danh_muc);
            array_push($array_tong_so_luong, $value->so_luong);
        }
        return response()->json([
            'data'                      =>  $data,
            'array_ten_danh_muc'        => $array_ten_danh_muc,
            'array_tong_so_luong'       => $array_tong_so_luong,
        ]);
    }
}
