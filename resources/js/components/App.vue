<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="6" lg="4">
        <v-card class="pa-5" elevation="10">
          <v-card-title class="text-h5 text-center">Sistema de Inventarios</v-card-title>
          <v-divider class="my-3"></v-divider>
          <v-card-text>
            <v-form @submit.prevent="login" ref="form">
              <v-text-field 
                v-model="email" 
                label="Email" 
                type="email"
                placeholder="Ingresa tu correo"
                :rules="[rules.required, rules.email]"
                prepend-icon="mdi-email"
              ></v-text-field>

              <v-text-field 
                v-model="password" 
                label="Contraseña" 
                type="password"
                placeholder="Ingresa tu contraseña"
                :rules="[rules.required]"
                prepend-icon="mdi-lock"
              ></v-text-field>

              <v-btn type="submit" color="primary" block class="mt-4" :loading="loading">
                Ingresar
              </v-btn>

              <v-alert v-if="errorMessage" type="error" class="mt-3">
                {{ errorMessage }}
              </v-alert>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      password: "",
      errorMessage: "",
      loading: false,
      rules: {
        required: value => !!value || 'Campo obligatorio',
        email: value => /.+@.+\..+/.test(value) || 'Correo inválido',
        minLength: value => value.length >= 6 || 'Debe tener al menos 6 caracteres'
      }
    };
  },
  methods: {
    async login() {
      this.loading = true;
      try {
        const response = await axios.post("/login", {
          email: this.email,
          password: this.password
        });
        localStorage.setItem("token", response.data.token);
        this.$router.push('/dashboard'); // Redirección
      } catch (error) {
        this.errorMessage = "Error en login, verifica tus datos.";
      }
      this.loading = false;
    }

  }
};
</script>

<style scoped>
.v-container {
  background: url('https://source.unsplash.com/random/1920x1080?technology,inventory') no-repeat center center fixed;
  background-size: cover;
}
.v-card {
  backdrop-filter: blur(10px);
  background: rgba(255, 255, 255, 0.85);
}
</style>
