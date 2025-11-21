<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhMucController extends Controller
{
    public function getDataOpen()
    {
        $data = DanhMuc::where('tinh_trang', 1)->get(); //Nghia la lay ra

        return response()->json([
            'data' => $data
        ]);
    }

    public function getData()
    {
        $id_chuc_nang = 1;
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
        $data = DanhMuc::get(); //Nghia la lay ra

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {

        $id_chuc_nang = 2;
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
        DanhMuc::create([
            'ten_danh_muc' => $request->ten_danh_muc,
            'slug_danh_muc' => $request->slug_danh_muc,
            'icon_danh_muc' => $request->icon_danh_muc,
            'tinh_trang' => $request->tinh_trang,
            'id_danh_muc_cha' => $request->id_danh_muc_cha,

        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã tạo mới danh muc" . $request->ten_danh_muc . " thành công.",
        ]);
    }
    public function destroy(Request $request)
    {

        $id_chuc_nang = 4;
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
        //table danh mục tìm id = $request->id và sau đó xóa nó đi
        DanhMuc::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa danh muc" . $request->ten_danh_muc . " thành công.",
        ]);
    }
    public function checkSlug(Request $request)
    {

        $id_chuc_nang = 3;
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
        $slug = $request->slug_danh_muc;
        $check = DanhMuc::where('slug_danh_muc', $slug)->first();
        if ($check) {
            return response()->json([
                'status' => false,
                'message' => "Slug này đã tồn tại.",
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Có thể thêm danh mục này.",
            ]);
        }
    }
    public function update(Request $request)
    {

        $id_chuc_nang = 5;
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
        DanhMuc::find($request->id)->update([
            'ten_danh_muc' => $request->ten_danh_muc,
            'slug_danh_muc' => $request->slug_danh_muc,
            'icon_danh_muc' => $request->icon_danh_muc,
            'tinh_trang' => $request->tinh_trang,
            'id_danh_muc_cha' => $request->id_danh_muc_cha,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã update danh muc" . $request->ten_danh_muc . " thành công.",
        ]);
    }
    public function changeStatus(Request $request)
    {

        $id_chuc_nang = 6;
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
        $danhMuc = DanhMuc::where('id', $request->id)->first();

        if ($danhMuc) {
            if ($danhMuc->tinh_trang == 0) {
                $danhMuc->tinh_trang = 1;
            } else {
                $danhMuc->tinh_trang = 0;
            }
            $danhMuc->save();

            return response()->json([
                'status'    => true,
                'message'   => "Đã cập nhật trạng thái danh mục thành công!"
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Danh mục không tồn tại!"
            ]);
        }
    }
}
