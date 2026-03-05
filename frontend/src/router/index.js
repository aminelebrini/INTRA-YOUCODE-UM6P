import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import AdminDashboard from '../views/AdminDashboard.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/admindashboard',
    name: 'Dashboard',
    component: AdminDashboard
  },
//   {
//     path: '/login',
//     name: 'Login',
//     component: Login
//   }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router