import LoginView from '../views/LoginView.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue')
    },
    {
      path: '/customer',
      name: 'customer',
      component: () => import('../views/CustomerView.vue')
    },
    {
      path: '/category',
      name: 'category',
      component: () => import('../views/CategoryView.vue')
    },
    {
      path: '/sparepart',
      name: 'sparepart',
      component: () => import('../views/SparepartView.vue')
    },
    {
      path: '/transaction',
      name: 'transaction',
      component: () => import('../views/TransactionView.vue')
    },
    {
      path: '/transaction/:id/detail',
      name: 'transaction-detail',
      component: () => import('../views/TransactionDetailView.vue')
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'notfound',
      component: () => import('../views/NotFoundView.vue')
    }
  ]
})

export default router
