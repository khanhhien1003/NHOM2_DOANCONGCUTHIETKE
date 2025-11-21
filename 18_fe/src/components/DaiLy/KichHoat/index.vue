<template>
    
</template>
<script>
import axios from 'axios'
export default {
    props: ['id_dai_ly'],
    mounted() {
        this.guiIdDaiLyLenBE();
    },
    methods: {
        guiIdDaiLyLenBE(){
            const daiLy = {
                'id_dai_ly' : this.$route.params.id_dai_ly
            };
            axios
                .post("http://127.0.0.1:8000/api/dai-ly/kich-hoat", daiLy)
                .then((res) => {
                    if (res.data.status) {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.success(thong_bao);
                        this.$router.push('/dai-ly/dang-nhap')
                    } else {
                        var thong_bao = '<b>Thông báo</b><span style="margin-top: 5px">' + res.data.message + '<span>';
                        this.$toast.error(thong_bao);
                        this.$router.push('/dai-ly/dang-nhap');

                    }
                })
        }
    },
}
</script>
<style>
    
</style>