
require('./bootstrap');

Vue.component('countdown', require('./components/Countdown.vue'));

const app = new Vue({
    el: '#countdown'
});