<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\ChiTietPhanQuyen;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    public function search(Request $request){
        $noi_dung_tim = '%'. $request->noi_dung_tim . '%';
        $data   =  SanPham::where('ten_san_pham', 'like', $noi_dung_tim)
                            ->orWhere('mo_ta_ngan', 'like', $noi_dung_tim)
                            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }

    public function searchNguoiDung(Request $request){
        $noi_dung_tim = '%'. $request->noi_dung_tim . '%';
        $data   =  SanPham::where('ten_san_pham', 'like', $noi_dung_tim)
                            ->orWhere('mo_ta_ngan', 'like', $noi_dung_tim)->where('tinh_trang', 1)
                            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }
    
    public function chuyenTrangThaiBan(Request $request)
    {
        
        $id_chuc_nang = 12;
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
        $tinh_trang = $request->tinh_trang == 1 ? 0 : 1;
        SanPham::find($request->id)->update([
            'tinh_trang'    =>  $tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => "Đã đổi tình trạng sản phẩm". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function chuyenNoiBat(Request $request)
    {
        
        $id_chuc_nang = 13;
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
        $is_noi_bat = $request->is_noi_bat == 1 ? 0 : 1;
        SanPham::find($request->id)->update([
            'is_noi_bat'    =>  $is_noi_bat
        ]);

        return response()->json([
            'status' => true,
            'message' => "Đã đổi tình trạng sản phẩm". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function update(Request $request){
        
        $id_chuc_nang = 11;
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
            'tag'               =>$request->tag,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã sửa đổi thông tin ". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function chuyenFlashSale(Request $request)
    {
        
        $id_chuc_nang = 14;
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
        $is_flash_sale = $request->is_flash_sale == 1 ? 0 : 1;
        SanPham::find($request->id)->update([
            'is_flash_sale'    =>  $is_flash_sale
        ]);

        return response()->json([
            'status' => true,
            'message' => "Đã đổi tình trạng sản phẩm". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function getData()
    {
        
        $id_chuc_nang = 7;
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
        $data = SanPham::get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getDataNew()
    {
        $data = SanPham::orderBy('id', 'DESC')->take(10)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getDataNoiBat()
    {
        $data = SanPham::where('is_noi_bat',1)->take(10)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getDataFlashSale()
    {
        $data = SanPham::where('is_flash_sale',1)->take(5)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        
        $id_chuc_nang = 8;
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
        SanPham::create([
            'ten_san_pham'      =>$request->ten_san_pham,
            'slug_san_pham'     =>$request->slug_san_pham,
            'so_luong'          =>$request->so_luong,
            'hinh_anh'          =>$request->hinh_anh,
            'mo_ta_ngan'        =>$request->mo_ta_ngan,
            'mo_ta_chi_tiet'    =>$request->mo_ta_chi_tiet,
            'tinh_trang'        =>$request->tinh_trang,
            'gia_ban'           =>$request->gia_ban,
            'gia_khuyen_mai'    =>$request->gia_khuyen_mai,
            'sao_danh_gia'      =>$request->sao_danh_gia,
            'tag'               =>$request->tag,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã thêm mới sản phẩm". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function checkSlug(Request $request)
    {
        
        $id_chuc_nang = 9;
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
        $slug = $request->slug_san_pham;
        $check = SanPham::where('slug_san_pham', $slug)->first();
        if($check){
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

    public function xoaSP(Request $request)
    {
        
        $id_chuc_nang = 10;
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
        SanPham::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa sản phẩn". $request->ten_san_pham . " thành công.",
        ]);
    }

    public function layThongTinSanPham($id)
    {
        $data   = SanPham::where('id', $id)->where('tinh_trang', 1)->first();
        $chiTiet = ChiTietDonHang::where('id_san_pham', $data->id)->where('tinh_trang', 3)->get();
        if($data) {
            return response()->json([
                'status'  => true,
                'data'    => $data,
                'order'    => count($chiTiet),
            ]);
        } else {
            return response()->json([
                'status'     => false,
                'message'    => "Sản phẩm không tồn tại trong hệ thống"
            ]);
        }
    }

    public function layThongTinSanPhamTuDanhMuc($id_danh_muc)
    {
        $data   = SanPham::where('id_danh_muc', $id_danh_muc)->where('tinh_trang', 1)->get();
        if(count($data) > 0) {
            return response()->json([
                'status'  => true,
                'data'    => $data
            ]);
        } else {
            return response()->json([
                'status'     => false,
                'message'    => "Danh mục không có bất kỳ sản phẩm nào"
            ]);
        }
    }

    public function layThongTinSanPhamDaiLy($id_dai_ly)
    {
        $data   = SanPham::where('id_dai_ly', $id_dai_ly)->where('tinh_trang', 1)->get();
        if(count($data) > 0) {
            return response()->json([
                'status'  => true,
                'data'    => $data
            ]);
        } else {
            return response()->json([
                'status'     => false,
                'message'    => "Danh mục không có bất kỳ sản phẩm nào"
            ]);
        }
    }
}
