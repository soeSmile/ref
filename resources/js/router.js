import { createWebHistory, createRouter } from 'vue-router'

import Index from './Pages/index.vue'
import Setting from './Pages/setting.vue'
import User from './Pages/User/index.vue'
import Category from './Pages/Category/index.vue'
import Tag from './Pages/Tag/index.vue'
import Link from './Pages/Link/index.vue'

const routes = [
  {
    path: '/',
    redirect: to => {
      return { path: '/admin' }
    },
    component: Index,
  },
  {
    path: '/admin',
    name: 'home',
    component: Index,
  },
  {
    path: '/admin/setting',
    name: 'setting',
    component: Setting,
  },
  {
    path: '/admin/category',
    name: 'category',
    component: Category,
  },
  {
    path: '/admin/tag',
    name: 'tag',
    component: Tag,
  },
  {
    path: '/admin/link',
    name: 'link',
    component: Link,
  },
  {
    path: '/admin/user',
    name: 'user',
    component: User,
    meta: { auth: true },
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

/**
 * can meta: { auth: true }
 */
router.beforeEach(async (to, from) => {
  return true
})

export default router