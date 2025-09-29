<template>
  <div class="container d-flex justify-content-center align-items-center min-vh-100 bg-white">
    <div class="card shadow" style="width: 100%; max-width: 500px;">
      <div class="card-body p-4">
        <!-- Section du logo optimisée -->
        <div class="logo-container">
          <img src="https://sdmntprwestus2.oaiusercontent.com/files/00000000-36b4-61f8-88a1-fb5aae2cf469/raw?se=2025-07-28T17%3A44%3A30Z&sp=r&sv=2024-08-04&sr=b&scid=b7da7ec7-d3da-55e2-ad1e-eaf0b894531b&skoid=732f244e-db13-47c3-bcc7-7ee02a9397bc&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-07-27T18%3A54%3A28Z&ske=2025-07-28T18%3A54%3A28Z&sks=b&skv=2024-08-04&sig=HcDI%2BKD31ZTRLDb/pTICw7neOOWoW8XkjX8QEWkPqzs%3D" 
               alt="EZMALL Logo" 
               class="logo-image">
        </div>

        <h4 class="card-title text-center text-warning mb-4">Chào mừng bạn đến với EZMALL</h4>

        <form @submit.prevent="actionDangNhap">
          <div class="mb-3">
            <label class="form-label">Email </label>
            <input type="email" v-model="khach_hang.email" class="form-control" placeholder="Nhập email ">
          </div>

          <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" v-model="khach_hang.password" class="form-control" placeholder="Nhập mật khẩu">
          </div>

          <button type="submit" class="btn btn-warning w-100 text-white py-2">Đăng nhập</button>

          <div class="d-flex justify-content-between mt-4">
            <router-link to="/khach-hang/quen-mat-khau" class="text-warning">Quên mật khẩu?</router-link>
            <router-link to="/khach-hang/dang-ky" class="text-warning">Đăng ký</router-link>
          </div>

          <p class="text-center text-muted small mt-4">©2025 EZMALL. All rights reserved.</p>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      khach_hang: {}
    }
  },
  methods: {
    actionDangNhap() {
      axios
        .post('http://127.0.0.1:8000/api/khach-hang/dang-nhap', this.khach_hang)
        .then((res) => {
          if (res.data.status) {
            var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
            this.$toast.success(thong_bao);
            this.khach_hang = {};
            localStorage.setItem('token_khach_hang', res.data.token);
            localStorage.setItem('ten_kh', res.data.ten_kh);
            this.$router.push('/khach-hang/profile');
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
          });
        });
    },
  },
}
</script>

<style scoped>
body {
  background-color: #ffffff;
}

.card {
  border-radius: 10px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
}

/* Styles optimisés pour le logo */
.logo-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 160px;
  margin-bottom: 20px;
  overflow: hidden;
  background-color: #fafafa;
  border-radius: 8px;
}

.logo-image {
  height: 200px;
  width: auto;
  max-width: none;
  object-fit: contain;
  transform: scale(1.2); /* Légère augmentation pour réduire l'espace blanc */
  margin: -15px 0; /* Marges négatives pour réduire davantage l'espace blanc */
}

.btn-warning {
  font-weight: 500;
  border-radius: 5px;
  transition: all 0.3s ease;
  background-color: #ff7700; /* Couleur plus proche de celle du logo EZMALL */
}

.btn-warning:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(255, 119, 0, 0.3);
}

.form-control:focus {
  border-color: #ff7700;
  box-shadow: 0 0 0 0.2rem rgba(255, 119, 0, 0.25);
}

.text-warning {
  color: #ff7700 !important;
}

.card-title.text-warning {
  color: #ff7700 !important;
  font-weight: 600;
}
</style>
