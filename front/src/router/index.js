import { createRouter, createWebHistory } from 'vue-router'
import Poll from '../views/public/Poll.vue'
import Responses from '../views/public/Responses.vue'
import Admin from '../views/admin/Admin.vue'
import Login from '../views/public/Login.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'poll',
      component: Poll
    },
    {
      path: '/reponses/:link',
      name: 'responses',
      component: Responses
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      // component: () => import('../views/AboutView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/administration',
      name: 'admin',
      component: Admin
    },
  ]
})

export default router
