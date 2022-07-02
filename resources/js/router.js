import Vue from 'vue';
import Router from 'vue-router';
import Top from './components/TopComponent.vue';
import Region from './components/RegionComponent.vue';
import Prefecture from './components/PrefectureComponent.vue';
import Location from './components/LocationComponent.vue';
import NotFound from './components/NotFoundComponent.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'top',
            component: Top,
        },
        {
            path: '/regions/:id(\\d+)',
            name: 'regions',
            component: Region,
        },
        {
            path: '/prefectures/:id(\\d+)',
            name: 'prefectures',
            component: Prefecture,
        },
        {
            path: '/locations/:id(\\d+)',
            name: 'locations',
            component: Location,
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound,
        }
    ]
});
