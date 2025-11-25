<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Lịch Sử Đơn Hàng</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Tên Đại Lý</th>
                                <th>Tên Người Nhận</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Tổng Tiền Thanh Toán</th>
                                <th>Phương Thức</th>
                                <th>Thanh Toán</th>
                                <th>Tình Trạng Đơn Hàng</th>
                                <th>Đánh Giá</th>
                                <th>In Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(v, k) in list" :key="k" class="align-middle">
                                <th>{{ k + 1 }}</th>
                                <td class="text-center">{{ v.ma_don_hang }}</td>
                                <td>{{ v.ten_san_pham }}</td>
                                <td>{{ v.ten_doanh_nghiep }}</td>
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
                                    <button v-if="v.tinh_trang == 0" class="btn btn-success w-100">Đã Đặt Hàng</button>
                                    <button v-else-if="v.tinh_trang == 1" class="btn btn-warning w-100">Đang Xử
                                        Lý</button>
                                    <button v-else-if="v.tinh_trang == 2" class="btn btn-info w-100">Đang Vận
                                        Chuyển</button>
                                    <button v-else-if="v.tinh_trang == 3" class="btn btn-primary w-100">Đã Giao</button>
                                    <button v-else class="btn btn-danger w-100">Đã Hủy</button>
                                </td>
                                <td v-if="v.tinh_trang == 3">
                                    <router-link :to="'/chi-tiet-san-pham/'+ v.id_san_pham + '-' + v.slug_san_pham">
                                        <button class="btn btn-success w-100">Đánh Giá</button>
                                    </router-link>
                                </td>
                                <td v-else>
                                        <button class="btn btn-success w-100" disabled>Đánh Giá</button>
                                </td>
                                <td class="text-center">
                                    <button @click="openHoaDon(v)" class="btn btn-secondary"><i
                                            class="fa-solid fa-file-invoice-dollar"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        }
    },
    mounted() {
        this.layData();
    },
    methods: {
        layData() {
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/lich-su-don-hang", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_khach_hang")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },

        openHoaDon(v) {
            const query = new URLSearchParams(v).toString();
            const url = `/khach-hang/in-hoa-don?${query}`;
            window.open(url, '_blank');
        },
    },
}
</script>
<style></style>