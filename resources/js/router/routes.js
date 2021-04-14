import Login from "../components/Front";
import Dashboard from "../components/Dashboard";
import Signup from "../components/Signup";
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
        path:'/signup',
        component:Signup,
        name:'signup'
    },
    {
        path:'*',
        redirect:{name:'login'}
    }
];
