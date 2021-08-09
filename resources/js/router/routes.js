import Login from "../components/Front";
import Dashboard from "../components/Dashboard";
import Signup from "../components/Signup";
import AdminPage from "../components/AdminPage";
import AssistantPage from "../components/AssistantPage";
import RelateStudent from "../components/RelateStudent";
import FloorAssistantPage from "../components/FloorAssistantPage";
import SuccessPage from "../components/SuccessPage";
import Agreement from "../components/Agreement";
import MyProfile from "../components/MyProfile";
import InstructionPage from "../components/InstructionPage";

export default [
    {
        path:'/',
        redirect: {name:'dashboard'}
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
        path: '/dashboard/success',
        component: SuccessPage,
        name: 'successPage',
        props: true,
        meta: {
            noSideBar: true
        }
    },
    {
        path: '/dashboard/agreement',
        component: Agreement,
        name: 'agreement',
        meta: {
            noSideBar: true
        }
    },
    {
        path: '/dashboard/instruction',
        component: InstructionPage,
        name: 'instruction',
        meta: {
            noSideBar: true
        }
    },
    {
        path: '/my-profile',
        component: MyProfile,
        name: 'myProfile',
    },
    {
        path: '/offline-registration',
        component: Dashboard,
        name: 'offlineRegistration',
        props: true
    },
    {
        path:'*',
        redirect:{name:'login'}
    }
];
