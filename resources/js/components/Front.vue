<template>
    <div style="width: 100%">
    <!--Loader-->
    <div class="vfx-loader">
        <div class="loader-wrapper">
            <div class="loader-content">
                <div class="loader-dot dot-1"></div>
                <div class="loader-dot dot-2"></div>
                <div class="loader-dot dot-3"></div>
                <div class="loader-dot dot-4"></div>
                <div class="loader-dot dot-5"></div>
                <div class="loader-dot dot-6"></div>
                <div class="loader-dot dot-7"></div>
                <div class="loader-dot dot-8"></div>
                <div class="loader-dot dot-center"></div>
            </div>
        </div>
    </div>
    <!-- Loader end -->

    <!-- Titlebar -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Log In</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="utf-login-register-page-aera margin-bottom-50">
                    <div class="utf-welcome-text-item">
                        <h3>Welcome to Sign in</h3>
                        <span>Don't Have an Account? <a href="/signup">Sign Up!</a></span>
                    </div>
                    <form @submit.prevent="login">
                        <div class="utf-no-border">
                            <input type="text" class="utf-with-border" name="emailaddress" id="emailaddress" placeholder="Email Address" v-model="request.email" required/>
                        </div>
                        <div class="utf-no-border">
                            <input type="password" class="utf-with-border" name="password" id="password" placeholder="Password" v-model="request.password" required/>
                        </div>
                        <div class="checkbox margin-top-10">
                            <input type="checkbox" id="two-step">
                            <label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
                        </div>
                        <a href="forgot-password.html" class="forgot-password">Forgot Password?</a>
                        <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit">Log In <i class="icon-feather-chevrons-right"></i></button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Wrapper / End -->

    </div>
</template>
<script>
    import Axios from "axios";

    export default {
        data(){
            return{
                request:{
                    email:'',
                    password:''
                },
            }
        },
        methods: {
            login(){
                this.$http.post('api/login',this.request).then(response=>{
                    let access_token=response.data.data.access_token;
                    localStorage.setItem('access_token',access_token);
                    this.$http.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.data.access_token;
                    // if(response.data.data.user_role === 'admin'){
                        this.$router.push({name: 'adminPage'});
                    // }else {
                    //     this.$router.push({name: 'dashboard'});
                    // }

                })
            }
        }
    }
</script>
