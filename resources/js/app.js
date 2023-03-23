import {createApp} from 'vue/dist/vue.esm-bundler.js';
import GroupedByType from './Pages/Activities/GroupedByType.vue';

const app = createApp({});

app.component('activities-component', GroupedByType);

app.mount("#app");
