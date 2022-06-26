import Vue from 'vue';
import Router from 'vue-router';
import Top from './components/TopComponent.vue';
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
            path: '*',
            name: 'not-found',
            component: NotFound,
        }
    ]
});
