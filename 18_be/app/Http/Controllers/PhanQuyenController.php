<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhanQuyenController extends Controller
{
    public function search(Request $request){
        $noi_dung_tim = '%'. $request->noi_dung_tim . '%';
        $data   =  PhanQuyen::where('ten_quyen', 'like', $noi_dung_tim)
                            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }

    public function getData()
    {
        $id_chuc_nang = 38;
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
        $data = PhanQuyen::get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function createData(Request $request)
    {
        $id_chuc_nang = 39;
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
        PhanQuyen::create([
            'ten_quyen'         => $request->ten_quyen,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới tên quyền thành công!'
        ]);
    }
    public function UpateData(Request $request)
    {
        $id_chuc_nang = 40;
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
        $ten_quyen = PhanQuyen::where('id', $request->id)->first();
        if($ten_quyen) {
            $ten_quyen->update([
                'ten_quyen'             => $request->ten_quyen,

            ]);

            return response()->json([
                'status' => true,
                'message' => "Cập Nhật tên quyền thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có Lỗi"
            ]);
        }
    }
    public function deleteData($id)
    {
        $id_chuc_nang = 41;
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
        $ten_quyen = PhanQuyen::where('id', $id)->first();

        if($ten_quyen) {
            $ten_quyen->delete();

            return response()->json([
                'status' => true,
                'message' => "Đã xóa tên quyền thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có Lỗi"
            ]);
        }
    }

}
