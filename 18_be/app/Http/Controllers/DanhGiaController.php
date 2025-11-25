<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DanhGia;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        $sanPham = SanPham::find($request->id_san_pham);

        if ($sanPham) {
            $chiTietDonHang = ChiTietDonHang::where('id_khach_hang', $user->id)
                ->where('id_san_pham', $request->id_san_pham)
                ->where('tinh_trang', 3)
                ->first();

            if ($chiTietDonHang) {
                $kiemTraDanhGIa = DanhGia::where('id_khach_hang', $user->id)
                    ->where('id_san_pham', $sanPham->id)
                    ->first();

                if (!$kiemTraDanhGIa) {
                    DanhGia::create([
                        'noi_dung'        => $request->noi_dung,
                        'id_khach_hang'   => $user->id,
                        'id_san_pham'     => $sanPham->id,
                    ]);

                    return response()->json([
                        'status'    => true,
                        'message'   => 'Đã đánh giá thành công!',
                    ]);
                } else {
                    return response()->json([
                        'status'    => false,
                        'message'   => 'Bạn chỉ có thể đánh giá sản phẩm này 1 lần!',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Bạn chưa từng nhận sản phẩm này, không thể đánh giá!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Sản phẩm không tồn tại!',
            ]);
        }
    }

    public function getData(Request $request)
    {
        $data = DanhGia::where('id_san_pham', $request->id_san_pham)
            ->join('khach_hangs', 'khach_hangs.id', 'danh_gias.id_khach_hang')
            ->select('khach_hangs.hinh_anh', 'khach_hangs.ho_va_ten', 'danh_gias.*')
            ->get();

        return response()->json([
            'data'              => $data,
            'dem'               => count($data)
        ]);
    }
}
