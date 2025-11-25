<?php

namespace App\Http\Controllers;

use App\Http\Requests\DaiLyDangKyRequest;
use App\Http\Requests\DaiLyDangNhapRequest;
use App\Http\Requests\DaiLyDoiMatKhauRequest;
use App\Mail\MasterMail;
use App\Models\ChiTietPhanQuyen;
use App\Models\DaiLy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DaiLyController extends Controller
{
    public function getData()
    {
        
        $id_chuc_nang = 15;
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
        $data = DaiLy::get(); //Nghia la lay ra

        return response()->json([
            'data' => $data
        ]);
    }
    public function store(Request $request)
    {
        
        $id_chuc_nang = 16;
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
        DaiLy::create([
            'ho_va_ten' => $request->ho_va_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh' => $request->ngay_sinh,
            'password' => bcrypt($request->password),
            'ten_doanh_nghiep' => $request->ten_doanh_nghiep,
            'ma_so_thue' => $request->ma_so_thue,
            'dia_chi_kinh_doanh' => $request->dia_chi_kinh_doanh,

        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã tạo mới đại lý " . $request->ho_va_ten . " thành công.",
        ]);
    }
    public function destroy(Request $request)
    {
        
        $id_chuc_nang = 17;
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
        DaiLy::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa đại lý" . $request->ho_va_ten . " thành công.",
        ]);
    }
    public function checkMail(Request $request)
    {
        
        $id_chuc_nang = 21;
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
        $email = $request->email;
        $check = DaiLy::where('email', $email)->first();
        if ($check) {
            return response()->json([
                'status' => false,
                'message' => "Email này đã tồn tại.",
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Có thể thêm đại lý này.",
            ]);
        }
    }
    public function update(Request $request)
    {
        
        $id_chuc_nang = 18;
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
        DaiLy::find($request->id)->update([
            'ho_va_ten' => $request->ho_va_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh' => $request->ngay_sinh,
            'ten_doanh_nghiep' => $request->ten_doanh_nghiep,
            'ma_so_thue' => $request->ma_so_thue,
            'dia_chi_kinh_doanh' => $request->dia_chi_kinh_doanh,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã update đại lý" . $request->ho_va_ten . " thành công.",
        ]);
    }

    public function dangNhap(DaiLyDangNhapRequest $request)
    {
        $check  =   Auth::guard('daily')->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if ($check) {
            // Lấy thông tin tài khoản đã đăng nhập thành công
            $daiLy  =   Auth::guard('daily')->user(); // Lấy được thông tin đại lý đã đăng nhập

            return response()->json([
                'status'    => true,
                'message'   => "Đã đăng nhập thành công!",
                'token'     => $daiLy->createToken('token_dai_ly')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Tài khoản hoặc mật khẩu không đúng!",
            ]);
        }
    }

    public function kiemTraDaiLy()
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        if($tai_khoan_dang_dang_nhap && $tai_khoan_dang_dang_nhap instanceof \App\Models\DaiLy) {
            return response()->json([
                'status'    =>  true
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn cần đăng nhập hệ thống trước'
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        
        $id_chuc_nang = 19;
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
        $daiLy = DaiLy::where('id', $request->id)->first();

        if($daiLy) {
            if($daiLy->is_active == 0) {
                $daiLy->is_active = 1;
            } else {
                $daiLy->is_active = 0;
            }
            $daiLy->save();

            return response()->json([
                'status'    => true,
                'message'   => "Đã cập nhật trạng thái đại lý thành công!"
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Đại lý không tồn tại!"
            ]);
        }
    }

    public function changeVip(Request $request)
    {
        
        $id_chuc_nang = 20;
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
        $daiLy = DaiLy::where('id', $request->id)->first();

        if($daiLy) {
            if($daiLy->is_vip == 0) {
                $daiLy->is_vip = 1;
            } else {
                $daiLy->is_vip = 0;
            }
            $daiLy->save();

            return response()->json([
                'status'    => true,
                'message'   => "Đã cập nhật trạng thái VIP đại lý thành công!"
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Đại lý không tồn tại!"
            ]);
        }
    }

    public function dangKy(DaiLyDangKyRequest $request)
    {
        $daiLy = DaiLy::create([
            'ho_va_ten'             =>  $request->ho_va_ten,
            'email'                 =>  $request->email,
            'so_dien_thoai'         =>  $request->so_dien_thoai,
            'ngay_sinh'             =>  $request->ngay_sinh,
            'password'              =>  bcrypt($request->password),
            'ten_doanh_nghiep'      =>  $request->ten_doanh_nghiep,
            'ma_so_thue'            =>  $request->ma_so_thue,
            'dia_chi_kinh_doanh'    =>  $request->dia_chi_kinh_doanh,
        ]);

        $data['ho_va_ten']  = $request->ho_va_ten;
        $data['link']       = 'http://localhost:5173/dai-ly/kich-hoat/' . $daiLy->id;

        Mail::to($request->email)->send(new MasterMail('Kích Hoạt Tài Khoản Đại Lý', 'dai_ly_dang_ky', $data));

        return response()->json([
            'message'  =>   'Đã đăng ký tài khoản thành công!',
            'status'   =>   true
        ]);
    }

    public function getDataProfile() 
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        return response()->json([
            'data'    =>  $tai_khoan_dang_dang_nhap
        ]);
    }

    public function updateProfile(Request $request)
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        $check = DaiLy::where('id', $tai_khoan_dang_dang_nhap->id)->update([
            'ho_va_ten'             =>  $request->ho_va_ten,
            'email'                 =>  $request->email,
            'so_dien_thoai'         =>  $request->so_dien_thoai,
            'ngay_sinh'             =>  $request->ngay_sinh,
            'ten_doanh_nghiep'      =>  $request->ten_doanh_nghiep,
            'ma_so_thue'            =>  $request->ma_so_thue,
            'dia_chi_kinh_doanh'    =>  $request->dia_chi_kinh_doanh,
        ]);

        if($check) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Cập nhật profile thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Cập nhật thất bại'
            ]);
        }
    }

    public function kichHoat(Request $request)
    {
        $dai_ly = DaiLy::where('id', $request->id_dai_ly)->first();
        if ($dai_ly && $dai_ly->is_active == 0) {
            $dai_ly->is_active = 1;
            $dai_ly->save();

            return response()->json([
                'status'    =>  true,
                'message'   =>  'Đã kích hoạt tài khoản đại lý thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Liên kết không tồn tại'
            ]);
        }
    }
    public function quenMK(Request $request)
    {
        $dai_ly = DaiLy::where('email', $request->email)->first();
        if($dai_ly){
            $hash_reset         = Str::uuid();
            $x['ho_va_ten']     = $dai_ly->ho_va_ten;
            $x['link']          = 'http://localhost:5173/dai-ly/doi-mat-khau/' . $hash_reset;
            Mail::to($request->email)->send(new MasterMail('Đổi Mật Khẩu Của Đại Lý', 'dai_ly_quen_mat_khau', $x));
            $dai_ly->hash_reset = $hash_reset;
            $dai_ly->save();
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Vui Lòng kiểm tra lại email'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Email không có trong hệ thống'
            ]);
        }
    }

    public function doiMK(DaiLyDoiMatKhauRequest $request)
    {
        $daiLy           = DaiLy::where('hash_reset', $request->id)->first();
        $daiLy->password = bcrypt($request->password);
        $daiLy->hash_reset = NULL;
        $daiLy->save();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã đổi mật khẩu thành công'
        ]);
    }
}
