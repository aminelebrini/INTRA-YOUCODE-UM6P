import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import AdminDashboard from '../views/AdminDashboard.vue'
import FormateurDash from '../views/FormateurDash.vue'
import StudentDashboard from '../views/StudentDashboard.vue'

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
  {
    path: '/formateurdashboard',
    name: 'FormateurDashboard',
    component: FormateurDash
  },
  {
    path: '/studentdashboard',
    name: 'StudentDashboard',
    component: StudentDashboard
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router