import { createApp } from 'vue';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';

const app = createApp({});

app.component('login-component', LoginComponent);
app.component('register-component', RegisterComponent);

// Montea la app de Vue en un div con id="app"
app.mount('#app');
