<template>
    <div class="pt-3 pb-3">
        <div class="c-loading" v-if="isLoading">
            <img v-bind:src="loadingImgSrc" alt="loading" class="c-loading__icon">
        </div>
        <transition name="u-fade">
            <template v-if="!isLoading">
                <div v-if="isLoadingSuccessful">
                    <div class="mb-3 clearfix">
                        <h1 class="float-left c-page-title">{{ regionName }}</h1>
                        <router-link to="/" class="btn btn-secondary float-right">全国</router-link>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12 mb-3" v-for="prefecture in prefectures" v-bind:key="prefecture.id">
                            <router-link v-bind:to="{ name: 'prefectures', params: { id: prefecture.id } }" class="btn btn-outline-secondary btn-lg w-100 text-center">
                                {{ prefecture.name }}
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
            axios.get('/api/regions/' + this.$route.params['id'])
                .then(response => {
                    if (response.data && response.data.regionName && response.data.prefectures) {
                        this.regionName = response.data.regionName;
                        this.prefectures = response.data.prefectures;
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
                regionName: '',
                prefectures: []
            }
        },
        computed: {
            loadingImgSrc() {
                return this.$store.getters.getLoadingImgSrc;
            }
        }
    }
</script>
