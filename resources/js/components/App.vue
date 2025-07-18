

<template>
  <div class="d-flex">
    <!-- Sidebar à gauche -->
    <Sidebar />

    <!-- Contenu principal à droite -->
    <div class="flex-grow-1">
      <Navbar />
      <div class="container border p-3 mt-5" :class="bgColor">
        <select class="form-select" id="select" v-model="mode" @change="bgColorChange">
          <option value="1">Jour</option>
          <option value="2">Nuit</option>
        </select>
        <h1 :class="textColor">Bonjour depuis Vue 👋</h1>
        <p v-if="visible" :class="textColor">Message : {{ message }}</p>

        <button class="btn btn-secondary mt-3 me-2" @click="changerMessage">
          Changer le message
        </button>

        <button class="btn btn-secondary mt-3 me-3" @click="colorChange">
          Changer la couleur du texte
        </button>

        <button class="btn btn-secondary mt-3 me-3" @click="visibility">
          {{visible ? 'Cacher le texte' : 'Afficher le texte'}}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
  import Sidebar from './Sidebar.vue'
  import Navbar from './Navbar.vue'

  import { ref } from 'vue'

  const message = ref('Bienvenue dans Vue.js avec Laravel !')
  const textColor = ref('text-primary')
  const visible = ref(true)
  const mode = ref('1')
  const bgColor = ref('bg-light')

  function colorChange () {
    textColor.value = textColor.value === 'text-primary' ? 'text-danger' : 'text-primary'
    message.value = textColor.value === 'text-primary'?`Le texte est maintenant blue`:`Le texte est maintenant rouge`
  }

  function changerMessage() {
    message.value = 'Tu as cliqué sur le bouton 🚀'
  }

  function visibility() {
    visible.value = !visible.value
  }

  function bgColorChange() {
    bgColor.value = mode.value === '1' ? 'bg-light' : 'bg-dark'
  }
</script>

<style scoped>
/* Tu peux ajouter du style local ici */
</style>
