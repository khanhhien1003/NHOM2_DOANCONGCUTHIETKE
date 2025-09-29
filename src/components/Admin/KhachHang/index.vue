<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Khách Hàng</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Trạng Thái</th>
                                <th>Kích Hoạt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list" :key="index">
                                <tr class="align-middle">
                                    <th class="text-center">{{ index + 1 }}</th>
                                    <td>{{ value.ho_va_ten }}</td>
                                    <td>{{ value.email }}</td>
                                    <td class="text-center">{{ value.so_dien_thoai }}</td>
                                    <td class="text-center">
                                        <button v-if="value.is_block" class="btn btn-success me-1"
                                            v-on:click="actionDoiTrangThaiTaiKhoan(value)">
                                            Hoạt Động
                                        </button>
                                        <button v-else class="btn btn-danger me-1"
                                            v-on:click="actionDoiTrangThaiTaiKhoan(value)">
                                            Tạm Tắt
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button v-if="value.is_active == 0" class="btn btn-warning me-1"
                                            v-on:click="actionKichHoatTaiKhoan(value)">
                                            Chưa Kích Hoạt
                                        </button>
                                        <button v-else class="btn btn-primary me-1">
                                            Đã Kích Hoạt
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary me-1"
                                            v-on:click="Object.assign(edit_khach_hang, value)" data-bs-toggle="modal"
                                            data-bs-target="#capNhatKhachhangModal">Cập Nhật</button>
                                        <button class="btn btn-danger"
                                            v-on:click="Object.assign(delete_khach_hang, value)" data-bs-toggle="modal"
                                            data-bs-target="#xoaKhachhangModal">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="capNhatKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Họ và Tên</label>
                        <input v-model="edit_khach_hang.ho_va_ten" type="text" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Email</label>
                        <input v-model="edit_khach_hang.email" type="email" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Số Điện Thoại</label>
                        <input v-model="edit_khach_hang.so_dien_thoai" type="text" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        v-on:click="actionCapNhatTaiKhoan()">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="xoaKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Cảnh Báo!</h6>
                                <div class="text-white">Bạn Có chắc chắn xóa tài khoản <b>{{ delete_khach_hang.ho_va_ten
                                        }}</b> này không!</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        v-on:click="actionXoaTaiKhoan()">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list: [],
            edit_khach_hang: {},
            delete_khach_hang: {},
        }
    },
    mounted() {
        this.loadDataKhachHang();
    },
    methods: {
        loadDataKhachHang() {
            axios
                .get('http://127.0.0.1:8000/api/admin/khach-hang/data', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },

        actionKichHoatTaiKhoan(value) {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/kich-hoat-tai-khoan', value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataKhachHang();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },

        actionDoiTrangThaiTaiKhoan(value) {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/doi-trang-thai', value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataKhachHang();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },

        actionCapNhatTaiKhoan() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/update', this.edit_khach_hang, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataKhachHang();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },

        actionXoaTaiKhoan() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/delete', this.delete_khach_hang, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataKhachHang();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
    },
}
</script>
<style></style>