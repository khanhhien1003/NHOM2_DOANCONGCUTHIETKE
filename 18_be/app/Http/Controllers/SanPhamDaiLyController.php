<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanPhamDaiLyController extends Controller
{
    public function getData()
    {
        $user_login = Auth::guard('sanctum')->user();
        $data = SanPham::where('id_dai_ly', $user_login->id)->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $user_login = Auth::guard('sanctum')->user();
        SanPham::create([
            'ten_san_pham'      =>  $request->ten_san_pham,
            'slug_san_pham'     =>  $request->slug_san_pham,
            'so_luong'          =>  $request->so_luong,
            'hinh_anh'          =>  $request->hinh_anh,
            'mo_ta_ngan'        =>  $request->mo_ta_ngan,
            'mo_ta_chi_tiet'    =>  $request->mo_ta_chi_tiet,
            'tinh_trang'        =>  $request->tinh_trang,
            'gia_ban'           =>  $request->gia_ban,
            'gia_khuyen_mai'    =>  $request->gia_khuyen_mai,
            'id_dai_ly'         =>  $user_login->id,
            'sao_danh_gia'      =>  $request->sao_danh_gia,
            'tag'               =>  $request->tag,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã thêm mới sản phẩm". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function xoaSP(Request $request)
    {
        $user_login = Auth::guard('sanctum')->user();
        $check = SanPham::where('id', $request->id)->where('id_dai_ly', $user_login->id)->delete();
        if ($check) {
            return response()->json([
                'status' => true,
                'message' => "Đã xóa sản phẩn". $request->ten_san_pham . " thành công.",
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Xóa sản phẩm thất bại",
            ]);
        }
        
        
    }

    public function chuyenTrangThaiBan(Request $request)
    {
        $user_login = Auth::guard('sanctum')->user();
        $tinh_trang = $request->tinh_trang == 1 ? 0 : 1;
        $check = SanPham::where('id', $request->id)->where('id_dai_ly', $user_login->id)->update([
            'tinh_trang'    =>  $tinh_trang
        ]);

        return response()->json([
            'status'    =>  $check,
            'message'   => 
                        $check == true ? "Đã đổi tình trạng sản phẩm". $request->ten_san_pham . " thành công." : "Thay đổi trạng thái thất bại",
        ]);
    }

    public function update(Request $request)
    {
        SanPham::find($request->id)->update([
            'ten_san_pham'  =>$request->ten_san_pham,
            'slug_san_pham'  =>$request->slug_san_pham,
            'so_luong'   =>$request->so_luong,
            'hinh_anh'   =>$request->hinh_anh,
            'mo_ta_ngan'   =>$request->mo_ta_ngan,
            'mo_ta_chi_tiet'   =>$request->mo_ta_chi_tiet,
            'tinh_trang'  =>$request->tinh_trang,
            'gia_ban'  =>$request->gia_ban,
            'gia_khuyen_mai'  =>$request->gia_khuyen_mai,
            'tag'               =>  $request->tag,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã sửa đổi thông tin ". $request->ten_san_pham . " thành công.",
        ]);
    }
}
