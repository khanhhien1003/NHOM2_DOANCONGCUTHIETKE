<template>
    <div class="modal fade" id="capnhatDM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật Mã Giảm Giá</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <div class="mb-2">
                   <label>Mã Code</label>
                   <input v-model="edit_ma_giam_gia.code" type="text"
                      class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Thời Gian Bắt Đầu</label>
                   <input v-model="edit_ma_giam_gia.ngay_bat_dau" type="date" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Thời Gian Kết Thúc</label>
                   <input v-model="edit_ma_giam_gia.ngay_ket_thuc" type="date" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Loại Giảm</label>
                   <select v-model="edit_ma_giam_gia.loai_giam_gia" class="form-control mt-2">
                      <option value="0">Giảm %</option>
                      <option value="1">Tiền Mặt</option>
                   </select>
                </div>
                <div class="mb-2">
                   <label>Số Giảm Giá</label>
                   <input v-model="edit_ma_giam_gia.so_giam_gia" type="number" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Số Tiền Tối Đa</label>
                   <input v-model="edit_ma_giam_gia.so_tien_toi_da" type="number" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Đơn Hàng Tối Thiểu</label>
                   <input v-model="edit_ma_giam_gia.don_hang_toi_thieu" type="number" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Tình trạng</label>
                   <select v-model="edit_ma_giam_gia.tinh_trang" class="form-control mt-2">
                      <option value="0">Tạm Tắt</option>
                      <option value="1">Hiển Thị</option>
                   </select>
                </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button v-on:click="capnhatMaGiamGia()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập
                   nhật</button>
             </div>
          </div>
       </div>
    </div>
    <div class="row">
       <div class="col-lg-3">
          <div class="card">
             <div class="card-header">
                <h6><b>THÊM MỚI MÃ GIẢM GIÁ</b></h6>
             </div>
             <div class="card-body">
                <div class="mb-2">
                   <label>Mã Code</label>
                   <input v-model="create_ma_giam_gia.code" type="text"
                      class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Thời Gian Bắt Đầu</label>
                   <input v-model="create_ma_giam_gia.ngay_bat_dau" type="date" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Thời Gian Kết Thúc</label>
                   <input v-model="create_ma_giam_gia.ngay_ket_thuc" type="date" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Loại Giảm</label>
                   <select v-model="create_ma_giam_gia.loai_giam_gia" class="form-control mt-2">
                      <option value="0">Giảm %</option>
                      <option value="1">Tiền Mặt</option>
                   </select>
                </div>
                <div class="mb-2">
                   <label>Số Giảm Giá</label>
                   <input v-model="create_ma_giam_gia.so_giam_gia" type="number" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Số Tiền Tối Đa</label>
                   <input v-model="create_ma_giam_gia.so_tien_toi_da" type="number" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Đơn Hàng Tối Thiểu</label>
                   <input v-model="create_ma_giam_gia.don_hang_toi_thieu" type="number" class="form-control mt-2">
                </div>
                <div class="mb-2">
                   <label>Tình trạng</label>
                   <select v-model="create_ma_giam_gia.tinh_trang" class="form-control mt-2">
                      <option value="0">Tạm Tắt</option>
                      <option value="1">Hiển Thị</option>
                   </select>
                </div>
             </div>
             <div class="card-footer text-end">
                <button v-on:click="themMoiMaGiamGia()" class="btn btn-primary">Thêm Mới</button>
             </div>
          </div>
       </div>
       <div class="col-lg-9">
          <div class="card">
             <div class="card-header">
                <h6><b>DANH SÁCH MÃ GIẢM GIÁ</b></h6>
             </div>
             <div class="card-body table-responsive">
                <table class="table table-bordered table-hover ">
                   <thead>
                      <tr>
                         <th class="text-center">#</th>
                         <th class="text-center">Mã Code</th>
                         <th class="text-center">Thời Gian Bắt Đầu</th>
                         <th class="text-center">Thời Gian Kết Thúc</th>
                         <th class="text-center">Loại Giảm</th>
                         <th class="text-center">Số Giảm Giá</th>
                         <th class="text-center">Số Tiền Tối Đa</th>
                         <th class="text-center">Đơn Hàng Tối Thiểu</th>
                         <th class="text-center">Tình Trạng</th>
                         <th class="text-center">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                      <template v-for="(value, index) in list_ma_giam_gia" :key="index">
                         <tr>
                            <th class="align-middle">{{ index + 1 }}</th>
                            <td class="align-middle">{{ value.code }}</td>
                            <td class="align-middle text-center">{{ value.ngay_bat_dau }}</td>
                            <td class="align-middle text-center">{{ value.ngay_ket_thuc }}</td>
                            <td class="align-middle">
                                <template v-if="value.loai_giam_gia == 0">
                                    Giảm %
                                </template>
                                <template v-else>
                                    Tiền Mặt
                                </template>
                            </td>
                            <td class="align-middle text-end">{{ value.so_giam_gia }}</td>
                            <td class="align-middle text-end">{{ value.so_tien_toi_da }}</td>
                            <td class="align-middle text-end">{{ value.don_hang_toi_thieu }}</td>
                            <td class="align-middle text-center">
                               <button v-on:click="changeTrangThai(value)" v-if="value.tinh_trang == 1" class="btn btn-success">Hiển thị</button>
                               <button v-on:click="changeTrangThai(value)" v-else class="btn btn-danger">Tạm tắt</button>
                            </td>
                            <td class="align-middle text-center">
                               <button v-on:click="Object.assign(edit_ma_giam_gia, value)" class="btn btn-primary me-2"
                                  data-bs-toggle="modal" data-bs-target="#capnhatDM">Cập nhật</button>
                               <button v-on:click="del_ma_giam_gia = value" class="btn btn-danger" data-bs-toggle="modal"
                                  data-bs-target="#delModal">Xóa</button>
                            </td>
                         </tr>
                      </template>
                   </tbody>
                </table>
             </div>
          </div>
 
       </div>
       <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Mã Giảm Giá</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="alert alert-danger" role="alert">
                      Bạn có chắc muốn xóa <b class="text-danger">{{ del_ma_giam_gia.code }}</b> này không?
                   </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <button v-on:click="xoaMaGiamGia()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                      nhận</button>
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
          list_ma_giam_gia: [],
          create_ma_giam_gia: {},
          del_ma_giam_gia: {},
          edit_ma_giam_gia: {},
       }
    },
    mounted() {
       this.layDataMaGiamGia();
    },
    methods: {
       layDataMaGiamGia() {
          axios
             .get("http://127.0.0.1:8000/api/admin/ma-giam-gia/data", {
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                     }
                 })
             .then((res) => {
                this.list_ma_giam_gia = res.data.data;
             })
       },
       themMoiMaGiamGia() {
          axios
             .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/create", this.create_ma_giam_gia, {
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                     }
                 })
             .then((res) => {
                if (res.data.status) {
                   var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                   this.$toast.success(thong_bao);
                   this.layDataMaGiamGia();
                   this.create_ma_giam_gia = {};
                } else {
                   var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                   this.$toast.error(thong_bao);
                }
             })
       },
       capnhatMaGiamGia() {
          axios
             .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/update", this.edit_ma_giam_gia, {
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                     }
                 })
             .then((res) => {
                if (res.data.status) {
                   var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                   this.$toast.success(thong_bao);
                   this.layDataMaGiamGia();
                } else {
                   var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                   this.$toast.error(thong_bao);
                }
             })
       },
       xoaMaGiamGia() {
          axios
             .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/delete", this.del_ma_giam_gia, {
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                     }
                 })
             .then((res) => {
                if (res.data.status) {
                   var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                   this.$toast.success(thong_bao);
                   this.layDataMaGiamGia();
                } else {
                   var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                   this.$toast.error(thong_bao);
                }
             })
       },
 
       changeTrangThai(value) {
             axios
                 .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/doi-trang-thai", value, {
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                     }
                 })
                 .then((res) => {
                     if (res.data.status) {
                         var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                         this.$toast.success(thong_bao);
                         this.layDataMaGiamGia();
                     } else {
                         var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                         this.$toast.error(thong_bao);
                     }
                 })
         },
    },
 }
 </script>
 <style></style>
