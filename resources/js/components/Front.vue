<template>
    <div>
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
    <!-- Footer -->
    <div id="footer">
        <div class="utf-footer-section-item-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="utf-footer-item-links">
                            <a href="index-1.html"><img class="footer-logo" src="images/footer_logo.png" alt=""></a>
                            <p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when unknown printer took a galley type scrambled.</p>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-6">
                        <div class="utf-footer-item-links">
                            <h3>Job Categories</h3>
                            <ul>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Developement</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Designing</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Marketing</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Data Analytics</span></a></li>
                                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>Post New Job</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-6">
                        <div class="utf-footer-item-links">
                            <h3>Job Type</h3>
                            <ul>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Work from Home</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Internship Job</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Freelancer Job</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Part Time Job</span></a></li>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Full Time Job</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-6">
                        <div class="utf-footer-item-links">
                            <h3>Resources</h3>
                            <ul>
                                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>My Account</span></a></li>
                                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>Support</span></a></li>
                                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>How It Works</span></a></li>
                                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>Underwriting</span></a></li>
                                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>Employers</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-3 col-sm-6">
                        <div class="utf-footer-item-links">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="jobs-list-layout-leftside.html"><i class="icon-feather-chevrons-right"></i> <span>Jobs Listing</span></a></li>
                                <li><a href="about-us.html"><i class="icon-feather-chevrons-right"></i> <span>About Us</span></a></li>
                                <li><a href="contact.html"><i class="icon-feather-chevrons-right"></i> <span>Contact Us</span></a></li>
                                <li><a href="privacy-policy.html"><i class="icon-feather-chevrons-right"></i> <span>Privacy Policy</span></a></li>
                                <li><a href="terms-condition.html"><i class="icon-feather-chevrons-right"></i> <span>Term & Condition</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Copyrights -->
        <div class="utf-footer-copyright-item">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">Copyright &copy; 2020 All Rights Reserved.</div>
                </div>
            </div>
        </div>
        <!-- Footer Copyrights / End -->
    </div>
    <!-- Footer / End -->

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
                }
            }
        },
        methods: {
            login(){
                this.$http.post('api/login',this.request).then(response=>{
                    let access_token=response.data.data.access_token;
                    localStorage.setItem('access_token',access_token);
                    this.$http.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.data.access_token;
                    this.$router.push({name:'dashboard'});
                })
            }
        }
    }
</script>
