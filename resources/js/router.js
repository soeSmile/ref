import { createWebHistory, createRouter } from 'vue-router'

import App from './App.vue'
import About from '../Pages/About.vue'

const routes = [
  {
    path: '/',
    component: App,
  },
  {
    path: '/about',
    component: About,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router