<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Danh Sách Đơn Hàng Đại Lý</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Tổng Tiền Thanh Toán</th>
                                <th>Phương Thức</th>
                                <th>Thanh Toán</th>
                                <th>Tình Trạng Đơn Hàng</th>
                                <th>In Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(v, k) in list" :key="k" class="align-middle">
                                <th>{{ k + 1 }}</th>
                                <td class="text-center">{{ v.ma_don_hang }}</td>
                                <td>{{ v.ten_san_pham }}</td>
                                <td>{{ v.ten_nguoi_nhan }}</td>
                                <td class="text-center">{{ v.so_dien_thoai }}</td>
                                <td>{{ v.dia_chi }}</td>
                                <td class="text-end">{{ v.thanh_tien }}</td>
                                <td class="text-center">
                                    <button v-if="v.phuong_thuc == 0" class="btn btn-success w-100">Thanh Toán Online</button>
                                    <button v-else class="btn btn-danger w-100">Thanh Toán COD</button>
                                </td>
                                <td class="text-center">
                                    <button v-if="v.is_thanh_toan == 1" class="btn btn-success w-100">Đã Thanh
                                        Toán</button>
                                    <button v-else class="btn btn-danger w-100">Chưa Thanh Toán</button>
                                </td>
                                <td class="text-center">
                                    <button @click="Object.assign(hoa_don = v)" v-if="v.tinh_trang == 0" class="btn btn-success w-100"
                                        data-bs-toggle="modal" data-bs-target="#tinhTrangModal">Đã Đặt Hàng</button>
                                    <button @click="Object.assign(hoa_don = v)" v-else-if="v.tinh_trang == 1" class="btn btn-warning w-100"
                                        data-bs-toggle="modal" data-bs-target="#tinhTrangModal">Đang Xử
                                        Lý</button>
                                    <button @click="Object.assign(hoa_don = v)" v-else-if="v.tinh_trang == 2" class="btn btn-info w-100"
                                        data-bs-toggle="modal" data-bs-target="#tinhTrangModal">Đang Vận
                                        Chuyển</button>
                                    <button v-else-if="v.tinh_trang == 3" class="btn btn-primary w-100">Đã Giao</button>
                                    <button v-else class="btn btn-danger w-100">Đã Hủy</button>
                                </td>
                                <td class="text-center">
                                    <button @click="openHoaDon(v)" class="btn btn-secondary"><i
                                            class="fa-solid fa-file-invoice-dollar"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="tinhTrangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tình Trạng Đơn Hàng</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check">
                                    <input v-model="hoa_don.tinh_trang" value="0" class="form-check-input" type="radio" name="flexRadioDefault" checked>
                                    <label class="form-check-label">Đã Đặt Hàng</label>
                                </div>
                                <div class="form-check">
                                    <input v-model="hoa_don.tinh_trang" value="1" class="form-check-input" type="radio" name="flexRadioDefault">
                                    <label class="form-check-label">Đang Xử Lý</label>
                                </div>
                                <div class="form-check">
                                    <input v-model="hoa_don.tinh_trang" value="2" class="form-check-input" type="radio" name="flexRadioDefault">
                                    <label class="form-check-label">Đang Vận Chuyển</label>
                                </div>
                                <div class="form-check">
                                    <input v-model="hoa_don.tinh_trang" value="3" class="form-check-input" type="radio" name="flexRadioDefault">
                                    <label class="form-check-label">Đã Giao Hàng</label>
                                </div>
                                <div class="form-check">
                                    <input v-model="hoa_don.tinh_trang" value="4" class="form-check-input" type="radio" name="flexRadioDefault">
                                    <label class="form-check-label">Đã Hủy</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button @click="changeStatus()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập Nhật</button>
                            </div>
                        </div>
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
            list: [],
            hoa_don : {}
        }
    },
    mounted() {
        this.layData();
    },
    methods: {
        layData() {
            axios
                .get("http://127.0.0.1:8000/api/dai-ly/lich-su-don-hang", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },

        changeStatus() {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/lich-su-don-hang/change-status", this.hoa_don, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.layData()
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.layData()
                    }
                })
        },

        openHoaDon(v) {
            const query = new URLSearchParams(v).toString();
            const url = `/dai-ly/in-hoa-don?${query}`;
            window.open(url, '_blank');
        },
    },
}
</script>
<style></style>