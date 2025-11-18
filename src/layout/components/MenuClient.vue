<template>
    <div class="nav-container primary-menu">
        <div class="mobile-topbar-header">
            <div>
                <img src="https://dzfullstack.com/assets/images/logo-img.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">DZFULLSTACK</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-xl w-100">
            <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Home</div>
                    </a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class='bx bx-spa'></i>
                        </div>
                        <div class="menu-title">Sản Phẩm</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Laptop</a>
                        </li>
                        <li> <a class="dropdown-item" href="index2.html"><i class="bx bx-right-arrow-alt"></i>Điện
                                Thoại</a>
                        </li>
                        <li> <a class="dropdown-item" href="index3.html"><i class="bx bx-right-arrow-alt"></i>Quần
                                Áo</a>
                        </li>
                    </ul>
                </li> -->
                <template v-for="(value, index) in list_danh_muc" :key="index">
                    <li class="nav-item">
                        <router-link :to="`/danh-muc-san-pham/` + value.id + `-` + value.slug_danh_muc">
                            <a class="nav-link" :href="`/danh-muc-san-pham/` + value.id + `-` + value.slug_danh_muc">
                                <div class="parent-icon">
                                    <span v-html="value.icon_danh_muc"></span>
                                </div>
                                <div class="menu-title">{{ value.ten_danh_muc }}</div>
                            </a>
                        </router-link>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_danh_muc   :   [],
        }
    },
    mounted() {
        this.loadDataDanhMuc();
    },
    methods: {
        loadDataDanhMuc() {
            axios
                .get("http://127.0.0.1:8000/api/danh-muc/data-open")
                .then((res) => {
                    this.list_danh_muc = res.data.data;
                });
        },
    },
}
</script>
<style></style>