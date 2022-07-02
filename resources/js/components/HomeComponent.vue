<template>
    <router-view/>
</template>

<script>
    export default {
        props: [
            'loadingImgSrc'
        ],
        mounted() {
            this.$store.commit('setLoadingImgSrc', this.loadingImgSrc);
        },
    }
</script>
