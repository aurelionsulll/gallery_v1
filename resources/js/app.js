require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
window.Fire = new Vue();



Vue.component('image-page', require('./components/ImagePage.vue').default);
Vue.component('folder-page', require('./components/FolderPage.vue').default);

const app = new Vue({
    el: '#appp',
});