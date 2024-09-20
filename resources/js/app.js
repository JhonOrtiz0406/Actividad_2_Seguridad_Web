import { createApp } from 'vue';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import axios from "axios";
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const app = createApp({});

app.component('login-component', LoginComponent);
app.component('register-component', RegisterComponent);
app.component('welcome',)


app.mount('#app');
