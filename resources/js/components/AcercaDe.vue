<template>
  <v-container class="mt-5">
    <v-card>
      <v-card-title>
        <v-icon left>mdi-information</v-icon>
        Acerca de la Aplicación
      </v-card-title>
      <v-card-text>
        <p>
          Esta aplicación de farmacia ha sido desarrollada con Laravel, Vue 3 y Vuetify.
        </p>
        <p>
          Versión: 1.0.0
        </p>
        <p>
          Autor: Tu Nombre o Empresa
        </p>
        <p>
          © {{ new Date().getFullYear() }} Todos los derechos reservados.
        </p>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script setup>
import AcercaDe from '@/components/AcercaDe.vue'

const routes = [
  // ...otras rutas...
  { path: '/acerca-de', name: 'AcercaDe', component: AcercaDe },
]
// No se requiere lógica adicional para esta vista estática
</script>

<!-- Ejemplo de enlace en tu menú -->
<router-link to="/acerca-de">Acerca de</router-link>