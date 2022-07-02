<template>
    <div class="pt-3 pb-3">
        <div class="c-loading" v-if="isLoading">
            <img v-bind:src="loadingImgSrc" alt="loading" class="c-loading__icon">
        </div>
        <transition name="u-fade">
            <template v-if="!isLoading">
                <div v-if="isLoadingSuccessful">
                    <div class="mb-3 clearfix">
                        <h1 class="float-left c-page-title">{{ locationName }}</h1>
                        <router-link v-bind:to="{ name: 'prefectures', params: { id: prefectureId } }" class="btn btn-secondary float-right">{{ prefectureName }}</router-link>
                    </div>
                    <div class="p-location-weather">
                        <div class="p-location-weather__datetime mb-3">
                            {{ dateTimeText }}
                        </div>
                        <div class="p-location-weather__bottom">
                            <div class="p-location-weather__bottom-left">
                                <img v-bind:src="iconSrc" alt="天気" class="p-location-weather__bottom-left-icon">
                                <div class="p-location-weather__bottom-left-description">{{ description }}</div>
                            </div>
                            <div class="p-location-weather__bottom-right">
                                <div class="p-location-weather__bottom-right-temperature">気温 <span class="p-location-weather__bottom-right-temperature-number">{{ temp }}</span>&#8451;</div>
                                <div class="p-location-weather__bottom-right-humidity">湿度 <span class="p-location-weather__bottom-right-humidity-number">{{ humidity }}</span>%</div>
                            </div>
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
            axios.get('/api/locations/' + this.$route.params['id'])
                .then(response => {
                    if (
                        response.data && 
                        response.data.prefectureId && 
                        response.data.prefectureName && 
                        response.data.locationName && 
                        response.data.description &&
                        response.data.iconSrc && 
                        response.data.temp && 
                        response.data.humidity && 
                        response.data.dateTimeText
                    ) {
                        this.prefectureId = response.data.prefectureId;
                        this.prefectureName = response.data.prefectureName;
                        this.locationName = response.data.locationName;
                        this.description = response.data.description;
                        this.iconSrc = response.data.iconSrc;
                        this.temp = response.data.temp;
                        this.humidity = response.data.humidity;
                        this.dateTimeText = response.data.dateTimeText;
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
                prefectureId: '',
                prefectureName: '',
                locationName: '',
                description: '',
                iconSrc: '',
                temp: '',
                humidity: '',
                dateTimeText: ''
            }
        },
        computed: {
            loadingImgSrc() {
                return this.$store.getters.getLoadingImgSrc;
            }
        }
    }
</script>
