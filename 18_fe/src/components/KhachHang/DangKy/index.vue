<template>
  <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
    <div class="col mx-auto">
      <div class="card">
        <div class="card-body">
          <div class="border p-4 rounded form-container">
            <!-- Logo container -->
            <div class="logo-wrapper">
              <img
                src="https://sdmntprnorthcentralus.oaiusercontent.com/files/00000000-cb54-622f-91fc-832ea8b509df/raw?se=2025-09-30T16%3A25%3A39Z&sp=r&sv=2024-08-04&sr=b&scid=42040613-f1c3-5a2b-a3d2-b848c61709e5&skoid=0b778285-7b0b-4cdc-ac3b-fb93e8c3686f&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-09-30T12%3A29%3A03Z&ske=2025-10-01T12%3A29%3A03Z&sks=b&skv=2024-08-04&sig=wkaWy4um7E3Sh3QNEcgND1hx8hYRpW7K38NTkjezgNM%3D"
                alt="EZMALL Logo"
                class="logo-image"
              />
            </div>

            <div class="text-center mt-3">
              <h3 class="">Đăng Ký Tài Khoản</h3>
              <p>
                Bạn đã có tài khoản?
                <router-link to="/khach-hang/dang-nhap">Đăng Nhập</router-link>
              </p>
            </div>

            <div class="login-separater text-center mb-4">
              <hr />
            </div>

            <div class="form-body">
              <div class="row g-3">
                <div class="col-sm-12">
                  <label class="form-label">Họ Và Tên</label>
                  <input
                    type="text"
                    v-model="khach_hang_create.ho_va_ten"
                    class="form-control"
                    placeholder="Nhập vào họ và tên"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label">Email</label>
                  <input
                    type="email"
                    v-model="khach_hang_create.email"
                    class="form-control"
                    placeholder="Nhập vào Email"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label">Số Điện Thoại</label>
                  <input
                    type="text"
                    v-model="khach_hang_create.so_dien_thoai"
                    class="form-control"
                    placeholder="Nhập vào số điện thoại"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label">Mật Khẩu</label>
                  <input
                    type="password"
                    v-model="khach_hang_create.password"
                    class="form-control"
                    placeholder="Nhập vào Mật Khẩu"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label">Nhập Lại Mật Khẩu</label>
                  <input
                    type="password"
                    v-model="khach_hang_create.re_password"
                    class="form-control"
                    placeholder="Nhập lại Mật Khẩu"
                  />
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button
                      type="button"
                      v-on:click="actionDangKy()"
                      class="btn btn-primary"
                    >
                      <i class="bx bx-user"></i> Đăng Kí
                    </button>
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
import axios from 'axios';
export default {
  data() {
    return {
      khach_hang_create: {},
    };
  },
  methods: {
    actionDangKy() {
      axios
        .post('http://127.0.0.1:8000/api/khach-hang/dang-ky', this.khach_hang_create)
        .then((res) => {
          if (res.data.status) {
            const thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
            this.$toast.success(thong_bao);
            this.khach_hang_create = {};
            this.$router.push('/khach-hang/dang-nhap');
          } else {
            const thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
            this.$toast.error(thong_bao);
            this.$router.push('/khach-hang/dang-nhap');
          }
        })
        .catch((errors) => {
          const listErrors = errors.response.data.errors;
          Object.values(listErrors).forEach((value) => {
            const thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + value + '<span>';
            this.$toast.error(thong_bao);
          });
        });
    },
  },
};
</script>

<style scoped>
.logo-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 10px;
  width: 100%;
  max-width: 460px;
  margin-left: auto;
  margin-right: auto;
  background-color: transparent;
  overflow: hidden;
  padding: 0;
}

.logo-image {
  width: 80%;
  height: auto;
  max-height: 140px;
  object-fit: cover;
  object-position: center center;
  background-color: transparent;
  mix-blend-mode: multiply;
  transform: scale(1.35);
  margin-top: -20px;
}

/* Safari hỗ trợ */
@supports (-webkit-backdrop-filter: none) {
  .logo-image {
    -webkit-backdrop-filter: none;
  }
}
</style>
