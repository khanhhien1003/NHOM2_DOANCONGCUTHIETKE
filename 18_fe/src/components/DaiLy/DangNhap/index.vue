<template>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="my-4 text-center">
                        <img src="https://sdmntprnorthcentralus.oaiusercontent.com/files/00000000-cb54-622f-91fc-832ea8b509df/raw?se=2025-09-30T16%3A25%3A39Z&sp=r&sv=2024-08-04&sr=b&scid=42040613-f1c3-5a2b-a3d2-b848c61709e5&skoid=0b778285-7b0b-4cdc-ac3b-fb93e8c3686f&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-09-30T12%3A29%3A03Z&ske=2025-10-01T12%3A29%3A03Z&sks=b&skv=2024-08-04&sig=wkaWy4um7E3Sh3QNEcgND1hx8hYRpW7K38NTkjezgNM%3D" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">ĐĂNG NHẬP ĐẠI LÝ</h3>
                                </div>
                                <div class="login-separater text-center mb-4">
                                    <hr />
                                </div>
                                <div class="form-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-text bg-transparent">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <input v-model="tai_khoan.email" type="email"
                                                    class="form-control border-end-0">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-text bg-transparent"><i
                                                        class="fa-solid fa-lock"></i></div>
                                                <input v-model="tai_khoan.password" type="password"
                                                    class="form-control border-end-0">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button v-on:click="xacNhanLogin()" type="button"
                                                    class="btn btn-primary"><i class="fa-solid fa-lock-open"></i>Đăng
                                                    Nhập</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <router-link to="/dai-ly/dang-ky">
                                                <button type="button" class="btn btn-danger w-100"><i class="fa-solid fa-user"></i>Đăng Ký</button>
                                            </router-link>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <router-link to="/dai-ly/quen-mat-khau" class="">Quên mật
                                                khẩu?</router-link>
                                        </div>
                                        <p class="text-center text-muted small mt-4">©2025 EZMALL. All rights reserved.
                                        </p>

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
import axios from 'axios'
export default {
    data() {
        return {
            tai_khoan: {},
        }
    },
    methods: {
        xacNhanLogin() {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/dang-nhap", this.tai_khoan)
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        // Lưu lại ở trình duyệt
                        localStorage.setItem('token_dai_ly', res.data.token);
                        this.$router.push('/dai-ly/san-pham');
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                    }
                })
                .catch((errors) => {
                    const listErrors = errors.response.data.errors;
                    Object.values(listErrors).forEach((value) => {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + value + '<span>';
                        this.$toast.error(thong_bao);
                    })
                });
        },
    },
}
</script>
<style></style>