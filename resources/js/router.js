import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent.vue';
import AnswerTrue from './components/AnswerTrue.vue';
import AnswerFalse from './components/AnswerFalse.vue';


Vue.use(VueRouter);

export default new VueRouter({
  mode:"hash",
  routes: [
    {
      path: '/answertrue',
      name: "AnswerTrue",
      component: AnswerTrue
    },
    {
      path: '/',
      name: "ExampleComponent",
      component: ExampleComponent
    },
    {
      path: '/answerfalse',
      name: "AnswerFalse",
      component: AnswerFalse
    },
    {
      path: '*',
      redirect: '/'
    },
  ]
})
