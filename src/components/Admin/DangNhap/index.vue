<template>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="my-4 text-center">
                        <img src="https://dzfullstack.com/assets/images/logo-img.png" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">ĐĂNG NHẬP NHÂN VIÊN</h3>
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
                                                <input v-model="tai_khoan.email" type="email" class="form-control border-end-0">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-text bg-transparent"><i
                                                        class="fa-solid fa-lock"></i></div>
                                                <input v-model="tai_khoan.password" type="password" class="form-control border-end-0">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button v-on:click="xacNhanLogin()" type="button" class="btn btn-primary"><i
                                                        class="fa-solid fa-lock-open"></i>Đăng Nhập</button>
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
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            tai_khoan   :   {},
        }
    },
    methods: {
        xacNhanLogin() {
            axios
                .post("http://127.0.0.1:8000/api/nhan-vien/dang-nhap", this.tai_khoan)
                .then((res) => {
                    if(res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                        this.$toast.success(thong_bao);
                        // Lưu lại ở trình duyệt
                        localStorage.setItem('token_nhan_vien', res.data.token);
                        this.$router.push('/admin/danh-muc');
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
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