<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-3">
                            <h4>Danh Sách Sản Phẩm</h4>
                        </div>
                        <div class="col-lg-9 col-xl-9">
                            <div class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input v-model="search_tag" type="text" class="form-control ps-5"
                                                placeholder="Search Product..."> <span
                                                class="position-absolute top-50 product-show translate-middle-y"><i class="fa-solid fa-magnifying-glass"></i></span>
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
                                                    <i class="fa-solid fa-arrow-down-short-wide"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-xxl-end" aria-labelledby="btnGroupDrop1">
                                                    <li><a v-on:click="sort = 1" class="dropdown-item" href="#">A - Z</a>
                                                    </li>
                                                    <li><a v-on:click="sort = 2" class="dropdown-item" href="#">Z - A</a>
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
                                                    <i class="fa-solid fa-circle-arrow-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-xxl-end " style="width: 400px;"
                                                    aria-labelledby="btnGroupDrop1">
                                                    <li>
                                                        <div class="dropdown-header">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <input v-model="begin" class="form-control"
                                                                                placeholder="0 đ" type="text"></div>
                                                                        <div class="col-2" style="padding: 0px 0px">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-6"><input v-model="end" class="form-control"
                                                                                placeholder="540.000 đ" type="text">
                                                                        </div>
                                                                    </div>
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
    <div class="row ">
        <template v-for="(value, index) in sxandgido" :key="index">
            <div class="col-lg-3 d-flex">
                <div class="card flex-fill">
                    <img v-bind:src="value.hinh_anh" class="card-img-top "
                        style="    width: 100%; height: 230px; object-fit: contain; vertical-align: middle;" alt="...">
                    <div class="">
                        <div v-if="value.is_flash_sale == 1" class="position-absolute top-0 end-0 m-3 product-discount">
                            <span class="badge bg-warning mt-2">Sale</span>
                        </div>
                        <div v-if="value.is_noi_bat == 1" class="position-absolute top-0 end-0 m-3 product-discount">
                            <span class="badge bg-danger mt-2">Nổi Bật</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title cursor-pointer">
                            <router-link :to="`/chi-tiet-san-pham/` + value.id + `-` + value.slug_san_pham">
                                <a v-bind:href="`/chi-tiet-san-pham/` + value.id + `-` + value.slug_san_pham">
                                    {{ value.ten_san_pham }}
                                </a>
                                <p class="mt-3">{{ value.tag }}</p>
                            </router-link>
                        </h6>
                        <div class="mt-auto">
                            <div class="d-flex align-items-center fs-6">
                                <div class="cursor-pointer">
                                    <template v-for="items in value.sao_danh_gia" :key="items">
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </template>
                                    <template v-for="items in (5 - value.sao_danh_gia)" :key="items">
                                        <i class="fa-regular fa-star"></i>
                                    </template>
                                </div>
                                <p class="mb-0 ms-auto">4.2(182)</p>
                            </div>
                            <div class="clearfix mt-2">
                                <p class="mb-0 float-end fw-bold"><span
                                        class="me-2 text-decoration-line-through text-muted">{{ value.gia_ban
                                        }}</span><span class="fs-5 text-danger">{{ value.gia_khuyen_mai }}</span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props: ['id_danh_muc', 'slug_danh_muc'],
    data() {
        return {
            id_danh_muc: this.$route.params.id_danh_muc,
            list_san_pham: [],
            sort : 1, // Quy ước là 1 sx giá tăng dần, 2 sẽ là giảm dần
            search_tag : '',
            begin : 0,
            end : 10000,
        }
    },
    beforeRouteUpdate(to, from, next) {
        this.id_danh_muc = to.params.id_danh_muc;
        this.layThongTinSanPhamTuDanhMuc();
        next();
    },
    mounted() {
        this.layThongTinSanPhamTuDanhMuc();
    },
    methods: {
        layThongTinSanPhamTuDanhMuc() {
            axios
                .get('http://127.0.0.1:8000/api/thong-tin-san-pham-tu-danh-muc/' + this.id_danh_muc)
                .then((res) => {
                    if (res.data.status) {
                        this.list_san_pham = res.data.data;
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/');
                    }
                })
        },
    },
    computed: {
        sxandgido() {
            return this.list_san_pham
                       .sort((a, b) => {
                          if(this.sort == 1) {
                            return a.gia_khuyen_mai - b.gia_khuyen_mai;
                          } else {
                            return b.gia_khuyen_mai - a.gia_khuyen_mai;
                          }
                       })
                       .filter((value, index) => {
                           return (this.search_tag === '' || value.tag.toLowerCase().includes(this.search_tag.toLowerCase()))
                                && value.gia_khuyen_mai >= this.begin && value.gia_khuyen_mai <= this.end;
                       });

        }
    }
}
</script>
<style></style>