<template>
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-5 border-end">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="https://dzfullstack.com/assets/images/logo-img.png" width="180"
                                            alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold">Thay Đổi Mật Khẩu Đại Lý</h4>
                                    <p class="text-muted">Nhập lại mật khẩu mới để thay đổi mật khẩu</p>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Mật khẩu mới</label>
                                        <input v-model="dai_ly.password" type="text" class="form-control" placeholder="Nhập mật khẩu của bạn">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Xác nhận mật khẩu</label>
                                        <input v-model="dai_ly.re_password" type="text" class="form-control" placeholder="Nhập lại mật khẩu của bạn">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button v-on:click="doiMatKhau()" type="button" class="btn btn-primary">Thay
                                            đổi mật khẩu</button>
                                        <router-link to="/dai-ly/dang-nhap">
                                            <a class="btn btn-light w-100"><i class="bx bx-arrow-back mr-1"></i>Quay lại trang
                                                đăng nhập</a>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <img src="../../../assets/images/login-images/forgot-password-frent-img.jpg"
                                class="card-img login-img h-100" alt="...">
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
    props : ['id_dai_ly'],
    data() {
        return {
            dai_ly : {
                'id'    :   this.$route.params.id_dai_ly
            },
        }
    },
    methods: {
        doiMatKhau() {
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/doi-mat-khau", this.dai_ly)
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.$router.push('/dai-ly/dang-nhap')
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/dai-ly/dang-nhap');
                    }
                })
                .catch((res) => {
                    var list = Object.values(res.response.data.errors);
                    list.forEach((v, k) => {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + v[0] + '<span>';
                        this.$toast.error(thong_bao);
                    });
                });
        },
    },
}
</script>
<style></style>