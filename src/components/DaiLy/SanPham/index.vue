<template>
    <div class="modal fade" id="themSP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-lg-6">
                      <div class="mb-2">
                         <label>Tên Sản Phẩm</label>
                         <input v-model="create_san_pham.ten_san_pham"
                            v-on:keyup="taoSlugSP()" type="text" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Slug Sản phẩm</label>
                         <input v-model="create_san_pham.slug_san_pham" type="text"
                            class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Số Lượng</label>
                         <input v-model="create_san_pham.so_luong" type="number" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Giá bán</label>
                         <input v-model="create_san_pham.gia_ban" type="number" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Giá khuyến mãi</label>
                         <input v-model="create_san_pham.gia_khuyen_mai" type="number" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Sao Đánh Giá</label>
                         <input v-model="create_san_pham.sao_danh_gia" type="number" class="form-control mt-2">
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="mb-2">
                         <label>Hình ảnh</label>
                         <input v-model="create_san_pham.hinh_anh" type="text" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Tình trạng</label>
                         <select v-model="create_san_pham.tinh_trang" class="form-control mt-2">
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                         </select>
                      </div>
                      <div class="mb-2">
                         <label>Mô tả ngắn</label>
                         <input v-model="create_san_pham.mo_ta_ngan" type="text" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Mô tả chỉ tiết</label>
                         <textarea v-model="create_san_pham.mo_ta_chi_tiet" class="form-control mt-2" cols="30" rows="5"></textarea>
                      </div>
                      <div class="mb-2">
                           <label>Tag</label>
                           <input v-model="create_san_pham.tag" type="text" class="form-control mt-2">
                        </div>
                   </div>
                </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button v-on:click="themMoiSanPham()" type="button" class="btn btn-primary"
                   data-bs-dismiss="modal">Thêm mới</button>
             </div>
          </div>
       </div>
    </div>
    <div class="modal fade" id="suaSP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa thông tin sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-lg-6">
                      <div class="mb-2">
                         <label>Tên Sản Phẩm</label>
                         <input v-model="edit_san_pham.ten_san_pham"
                            v-on:keyup="taoSlugSP()" type="text" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Slug Sản phẩm</label>
                         <input v-model="edit_san_pham.slug_san_pham" type="text"
                            class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Số Lượng</label>
                         <input v-model="edit_san_pham.so_luong" type="number" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Giá bán</label>
                         <input v-model="edit_san_pham.gia_ban" type="number" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Giá khuyến mãi</label>
                         <input v-model="edit_san_pham.gia_khuyen_mai" type="number" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Sao Đánh Giá</label>
                         <input v-model="edit_san_pham.sao_danh_gia" type="number" class="form-control mt-2">
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="mb-2">
                         <label>Hình ảnh</label>
                         <input v-model="edit_san_pham.hinh_anh" type="text" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Tình trạng</label>
                         <select v-model="edit_san_pham.tinh_trang" class="form-control mt-2">
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                         </select>
                      </div>
                      <div class="mb-2">
                         <label>Mô tả ngắn</label>
                         <input v-model="edit_san_pham.mo_ta_ngan" type="text" class="form-control mt-2">
                      </div>
                      <div class="mb-2">
                         <label>Mô tả chỉ tiết</label>
                         <textarea v-model="edit_san_pham.mo_ta_chi_tiet" class="form-control mt-2" cols="30" rows="5"></textarea>
                      </div>
                      <div class="mb-2">
                           <label>Tag</label>
                           <input v-model="edit_san_pham.tag" type="text" class="form-control mt-2">
                        </div>
                   </div>
                </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button v-on:click="suaSanPham()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập
                   nhật</button>
             </div>
          </div>
       </div>
    </div>
    <div class="modal fade" id="delSP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
       aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Xóa Sản Phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                Bạn có chắc muốn xóa sản phẩm <b class="text-danger">{{ del_san_pham.ten_san_pham }}</b> này
                không?
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button v-on:click="xoaSanPham()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
             </div>
          </div>
       </div>
    </div>
    <div class="modal fade" id="moTaChiTiet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
       aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Mô Tả Chi Tiết Sản Phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                {{ mo_ta_chi_tiet_sp }}
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
          </div>
       </div>
    </div>
    <div class="row">
       <div class="col-lg-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between align-items-center">
                <h6><b>DANH SÁCH SẢN PHẨM</b></h6>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themSP">Thêm mới sản phẩm</button>
             </div>
             <div class="card-body table-responsive">
                <table class="table table-bordered table-hover ">
                   <thead>
                      <tr>
                         <th class="text-center">#</th>
                         <th class="text-center">Hình Ảnh</th>
                         <th class="text-center">Tên Sản Phẩm</th>
                         <th class="text-center">Slug Sản Phẩm</th>
                         <th class="text-center">Số Lượng</th>
                         <th class="text-center">Giá Bán</th>
                         <th class="text-center">Giá Khuyến Mãi</th>
                         <th class="text-center">Mô Tả Ngắn</th>
                         <th class="text-center">Mô Tả Chi Tiết</th>
                         <th class="text-center">Sao Đánh Giá</th>
                         <th class="text-center">Tag</th>
                         <th class="text-center">Tình Trạng</th>
                         <th class="text-center">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                      <template v-for="(value, index) in list_san_pham" :key="index">
                         <tr>
                            <th class="align-middle">{{ index + 1 }}</th>
                            <th class="align-middle text-center">
                               <img style="max-height: 200px;" v-bind:src="value.hinh_anh" class="img-fluid" alt="">
                            </th>
                            <td class="align-middle text-wrap">{{ value.ten_san_pham }}</td>
                            <td class="align-middle text-wrap">{{ value.slug_san_pham }}</td>
                            <td class="align-middle">{{ value.so_luong }}</td>
                            <td class="align-middle text-end">{{ value.gia_ban }}</td>
                            <td class="align-middle text-end">{{ value.gia_khuyen_mai }}</td>
                            <td class="align-middle text-wrap">{{ value.mo_ta_ngan }}</td>
                            <td class="align-middle text-center">
                               <i v-on:click="mo_ta_chi_tiet_sp = value.mo_ta_chi_tiet" class="fa-solid fa-newspaper fa-2xl" data-bs-toggle="modal"
                                  data-bs-target="#moTaChiTiet"></i>
                            </td>
                            <td class="align-middle text-center">{{ value.sao_danh_gia }}</td>
                            <td class="align-middle ">{{ value.tag }}</td>
                            <td class="align-middle text-wrap">
                               <button v-on:click="chuyenBan(value)" v-if="value.tinh_trang == 1" class="btn btn-success text-nowrap mb-2">Đang Bán</button>
                               <button v-on:click="chuyenBan(value)" v-else class="btn btn-danger text-nowrap mb-2">Dừng Bán</button>
                            </td>
                            <td class="align-middle">
                               <button v-on:click="Object.assign(edit_san_pham, value)" class="btn btn-primary me-2"
                                  data-bs-toggle="modal" data-bs-target="#suaSP">Cập nhật</button>
                               <button v-on:click="del_san_pham = value" class="btn btn-danger" data-bs-toggle="modal"
                                  data-bs-target="#delSP">Xóa</button>
                            </td>
                         </tr>
                      </template>
                   </tbody>
                </table>
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
       list_san_pham: [],
       create_san_pham: {

          "ten_san_pham": "",
          "slug_san_pham": "",
          "so_luong": "",
          "hinh_anh": "",
          "mo_ta_ngan": "",
          "mo_ta_chi_tiet": "",
          "tinh_trang": "",
          "gia_ban": "",
          "gia_khuyen_mai": "",
          "tag": "",
       },
       del_san_pham: {
          "ten_san_pham": "măt hàng"
       },
       edit_san_pham: {
          "ten_san_pham": "",
          "slug_san_pham": "",
          "so_luong": "",
          "hinh_anh": "",
          "mo_ta_ngan": "",
          "mo_ta_chi_tiet": "",
          "tinh_trang": "",
          "gia_ban": "",
          "gia_khuyen_mai": "",
          "tag": "",
       },
       mo_ta_chi_tiet_sp: '',
    }
 },
 mounted() {
    this.layDataSanPham();
 },
 methods: {
    chuyenBan(payload) {
       axios
          .post("http://127.0.0.1:8000/api/dai-ly/san-pham/chuyen-trang-thai-ban", payload, {
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                  }
              })
          .then((res) => {
             if(res.data.status) {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.success(thong_bao);
                this.layDataSanPham();
             }
             
          })
    },
    layDataSanPham() {
       axios
          .get("http://127.0.0.1:8000/api/dai-ly/san-pham/data", {
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                  }
              })
          .then((res) => {
             this.list_san_pham = res.data.data;
          })
    },
    themMoiSanPham() {
       axios
          .post("http://127.0.0.1:8000/api/dai-ly/san-pham/create", this.create_san_pham, {
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                  }
              })
          .then((res) => {
             if (res.data.status) {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.success(thong_bao);
                this.layDataSanPham();
             } else {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.error(thong_bao);
             }
          })
    },
    suaSanPham() {
       axios
          .post("http://127.0.0.1:8000/api/dai-ly/san-pham/update", this.edit_san_pham, {
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                  }
              })
          .then((res) => {
             if (res.data.status) {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.success(thong_bao);
                this.layDataSanPham();
             } else {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.error(thong_bao);
             }
          })
    },
    xoaSanPham() {
       axios
          .post("http://127.0.0.1:8000/api/dai-ly/san-pham/delete", this.del_san_pham, {
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem("token_dai_ly")
                  }
              })
          .then((res) => {
             if (res.data.status) {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.success(thong_bao);
                this.layDataSanPham();
             } else {
                var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message +'<span>';
                this.$toast.error(thong_bao);
             }
          })
    },
    taoSlugSP() {
       this.create_san_pham.slug_san_pham = this.toSlug(this.create_san_pham.ten_san_pham)
    },
    toSlug(title) {
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
 },
}
</script>
<style></style>