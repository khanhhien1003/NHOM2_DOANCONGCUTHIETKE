<?php

use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\ChiTietPhanQuyenController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\DaiLyController;
use App\Http\Controllers\DaiLyNhapKhoController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GiaoDichController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SanPhamDaiLyController;
use App\Http\Controllers\ThongKeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/khach-hang/dang-xuat', [KhachHangController::class, 'logout']);
Route::post('/khach-hang/dang-xuat-all', [KhachHangController::class, 'logoutAll']);


Route::get('/giao-dich', [GiaoDichController::class, 'index']);
Route::get('/text', [GiaoDichController::class, 'convertToId']);

Route::get('/danh-muc/data-open', [DanhMucController::class, 'getDataOpen']);
Route::get('/danh-muc', [DanhMucController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/admin/danh-muc', [DanhMucController::class, 'store'])->middleware("NhanVienMiddle");
Route::post('/admin/danh-muc/delete', [DanhMucController::class, 'destroy'])->middleware("NhanVienMiddle");
Route::post('/admin/danh-muc/checkSlug', [DanhMucController::class, 'checkSlug'])->middleware("NhanVienMiddle");
Route::post('/admin/danh-muc-update', [DanhMucController::class, 'update'])->middleware("NhanVienMiddle");
Route::post('/admin/danh-muc/doi-trang-thai', [DanhMucController::class, 'changeStatus'])->middleware("NhanVienMiddle");

Route::get('/san-pham/data-flash-sale', [SanPhamController::class, 'getDataFlashSale']);
Route::get('/san-pham/data-noi-bat', [SanPhamController::class, 'getDataNoiBat']);
Route::get('/san-pham/data-new', [SanPhamController::class, 'getDataNew']);
Route::get('/san-pham', [SanPhamController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham', [SanPhamController::class, 'store'])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham/tim-kiem', [SanPhamController::class, 'search'])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham/delete', [SanPhamController::class, 'xoaSP'])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham-sua', [SanPhamController::class, 'update'])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham/checkSlug', [SanPhamController::class, "checkSlug"])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham/chuyen-trang-thai-ban', [SanPhamController::class, "chuyenTrangThaiBan"])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham/chuyen-noi-bat', [SanPhamController::class, "chuyenNoiBat"])->middleware("NhanVienMiddle");
Route::post('/admin/san-pham/chuyen-flash-sale', [SanPhamController::class, "chuyenFlashSale"])->middleware("NhanVienMiddle");

Route::get('/admin/dai-ly/data', [DaiLyController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/admin/dai-ly/create', [DaiLyController::class, 'store'])->middleware("NhanVienMiddle");
Route::post('/admin/dai-ly/delete', [DaiLyController::class, 'destroy'])->middleware("NhanVienMiddle");
Route::post('/admin/dai-ly/check-mail', [DaiLyController::class, 'checkMail'])->middleware("NhanVienMiddle");
Route::post('/admin/dai-ly/update', [DaiLyController::class, 'update'])->middleware("NhanVienMiddle");
Route::post('/admin/dai-ly/doi-trang-thai', [DaiLyController::class, 'changeStatus'])->middleware("NhanVienMiddle");
Route::post('/admin/dai-ly/doi-trang-thai-vip', [DaiLyController::class, 'changeVip'])->middleware("NhanVienMiddle");

Route::get('/admin/nhan-vien/data', [NhanVienController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/admin/nhan-vien/create', [NhanVienController::class, 'store'])->middleware("NhanVienMiddle");
Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'destroy'])->middleware("NhanVienMiddle");
Route::post('/admin/nhan-vien/check-mail', [NhanVienController::class, 'checkMail'])->middleware("NhanVienMiddle");
Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'update'])->middleware("NhanVienMiddle");
Route::post('/admin/nhan-vien/doi-trang-thai', [NhanVienController::class, 'changeStatus'])->middleware("NhanVienMiddle");

Route::get('/admin/khach-hang/data', [KhachHangController::class, 'dataKhachHang'])->middleware("NhanVienMiddle");
Route::post('/admin/khach-hang/kich-hoat-tai-khoan', [KhachHangController::class, 'kichHoatTaiKhoan'])->middleware("NhanVienMiddle");
Route::post('/admin/khach-hang/doi-trang-thai', [KhachHangController::class, 'doiTrangThaiKhachHang'])->middleware("NhanVienMiddle");
Route::post('/admin/khach-hang/update', [KhachHangController::class, 'updateTaiKhoan'])->middleware("NhanVienMiddle");
Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'deleteTaiKhoan'])->middleware("NhanVienMiddle");

Route::post('/admin/thong-ke-1', [ThongKeController::class, 'thongKe1'])->middleware("NhanVienMiddle");

