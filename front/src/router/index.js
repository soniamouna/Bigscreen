import { createRouter, createWebHistory } from 'vue-router'
import Poll from '../views/public/Poll.vue'
import Responses from '../views/public/Responses.vue'
import Login from '../views/public/Login.vue'
import AdminCharts from '../views/admin/AdminCharts.vue'
import AdminQuestions from '../views/admin/AdminQuestions.vue'
import AdminResponses from '../views/admin/AdminResponses.vue'
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
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: "/administration",
      name: "admin",
      component: AdminCharts,
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
       
      component: AdminQuestions,
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
      component: () => AdminResponses,
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
