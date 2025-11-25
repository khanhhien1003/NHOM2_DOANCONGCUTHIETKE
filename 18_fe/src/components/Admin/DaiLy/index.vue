<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6><b>DANH SÁCH ĐẠI LÝ</b></h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Thêm Mới
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Họ Và Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số Điện Thoại</th>
                                <th class="text-center">Ngày Sinh</th>
                                <th class="text-center">Tên Doanh Nghiệp</th>
                                <th class="text-center">Mã Số Thuế</th>
                                <th class="text-center">Địa Chỉ Kinh Doanh</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">VIP</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_dai_ly" :key="index">
                                <tr>
                                    <th class="align-middle text-center">{{ index + 1 }}</th>
                                    <td class="align-middle">{{ value.ho_va_ten }}</td>
                                    <td class="align-middle">{{ value.email }}</td>
                                    <td class="align-middle">{{ value.so_dien_thoai }}</td>
                                    <td class="align-middle text-center">{{ value.ngay_sinh }}</td>
                                    <td class="align-middle">{{ value.ten_doanh_nghiep }}</td>
                                    <td class="align-middle">{{ value.ma_so_thue }}</td>
                                    <td class="align-middle">{{ value.dia_chi_kinh_doanh }}</td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="changeTrangThai(value)" v-if="value.is_active == 1" class="btn btn-success w-100">Đã Kích
                                            Hoạt</button>
                                        <button v-on:click="changeTrangThai(value)" v-else class="btn btn-danger w-100">Chưa Kích Hoạt</button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="changeVip(value)" v-if="value.is_vip == 1" class="btn btn-success w-100">Mở</button>
                                        <button v-on:click="changeVip(value)" v-else class="btn btn-danger w-100">Đóng</button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="Object.assign(edit_dai_ly, value)"
                                            class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#capnhatDM">Cập nhật</button>
                                        <button v-on:click="del_dai_ly = value" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#delModal">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Đại Lý</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Họ Và Tên</label>
                            <input v-model="create_dai_ly.ho_va_ten" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Email</label>
                            <input v-on:blur="checkMail()" v-model="create_dai_ly.email" type="email"
                                class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Số Điện Thoại</label>
                            <input v-model="create_dai_ly.so_dien_thoai" type="tel" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Ngày Sinh</label>
                            <input v-model="create_dai_ly.ngay_sinh" type="date" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Password</label>
                            <input v-model="create_dai_ly.password" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Tên Doanh Nghiệp</label>
                            <input v-model="create_dai_ly.ten_doanh_nghiep" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Mã Số Thuế</label>
                            <input v-model="create_dai_ly.ma_so_thue" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Địa Chỉ Kinh Doanh</label>
                            <input v-model="create_dai_ly.dia_chi_kinh_doanh" type="text" class="form-control mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button v-if="is_them_moi == 0" class="btn btn-danger" disabled>Thêm Mới</button>
                        <button v-else v-on:click="themMoiDaiLy()" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Đại Lý</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Bạn có chắc muốn xóa đại lý <b class="text-danger">{{ del_dai_ly.ho_va_ten }}</b> này
                            không?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="xoaDaiLy()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Xác
                            nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="capnhatDM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật Đại Lý</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Họ Và Tên</label>
                            <input v-model="edit_dai_ly.ho_va_ten" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Email</label>
                            <input v-model="edit_dai_ly.email" type="email" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Số Điện Thoại</label>
                            <input v-model="edit_dai_ly.so_dien_thoai" type="tel" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Ngày Sinh</label>
                            <input v-model="edit_dai_ly.ngay_sinh" type="date" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Tên Doanh Nghiệp</label>
                            <input v-model="edit_dai_ly.ten_doanh_nghiep" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Mã Số Thuế</label>
                            <input v-model="edit_dai_ly.ma_so_thue" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2">
                            <label>Địa Chỉ Kinh Doanh</label>
                            <input v-model="edit_dai_ly.dia_chi_kinh_doanh" type="text" class="form-control mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="capnhatDaiLy()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Cập
                            nhật</button>
                    </div>
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
            list_dai_ly: [],
            create_dai_ly: {},
            del_dai_ly: {},
            is_them_moi: 0,
            edit_dai_ly: {},
        }
    },
    mounted() {
        this.layDataDaiLy();
    },
    methods: {
        checkMail() {
            axios
                .post("http://127.0.0.1:8000/api/admin/dai-ly/check-mail", this.create_dai_ly, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        this.is_them_moi = res.data.status;
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                    } else {
                        this.$toast.error(thong_bao);
                    }
                })
        },
        layDataDaiLy() {
            axios
                .get("http://127.0.0.1:8000/api/admin/dai-ly/data", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    this.list_dai_ly = res.data.data;
                })
        },
        themMoiDaiLy() {
            axios
                .post("http://127.0.0.1:8000/api/admin/dai-ly/create", this.create_dai_ly, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.create_dai_ly = {},
                            this.layDataDaiLy();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
        capnhatDaiLy() {
            axios
                .post("http://127.0.0.1:8000/api/admin/dai-ly/update", this.edit_dai_ly, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.layDataDaiLy();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
        xoaDaiLy() {
            axios
                .post("http://127.0.0.1:8000/api/admin/dai-ly/delete", this.del_dai_ly, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.layDataDaiLy();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },

        changeTrangThai(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/dai-ly/doi-trang-thai", value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.layDataDaiLy();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },

        changeVip(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/dai-ly/doi-trang-thai-vip", value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.layDataDaiLy();
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