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
        <form enctype="multipart/form-data" @submit.prevent="register">
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
                                        <h5>{{ $trans('registration.first_name') }}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.first_name')" id="firstName" v-model="request.firstName">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{ $trans('registration.last_name') }}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.last_name')" id="lastName" v-model="request.lastName">
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
                                        <h5>{{$trans('registration.phone_number')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.phone_number')" id="selfNumber" v-model="request.selfNumber">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.iin')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.iin')" id="iin" v-model="request.iin">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.gender')}}</h5>
                                        <select class="utf-with-border" :title="$trans('registration.gender')" v-model="request.gender">
                                            <option v-for="gender in values.genderTitle" :value="gender.id">
                                                {{ gender.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.upload_photo', {name: 'Passport'})}}</h5>
                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                            <input class="uploadButton-input" type="file" accept="image/*" id="passport"  @change="onFileChange"/>
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
                                        <h5>{{$trans('registration.birth_date')}}</h5>
                                        <input class="utf-with-border" type="date" id="birthDate" v-model="request.birthDate">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.address')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.birth_date')" id="address" v-model="request.address">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.city')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.city')" id="city" v-model="request.city">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.school')}}</h5>
                                        <input type="text" class="utf-with-border" :placeholder="$trans('registration.school')" id="school" v-model="request.school">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.faculty')}}</h5>
                                        <select class="utf-with-border" title="Select Faculty" v-model="request.facultyCode" @change="getProgramTitle()">
                                            <option v-for="facultyCode in values.facultyCodes" :value="facultyCode.id">
                                                {{ facultyCode.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.speciality')}}</h5>
                                        <select class="utf-with-border" title="Select Speciality" v-model="request.programCode" id="speciality-list">
                                            <option v-for="programCode in values.programCodes" :value="programCode.id">
                                                {{ programCode.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>{{$trans('registration.course')}}</h5>
                                        <input type="number" class="utf-with-border" :placeholder="$trans('registration.course')" id="course" min="0" max="4" v-model="request.course">
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
                <input type="submit"  class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0" :value="$trans('registration.send')">
<!--                <a href="javascript:void(0);" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Submit Jobs <i class="icon-feather-plus"></i></a>-->
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
    import LanguagesDropdown from 'vue-languages-dropdown';
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
            }
        }
    }
</script>
