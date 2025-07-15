<template>
  <div class="container mt-5">
    <h1 class="text-primary">Bonjour depuis Vue 👋</h1>
    <p>Message : {{ message }}</p>

    <button class="btn btn-success mt-3" @click="changerMessage">
      Changer le message
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const message = ref('Bienvenue dans Vue.js avec Laravel !')

function changerMessage() {
  message.value = 'Tu as cliqué sur le bouton 🚀'
}
</script>

<style scoped>
/* Tu peux ajouter du style local ici */
</style>
