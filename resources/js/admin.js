import './vendor.bundle.base'
import 'chart.js'
import 'progressbar.js'
import 'owl.carousel'
import './jquery.cookie'
import './off-canvas'
import './hoverable-collapse'
import './misc'
import './settings'
import './todolist'
import './dashboard'

import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import DefaultLayoutVue from './Layouts/DefaultLayout.vue'
import AuthLayoutVue from './Layouts/AuthLayout.vue'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Azura-tc';

createInertiaApp({
    progress: {
        color: '#29d',
        showSpinner: true,
        delay: 300
    },
    title: (title) => `${appName} - ${title}`,
    resolve: async (name) => {
        let page = (await resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))).default
        if(page.layout === undefined){
            if(name.startsWith('Auth/')) page.layout = AuthLayoutVue
            else page.layout = DefaultLayoutVue
        }
        return page
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link)
            .component("Head", Head)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
