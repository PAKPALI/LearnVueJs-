<template>
  <!-- Modal -->
  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addProductModalLabel">Ajouter un produit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <!-- Formulaire ici -->
          <form>
            <div class="mb-3">
              <label for="nomProduit" class="form-label">Nom du produit</label>
              <input type="text" class="form-control" id="nomProduit" v-model="nom" @keyup="validateNom">
              <label :class="labelNameLog">{{ nameLog }}</label>
            </div>
            <div class="mb-3">
              <label for="quantite" class="form-label">Quantité</label>
              <input type="number" class="form-control" id="quantite" v-model="quantite" @keyup="validateQte">
              <label :class="labelQteLog">{{ qteLog }}</label>
            </div>
            <div class="mb-3">
              <label for="limite" class="form-label">Limite</label>
              <input type="number" class="form-control" id="limite" v-model="limite" @keyup="validateLimit">
              <label :class="labelLimitLog">{{ limitLog }}</label>
            </div>
            <div class="mb-3">
              <label for="statut" class="form-label">Statut (<label :class="labelStatusLog">{{ statusLog }}</label></label>)
              <select class="form-select" id="statut" v-model="status" @change="changeStatus">
                <option value="">-- Choisir un statut --</option>
                <option value="1">Disponible</option>
                <option value="2">Indisponible</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary" @click="validerProduit">Ajouter</button>
        </div>
      </div>
    </div>
  </div>

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
        <button class="btn btn-primary mt-3 me-2" @click="addProduct">+ Ajouter un produit</button>
      </div>
    </div>
    <div class="row mt-3 border-top pt-3">
      <p>Liste des produits...</p>
    </div>
  </div>
</template>

<script setup>

  import { Modal } from 'bootstrap'


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

  const nom = ref('')
  const quantite = ref(0)
  const limite = ref(0)

  const nameLog = ref('Aucun nom pour le moment')
  const labelNameLog = ref('text-danger')
  let nameLenght = 0

  const qteLog = ref('La quantité est égale à 0')
  const labelQteLog = ref('text-danger')
  let qte = 0

  const limitLog = ref('La limite est égale à 0')
  const labelLimitLog = ref('text-danger')
  let limit = 0

  const statusLog = ref('Le status est sur indisponible')
  const labelStatusLog = ref('text-danger')
  const status = ref('')
  
  function addProduct() {
    // Ouvre le modal pour ajouter un produit
    const modal = new Modal(document.getElementById('addProductModal'))
    modal.show()
  }
  
  function validateNom(event) {
    nameLenght = event.target.value.length
    nameLog.value = nameLenght< 3 ? 'Le nom doit contenir au moins 3 caractères' : 'Nombre de caractère valide ('+event.target.value+')'
    labelNameLog.value = nameLenght < 3 ? 'text-danger' : 'text-success'
  }

  function validateQte(event) {
    qte = event.target.value
    qteLog.value = qte <= 0 ? 'La quantité est égale à 0' : 'La quantité est égale à ' + qte
    labelQteLog.value = qte <= 0 ? 'text-danger' : 'text-success'
  }

  function validateLimit(event) {
    limit = event.target.value
    limitLog.value = limit <= 0 ? 'La limite est égale à 0' : 'La limite est égale à ' + limit
    labelLimitLog.value = limit <= 0 ? 'text-danger' : 'text-success'
  }

  function changeStatus(event) {
    status.value = event.target.value
    if(status.value == 0 ) {
      statusLog.value = 'Choisir un statut'
      labelStatusLog.value = 'text-danger'
    }else if (status.value == 1) {
      statusLog.value = 'Le status est disponible'
      labelStatusLog.value = 'text-success'
    }else {
      statusLog.value = 'Le status est indisponible'
      labelStatusLog.value = 'text-danger'
    }
  }
</script>