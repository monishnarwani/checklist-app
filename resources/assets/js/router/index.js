import Vue from 'vue'
import VueRouter from 'vue-router'
import ChecklistMain from './../components/checklist/ChecklistMain'

Vue.use(VueRouter);

export default new VueRouter({
  routes: [
    {
      path: '/',
      name: 'checklist-app',
      component: ChecklistMain
    }
  ]
})