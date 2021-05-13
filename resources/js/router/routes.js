import Login from "../components/Front";
import Dashboard from "../components/Dashboard";
import Signup from "../components/Signup";
import AdminPage from "../components/AdminPage";
import AssistantPage from "../components/AssistantPage";
import RelateStudent from "../components/RelateStudent";
import FloorAssistantPage from "../components/FloorAssistantPage";

export default [
    {
        path:'/',
        redirect: {name:'login'}
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta: {
            noSideBar: true
        }
    },
    {
        path:'/dashboard',
        component:Dashboard,
        name:'dashboard',
        meta: {
            noSideBar: true
        }
    },
    {
        path:'/signup',
        component:Signup,
        name:'signup',
        meta: {
            noSideBar: true
        }
    },
    {
        path: '/admin-page',
        component: AdminPage,
        name: 'adminPage',
        // meta: {
        //     auth: {roles:['admin'], redirect:{name: 'login'}}
        // }
    },
    {
        path: '/assistants',
        component: AssistantPage,
        name: 'assistantPage'
    },
    {
        path: '/assistants/relateStudent',
        component: RelateStudent,
        name: 'relateStudent',
        props: true,
    },
    {
        path: '/floor-assistants',
        component: FloorAssistantPage,
        name: 'floorAssistant'
    },
    {
        path: '/floor-assistants/relate-assistant',
        component: RelateStudent,
        name: 'relateAssistant',
        props: true,
    },
    {
        path:'*',
        redirect:{name:'login'}
    }
];
