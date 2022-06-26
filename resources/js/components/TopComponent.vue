<template>
    <div class="pt-3 pb-3">
        <div class="row">
            <div class="col-sm-6 col-12 mb-3" v-for="region in regions" v-bind:key="region.id">
                <router-link v-bind:to="{ name: 'region', params: { id: region.id } }" class="btn btn-outline-secondary btn-lg w-100 text-center">
                    {{ region.name }}
                </router-link>
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
