<template>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6><b>DANH SÁCH SẢN PHẨM</b></h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    <div class="input-group mt-3 w-100">
                                        <input type="text"
                                            class="form-control search-control border border-1 border-secondary" v-model="search" v-on:change="searchByName()"
                                            placeholder="Search...">
                                        <span class="position-absolute top-50 search-show translate-middle-y"
                                            style="left: 15px;"><i class="bx bx-search"></i></span>
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                                            Kiếm</button>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Sản Phẩm</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_san_pham" :key="index">
                                <tr>
                                    <th class="align-middle text-center">{{ index + 1 }}</th>
                                    <td class="align-middle text-wrap">{{ value.ten_san_pham }}</td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="nhapKho(value)" class="btn btn-primary">Add</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6><b>DANH SÁCH ĐANG NHẬP KHO</b></h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">#</th>
                                <th class="text-center align-middle">Tên Sản Phẩm</th>
                                <th class="text-center align-middle">Số Lượng</th>
                                <th class="text-center align-middle">Đơn Giá</th>
                                <th class="text-center align-middle">Thành Tiền</th>
                                <th class="text-center align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_nhap_kho" :key="index">
                                <tr>
                                    <th class="align-middle">{{ index + 1 }}</th>
                                    <td class="align-middle text-wrap">{{ value.ten_san_pham }}</td>
                                    <td class="align-middle ">
                                        <input v-model="value.so_luong" type="number" class="form-control text-center" v-on:blur="updateNhapKho(value)"
                                            style="width: 100px;">
                                    </td>
                                    <td class="align-middle text-center">
                                        <input v-model="value.don_gia" type="number" class="form-control text-center" v-on:blur="updateNhapKho(value)"
                                            style="width: 100px;">
                                    </td>
                                    <td class="align-middle text-center">{{ value.thanh_tien }}</td>
                                    <td class="align-middle">
                                        <button v-on:click="xoaNhapKho(value)" class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4"></th>
                                <th colspan="2">
                                    <button @click="changeNhapKho()" class="btn btn-primary w-100">Nhập Kho</button>
                                </th>
                            </tr>
                        </tfoot>
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
            list_san_pham: [],
            list_nhap_kho: [],
            search       : "",
        }
    },
    mounted() {
        this.layDataSanPham();
        this.loadDataNhapKho();
    },
    methods: {
        changeNhapKho() {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/nhap-kho/change", {}, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataNhapKho()
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },  
        layDataSanPham() {
            axios
                .get("http://127.0.0.1:8000/api/dai-ly/san-pham/data", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    this.list_san_pham = res.data.data;
                })
        },
        nhapKho(san_pham) {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/nhap-kho/create", san_pham, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataNhapKho()
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
        loadDataNhapKho() {
            axios
                .get("http://127.0.0.1:8000/api/dai-ly/nhap-kho/data-nhap", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    this.list_nhap_kho = res.data.data;
                })
        },
        xoaNhapKho(nhap_kho) {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/nhap-kho/delete", nhap_kho, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataNhapKho();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
        updateNhapKho(nhap_kho) {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/nhap-kho/update", nhap_kho, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.loadDataNhapKho();
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
        },
        searchByName() {
            const regex = new RegExp(this.search, 'i');
            this.list_san_pham = this.list_san_pham.filter(san_pham => regex.test(san_pham.ten_san_pham));
        }
    }
}
</script>
<style></style>