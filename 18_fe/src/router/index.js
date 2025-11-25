import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save
import kiemTraAdmin from "./kiemTraAdmin";
import kiemTraDaiLy from "./kiemTraDaiLy";
import kiemTraKhachHang from "./kiemTraKhachHang";

const routes = [
    {
        path: '/dai-ly/kich-hoat/:id_dai_ly',
        component: () => import('../components/DaiLy/KichHoat/index.vue'),
        meta: { layout: 'blank' },
        props: true
    },
    {
        path: '/dai-ly/doi-mat-khau/:id_dai_ly',
        component: () => import('../components/DaiLy/LayLaiMatKhau/index.vue'),
        meta: { layout: 'blank' },
        props: true
    },
    {
        path: '/khach-hang/kich-hoat/:id_khach_hang',
        component: () => import('../components/KhachHang/KichHoat/index.vue'),
        meta: { layout: 'blank' },
        props: true
    },
    {
        path: '/khach-hang/doi-mat-khau/:id_khach_hang',
        component: () => import('../components/KhachHang/LayLaiMatKhau/index.vue'),
        meta: { layout: 'blank' },
        props: true
    },
    {
        path: '/',
        component: () => import('../components/TrangChu/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/admin/danh-muc',
        component: () => import('../components/Admin/DanhMuc/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/san-pham',
        component: () => import('../components/Admin/SanPham/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/thong-ke',
        component: () => import('../components/Admin/ThongKe/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/dai-ly',
        component: () => import('../components/Admin/DaiLy/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/nhan-vien',
        component: () => import('../components/Admin/NhanVien/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/khach-hang',
        component: () => import('../components/Admin/KhachHang/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/profile',
        component: () => import('../components/Admin/Profile/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/ma-giam-gia',
        component: () => import('../components/Admin/MaGiamGia/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/phan-quyen',
        component: () => import('../components/Admin/PhanQuyen/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/thong-ke',
        component: () => import('../components/Admin/ThongKe/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/don-hang',
        component: () => import('../components/Admin/DonHang/index.vue'),
        beforeEnter: kiemTraAdmin,
    },
    {
        path: '/admin/dang-nhap',
        component: () => import('../components/Admin/DangNhap/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dai-ly/dang-ky',
        component: () => import('../components/DaiLy/DangKy/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dai-ly/dang-nhap',
        component: () => import('../components/DaiLy/DangNhap/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dai-ly/quen-mat-khau',
        component: () => import('../components/DaiLy/QuenMatKhau/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dai-ly/lay-lai-mat-khau',
        component: () => import('../components/DaiLy/LayLaiMatKhau/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dai-ly/san-pham',
        component: () => import('../components/DaiLy/SanPham/index.vue'),
        meta: { layout: 'daily' },
        beforeEnter: kiemTraDaiLy,
    },
    {
        path: '/dai-ly/nhap-kho',
        component: () => import('../components/DaiLy/NhapKho/index.vue'),
        meta: { layout: 'daily' },
        beforeEnter: kiemTraDaiLy,
    },
    {
        path: '/dai-ly/profile',
        component: () => import('../components/DaiLy/Profile/index.vue'),
        meta: { layout: 'daily' },
        beforeEnter: kiemTraDaiLy,
    },
    {
        path: '/dai-ly/in-hoa-don',
        component: () => import('../components/DaiLy/HoaDon/index.vue'),
        meta: { layout: 'blank' },
        beforeEnter: kiemTraDaiLy
    },
    {
        path: '/dai-ly/don-hang',
        component: () => import('../components/DaiLy/DonHang/index.vue'),
        meta: { layout: 'daily' },
        beforeEnter: kiemTraDaiLy,
    },
    {
        path: '/khach-hang/dang-nhap',
        component: () => import('../components/KhachHang/DangNhap/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/khach-hang/dang-ky',
        component: () => import('../components/KhachHang/DangKy/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/khach-hang/quen-mat-khau',
        component: () => import('../components/KhachHang/QuenMatKhau/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/khach-hang/lay-lai-mat-khau',
        component: () => import('../components/KhachHang/LayLaiMatKhau/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/khach-hang/profile',
        component: () => import('../components/KhachHang/Profile/index.vue'),
        meta: { layout: 'client' },
        beforeEnter: kiemTraKhachHang,
    },
    {
        path: '/tim-kiem/:thong_tin',
        component: () => import('../components/TrangChu/TimKiem/index.vue'),
        meta: { layout: 'client' },
        name: 'name_tim_kiem',
        props: true
    },
    {
        path: '/chi-tiet-san-pham/:id_san_pham-:slug_san_pham',
        component: () => import('../components/TrangChu/ChiTietSanPham/index.vue'),
        meta: { layout: 'client' },
        props: true
    },
    {
        path: '/danh-muc-san-pham/:id_danh_muc-:slug_danh_muc',
        component: () => import('../components/TrangChu/DanhMucSanPham/index.vue'),
        meta: { layout: 'client' },
        props: true
    },
    {
        path: '/dai-ly-san-pham/:id_dai_ly',
        component: () => import('../components/TrangChu/DaiLySanPham/index.vue'),
        meta: { layout: 'client' },
        props: true
    },
    {
        path: '/khach-hang/gio-hang',
        component: () => import('../components/KhachHang/GioHang/index.vue'),
        meta: { layout: 'client' },
        name: 'gioHang',
        beforeEnter: kiemTraKhachHang
    },
    {
        path: '/khach-hang/don-hang',
        component: () => import('../components/KhachHang/DonHang/index.vue'),
        meta: { layout: 'client' },
        beforeEnter: kiemTraKhachHang
    },
    {
        path: '/khach-hang/in-hoa-don',
        component: () => import('../components/KhachHang/HoaDon/index.vue'),
        name: 'InHoaDon',
        meta: { layout: 'blank' },
        beforeEnter: kiemTraKhachHang
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router