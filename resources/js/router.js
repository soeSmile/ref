import { createWebHistory, createRouter } from 'vue-router'

import Index from './pages/index.vue'
import Setting from './pages/setting.vue'
import User from './pages/user.vue'

const routes = [
  {
    path: '/',
    component: Index,
  },
  {
    path: '/setting',
    component: Setting,
  },
  {
    path: '/user',
    component: User,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router