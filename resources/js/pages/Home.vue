<template>
    <select class="form-select" id="select" :value="mode" @change="onChange">
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
        {{visible ? 'Cacher le message' : 'Afficher le message'}}
    </button>
</template>

<script setup>

    import { ref, defineProps } from 'vue'

    // Props
    const props = defineProps({
        mode: String,
        setMode: Function,
        bgColorChange: Function
    })

    const message = ref('Bienvenue dans Vue.js avec Laravel !')
    const textColor = ref('text-primary')
    const visible = ref(true)

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

    function onChange(event) {
        // Appel de la fonction du parent pour changer le mode
        props.setMode(event.target.value)
    }

</script>

<style scoped>
/* Tu peux ajouter du style local ici */
</style>