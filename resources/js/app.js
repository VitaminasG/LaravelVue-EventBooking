require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('CalendarComponent', () => import('./components/CalendarComponent'));
Vue.component('AsyncLoading', () => import('./components/AsyncLoading'));
Vue.component('AsyncLoadError', () => import('./components/AsyncLoadError'));
Vue.component('IntroComponent', () => import('./components/IntroComponent'));
Vue.component('ControlComponent', () => import('./components/ControlComponent'));

import Async from './components/CalendarComponent';
import LoadingComponent from './components/AsyncLoading';
import ErrorComponent from './components/AsyncLoadError';

const AsyncComponent = () => ({
    component: new Promise((resolve, reject) => {
       setTimeout(() => {
           resolve(Async);
       }, 500);
    }),
    loading: LoadingComponent,
    error: ErrorComponent,
    delay: 200,
    timeout: 5000
});

const app = new Vue({
    el: '#app',
    components: { Async: AsyncComponent }
});
