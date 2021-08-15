<template>
    <!-- Dashboard Content -->
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-left-side">
                        <img src="/images/sdulogo_white.png" alt="">
                        <h3>{{$trans('registration.title')}}</h3>
                    </div>

                    <div class="instruction_link">
                        <router-link :to="{name: 'instruction'}" target="_blank" style="color:#fff;">{{$trans('registration.instruction')}}</router-link>
                    </div>

                    <nav id="breadcrumbs">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" style="margin-right: 10px;" v-for="lang in this.language.languageList" :value="lang.value" @click="changeLanguage">{{lang.title}}</button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <form enctype="multipart/form-data" @submit.prevent="submit">
        <div class="utf-dashboard-content-inner-aera">
            <div class="row">

                <div class="col-xl-12 counter_inner_block margin-bottom-20">
                    <div class="utf-counters-container-aera justify-content-center">
                        <div class="col-xl-3" v-for="count in values.freePlaceCount">
                            <div class="utf-single-counter">
                                <div class="utf-counter-inner-item" style="color: #000000">
                                    <h3><span class="counter">{{count.place_count}}</span></h3>
                                    <span class="utf-counter-title" v-if="count.building_id === 0">{{$trans('registration.male')}}</span>
                                    <span v-else class="utf-counter-title" >{{$trans('registration.female')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3>{{ $trans('registration.general_info') }}</h3>
                        </div>
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{ $trans('registration.first_name') }} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.first_name')" id="firstName" v-model="request.firstName" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{ $trans('registration.last_name') }} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.last_name')" id="lastName" v-model="request.lastName" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{ $trans('registration.father') }}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.father' )" id="father" v-model="request.father">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.phone_number')}} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.phone_number')" id="selfNumber" v-model="request.selfNumber" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{ $trans('registration.email') }} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.email')" id="email" v-model="request.email" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.iin')}} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.iin')" id="iin" v-model="request.iin" required>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-3 col-sm-3">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.gender')}} <span>*</span></h5>
                                        <select class="utf-with-border" :title="$trans('registration.gender')" v-model="request.gender" required>
                                            <option v-for="gender in values.genderTitle" :value="gender.id">
                                                {{ gender.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-3 col-sm-3" style="display: flex; align-items: flex-end">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.place_count')}}
                                            <span v-if="request.gender === 0">{{values.freePlaceCount[0].place_count}}</span>
                                            <span v-else-if="request.gender === 1"> {{values.freePlaceCount[1].place_count}}</span>
                                        </h5>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12"></div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.upload_pass')}} <span>*</span></h5>
                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                            <input class="uploadButton-input" type="file" accept="image/*" id="passport"  @change="onPassportChange" required>
                                            <label class="uploadButton-button ripple-effect" for="passport">{{$trans('registration.upload_pass')}}</label>
                                            <span class="uploadButton-file-name">{{$trans('registration.upload_passport')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.upload_photo')}} <span>*</span></h5>
                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                            <input class="uploadButton-input" type="file" accept="image/*" id="photo"  @change="onPhotoChange" required>
                                            <label class="uploadButton-button ripple-effect" for="photo">{{$trans('registration.upload_photo')}}</label>
                                            <span class="uploadButton-file-name">{{$trans('registration.upload_photo_title')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3>{{$trans('registration.personal_info')}}</h3>
                        </div>
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field datepicker">
                                        <h5>{{$trans('registration.birth_date')}} <span>*</span></h5>
                                        <input class="utf-with-border" type="date" id="birthDate" v-model="request.birthDate" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.address')}} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.address')" id="address" v-model="request.address" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.city')}} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.city')" id="city" v-model="request.city" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.school')}} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.school')" id="school" v-model="request.school" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.faculty')}} <span>*</span></h5>
                                        <select class="utf-with-border" title="Select Faculty" v-model="request.facultyCode" @change="getProgramTitle()" required>
                                            <option v-for="facultyCode in values.facultyCodes" :value="facultyCode.id">
                                                {{ facultyCode.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.speciality')}} <span>*</span></h5>
                                        <select class="utf-with-border" title="Select Speciality" v-model="request.programCode" id="speciality-list" required>
                                            <option v-for="programCode in values.programCodes" :value="programCode.id">
                                                {{ programCode.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.course')}} <span>*</span></h5>
                                        <input type="number" class="utf-with-border" :placeholder="$trans('registration.course')" id="course" min="0" max="4" v-model="request.course" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3>{{$trans('registration.parent_info')}}</h3>
                        </div>
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.father_name')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.name_surname')" id="fatherName" v-model="request.fatherName">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.mother_name')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.name_surname')" id="motherName" v-model="request.motherName">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.father_number')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.phone_number')" id="fatherNumber" v-model="request.fatherNumber">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.mother_number')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.phone_number')" id="motherNumber" v-model="request.motherNumber">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3>{{$trans('registration.agreement')}}</h3>
                        </div>
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="utf-submit-field">
                                        <div class="margin-bottom-10">
                                            <span style="color: #000">{{$trans('registration.read_agreement')}}:</span>
                                            <router-link :to="{name: 'agreement'}" style="color: blue" target="_blank">{{$trans('registration.agreement')}}</router-link>
                                        </div>

                                        <div class="checkbox">
                                            <input type="checkbox" id="agree-check" @click="agreementCheck">
                                            <label for="agree-check" style="color: #000"><span class="checkbox-icon"></span>{{$trans('registration.check_agree')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12" style="display: none" id="error-notification">
                    <div class="notification error closeable">
                        <p>{{$trans('registration.dont_laugh')}}</p>
                        <a class="close" href="#"></a>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3>{{$trans('registration.payment')}}</h3>
                        </div>
                        <div class="content with-padding">
                            <div class="row">

<!--                                <div class="col-xl-6 col-md-6 col-sm-12">-->
<!--                                    <h3 class="margin-bottom-10">Here we go again</h3>-->
<!--                                    <button type="submit" id="sendButton" class="button ripple-effect" :disabled="!this.request.agree">{{!admin ? $trans('adminPage.pay') : $trans('registration.register')}}</button>-->
<!--                                </div>-->

                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <h3 class="margin-bottom-10">{{$trans('registration.kaspi_pay')}}</h3>
                                    <h5>{{$trans('registration.kaspi_info1')}} <router-link :to="{name: 'instruction'}" style="color: blue" target="_blank">{{$trans('registration.here')}}</router-link></h5>
                                    <h5>{{$trans('registration.kaspi_info4')}}</h5>
                                    <h5>{{$trans('registration.dorm_number_boy')}}</h5>
                                    <h5>{{$trans('registration.dorm_number_girls')}}</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="utf-centered-button">
                <button type="submit" id="sendButton" class="button margin-top-0"  style="background-color: #9E2629; font-weight: 400" :disabled="!this.request.agree">{{$trans('registration.register')}}</button>
            </div>

            <!-- Footer -->
            <div class="utf-dashboard-footer-spacer-aera"></div>
            <div class="utf-small-footer margin-top-15">
                <div class="utf-small-footer-copyrights">&copy; 2021 All Rights Reserved. By <a href="https://www.instagram.com/iamdauletakberdiyev"  target="_blank" style="color: #061B47">Daulet Akberdiyev</a></div>
            </div>
        </div>
        </form>
    </div>
    <!-- Dashboard Content / End -->
</template>
<script>
    import {goTo} from '../mixins/GoTo';
    import Axios from "axios";
    export default {
        mixins: [goTo],
        props: {
            admin: Boolean,
        },
        data(){
            return{
                request:{
                    email:'',
                    firstName:'',
                    lastName:'',
                    father:'',
                    birthDate:'',
                    city:'',
                    facultyCode:'',
                    programCode:'',
                    course:'',
                    school:'',
                    address:'',
                    fatherNumber:'',
                    motherNumber:'',
                    selfNumber:'',
                    iin:'',
                    gender:'',
                    passportPhoto:null,
                    personalPhoto:null,
                    motherName:'',
                    fatherName:'',
                    agree: false,
                },
                values:{
                    genderTitle:[],
                    facultyCodes:[],
                    programCodes:[],
                    freePlaceCount:[],
                },
                language:{
                    languageList : [
                        {title : 'EN', value : 'en'},
                        {title : 'KZ', value : 'kz'},
                        {title : 'RU', value : 'ru'}
                    ]
                }
            }
        },

        mounted() {
            this.getGenderTitle(),
            this.getFacultyTitle(),
            this.getFreePlaceCount()
        },

        methods: {
            onPassportChange(e){
                this.request.passportPhoto = e.target.files[0];
            },

            onPhotoChange(e){
                this.request.personalPhoto = e.target.files[0];
            },

            register(){
                const formData = new FormData();
                for(const key in this.request){
                    formData.append(key, this.request[key])
                }
                this.$http.post('api/dashboard',formData)
                    .then(response=>{
                    (!this.admin) ? this.goTo('successPage',{email: this.request.email})
                        : this.goTo('adminPage', {admin: true});
                }).catch((e) => {
                    alert(e.response.data.message);
                })
            },

            getGenderTitle(){
                this.$http.post('api/getGenderTitle')
                    .then(response => {
                        this.values.genderTitle = response.data.data;
                    })
            },

            getFacultyTitle(){
                this.$http.post('api/getFacultyTitle')
                    .then(response => {
                        this.values.facultyCodes = response.data.data;
                    })
            },

            getProgramTitle(){
                this.$http.post('api/getProgramTitle',{
                    faculty_code: this.request.facultyCode
                })
                    .then(response => {
                        this.values.programCodes = response.data.data;
                    });
            },

            getFreePlaceCount(){
                this.$http.post('api/getFreePlaceCount')
                    .then(response => {
                        this.values.freePlaceCount = response.data.data;
                    });
            },

            changeLanguage(e){
                this.$lang.setLocale(e.target.value);
                this.$http.defaults.headers.common['Content-Language'] = this.$lang.getLocale();
            },

            viewPdf(){
                window.open("~/public/agreement/agreement.pdf", "_blank");
            },

            agreementCheck(e){
                this.request.agree = e.target.checked;
            },

            submit(){
                this.register();
                // if(this.admin){
                //     this.register();
                // }else{
                //     this.pay();
                // }
            },

            pay(){
                if(this.request.agree) {
                    var widget = new cp.CloudPayments();
                    let reg = this.register;
                    widget.pay('charge', {
                            publicId: 'pk_f78dafe1f651e871a20e3ef43492d',
                            description: 'Pay for Dorm',
                            amount: 50,
                            currency: 'KZT',
                            skin: 'modern',
                            email: 'dauletakberdiyev@gmail.com'
                        },
                        {
                            onSuccess: function (options) { // success
                                reg();
                                console.log('success');
                            },
                            onFail: function (reason, options) { // fail
                                console.log(reason);
                            },
                            onComplete: function (paymentResult, options) { //Вызывается как только виджет получает от api.cloudpayments ответ с результатом транзакции.
                                console.log(paymentResult);
                            }
                        }
                    )
                }
                else{
                    //TODO: need to finish it
                    console.log('Don\'t make me laugh');
                    const notification = document.querySelector('#error-notification');
                    notification.style.display = 'block';
                }
            },
        }
    }
</script>

<style scoped>
    #sendButton:disabled{
        background-color: #66676b;
        cursor: default;
    }
</style>
