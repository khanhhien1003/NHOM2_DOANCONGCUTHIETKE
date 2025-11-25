<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">
        <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded-5">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="https://img.lazcdn.com/us/domino/21921202dfbde803d55e4bc5d9a71ea5.jpg_2200x2200q80.jpg_.webp"
                            class="d-block w-100 rounded-5" style="height: 400px;" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="https://img.lazcdn.com/us/domino/67779cefa60618c80a8742c3410e54d3.jpg_2200x2200q80.jpg_.webp"
                            class="d-block w-100 rounded-5" style="height: 400px;" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="https://img.lazcdn.com/us/domino/e826b92df2a4281c9b2ac14f02081b8b.jpg_2200x2200q80.jpg_.webp"
                            class="d-block w-100 rounded-5" style="height: 400px;" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="h-100 rounded-5">
                        <img src="https://img.lazcdn.com/us/domino/a73aa102aec5f75f96e16e70dbc6a8fb.jpg_2200x2200q80.jpg_.webp"
                            style="height: 192px;" class="img-fluid rounded-5" alt="...">
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="h-100 rounded-5">
                        <img src="https://img.lazcdn.com/us/domino/c4dddd873da424761f8733df9d23b06b.jpg_2200x2200q80.jpg_.webp"
                            style="height: 192px;" class="img-fluid rounded-5" alt="...">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-1"></div>
                <template v-for="(value, index) in list_danh_muc" :key="index">
                    <div class="col-lg-2 mb-2 d-flex">
                        <div class="card flex-fill">
                            <router-link :to="`/danh-muc-san-pham/` + value.id + `-` + value.slug_danh_muc">
                                <div class="card-body">
                                    <div class="text-center d-flex flex-column justify-content-center">
                                        <button type="button" class="btn btn-outline-secondary mx-auto ps-3 mb-2">
                                            <span v-html="value.icon_danh_muc"></span>
                                        </button>
                                        <div class="text-dark">{{ value.ten_danh_muc }}</div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>
                            <i class="fa-solid fa-bolt text-warning"></i> FLASH SALE
                        </h4>
                        <a href="" class="fs-5">Xem tất cả</a>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <template v-for="(value, index) in list_flash_sale" :key="index">
                            <div class="col d-flex">
                                <div class="card flex-fill">
                                    <img v-bind:src="value.hinh_anh" class="card-img-top "
                                        style="    width: 100%; height: 230px; object-fit: contain; vertical-align: middle;"
                                        alt="...">
                                    <div class="">
                                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                                class="badge bg-warning mt-2">Sale</span></div>
                                    </div>
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
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="../../assets/images/1.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="../../assets/images/2.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card    ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>
                            <i class="fa-solid fa-fire text-danger"></i> SẢN PHẨM NỔI BẬT
                        </h4>
                        <a href="" class="fs-5">Xem tất cả</a>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <template v-for="(value, index) in list_noi_bat" :key="index">
                            <div class="col d-flex">
                                <div class="card flex-fill">
                                    <img v-bind:src="value.hinh_anh" class="card-img-top "
                                        style="    width: 100%; height: 230px; object-fit: contain; vertical-align: middle;"
                                        alt="...">
                                    <div class="">
                                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                                class="badge bg-danger mt-2">Nổi Bật</span></div>
                                    </div>
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
    <div class="row">
        <div class="col-lg-12">
            <img src="https://images.fpt.shop/unsafe/fit-in/1200x200/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/6/1/638527972189913739_H5%20-%201200_200.png"
                class="img-fluid d-block w-100" alt="">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card    ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>
                            SẢN PHẨM MỚI
                        </h4>
                        <a href="" class="fs-5">Xem tất cả</a>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <template v-for="(value, index) in list_new" :key="index">
                            <div class="col d-flex">
                                <div class="card flex-fill">
                                    <img v-bind:src="value.hinh_anh" class="card-img-top "
                                        style="    width: 100%; height: 230px; object-fit: contain; vertical-align: middle;"
                                        alt="...">
                                    <div class="">
                                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                                class="badge bg-success mt-2">New</span></div>
                                    </div>
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
import { onMounted, ref, defineComponent } from 'vue';

import axios from 'axios';

export default defineComponent({
  name: 'CozeChat',
  data() {
        return {
            list_danh_muc: [],
            list_flash_sale: [],
            list_noi_bat: [],
            list_new: [],
        }
    },
  components: {
    AiAdvisoryNotification: {
      template: `
          <div class="fixed bottom-24 right-4 z-50 max-w-xs bg-white shadow-lg rounded-lg p-4 border flex items-start">
            <MessageCircleQuestion class="text-blue-600 mr-3 flex-shrink-0" size="24" />
            <div>
              <p class="text-sm font-medium text-gray-900 mb-2">Tư vấn bằng Ai</p>
            </div>
          </div>
        `,
    },
  },
  mounted() {
        this.loadDataDanhMuc();
        this.loadDataSanPhamFlashSale();
        this.loadDataSanPhamNoiBat();
        this.loadDataSanPhamNew();
    },
    methods: {
        loadDataSanPhamNew() {
            axios
                .get("http://127.0.0.1:8000/api/san-pham/data-new")
                .then((res) => {
                    this.list_new = res.data.data;
                });
        },
        loadDataSanPhamNoiBat() {
            axios
                .get("http://127.0.0.1:8000/api/san-pham/data-noi-bat")
                .then((res) => {
                    this.list_noi_bat = res.data.data;
                });
        },
        loadDataSanPhamFlashSale() {
            axios
                .get("http://127.0.0.1:8000/api/san-pham/data-flash-sale")
                .then((res) => {
                    this.list_flash_sale = res.data.data;
                });
        },
        loadDataDanhMuc() {
            axios
                .get("http://127.0.0.1:8000/api/danh-muc/data-open")
                .then((res) => {
                    this.list_danh_muc = res.data.data;
                });
        },
    },
  setup() {
    const isCozeLoaded = ref(false);
    const isAdminDashboard = ref(window.location.pathname === "/");

    onMounted(() => {
      const script = document.createElement('script');
      script.src = 'https://sf-cdn.coze.com/obj/unpkg-va/flow-platform/chat-app-sdk/1.0.0-beta.4/libs/oversea/index.js';
      script.async = true;

      script.onload = () => {
        if (window.CozeWebSDK) {
          new window.CozeWebSDK.WebChatClient({
            config: {
              bot_id: '7456995142441353234',
            },
            componentProps: {
              title: 'Chat AI',
            },
          });
          isCozeLoaded.value = true;
        }
      };

      script.onerror = () => {
        console.error('Failed to load Coze SDK');
      };

      document.body.appendChild(script);

      return () => {
        document.body.removeChild(script);
      };
    });

    return {
      isCozeLoaded,
      isAdminDashboard,
    };
  },
});
</script>
<style scoped></style>