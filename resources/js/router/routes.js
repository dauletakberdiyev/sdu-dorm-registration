import Login from "../components/Front";
import Dashboard from "../components/Dashboard";
export default [
    {
      path:'/',
      redirect: {name:'login'}
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
    },
    {
        path:'/dashboard',
        component:Dashboard,
        name:'dashboard'
    },
    {
        path:'*',
        redirect:{name:'login'}
    }
];
