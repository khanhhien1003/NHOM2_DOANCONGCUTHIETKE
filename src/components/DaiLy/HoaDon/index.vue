<template>
  <div class="bill-container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2><img src="https://dzfullstack.com/assets/images/logo-img.png" class="img-fluid" alt="logo"></h2>
        <h2>Thông Tin Hóa Đơn</h2>
      </div>
      <div class="col-lg-12">
        <p><b>Mã Hóa Đơn:</b> {{ hoaDon.ma_don_hang }}</p>
        <p><b>Đại Lý:</b> {{ hoaDon.ten_doanh_nghiep }}</p>
        <p><b>Khách Hàng:</b> {{ hoaDon.ten_nguoi_nhan }}</p>
        <p><b>Địa Chỉ:</b> {{ hoaDon.dia_chi }}</p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>Chi Tiết Hóa Đơn</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Tên Sản Phẩm</th>
              <th class="text-center text-nowrap">SL</th>
              <th class="text-end text-nowrap">Đơn giá</th>
              <th class="text-end text-nowrap">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>{{ hoaDon.ten_san_pham }}</th>
              <th class="text-center text-nowrap">{{ hoaDon.so_luong }}</th>
              <th class="text-end text-nowrap">{{ hoaDon.don_gia }} đ</th>
              <th class="text-end text-nowrap">{{ hoaDon.thanh_tien }} đ</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <hr>
    <p><b>Tổng Tiền:</b> {{ hoaDon.thanh_tien }} đ</p>
    <hr>
    <p class="footer">Cảm ơn Quý khách. Hẹn gặp lại!</p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      hoaDon: {},
    };
  },
  mounted() {
    this.printInvoice();
  },
  methods: {
    printInvoice() {
      const params = new URLSearchParams(this.$route.query);
      this.hoaDon = Object.fromEntries(params);
      this.$nextTick(() => {
        window.print();
      });
      window.onafterprint = () => {
        window.close();
      };
    }
  }
}
</script>
<style>
.bill-container {
  width: 80mm;
  padding: 10px;
  background: #fff;
}

table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.9em;
}

table,
th,
td {
  border: none;
}

th,
td {
  padding: 3px 0;
  text-align: left;
}

.footer {
  text-align: center;
  margin-top: 10px;
  font-size: 0.8em;
}

@media print {
  @page {
    size: 80mm auto;
    margin: 0;
  }
}
</style>