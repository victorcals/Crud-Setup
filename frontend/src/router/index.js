import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import EstudanteView from '../views/Estudante/EstudanteView.vue'
import EstudanteCreate from '../views/Estudante/Create.vue'
import EstudanteEditar from '../views/Estudante/Editar.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/estudante',
      name: 'estudante',
      component: EstudanteView
    },
    {
      path: '/estudante/create',
      name: 'estudanteCreate',
      component: EstudanteCreate
    },
    {
      path: '/estudante/:id/editar',
      name: 'estudanteEditar',
      component: EstudanteEditar
    }

  ]
})

export default router
