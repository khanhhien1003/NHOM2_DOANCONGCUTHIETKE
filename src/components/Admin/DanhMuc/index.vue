<template>
   <div class="modal fade" id="capnhatDM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật Danh Mục</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="mb-2">
                  <label>Tên Danh Mục</label>
                  <input v-on:change="taoSlugDM()" v-model="edit_danh_muc.ten_danh_muc" type="text"
                     class="form-control mt-2">
               </div>
               <div class="mb-2">
                  <label>Slug Danh Mục</label>
                  <input v-model="edit_danh_muc.slug_danh_muc" type="text" class="form-control mt-2">
               </div>
               <div class="mb-2">
                  <label>Icon Danh Mục</label>
                  <input v-model="edit_danh_muc.icon_danh_muc" type="text" class="form-control mt-2">
               </div>
               <div class="mb-2">
                  <label>Tình trạng</label>
                  <select v-model="edit_danh_muc.tinh_trang" class="form-control mt-2">
                     <option value="0">Tạm Tắt</option>
                     <option value="1">Hiển Thị</option>
                  </select>
               </div>
               <div class="mb-2">
                  <label>Danh Mục Cha</label>
                  <select v-model="edit_danh_muc.id_danh_muc_cha" class="form-control mt-2">
                     <option value="1">Cha là ai?</option>
                     <option value="0">Có cha rồi</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button v-on:click="capnhatDanhMuc()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập
                  nhật</button>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-5">
         <div class="card">
            <div class="card-header">
               <h6><b>THÊM MỚI DANH MỤC</b></h6>
            </div>
            <div class="card-body">
               <div class="mb-2">
                  <label>Tên Danh Mục</label>
                  <input v-on:blur="checkSlug()" v-model="create_danh_muc.ten_danh_muc" v-on:change="taoSlugDM()"
                     type="text" class="form-control mt-2">
               </div>
               <div class="mb-2">
                  <label>Slug Danh Mục</label>
                  <input v-on:blur="checkSlug()" v-model="create_danh_muc.slug_danh_muc" type="text"
                     class="form-control mt-2">
               </div>
               <div class="mb-2">
                  <label>Icon Danh Mục</label>
                  <input v-model="create_danh_muc.icon_danh_muc" type="text" class="form-control mt-2">
               </div>
               <div class="mb-2">
                  <label>Tình trạng</label>
                  <select v-model="create_danh_muc.tinh_trang" class="form-control mt-2">
                     <option value="0">Tạm Tắt</option>
                     <option value="1">Hiển Thị</option>
                  </select>
               </div>
               <div class="mb-2">
                  <label>Danh Mục Cha</label>
                  <select v-model="create_danh_muc.id_danh_muc_cha" class="form-control mt-2">
                     <option value="1">Cha là ai?</option>
                     <option value="0">Có cha rồi</option>
                  </select>
               </div>
            </div>
            <div class="card-footer text-end">
               <button v-if="is_them_moi == 0" class="btn btn-danger" disabled>Thêm Mới</button>
               <button v-else v-on:click="themMoiDanhMuc()" class="btn btn-primary">Thêm Mới</button>
            </div>
         </div>
      </div>
      <div class="col-lg-7">
         <div class="card">
            <div class="card-header">
               <h6><b>DANH SÁCH DANH MỤC</b></h6>
            </div>
            <div class="card-body table-responsive">
               <table class="table table-bordered table-hover ">
                  <thead>
                     <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tên Danh Mục</th>
                        <th class="text-center">Slug Danh Mục</th>
                        <th class="text-center">Icon</th>
                        <th class="text-center">Tình Trạng</th>
                        <th class="text-center">Danh Mục Cha</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <template v-for="(value, index) in list_danh_muc" :key="index">
                        <tr>
                           <th class="align-middle">{{ index + 1 }}</th>
                           <td class="align-middle">{{ value.ten_danh_muc }}</td>
                           <td class="align-middle">{{ value.slug_danh_muc }}</td>
                           <td class="align-middle">
                              <span class="fa-xl" v-html="value.icon_danh_muc"></span>
                           </td>
                           <td class="align-middle">
                              <button v-on:click="changeTrangThai(value)" v-if="value.tinh_trang == 1" class="btn btn-success">Hiển thị</button>
                              <button v-on:click="changeTrangThai(value)" v-else class="btn btn-danger">Tạm tắt</button>
                           </td>
                           <td class="align-middle">
                              <i>Chưa xử lý</i>
                           </td>
                           <td class="align-middle">
                              <button v-on:click="Object.assign(edit_danh_muc, value)" class="btn btn-primary me-2"
                                 data-bs-toggle="modal" data-bs-target="#capnhatDM">Cập nhật</button>
                              <button v-on:click="del_danh_muc = value" class="btn btn-danger" data-bs-toggle="modal"
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Danh Mục</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="alert alert-danger" role="alert">
                     Bạn có chắc muốn xóa <b class="text-danger">{{ del_danh_muc.ten_danh_muc }}</b> này không?
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button v-on:click="xoaDanhMuc()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
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
         list_danh_muc: [],
         create_danh_muc: {
            "ten_danh_muc": "",
            "slug_danh_muc": "",
            "icon_danh_muc": "",
            "tinh_trang": "",
            "id_danh_muc_cha": "",
         },
         del_danh_muc: {
            "ten_danh_muc": "Khóa 18"
         },
         is_them_moi: 0,
         edit_danh_muc: {
            "ten_danh_muc": "",
            "slug_danh_muc": "",
            "icon_danh_muc": "",
            "tinh_trang": "",
            "id_danh_muc_cha": "",
         },
      }
   },
   mounted() {
      this.layDataDanhMuc();
   },
   methods: {
      checkSlug() {
         axios
            .post("http://127.0.0.1:8000/api/admin/danh-muc/checkSlug", this.create_danh_muc, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
            .then((res) => {
               if(res.data.status) {
                  this.is_them_moi = res.data.status;
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.success(thong_bao);
               } else {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.error(thong_bao);
               }
               
            })
      },
      layDataDanhMuc() {
         axios
            .get("http://127.0.0.1:8000/api/danh-muc", {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
            .then((res) => {
               this.list_danh_muc = res.data.data;
            })
      },
      themMoiDanhMuc() {
         axios
            .post("http://127.0.0.1:8000/api/admin/danh-muc", this.create_danh_muc, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
            .then((res) => {
               if (res.data.status) {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.success(thong_bao);
                  this.layDataDanhMuc();
               } else {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.error(thong_bao);
               }
            })
      },
      capnhatDanhMuc() {
         axios
            .post("http://127.0.0.1:8000/api/admin/danh-muc-update", this.edit_danh_muc, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
            .then((res) => {
               if (res.data.status) {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.success(thong_bao);
                  this.layDataDanhMuc();
               } else {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.error(thong_bao);
               }
            })
      },
      xoaDanhMuc() {
         axios
            .post("http://127.0.0.1:8000/api/admin/danh-muc/delete", this.del_danh_muc, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
            .then((res) => {
               if (res.data.status) {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.success(thong_bao);
                  this.layDataDanhMuc();
               } else {
                  var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                  this.$toast.error(thong_bao);
               }
            })
      },
      taoSlugDM() {
         this.create_danh_muc.slug_danh_muc = this.toSluggg(this.create_danh_muc.ten_danh_muc)
         this.edit_danh_muc.slug_danh_muc = this.toSluggg(this.edit_danh_muc.ten_danh_muc)
      },
      toSluggg(title) {
         var slug = title.toLowerCase();
         //Đổi ký tự có dấu thành không dấu
         slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
         slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
         slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
         slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
         slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
         slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
         slug = slug.replace(/đ/gi, 'd');
         //Xóa các ký tự đặt biệt
         slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
         //Đổi khoảng trắng thành ký tự gạch ngang
         slug = slug.replace(/ /gi, "-");
         //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
         //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
         slug = slug.replace(/\-\-\-\-\-/gi, '-');
         slug = slug.replace(/\-\-\-\-/gi, '-');
         slug = slug.replace(/\-\-\-/gi, '-');
         slug = slug.replace(/\-\-/gi, '-');
         //Xóa các ký tự gạch ngang ở đầu và cuối
         slug = '@' + slug + '@';
         slug = slug.replace(/\@\-|\-\@|\@/gi, '');
         return slug;
      },

      changeTrangThai(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/danh-muc/doi-trang-thai", value, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("token_nhan_vien")
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.layDataDanhMuc();
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