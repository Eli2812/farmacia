<template>
  <v-container class="mt-5">
    <v-card>
      <v-card-title>
        <v-icon left>mdi-email</v-icon>
        Contacto
      </v-card-title>
      <v-card-text>
        <v-form @submit.prevent="enviarFormulario" ref="form">
          <v-text-field
            v-model="nombre"
            label="Nombre"
            required
          />
          <v-text-field
            v-model="email"
            label="Correo electrónico"
            type="email"
            required
          />
          <v-textarea
            v-model="mensaje"
            label="Mensaje"
            required
          />
          <v-btn type="submit" color="primary" :loading="enviando">
            Enviar
          </v-btn>
          <v-alert
            v-if="exito"
            type="success"
            class="mt-2"
            dismissible
          >
            ¡Mensaje enviado correctamente!
          </v-alert>
          <v-alert
            v-if="error"
            type="error"
            class="mt-2"
            dismissible
          >
            {{ error }}
          </v-alert>
        </v-form>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref } from 'vue'
import axios from '@/axios'
import Contacto from '@/components/Contacto.vue'

const nombre = ref('')
const email = ref('')
const mensaje = ref('')
const enviando = ref(false)
const exito = ref(false)
const error = ref('')

const routes = [
  { path: '/contacto', name: 'Contacto', component: Contacto },
]

const enviarFormulario = async () => {
  enviando.value = true
  exito.value = false
  error.value = ''
  try {
    await axios.post('/api/contacto', {
      nombre: nombre.value,
      email: email.value,
      mensaje: mensaje.value,
    })
    exito.value = true
    nombre.value = ''
    email.value = ''
    mensaje.value = ''
  } catch (e) {
    error.value = e.response?.data?.message || 'Error al enviar el mensaje'
  } finally {
    enviando.value = false
  }
}
</script>