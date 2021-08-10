<template>
    <!-- Dashboard Sidebar -->
    <div class="utf-dashboard-sidebar-item">
        <div class="utf-dashboard-sidebar-item-inner" data-simplebar>
            <div class="utf-dashboard-nav-container">
                <!-- Responsive Navigation Trigger -->
                <a href="#" class="utf-dashboard-responsive-trigger-item"> <span class="hamburger utf-hamburger-collapse-item" > <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span> </span> <span class="trigger-title">Dashboard Navigation Menu</span> </a>
                <!-- Navigation -->
                <div class="utf-dashboard-nav">
                    <div class="utf-dashboard-nav-inner">
                        <div class="dashboard-profile-box">
                            <div class="user-profile-text" style="margin-left: 24px;">
                                <span class="fullname">{{loadData.userInfo.info.first_name}} {{loadData.userInfo.info.last_name}}</span>
                                <span class="user-role">Software Engineer</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul>
                            <li :class="{active:$route.name==link.name}" v-for="(link,index) in links" :key="index"><router-link :to="{name:link.name, params:{admin: true}}" ><i :class="link.icon"></i>{{$trans(link.title)}}</router-link></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Sidebar / End -->
</template>

<script>
    const links=[
        {
            name:'adminPage',
            icon:'icon-material-outline-dashboard',
            title:'adminPage.student_list'
        },
        {
            name:'assistantPage',
            icon:'icon-line-awesome-user-secret',
            title:'adminPage.abiwkas'
        },
        {
            name:'floorAssistant',
            icon:'icon-material-outline-group',
            title:'adminPage.katchi'
        },
        {
            name:'myProfile',
            icon:'icon-feather-user',
            title:'adminPage.profile'
        },
        {
            name:'bookingStudents',
            icon:'icon-material-outline-note-add',
            title:'adminPage.booked_student'
        },
        {
            name:'logout',
            icon:'icon-material-outline-power-settings-new',
            title:'adminPage.logout'
        },
    ]
    export default {
        name: "AdminSideBar",
        data(){
            return{
                links:links,
                loadData:{
                    userInfo:[],
                }
            }
        },

        created(){
            this.onPageLoad()
        },

        methods: {
            onPageLoad(){
                this.$http.post('api/admin/side-bar')
                    .then(response =>{
                        this.loadData.userInfo = response.data.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
