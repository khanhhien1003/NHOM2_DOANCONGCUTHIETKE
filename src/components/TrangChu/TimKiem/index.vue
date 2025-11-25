<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-3">
                            <h4><i class="fa-solid fa-magnifying-glass"></i> Sản Phẩm {{ thong_tin }}</h4>
                        </div>
                        <div class="col-lg-9 col-xl-19">
                            <div class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5"
                                                placeholder="Search Product..."> <span
                                                class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-white">Sắp Xếp</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-chevron-down'></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-xxl-end"
                                                    aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">A - Z</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Z - A</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-white">Khoảng Giá</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-slider"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-xxl-end " style="width: 400px;"
                                                    aria-labelledby="btnGroupDrop1">
                                                    <li>
                                                        <div class="dropdown-header">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <input class="form-control"
                                                                                placeholder="0 đ" type="text">
                                                                        </div>
                                                                        <div class="col-2" style="padding: 0px 0px">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-6"><input class="form-control"
                                                                                placeholder="540.000 đ" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <input type="range" class="form-range"
                                                                        id="customRange1">
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <button class="btn btn-primary w-100">Áp
                                                                        Dụng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <template v-for="(value, index) in list_san_pham" :key="index">
                            <div class="col d-flex">
                                <div class="card flex-fill">
                                    <img v-bind:src="value.hinh_anh" class="card-img-top "
                                        style="    width: 100%; height: 230px; object-fit: contain; vertical-align: middle;"
                                        alt="...">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title cursor-pointer">
                                            <router-link
                                                :to="`/chi-tiet-san-pham/` + value.id + `-` + value.slug_san_pham">
                                                <a
                                                    v-bind:href="`/chi-tiet-san-pham/` + value.id + `-` + value.slug_san_pham">
                                                    {{ value.ten_san_pham }}
                                                </a>
                                            </router-link>
                                        </h6>
                                        <div class="mt-auto">
                                            <div class="d-flex align-items-center fs-6">
                                                <div class="cursor-pointer">
                                                    <template v-for="items in value.sao_danh_gia" :key="items">
                                                        <i class="bx bxs-star text-warning"></i>
                                                    </template>
                                                    <template v-for="items in (5 - value.sao_danh_gia)" :key="items">
                                                        <i class="bx bxs-star text-secondary"></i>
                                                    </template>
                                                </div>
                                                <p class="mb-0 ms-auto">4.2(182)</p>
                                            </div>
                                            <div class="clearfix mt-2">
                                                <p class="mb-0 float-end fw-bold"><span
                                                        class="me-2 text-decoration-line-through text-muted">{{
                                                            value.gia_ban }}</span><span class="fs-5 text-danger">{{
                                                            value.gia_khuyen_mai }}</span>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import axios from 'axios';

export default {
    props: ['thong_tin'],
    beforeRouteUpdate(to, from, next) {
        this.thong_tin = to.params.thong_tin;
        this.loadDataSanPham();
        next();
    },
    data() {
        return {
            thong_tin: this.$route.params.thong_tin,
            list_san_pham: [],
        }
    },
    mounted() {
        this.loadDataSanPham();
    },
    methods: {
        loadDataSanPham() {
            var payload = {
                'noi_dung_tim': this.thong_tin
            };
            axios
                .post("http://127.0.0.1:8000/api/san-pham/tim-kiem", payload)
                .then((res) => {
                    this.list_san_pham = res.data.data;
                });
        },
    },
}
</script>
<style></style>