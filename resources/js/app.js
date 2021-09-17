require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
Vue.component('dictionary-index', require('./components/DictionaryIndex.vue').default);
Vue.component('dictionary-create', require('./components/DictionaryCreate.vue').default);
Vue.component('dictionary-cat', require('./components/DictionaryCategory.vue').default);
const app = new Vue({
    el: '#app',
});
