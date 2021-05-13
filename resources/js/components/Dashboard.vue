<template>
    <!-- Dashboard Content -->
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>Manage Jobs Post</h3>
                    <nav id="breadcrumbs">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" v-for="lang in this.language.languageList" :value="lang.value" @click="changeLanguage">{{lang.title}}</button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <form enctype="multipart/form-data" @submit.prevent="pay">
        <div class="utf-dashboard-content-inner-aera">
            <div class="row">
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
                                        <h5>{{$trans('registration.iin')}} <span>*</span></h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.iin')" id="iin" v-model="request.iin" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.gender')}} <span>*</span></h5>
                                        <select class="utf-with-border" :title="$trans('registration.gender')" v-model="request.gender" required>
                                            <option v-for="gender in values.genderTitle" :value="gender.id">
                                                {{ gender.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.upload_photo', {name: 'Passport'})}} <span>*</span></h5>
                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                            <input class="uploadButton-input" type="file" accept="image/*" id="passport"  @change="onFileChange" required>
                                            <label class="uploadButton-button ripple-effect" for="passport">{{$trans('registration.upload_photo', {name: 'Passport'})}}</label>
                                            <span class="uploadButton-file-name">{{$trans('registration.upload_passport')}}</span>
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
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.birth_date')" id="address" v-model="request.address" required>
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
            </div>

            <div class="utf-centered-button">
                <button type="submit" id="sendButton" class="button ripple-effect margin-top-0">{{$trans('registration.send')}}</button>
            </div>

            <!-- Footer -->
            <div class="utf-dashboard-footer-spacer-aera"></div>
            <div class="utf-small-footer margin-top-15">
                <div class="utf-small-footer-copyrights">Copyright &copy; 2020 All Rights Reserved.</div>
            </div>
        </div>
        </form>
    </div>
    <!-- Dashboard Content / End -->
</template>
<script>
    export default {
        data(){
            return{
                request:{
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
                    motherName:'',
                    fatherName:'',
                },
                values:{
                    genderTitle:[],
                    facultyCodes:[],
                    programCodes:[],
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
            this.getFacultyTitle()
        },

        methods: {
            onFileChange(e){
                this.request.passportPhoto = e.target.files[0];
            },

            register(){
                const formData = new FormData();
                for(const key in this.request){
                    formData.append(key, this.request[key])
                }
                this.$http.post('api/dashboard',formData).then(response=>{
                    console.log(response);
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

            changeLanguage(e){
                this.$lang.setLocale(e.target.value);
            },

            pay(){
                var widget = new cp.CloudPayments();
                let reg = this.register;
                widget.pay('charge',{
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
            },
        }
    }
</script>
