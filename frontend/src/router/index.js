import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import AdminDashboard from '../views/AdminDashboard.vue'
import FormateurDash from '../views/FormateurDash.vue'
import StudentDashboard from '../views/StudentDashboard.vue'

function normalizeRole(role) {
  return String(role || '').toLowerCase().trim()
}

function getStoredSession() {
  const token = localStorage.getItem('token')
  const rawUser = localStorage.getItem('user')

  if (!token || !rawUser) {
    return { token: null, user: null }
  }

  try {
    return {
      token,
      user: JSON.parse(rawUser)
    }
  } catch (error) {
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    return { token: null, user: null }
  }
}

function getDefaultRouteByRole(role) {
  const normalizedRole = normalizeRole(role)

  if (normalizedRole === 'admin') return '/admindashboard'
  if (normalizedRole === 'formateur') return '/formateurdashboard'
  if (normalizedRole === 'etudiant') return '/studentdashboard'

  return '/'
}

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: { public: true }
  },
  {
    path: '/admindashboard',
    name: 'Dashboard',
    component: AdminDashboard,
    meta: { requiresAuth: true, roles: ['admin'] }
  },
  {
    path: '/formateurdashboard',
    name: 'FormateurDashboard',
    component: FormateurDash,
    meta: { requiresAuth: true, roles: ['formateur'] }
  },
  {
    path: '/studentdashboard',
    name: 'StudentDashboard',
    component: StudentDashboard,
    meta: { requiresAuth: true, roles: ['etudiant'] }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const { token, user } = getStoredSession()
  const userRole = normalizeRole(user?.role)
  const requiresAuth = to.matched.some(route => route.meta.requiresAuth)
  const allowedRoles = to.meta.roles || []

  if (requiresAuth && (!token || !user)) {
    return next('/')
  }

  if (requiresAuth && allowedRoles.length > 0 && !allowedRoles.includes(userRole)) {
    return next(getDefaultRouteByRole(userRole))
  }

  if (to.path === '/' && token && user) {
    return next(getDefaultRouteByRole(userRole))
  }

  return next()
})

export default router
