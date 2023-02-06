import './bootstrap';
import { InertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Vue.use(InertiaApp)

const app = document.getElementById('app')

const pages = {
  'Auth/Login': require('./Pages/Auth/Login.vue').default,
}

new Vue({
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => pages[name],
    },
  }),
}).$mount(app)