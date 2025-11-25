<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use App\Models\ChiTietDonHang;
use App\Models\DiaChi;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonHangController extends Controller
{
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $khachHang  = Auth::guard('sanctum')->user();
        $diaChi  = DiaChi::where('id', $request->id_dia_chi_khach_hang)
            ->where('id_khach_hang', $khachHang->id)
            ->first();
        if (!$diaChi) {
            return response()->json([
                'status' => false,
                'message' => "Địa chỉ chưa được chọn"
            ]);
        } else if (count($request->ds_mua_sp) < 1) {
            return response()->json([
                'status' => false,
                'message' => "Giỏ hàng chưa có sản phẩm"
            ]);
        }else if (!$request->filled('phuong_thuc')) {
            return response()->json([
                'status' => false,
                'message' => "Phương Thức Thanh Toán Chưa Được Chọn"
            ]);
        } else {
            $DonHang = DonHang::create([
                'ma_don_hang'           =>  'Em chưa có, chờ xíu',
                'id_khach_hang'         =>  $khachHang->id,
                'id_dia_chi'            =>  $request->id_dia_chi,
                'tong_tien'             =>  $request->tong_tien,
                'ma_code_giam'          =>  $request->ma_code_giam,
                'so_tien_giam'          =>  $request->so_tien_giam,
                'so_tien_thanh_toan'    =>  $request->so_tien_thanh_toan,
                'phuong_thuc'           =>  $request->phuong_thuc,
            ]);
        }
        $DonHang->ma_don_hang    = 'EZ' . $DonHang->id;
        $DonHang->save();

        $tienThanhToan    = 0;

        foreach ($request->list_san_pham_can_mua as $key => $value) {
            $chiTiet    = ChiTietDonHang::where('id', $value)
                ->where('id_khach_hang', $khachHang->id)
                ->where('is_gio_hang', 1)
                ->first();
            if ($chiTiet) {
                $sanPham = SanPham::where('id', $chiTiet->id_san_pham)->first();
                $sanPham->so_luong = $sanPham->so_luong - $chiTiet->so_luong;
                $sanPham->save();
                $chiTiet->is_gio_hang   = 0;
                $chiTiet->id_don_hang   = $DonHang->id;
                $chiTiet->save();
            }
        }
        // Gửi mail
        $x['ho_ten']                    = $khachHang->ho_va_ten;
        $x['so_tien_thanh_toan']        = $request->so_tien_thanh_toan;
        $x['link_qr']                   = "https://img.vietqr.io/image/MBBank-1910061030119-qr_only.png?amount=" . $request->so_tien_thanh_toan . "&addInfo=EZ" . $DonHang->id;
        $x['ds_for']    =  ChiTietDonHang::where('id_khach_hang', $khachHang->id)
            ->where('id_don_hang', $DonHang->id)
            ->where('is_gio_hang', 0)
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->select('chi_tiet_don_hangs.*', 'san_phams.hinh_anh',)
            ->get();
        if ($DonHang->phuong_thuc == 0) {

            Mail::to($khachHang->email)->send(new MasterMail('Xác Nhận Đơn Hàng Thanh Toán Online', 'xac_nhan_don_hang', $x));

            return response()->json([
                'status'    =>  true,
                'message'   =>  'Mua hàng thành công! <br> vui long kiểm tra mail để thanh toán!'
            ]);
        } else {
            Mail::to($khachHang->email)->send(new MasterMail('Xác Nhận Đơn Hàng Thanh Toán COD', 'xac_nhan_don_hang_cod', $x));

            return response()->json([
                'status'    =>  true,
                'message'   =>  'Mua hàng thành công! <br> vui long kiểm tra mail để theo dõi đơn hàng!'
            ]);
        }
    }

    public function getDataLS()
    {
        $khachHang  = Auth::guard('sanctum')->user();
        $data = ChiTietDonHang::where('chi_tiet_don_hangs.id_khach_hang', $khachHang->id)
            ->join('don_hangs', 'chi_tiet_don_hangs.id_don_hang', 'don_hangs.id')
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->join('khach_hangs', 'chi_tiet_don_hangs.id_khach_hang', 'khach_hangs.id')
            ->join('dia_chis', 'khach_hangs.id', 'dia_chis.id_khach_hang')
            ->join('dai_lys', 'chi_tiet_don_hangs.id_dai_ly', 'dai_lys.id')
            ->select('don_hangs.ma_don_hang', 'don_hangs.is_thanh_toan','don_hangs.phuong_thuc', 'san_phams.ten_san_pham', 'san_phams.slug_san_pham', ("san_phams.id as id_san_pham"), 'dai_lys.ten_doanh_nghiep', 'dia_chis.ten_nguoi_nhan', 'dia_chis.dia_chi', 'dia_chis.so_dien_thoai', 'chi_tiet_don_hangs.*')
            ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function getDataLSDL()
    {
        $daiLy  = Auth::guard('sanctum')->user();
        $data = ChiTietDonHang::where('chi_tiet_don_hangs.id_dai_ly', $daiLy->id)
            ->join('don_hangs', 'chi_tiet_don_hangs.id_don_hang', 'don_hangs.id')
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->join('khach_hangs', 'chi_tiet_don_hangs.id_khach_hang', 'khach_hangs.id')
            ->join('dia_chis', 'khach_hangs.id', 'dia_chis.id_khach_hang')
            ->join('dai_lys', 'chi_tiet_don_hangs.id_dai_ly', 'dai_lys.id')
            ->select('don_hangs.ma_don_hang', 'don_hangs.is_thanh_toan', 'don_hangs.phuong_thuc','san_phams.ten_san_pham', 'dai_lys.ten_doanh_nghiep', 'dia_chis.ten_nguoi_nhan', 'dia_chis.dia_chi', 'dia_chis.so_dien_thoai', 'chi_tiet_don_hangs.*')
            ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function changeStatusLSDL(Request $request)
    {
        $daiLy = Auth::guard('sanctum')->user();
        $ctdh = ChiTietDonHang::where('id', $request->id)
            ->where('id_dai_ly', $daiLy->id)
            ->first();

        if (!$ctdh) {
            return response()->json([
                'status'  => false,
                'message' => 'Có lỗi xảy ra!'
            ]);
        }

        $donHang = DonHang::where('id', $ctdh->id_don_hang)->first();

        if (!$donHang) {
            return response()->json([
                'status'  => false,
                'message' => 'Đơn hàng không tồn tại!'
            ]);
        }

        if ($donHang->is_thanh_toan == 1) {
            if ($request->tinh_trang == 4) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Đơn Hàng Đã Thanh Toán Không Thể Hủy!'
                ]);
            } else {
                $ctdh->tinh_trang = $request->tinh_trang;
                $sanPham = SanPham::where('id', $ctdh->id_san_pham)->first();

                if ($sanPham) {
                    $sanPham->so_luong += $ctdh->so_luong;
                    $sanPham->save();
                }

                $ctdh->save();

                return response()->json([
                    'status'  => true,
                    'message' => 'Đổi tình trạng đơn hàng thành công!'
                ]);
            }
        }

        if ($request->tinh_trang == 4) {
            $ctdh->tinh_trang = $request->tinh_trang;
            $sanPham = SanPham::where('id', $ctdh->id_san_pham)->first();

            if ($sanPham) {
                $sanPham->so_luong += $ctdh->so_luong;
                $sanPham->save();
            }

            $ctdh->save();

            return response()->json([
                'status'  => true,
                'message' => 'Đổi tình trạng đơn hàng thành công!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Đơn Hàng Chưa Được Thanh Toán!'
        ]);
    }


    public function getDataLSAD()
    {
        $data = ChiTietDonHang::join('don_hangs', 'chi_tiet_don_hangs.id_don_hang', 'don_hangs.id')
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->join('khach_hangs', 'chi_tiet_don_hangs.id_khach_hang', 'khach_hangs.id')
            ->join('dia_chis', 'khach_hangs.id', 'dia_chis.id_khach_hang')
            ->join('dai_lys', 'chi_tiet_don_hangs.id_dai_ly', 'dai_lys.id')
            ->select('don_hangs.ma_don_hang', 'don_hangs.is_thanh_toan','don_hangs.phuong_thuc', 'san_phams.ten_san_pham', 'dai_lys.ten_doanh_nghiep', 'dia_chis.ten_nguoi_nhan', 'dia_chis.dia_chi', 'dia_chis.so_dien_thoai', 'chi_tiet_don_hangs.*')
            ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }
}
