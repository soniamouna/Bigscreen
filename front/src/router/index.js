import { createRouter, createWebHistory } from 'vue-router'
import Poll from '../views/public/Poll.vue'
import Responses from '../views/public/Responses.vue'
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
      path: "/administration",
      name: "admin",
      component: () => import("../views/admin/AdminCharts.vue"),
      beforeEnter() {
        if (localStorage.getItem("token") == null) {
          alert("Vous n'êtes pas autorisé à accéder à cette page. Veuillez vous connecter")
          return { path: "/login" };
        }
      },
    },
    {
      path: "/administration/questionnaire",
      name: "adminQuestions",
       
      component: () => import("../views/admin/AdminQuestions.vue"),
      beforeEnter() {
        if (localStorage.getItem("token") == null) {
          alert("Vous n'êtes pas autorisé à accéder à cette page. Veuillez vous connecter")
          return { path: "/login" };
        }
      },
    },
    {
      path: "/administration/reponses",
      name: "adminResponses",
      component: () => import("../views/admin/AdminResponses.vue"),
      beforeEnter() {
        if (localStorage.getItem("token") == null) {
          alert("Vous n'êtes pas autorisé à accéder à cette page. Veuillez vous connecter")
          return { path: "/login" };
        }
      },
    },
    {
      path: "/:pathMatch(.*)*",
      name: "Page404",
      component: () => import("../views/public/Page404.vue"),
      
    },
  ]
})

export default router
