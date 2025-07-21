<template>
  <div class="card p-3">
    <div class="card-header p-3 mb-3">
      <select class="form-select" id="select" :value="mode" @change="onChange">
          <option value="1">Jour</option>
          <option value="2">Nuit</option>
      </select>
    </div>
    <div class="row">
      <div class="col-8 border-end">
        <h2>Page Produits</h2>
      </div>
      <div class="col-4">
        <button class="btn btn-primary mt-3 me-2" @click="changerMessage">+ Ajouter un produit</button>
      </div>
    </div>
    <div class="row mt-3 border-top pt-3">
      <p>Liste des produits...</p>
    </div>
    
    
  </div>
</template>

<script setup>

  import { ref, defineProps } from 'vue'
  // Props
  const props = defineProps({
    mode: String,
    setMode: Function,
    bgColorChange: Function
  })   

  function onChange(event) {
      // Appel de la fonction du parent pour changer le mode
      props.setMode(event.target.value)
  }
</script>