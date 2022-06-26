<template>
    <div>
        <h1 class="mt-3 mb-3 clearfix">
            <span class="float-left">全国</span>
        </h1>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 mb-3" v-for="region in regions" v-bind:key="region.id">
                <button type="button" class="btn btn-outline-secondary btn-lg w-100 text-center">{{ region.name }}</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        computed: {
            regions() {
                return this.$store.getters.getRegions;
            }
        }
    }
</script>
