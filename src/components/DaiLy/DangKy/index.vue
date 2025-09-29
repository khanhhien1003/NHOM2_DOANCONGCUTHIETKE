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
                                    <h3 class="">ĐĂNG KÝ BÁN HÀNG CÙNG DZFULLSTACK</h3>
                                </div>
                                <div class="login-separater text-center mb-4">
                                    <hr />
                                </div>
                                <div class="form-body">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label">Họ Và Tên</label>
                                            <input v-model="create_dai_ly.ho_va_ten" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Email</label>
                                            <input v-model="create_dai_ly.email" type="email" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Số Điện Thoại</label>
                                            <input v-model="create_dai_ly.so_dien_thoai" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Ngày Sinh</label>
                                            <input v-model="create_dai_ly.ngay_sinh" type="date" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Mật Khẩu</label>
                                            <input v-model="create_dai_ly.password" type="password"
                                                class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Nhập Lại Mật Khẩu</label>
                                            <input v-model="create_dai_ly.re_password" type="password"
                                                class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Tên Doanh Nghiệp</label>
                                            <input v-model="create_dai_ly.ten_doanh_nghiep" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Mã Số Thuế</label>
                                            <input v-model="create_dai_ly.ma_so_thue" type="text" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <label>Địa chỉ kinh doanh:</label>
                                            <textarea v-model="create_dai_ly.dia_chi_kinh_doanh"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button v-on:click="createDaiLy()" type="button"
                                                    class="btn btn-primary"><i class='bx bx-user'></i>Đăng Ký</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <router-link to="/dai-ly/dang-nhap">
                                                <button type="button" class="btn btn-secondary w-100"><i
                                                        class="fa-solid fa-arrow-left"></i>Quay Lại Đăng Nhập</button>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</template>
<script>

import axios from 'axios';
export default {
    data() {
        return {
            create_dai_ly: {},
        }
    },
    methods: {
        createDaiLy() {
            axios
                .post('http://127.0.0.1:8000/api/dai-ly/dang-ky', this.create_dai_ly)
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                        this.$toast.success(thong_bao);
                        this.create_dai_ly = {};
                        this.$router.push('/dai-ly/dang-nhap')

                    }
                })
                .catch((errors) => {
                    const listErrors = errors.response.data.errors;
                    Object.values(listErrors).forEach((value) => {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + value + '<span>';
                        this.$toast.error(thong_bao);
                    })
                });
        }
    },
}
</script>
<style></style>