Route::get('/admin/ma-giam-gia/data', [MaGiamGiaController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/ma-giam-gia/kiem-tra',[MaGiamGiaController::class, 'kiemTraMaGiamGia']);
Route::get('/ma-giam-gia/data', [MaGiamGiaController::class, 'getDataOpen']);
Route::post('/admin/ma-giam-gia/create', [MaGiamGiaController::class, 'store'])->middleware("NhanVienMiddle");
Route::post('/admin/ma-giam-gia/update', [MaGiamGiaController::class, 'update'])->middleware("NhanVienMiddle");
Route::post('/admin/ma-giam-gia/doi-trang-thai', [MaGiamGiaController::class, 'doiTrangThai'])->middleware("NhanVienMiddle");
Route::post('/admin/ma-giam-gia/delete', [MaGiamGiaController::class, 'destroy'])->middleware("NhanVienMiddle");

Route::get('/admin/profile/data', [NhanVienController::class, 'getDataProfile'])->middleware("NhanVienMiddle");
Route::post('/admin/profile/update', [NhanVienController::class, 'updateProfile'])->middleware("NhanVienMiddle");

Route::get('/admin/phan-quyen/data', [PhanQuyenController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/admin/phan-quyen/create', [PhanQuyenController::class, 'createData'])->middleware("NhanVienMiddle");
Route::delete('/admin/phan-quyen/delete/{id}', [PhanQuyenController::class, 'deleteData'])->middleware("NhanVienMiddle");
Route::put('/admin/phan-quyen/update', [PhanQuyenController::class, 'UpateData'])->middleware("NhanVienMiddle");
Route::post('/admin/phan-quyen/tim-kiem', [PhanQuyenController::class, 'search'])->middleware("NhanVienMiddle");

Route::get('/admin/chuc-nang/data', [ChucNangController::class, 'getData'])->middleware("NhanVienMiddle");

Route::post('/admin/chi-tiet-phan-quyen/cap-quyen', [ChiTietPhanQuyenController::class, 'capQuyen'])->middleware("NhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/danh-sach', [ChiTietPhanQuyenController::class, 'getData'])->middleware("NhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/xoa-quyen', [ChiTietPhanQuyenController::class, 'xoaQuyen'])->middleware("NhanVienMiddle");

Route::get('/admin/lich-su-don-hang', [DonHangController::class, 'getDataLSAD'])->middleware("NhanVienMiddle");

Route::get('/dai-ly/san-pham/data', [SanPhamDaiLyController::class, 'getData'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/san-pham/create', [SanPhamDaiLyController::class, 'store'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/san-pham/delete', [SanPhamDaiLyController::class, 'xoaSP'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/san-pham/update', [SanPhamDaiLyController::class, 'update'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/san-pham/chuyen-trang-thai-ban', [SanPhamDaiLyController::class, "chuyenTrangThaiBan"])->middleware("DaiLyMiddle");

Route::post('/dai-ly/nhap-kho/create', [DaiLyNhapKhoController::class, 'store'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/nhap-kho/delete', [DaiLyNhapKhoController::class, 'destroy'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/nhap-kho/update', [DaiLyNhapKhoController::class, 'update'])->middleware("DaiLyMiddle");
Route::get('/dai-ly/nhap-kho/data-nhap', [DaiLyNhapKhoController::class, 'getData'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/nhap-kho/change', [DaiLyNhapKhoController::class, 'change'])->middleware("DaiLyMiddle");

Route::post('/nhan-vien/dang-nhap', [NhanVienController::class, 'dangNhap']);
Route::post('/dai-ly/dang-nhap', [DaiLyController::class, 'dangNhap']);
Route::post('/dai-ly/dang-ky', [DaiLyController::class, 'dangKy']);
Route::post('/dai-ly/kich-hoat', [DaiLyController::class, 'kichHoat']);
Route::post('/dai-ly/quen-mat-khau', [DaiLyController::class, 'quenMK']);
Route::post('/dai-ly/doi-mat-khau', [DaiLyController::class, 'doiMK']);
Route::get('/dai-ly/profile/data', [DaiLyController::class, 'getDataProfile'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/profile/update', [DaiLyController::class, 'updateProfile'])->middleware("DaiLyMiddle");
Route::get('/dai-ly/lich-su-don-hang', [DonHangController::class, 'getDataLSDL'])->middleware("DaiLyMiddle");
Route::post('/dai-ly/lich-su-don-hang/change-status', [DonHangController::class, 'changeStatusLSDL'])->middleware("DaiLyMiddle");

Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/khach-hang/kich-hoat', [KhachHangController::class, 'kichHoat']);
Route::post('/khach-hang/quen-mat-khau', [KhachHangController::class, 'quenMK']);
Route::post('/khach-hang/doi-mat-khau', [KhachHangController::class, 'doiMK']);
Route::get('/khach-hang/profile/data', [KhachHangController::class, 'getDataProfile'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/profile/update', [KhachHangController::class, 'updateProfile'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/dia-chi/data', [DiaChiController::class, 'getData'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/create', [DiaChiController::class, 'store'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/update', [DiaChiController::class, 'update'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/delete', [DiaChiController::class, 'destroy'])->middleware("KhachHangMiddle");

Route::post('/khach-hang/gio-hang/create', [ChiTietDonHangController::class, 'store'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/gio-hang/data', [ChiTietDonHangController::class, 'getGioHang'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/gio-hang/delete', [ChiTietDonHangController::class, 'deleteGioHang'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/gio-hang/update', [ChiTietDonHangController::class, 'updateGioHang'])->middleware("KhachHangMiddle");

Route::post('/khach-hang/don-hang/create', [DonHangController::class, 'store'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/lich-su-don-hang', [DonHangController::class, 'getDataLS'])->middleware("KhachHangMiddle");

Route::post('/khach-hang/danh-gia/create', [DanhGiaController::class, 'store'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/danh-gia/data', [DanhGiaController::class, 'getData']);

Route::get('/kiem-tra-admin', [NhanVienController::class, 'kiemTraAdmin']);
Route::get('/kiem-tra-daily', [DaiLyController::class, 'kiemTraDaiLy']);
Route::get('/kiem-tra-khachhang', [KhachHangController::class, 'kiemTraKhachHang']);

Route::get('/chi-tiet-san-pham/{id}', [SanPhamController::class, 'layThongTinSanPham']);
Route::get('/thong-tin-san-pham-tu-danh-muc/{id}', [SanPhamController::class, 'layThongTinSanPhamTuDanhMuc']);
Route::get('/dai-ly-san-pham/{id}', [SanPhamController::class, 'layThongTinSanPhamDaiLy']);

Route::post('/san-pham/tim-kiem', [SanPhamController::class, 'searchNguoiDung']);

