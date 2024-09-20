<template>
    <form @submit.prevent="register">
        <div>
            <label for="name">Nombre:</label>
            <input v-model="name" type="text" id="name" required />
        </div>
        <div>
            <label for="lastname">Apellidos:</label>
            <input v-model="lastname" type="text" id="lastname" required />
        </div>
        <div>
            <label for="dni">DNI:</label>
            <input v-model="dni" type="text" id="dni" required />
        </div>
        <div>
            <label for="email">Email:</label>
            <input v-model="email" type="email" id="email" required />
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input v-model="password" type="password" id="password" required />
        </div>
        <div>
            <label for="password_confirmation">Confirmar contraseña:</label>
            <input v-model="password_confirmation" type="password" id="password_confirmation" required />
        </div>
        <button type="submit">Registrarse</button>
    </form>
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
