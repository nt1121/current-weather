<template>
    <div class="pt-3 pb-3">
        <div class="c-loading" v-if="isLoading">
            <img v-bind:src="loadingImgSrc" alt="loading" class="c-loading__icon">
        </div>
        <transition name="u-fade">
            <template v-if="!isLoading">
                <div v-if="isLoadingSuccessful">
                    <div class="mb-3 clearfix">
                        <h1 class="float-left c-page-title">{{ prefectureName }}</h1>
                        <router-link v-bind:to="{ name: 'regions', params: { id: regionId } }" class="btn btn-secondary float-right">{{ regionName }}</router-link>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12 mb-3" v-for="location in locations" v-bind:key="location.id">
                            <router-link v-bind:to="{ name: 'locations', params: { id: location.id } }" class="btn btn-outline-secondary btn-lg w-100 text-center">
                                {{ location.name }}
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="c-loading-error" v-else>
                    <p v-if="isTooManyRequests">
                        一定時間内のリクエストが多すぎます。<br>
                        しばらく経ってからもう一度お試しください。
                    </p>
                    <p v-else>データの取得に失敗しました。</p>
                </div>
            </template>
        </transition>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/prefectures/' + this.$route.params['id'])
                .then(response => {
                    if (response.data && response.data.regionId && response.data.regionName && response.data.prefectureName && response.data.locations) {
                        this.regionId = response.data.regionId;
                        this.regionName = response.data.regionName;
                        this.prefectureName = response.data.prefectureName;
                        this.locations = response.data.locations;
                        this.isLoadingSuccessful = true;
                    }
                })
                .catch(error => {
                    if (error.response && error.response.status && error.response.status === 429) {
                        this.isTooManyRequests = true;
                    }
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
        data() {
            return {
                isLoading: true,
                isLoadingSuccessful: false,
                isTooManyRequests: false,
                regionId: '',
                regionName: '',
                prefectureName: '',
                locations: []
            }
        },
        computed: {
            loadingImgSrc() {
                return this.$store.getters.getLoadingImgSrc;
            }
        }
    }
</script>
