<template>
  <v-container>
    <v-form @submit.prevent="login">
      <v-text-field v-model="email" label="Email" required />
      <v-text-field v-model="password" label="Contraseña" type="password" required />
      <v-btn type="submit" color="primary">Iniciar sesión</v-btn>
      <v-alert v-if="error" type="error" class="mt-2">{{ error }}</v-alert>
    </v-form>
  </v-container>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const error = ref('')
const router = useRouter()

const login = async () => {
  error.value = ''
  try {
    const response = await axios.post('/api/login', {
      email: email.value,
      password: password.value,
    })
    localStorage.setItem('token', response.data.access_token)
    router.push('/dashboard')
  } catch (e) {
    error.value = e.response?.data?.message || 'Error al iniciar sesión'
  }
}
</script>