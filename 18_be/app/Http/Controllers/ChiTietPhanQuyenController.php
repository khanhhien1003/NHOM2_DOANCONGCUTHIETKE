<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietPhanQuyenController extends Controller
{
    public function capQuyen(Request $request)
    {
        
        $id_chuc_nang = 43;
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
        
        $quyen = ChiTietPhanQuyen::where('id_quyen', $request->id_quyen)
                                  ->where('id_chuc_nang', $request->id_chuc_nang)
                                  ->first();

        if ($quyen) {
            return response()->json([
                'status'  => false,
                'message' => 'Quyền đã tồn tại!',
            ]);
        }

        ChiTietPhanQuyen::create([
            'id_quyen'      => $request->id_quyen,
            'id_chuc_nang'  => $request->id_chuc_nang,
        ]);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã phân quyền thành công!'
        ]);
    }

    public function getData(Request $request)
    {
        
        $id_chuc_nang = 44;
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
        
        $data   = ChiTietPhanQuyen::join('chuc_nangs', 'chi_tiet_phan_quyens.id_chuc_nang', 'chuc_nangs.id')
            ->join('phan_quyens', 'chi_tiet_phan_quyens.id_quyen', 'phan_quyens.id')
            ->where('chi_tiet_phan_quyens.id_quyen', $request->id_quyen)
            ->select('chi_tiet_phan_quyens.*', 'chuc_nangs.ten_chuc_nang', 'phan_quyens.ten_quyen')
            ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function xoaQuyen(Request $request)
    {
        
        $id_chuc_nang = 45;
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
        ChiTietPhanQuyen::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá phân quyền thành công!'
        ]);
    }

}
