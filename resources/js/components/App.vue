
<template>
  <div class="d-flex">
    <!-- Sidebar à gauche -->
    <Sidebar />

    <!-- Contenu principal à droite -->
    <div class="flex-grow-1">
      <Navbar />
      <div class="container border p-3 mt-5" :class="bgColor">
        <router-view v-slot="{ Component }">
          <component :is="Component" :mode="mode" :setMode="setMode" :bgColorChange="bgColorChange" />
        </router-view>
      </div>
    </div>
  </div>
</template>

<script setup>
  import Sidebar from './Sidebar.vue'
  import Navbar from './Navbar.vue'
  import { ref } from 'vue'

  const mode = ref('1')
  const bgColor = ref('bg-light')

  function setMode(newMode) {
    mode.value = newMode
    bgColor.value = newMode === '1' ? 'bg-light' : 'bg-dark'
  }
</script>

<style scoped>
/* Tu peux ajouter du style local ici */
</style>
