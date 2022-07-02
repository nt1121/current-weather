import Vue from 'vue';
import Router from 'vue-router';
import Top from './components/TopComponent.vue';
import Region from './components/RegionComponent.vue';
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
            path: '*',
            name: 'not-found',
            component: NotFound,
        }
    ]
});
