<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Registrarse</h3>
            <form @submit.prevent="register">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input v-model="name" type="text" class="form-control" id="name" required />
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Apellidos:</label>
                    <input v-model="lastname" type="text" class="form-control" id="lastname" required />
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI:</label>
                    <input v-model="dni" type="text" class="form-control" id="dni" required />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input v-model="email" type="email" class="form-control" id="email" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input v-model="password" type="password" class="form-control" id="password" required />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña:</label>
                    <input v-model="password_confirmation" type="password" class="form-control" id="password_confirmation" required />
                </div>

                <button type="submit" class="btn btn-success w-100">Registrarse</button>
            </form>

            <div class="mt-3 text-center">
                <p>¿Ya tienes una cuenta? <a href="/login">Iniciar sesión</a></p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            name: '',
            lastname: '',
            dni: '',
            email: '',
            password: '',
            password_confirmation: '',
        };
    },
    methods: {
        async register() {
            try {
                const response = await axios.post('/api/register', {
                    name: this.name,
                    lastname: this.lastname,
                    dni: this.dni,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                });
                alert('Registrado con éxito');
            } catch (error) {
                console.error(error);
                alert('Error en el registro');
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
