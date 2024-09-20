<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Iniciar sesión</h3>
            <form @submit.prevent="login">
                <!-- Mostrar mensaje de éxito -->
                <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>

                <!-- Mostrar errores de validación -->
                <div v-if="errors.length" class="alert alert-danger">
                    <ul>
                        <li v-for="error in errors" :key="error">{{ error }}</li>
                    </ul>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="email" v-model="email" class="form-control" id="email" placeholder="Correo" required/>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" v-model="password" class="form-control" id="password"
                           placeholder="Contraseña" required minlength="8"/>
                </div>

                <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>

            <div class="mt-3 text-center">
                <p>¿Usuario no registrado? <a href="/register">Registrarse</a></p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            email: '',
            password: '',
            successMessage: '',
            errors: [],
        };
    },
    methods: {
        validateEmail(email) {
            const re = /\S+@\S+\.\S+/;
            return re.test(email);
        },
        async login() {
            this.errors = [];
            this.successMessage = '';

            if (!this.validateEmail(this.email)) {
                this.errors.push('El correo no es válido.');
                return;
            }

            if (this.password.length < 8) {
                this.errors.push('La contraseña debe tener al menos 8 caracteres.');
                return;
            }

            try {
                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                });
                this.successMessage = '¡Acceso OK! Login exitoso.';
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = Object.values(error.response.data.errors).flat();
                } else {
                    this.errors.push('Ocurrió un error inesperado.');
                }
            }
        }
    }
};
</script>

<style scoped>
.card {
    max-width: 400px;
    margin: auto;
}
</style>
