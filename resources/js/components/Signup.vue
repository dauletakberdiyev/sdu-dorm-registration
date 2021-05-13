<template>
    <!-- Titlebar -->
    <div style="width: 100%">
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Register</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index-1.html">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </nav>
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
                        <h3>Create Your New Account!</h3>
                        <span>Don't Have an Account? <a href="/login">Log In!</a></span>
                    </div>

                    <form id="utf-register-account-form" @submit.prevent="signup">
                        <div class="utf-no-border">
                            <input type="text" class="utf-with-border" name="emailaddress-register" id="emailaddress-register" placeholder="Email Address" v-model="request.email" required/>
                        </div>
                        <div class="utf-no-border">
                            <input type="password" class="utf-with-border" name="password-register" id="password-register" placeholder="Password" v-model="request.password" required/>
                        </div>
                        <div class="utf-no-border">
                            <input type="password" class="utf-with-border" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" v-model="request.password_confirm" required/>
                        </div>
                        <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit">Create An Account <i class="icon-feather-chevrons-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                request:{
                    email:'',
                    password:'',
                    password_confirm:'',
                }
            }
        },
        methods: {
            signup(){
                this.$http.post('api/signup',this.request).then(response=>{
                    let access_token=response.data.data.access_token;
                    localStorage.setItem('access_token',access_token);
                    this.$http.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.data.access_token;
                    this.$router.push({name:'dashboard'});
                })
            }
        }
    }
</script>

