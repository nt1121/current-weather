<template>
    <div class="pt-3 pb-3">
        <h1 class="mb-3 clearfix">
            <span class="float-left">{{ regionName }}</span>
            <router-link to="/" class="btn btn-secondary float-right">全国</router-link>
        </h1>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 mb-3" v-for="prefecture in prefectures" v-bind:key="prefecture.id">
                <router-link to="/" class="btn btn-outline-secondary btn-lg w-100 text-center">
                    {{ prefecture.name }}
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            const regionId = Number(this.$route.params['id']);
            const region = this.$store.getters.getRegions.filter(region => region.id === regionId);
            if (!region.length) {
                this.$router.push({name: 'not-found'});
            }            
            this.regionName = region[0].name;
            this.prefectures = this.$store.getters.getPrefectures.filter(prefecture => prefecture.region_id === regionId);
        },
        data() {
            return {
                regionName: '',
                prefectures: []
            }
        }
    }
</script>
