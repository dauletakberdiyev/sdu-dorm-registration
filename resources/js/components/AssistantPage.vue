<template>

        <!-- Dashboard Content -->
        <div class="utf-dashboard-content-container-aera" data-simplebar>
            <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
                <div class="row">
                    <div class="col-xl-12">
                        <h3>{{$trans('adminPage.abiwkas')}}</h3>
                    </div>
                </div>
            </div>

            <div class="utf-dashboard-content-inner-aera">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                            <div class="dashboard-list-box table-responsive invoices with-icons">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{$trans('adminPage.name')}}</th>
                                        <th>{{$trans('adminPage.surname')}}</th>
                                        <th>{{$trans('adminPage.email')}}</th>
                                        <th>{{$trans('adminPage.course')}}</th>
                                        <th>{{$trans('adminPage.speciality')}}</th>
                                        <th>{{$trans('adminPage.phone_number')}}</th>
                                        <th>{{$trans('adminPage.room')}}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="assistant in loadData.assistantList.data">
                                        <td>{{assistant.assistant_info.first_name}}</td>
                                        <td>{{assistant.assistant_info.last_name}}</td>
                                        <td>{{assistant.applicant_email}}</td>
                                        <td>{{assistant.assistant_info.course}}</td>
                                        <td>{{assistant.speciality.title_en}}</td>
                                        <td>{{assistant.assistant_info.self_number}}</td>
                                        <td>{{assistant.room.room_id}}</td>
                                        <td><button @click="goTo('relateStudent', {roomId: assistant.room.room_id, assistId: assistant.applicant_id})" class="button ripple-effect margin-top-5 margin-bottom-10">{{$trans('adminPage.update')}}</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                    <nav class="pagination">
                        <ul>
                            <li :class="{ disabled: !pagination.prev_page_url}"
                                @click.prevent="onPageLoad(pagination.prev_page_url)"
                                class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                            <li v-for="index in pagination.last_page" @click.prevent="onPageLoad(pagination.links[index].url)"><a href="#" v-bind:class="{current_page: pagination.current_page == index}" class="ripple-effect">{{index}}</a></li>
                            <li :class="{ disabled: !pagination.next_page_url}"
                                @click.prevent="onPageLoad(pagination.next_page_url)"
                                class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-xl-6 col-md-6">
                    <a href="#small-dialog"  class="popup-with-zoom-anim button ripple-effect" data-tippy-placement="top">{{$trans('adminPage.add_assist')}}</a>
                </div>

                <!-- Create Assistant Popup -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs user-message-box-item">
                    <div class="utf-signin-form-part">
                        <ul class="utf-popup-tabs-nav-item">
                            <li class="modal-title">{{$trans('adminPage.add_assistant')}}</li>
                        </ul>
                        <div class="utf-popup-container-part-tabs">
                            <div class="utf-popup-tab-content-item">
                                <form id="create-assistant" @submit="register">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{ $trans('adminPage.name') }}</h5>
                                                <input type="text" class="utf-with-border" :placeholder="$trans('adminPage.name')" id="firstName" v-model="request.first_name">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{ $trans('adminPage.surname') }}</h5>
                                                <input type="text" class="utf-with-border" :placeholder="$trans('adminPage.surname')" id="lastName" v-model="request.last_name">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{ $trans('adminPage.email') }}</h5>
                                                <input type="text" class="utf-with-border" :placeholder="$trans('adminPage.email')" id="email" v-model="request.email">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{$trans('adminPage.faculty')}}</h5>
                                                <select class="utf-with-border" title="Select Faculty" v-model="request.faculty_code" @change="getProgramTitle()">
                                                    <option v-for="facultyCode in values.facultyCodes" :value="facultyCode.id">
                                                        {{ facultyCode.title }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{$trans('adminPage.speciality')}}</h5>
                                                <select class="utf-with-border" title="Select Speciality" v-model="request.program_code" id="speciality-list">
                                                    <option v-for="programCode in values.programCodes" :value="programCode.id">
                                                        {{ programCode.title }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{$trans('adminPage.course')}}</h5>
                                                <input type="number" class="utf-with-border" :placeholder="$trans('adminPage.course')" id="course" min="0" max="4" v-model="request.course">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{$trans('adminPage.phone_number')}}</h5>
                                                <input type="text" class="utf-with-border" :placeholder="$trans('adminPage.phone_number')" id="selfNumber" v-model="request.self_number">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>{{$trans('adminPage.room')}}</h5>
                                                <select class="utf-with-border" title="Select Room" v-model="request.room_id" id="room-list">
                                                    <option v-for="room in values.rooms" :value="room.title" :title="'In this room ' + room.free_place + ' place(s) is(are) free'">
                                                        {{ room.title }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="button ripple-effect" type="submit" form="create-assistant" value="Send Message">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Create Assistant Popup / End -->

                <div class="utf-dashboard-footer-spacer-aera"></div>
                <div class="utf-small-footer margin-top-15">
                    <div class="utf-small-footer-copyrights">Copyright &copy; 2020 All Rights Reserved.</div>
                </div>
            </div>
        </div>
</template>

<script>
    import {goTo} from '../mixins/GoTo';
    export default {
        mixins: [goTo],

        data(){
            return{
                request:{
                    email:'',
                    first_name:'',
                    last_name:'',
                    faculty_code:'',
                    program_code:'',
                    course:'',
                    self_number:'',
                    room_id:'',
                    applicant_id:'',
                },
                loadData:{
                    assistantList:{},
                },
                values:{
                    facultyCodes:[],
                    programCodes:[],
                    rooms:[],
                },
                pagination: {}
            }
        },

        mounted() {
            this.onPageLoad()
            this.getFacultyTitle()
            this.getRoomsTitle()
        },

        methods:{
            onPageLoad(page_url){
                page_url = page_url || 'api/director/student-assistant';

                this.$http.post(page_url)
                    .then(response => {
                        this.loadData.assistantList = response.data.data;
                        this.makePagination(response.data.data);
                    });
            },

            getFacultyTitle(){
                this.$http.post('api/getFacultyTitle')
                    .then(response => {
                        this.values.facultyCodes = response.data.data;
                    })
            },

            getRoomsTitle(){
                this.$http.post('api/director/assistant-room')
                    .then(response => {
                        this.values.rooms = response.data.data;
                    })
            },

            getProgramTitle(){
                this.$http.post('api/getProgramTitle',{
                    faculty_code: this.request.faculty_code
                })
                    .then(response => {
                        this.values.programCodes = response.data.data;
                    });
            },

            makePagination(response){
                let pagination = {
                    current_page: response.current_page,
                    last_page: response.last_page,
                    prev_page_url: response.prev_page_url,
                    next_page_url:  response.next_page_url,
                    links: response.links,
                }

                this.pagination = pagination;
            },

            register(){
                this.$http.post('api/director/create-assistant',this.request)
                    .then(response=>{
                        console.log(response);
                    });
            },
        }
    }
</script>

<style scoped>

</style>
