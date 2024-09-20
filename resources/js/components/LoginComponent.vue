<template>
    <form @submit.prevent="login">
        <div v-if="error" class="error">{{ error }}</div>

        <input type="email" v-model="email" placeholder="Correo" required />
        <div v-if="errors.email" class="error">{{ errors.email }}</div>

        <input type="password" v-model="password" placeholder="Contraseña" required minlength="8" />
        <div v-if="errors.password" class="error">{{ errors.password }}</div>

        <button type="submit">Iniciar sesión</button>
    </form>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            email: '',
            password: '',
            error: null,
            errors: {},
        };
    },
    methods: {
        validateEmail(email) {
            const re = /\S+@\S+\.\S+/;
            return re.test(email);
        },
        async login() {
            // Limpiar errores
            this.errors = {};

            // Validar correo
            if (!this.validateEmail(this.email)) {
                this.errors.email = 'El correo no es válido.';
                return;
            }

            // Validar contraseña
            if (this.password.length < 8) {
                this.errors.password = 'La contraseña debe tener al menos 8 caracteres.';
                return;
            }

            // Hacer la petición a la API si las validaciones pasan
            try {
                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                });
                alert('Login exitoso');
            } catch (error) {
                console.error(error);
                alert('Error en el login');
            }
        },
    },
};
</script>

<style scoped>
.error {
    color: red;
    font-size: 12px;
    margin-bottom: 10px;
}
</style>
