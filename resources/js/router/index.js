import { createRouter, createWebHistory } from 'vue-router' //fonction de Vue qui crée un routeur, c’est-à-dire le gestionnaire des routes côté frontend.
//createWebHistory : indique à Vue d’utiliser l’historique du navigateur (comme Laravel le fait) au lieu du # dans l’URL (qui serait createWebHashHistory).
import Home from '../pages/home.vue'
import Product from '../pages/Product.vue'

const routes = [
  { path: '/home', name: 'home', component: Home },
  { path: '/products', name: 'produits', component: Product },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router

// explication rapide :

// import Home from '../pages/Home.vue'
// import Produits from '../pages/Produits.vue'
// 🧠 Explication :

// Tu importes les composants Vue que tu vas associer aux routes.

// Home.vue et Produits.vue sont les pages que tu veux afficher quand l’utilisateur visite / ou /produits.

// js
// Copier
// Modifier
// const routes = [
//   { path: '/', name: 'home', component: Home },
//   { path: '/produits', name: 'produits', component: Produits },
// ]
// 🧠 Explication ligne par ligne :

// [ { path: '/', name: 'home', component: Home } ]
// path: '/' ➜ Quand l’utilisateur va sur la racine du site (comme http://localhost:5173/)

// name: 'home' ➜ Nom symbolique de la route (utile pour les redirections, navigation par nom, etc.)

// component: Home ➜ Le composant Home.vue sera affiché dans <router-view>.

// [ { path: '/produits', name: 'produits', component: Produits } ]
// Pareil, mais cette fois l’URL est /produits et ça affiche Produits.vue.

// Tu peux ensuite naviguer vers ces routes avec :

// <router-link to="/">Accueil</router-link>

// <router-link to="/produits">Produits</router-link>