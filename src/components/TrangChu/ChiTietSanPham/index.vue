<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4 border-end">
                        <img v-bind:src="san_pham.hinh_anh"
                            style="    width: 100%; height: 500px; object-fit: contain; vertical-align: middle;"
                            class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ san_pham.ten_san_pham }}</h4>
                            <div class="d-flex gap-3 py-3">
                                <div class="cursor-pointer">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-secondary"></i>
                                </div>
                                <div>{{ dem }} reviews</div>
                                <div class="text-success"><i class="bx bxs-cart-alt align-middle"></i> {{ order }}
                                    orders</div>
                            </div>
                            <div class="mb-3">
                                <p class="mb-0  fw-bold">
                                    <span class="me-2 text-decoration-line-through text-secondary">{{ san_pham.gia_ban
                                        }}</span>
                                    <span>{{ san_pham.gia_khuyen_mai }}</span>
                                </p>
                            </div>
                            <p class="card-text fs-6">
                                {{ san_pham.mo_ta_ngan }}
                            </p>

                            <hr>
                            <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                                <div class="col">
                                    <label class="form-label">Số Lượng</label>
                                    <div class="input-group input-spinner">
                                        <button v-on:click="tru()" class="btn btn-white" type="button" id="button-plus">
                                            -
                                        </button>
                                        <input v-on:change="doi()" v-model="san_pham.so_luong_mua" type="number"
                                            class="form-control text-center" style="width: 100px; max-width: 100px;">
                                        <button v-on:click="cong()" class="btn btn-white" type="button"
                                            id="button-minus"> +
                                        </button>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="color-indigators d-flex align-items-center gap-2">
                                        <div class="color-indigator-item bg-primary"></div>
                                        <div class="color-indigator-item bg-danger"></div>
                                        <div class="color-indigator-item bg-success"></div>
                                        <div class="color-indigator-item bg-warning"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mt-3">
                                <a v-on:click="muaNgay()" class="btn btn-primary">Mua ngay</a>
                                <a v-on:click="themGioHang()" class="btn btn-outline-primary"><span class="text">Thêm
                                        vào giỏ
                                        hàng</span> <i class="bx bxs-cart-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bx-comment-detail font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title"> Mô Tả Sản Phẩm </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bx-star font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Đánh Giá</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                            {{ san_pham.mo_ta_chi_tiet }}
                        </div>
                        <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="input-group mb-3">
                                                <input v-model="danh_gia.noi_dung" v-on:keyup.enter="themDanhGia()"
                                                    type="text" class="form-control"
                                                    placeholder="Điền đánh giá của bạn!">
                                                <button @click="themDanhGia()" class="btn btn-primary">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <template v-for="(v, k) in list_danh_gia" :key="k">
                                                    <li class="d-flex align-items-center border-bottom pb-2">
                                                        <img v-bind:src="v.hinh_anh" class="rounded-circle p-1 border"
                                                            width="90" height="90" alt="...">
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="mt-0 mb-1">{{ v.ho_va_ten }}</h5>
                                                            {{ v.noi_dung }}
                                                        </div>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
    props: ['id_san_pham', 'slug_san_pham'],
    data() {
        return {
            id_san_pham: this.$route.params.id_san_pham,
            san_pham: {},
            list_danh_gia: [],
            danh_gia: {},
            so_danh_gia : 0,
            dem         : 0,
            order       : 0,
        }
    },
    mounted() {
        this.layThongTinSanPham();
        this.getDataCMT();
    },
    methods: {
        themDanhGia() {
            var payload = {
                'noi_dung' : this.danh_gia.noi_dung,
                'id_san_pham' : this.id_san_pham
            }
            axios
                .post('http://127.0.0.1:8000/api/khach-hang/danh-gia/create', payload, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.getDataCMT();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
        getDataCMT() {
            var payload = {
                'id_san_pham': this.id_san_pham
            }
            axios
                .post('http://127.0.0.1:8000/api/khach-hang/danh-gia/data', payload)
                .then((res) => {
                    this.list_danh_gia = res.data.data;
                    this.dem = res.data.dem;
                })
        },
        doi() {
            if (this.san_pham.so_luong_mua < 1) {
                var message = "Số lượng mua tối thiểu phải là 1 sản phẩm."
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + message + '<span>';
                this.$toast.warning(thong_bao);
                this.san_pham.so_luong_mua = 1;
            } else if (this.san_pham.so_luong_mua > this.san_pham.so_luong) {
                this.san_pham.so_luong_mua = this.san_pham.so_luong;
                var message = "Số lượng mua tối đa chỉ được " + this.san_pham.so_luong + " sản phẩm."
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + message + '<span>';
                this.$toast.warning(thong_bao);
            }
        },
        tru() {
            this.san_pham.so_luong_mua = this.san_pham.so_luong_mua * 1 - 1;
            if (this.san_pham.so_luong_mua < 1) {
                var message = "Số lượng mua tối thiểu phải là 1 sản phẩm."
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + message + '<span>';
                this.$toast.warning(thong_bao);
                this.san_pham.so_luong_mua = 1;
            }
        },
        cong() {
            this.san_pham.so_luong_mua = this.san_pham.so_luong_mua * 1 + 1;
            if (this.san_pham.so_luong_mua > this.san_pham.so_luong) {
                this.san_pham.so_luong_mua = this.san_pham.so_luong;
                var message = "Số lượng mua tối đa chỉ được " + this.san_pham.so_luong + " sản phẩm."
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + message + '<span>';
                this.$toast.warning(thong_bao);
            }
        },
        layThongTinSanPham() {
            axios
                .get('http://127.0.0.1:8000/api/chi-tiet-san-pham/' + this.id_san_pham)
                .then((res) => {
                    if (res.data.status) {
                        this.san_pham = res.data.data;
                        this.order = res.data.order;
                        this.san_pham.so_luong_mua = 1;
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/');
                    }
                })
        },
        themGioHang() {
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/gio-hang/create", this.san_pham, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/khach-hang/dang-nhap');
                    }
                })
        },

        muaNgay() {
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/gio-hang/create", this.san_pham, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_khach_hang")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.$router.push({ name: 'gioHang', params: { id_chi_tiet: res.data.chi_tiet.id } });
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/khach-hang/dang-nhap');
                    }
                })
        }
    },
}
</script>
<style></style>