import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import AdminDashboard from '../views/AdminDashboard.vue'
import FormateurDash from '../views/FormateurDash.vue'
import StudentDashboard from '../views/StudentDashboard.vue'

function redirectByRole(role) {
  if (role === 'admin') return '/admindashboard'
  if (role === 'formateur') return '/formateurdashboard'
  if (role === 'etudiant') return '/studentdashboard'
  return '/'
}

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

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  const data = localStorage.getItem('user')

  if (!token || !data) {
    if (to.path !== '/') {
      return next('/')
    }
    return next()
  }

  let user = null

  try {
    user = JSON.parse(data)
  } catch (error) {
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    return next('/')
  }

  const role = String(user?.role || '').toLowerCase().trim()

  if (to.path === '/') {
    return next(redirectByRole(role))
  }

  if (to.path === '/admindashboard' && role !== 'admin') {
    return next(redirectByRole(role))
  }

  if (to.path === '/formateurdashboard' && role !== 'formateur') {
    return next(redirectByRole(role))
  }

  if (to.path === '/studentdashboard' && role !== 'etudiant') {
    return next(redirectByRole(role))
  }

  return next()
})

export default router
