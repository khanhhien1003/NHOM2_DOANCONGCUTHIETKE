<template>
    
</template>
<script>
import axios from 'axios'
export default {
    props: ['id_khach_hang'],
    mounted() {
        this.guiIdKhachHangLenBE();
    },
    methods: {
        guiIdKhachHangLenBE(){
            const khachHang = {
                'id_khach_hang' : this.$route.params.id_khach_hang
            };
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/kich-hoat", khachHang)
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.$router.push('/khach-hang/dang-nhap')
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/khach-hang/dang-nhap');

                    }
                })
        }
    },
}
</script>
<style>
    
</style>