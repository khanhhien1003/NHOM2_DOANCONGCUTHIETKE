<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietDonHangController extends Controller
{
    public function store(Request $request)
    {
        $khachHang  = Auth::guard('sanctum')->user();
        $sanPham    = SanPham::find($request->id);
        // Có đầy đủ thông tin của sản phẩm cần thêm vào giỏ hàng
        $chiTiet    = ChiTietDonHang::where('id_san_pham', $sanPham->id)
            ->where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->first();
        if ($chiTiet) {
            $chiTiet->so_luong      =   $chiTiet->so_luong + $request->so_luong_mua;
            $chiTiet->thanh_tien    =   $chiTiet->so_luong * $chiTiet->don_gia;
            $chiTiet->save();
        } else {
            $chiTiet = ChiTietDonHang::create([
                'id_san_pham'       =>  $sanPham->id,
                'id_khach_hang'     =>  $khachHang->id,
                'id_dai_ly'         =>  $sanPham->id_dai_ly,
                'don_gia'           =>  $sanPham->gia_khuyen_mai,
                'so_luong'          =>  $request->so_luong_mua,
                'thanh_tien'        =>  $sanPham->gia_khuyen_mai * $request->so_luong_mua,
                'ten_san_pham'      =>  $sanPham->ten_san_pham,
                'tinh_trang'        =>  0,
            ]);
        }

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã thêm vào giỏ hàng thành công',
            'chi_tiet'  => $chiTiet
        ]);
    }

    public function getGioHang()
    {
        $khachHang = Auth::guard('sanctum')->user();

        $data      = ChiTietDonHang::where('is_gio_hang', 1)    // Đang là giỏ hàng
            ->join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
            ->join('dai_lys', 'dai_lys.id', 'chi_tiet_don_hangs.id_dai_ly')
            ->where('id_khach_hang', $khachHang->id)     // Vì giỏ hàng là của từng KH
            ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh', 'dai_lys.ten_doanh_nghiep')
            ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function deleteGioHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();

        ChiTietDonHang::where('id', $request->id)
            ->where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá sản phẩm trong giỏ hàng thành công'
        ]);
    }

    public function updateGioHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();

        $gio_hang = ChiTietDonHang::where('id', $request->id)->where('id_khach_hang', $khachHang->id)->first();
        if ($gio_hang) {
            ChiTietDonHang::where('id', $request->id)
                ->where('id_khach_hang', $khachHang->id)
                ->where('is_gio_hang', 1)
                ->update([
                    'ghi_chu'    => $request->ghi_chu,
                    'so_luong'   => $request->so_luong,
                    'thanh_tien' => $request->so_luong * $gio_hang->don_gia
                ]);

            return response()->json([
                'status'    =>  true,
                'message'   =>  'Đã cập nhật sản phẩm trong giỏ hàng thành công'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }
}
