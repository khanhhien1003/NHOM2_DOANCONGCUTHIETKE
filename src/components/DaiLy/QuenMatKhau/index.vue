<template>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 rounded  border">
                                <div class="text-center">
                                    <img src="../../../assets/images/icons/forgot-2.png" width="120" alt="">
                                </div>
                                <div class="text-center">
                                    <h4 class="mt-3 font-weight-bold">Quên Mật Khẩu?</h4>
                                    <p class="text-muted">Nhập Email để lấy lại mật khẩu</p>
                                </div>
                                <div class="my-4">
                                    <input v-model="dai_ly.email" type="text" class="form-control form-control-lg"
                                        placeholder="Nhập vào Email">
                                </div>
                                <div class="d-grid gap-2">
                                    <button v-on:click="gui()" type="button" class="btn btn-primary btn-lg">Gửi</button>
                                    <router-link to="/dai-ly/dang-nhap">
                                        <a class="btn btn-light w-100"><i class="bx bx-arrow-back mr-1"></i>Quay lại trang
                                            đăng nhập</a>
                                    </router-link>
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
            dai_ly : {},
        }
    },
    methods: {
        gui(){
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/quen-mat-khau", this.dai_ly)
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.$router.push('/dai-ly/dang-nhap')
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/dai-ly/dang-ky');

                    }
                })
        }
    },
}
</script>
<style></style>