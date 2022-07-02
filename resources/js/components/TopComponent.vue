<template>
    <div class="pt-3 pb-3">
        <div class="c-loading" v-if="isLoading">
            <img v-bind:src="loadingImgSrc" alt="loading" class="c-loading__icon">
        </div>
        <transition name="u-fade">
            <template v-if="!isLoading">
                <div class="row" v-if="isLoadingSuccessful">
                    <div class="col-sm-6 col-12 mb-3" v-for="region in regions" v-bind:key="region.id">
                        <router-link v-bind:to="{ name: 'regions', params: { id: region.id } }" class="btn btn-outline-secondary btn-lg w-100 text-center">
                            {{ region.name }}
                        </router-link>
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
            axios.get('/api/regions')
                .then(response => {
                    if (response.data) {
                        this.regions = response.data;
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
                regions: []
            }
        },
        computed: {
            loadingImgSrc() {
                return this.$store.getters.getLoadingImgSrc;
            }
        }
    }
</script>
