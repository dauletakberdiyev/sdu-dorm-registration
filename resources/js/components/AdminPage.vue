<template>
    <!-- Dashboard Container -->

        <!--Loader-->
<!--        <div class="vfx-loader">-->
<!--            <div class="loader-wrapper">-->
<!--                <div class="loader-content">-->
<!--                    <div class="loader-dot dot-1"></div>-->
<!--                    <div class="loader-dot dot-2"></div>-->
<!--                    <div class="loader-dot dot-3"></div>-->
<!--                    <div class="loader-dot dot-4"></div>-->
<!--                    <div class="loader-dot dot-5"></div>-->
<!--                    <div class="loader-dot dot-6"></div>-->
<!--                    <div class="loader-dot dot-7"></div>-->
<!--                    <div class="loader-dot dot-8"></div>-->
<!--                    <div class="loader-dot dot-center"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!-- Loader end -->

        <!-- Dashboard Content -->
        <div class="utf-dashboard-content-container-aera" data-simplebar>
            <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
                <div class="row">
                    <div class="col-xl-12">
                        <h3>{{$trans('adminPage.student_list')}}</h3>
                    </div>
                </div>
            </div>

            <div class="utf-dashboard-content-inner-aera">
                <form @submit.prevent="onPageLoad()">
                    <div class="utf-submit-field">
                        <h5>{{$trans('adminPage.searchStudent')}}</h5>
                        <div class="search-student">
                            <input type="text" id="studentSearch" v-model="request.searchValue">
                            <input type="submit" :value="$trans('adminPage.search')">
                        </div>
                    </div>
                </form>
                <form @submit="setRoomAssistant">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                                <div class="dashboard-list-box table-responsive invoices with-icons">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="column-name" @click="onPageLoad(null,'id',$event)">
                                                <span class="icon-material-outline-arrow-drop-down"></span>
                                                {{$trans('adminPage.student_id')}}
                                            </th>
                                            <th class="column-name" @click="onPageLoad(null,'name',$event)">{{$trans('adminPage.name')}}</th>
                                            <th class="column-name" @click="onPageLoad(null,'surname',$event)">{{$trans('adminPage.surname')}}</th>
    <!--                                        <th>{{$trans('adminPage.city')}}</th>-->
                                            <th class="column-name" @click="onPageLoad(null,'faculty',$event)">{{$trans('adminPage.faculty')}}</th>
                                            <th class="column-name" @click="onPageLoad(null,'speciality',$event)">{{$trans('adminPage.speciality')}}</th>
                                            <th class="column-name" @click="onPageLoad(null,'school',$event)">{{$trans('adminPage.school')}}</th>
                                            <th class="column-name" @click="onPageLoad(null,'course',$event)">{{$trans('adminPage.course')}}</th>
                                            <th class="column-name" @click="onPageLoad(null,'assistant',$event)">{{$trans('adminPage.assistant')}}</th>
                                            <th class="column-name" @click="onPageLoad(null,'room',$event)">{{$trans('adminPage.room')}}</th>
    <!--                                        <th>{{$trans('adminPage.add_info')}}</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="student in loadData.studentList">
                                            <td>{{student.id}}</td>
                                            <td>{{student.first_name}}</td>
                                            <td>{{student.last_name}}</td>
    <!--                                        <td>{{student.city}}</td>-->
                                            <td>{{student.faculty}}</td>
                                            <td>{{student.speciality}}</td>
                                            <td>{{student.school}}</td>
                                            <td>{{student.course}}</td>
                                            <td>
                                                <select class="utf-with-border" v-model="student.assistant_id" @change="changeAssistant" :data-applicant="student.id">
                                                    <option v-for="assistant in loadData.assistantList" :value="assistant.applicant_id">
                                                        {{assistant.assistant_info.first_name}} {{assistant.assistant_info.last_name}}
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="utf-with-border" v-model="student.room_id" @change="changeRoom" :data-applicant="student.id">
                                                    <option v-for="room in loadData.rooms" :value="room.room_id" :title="room.free_place" :disabled="room.free_place == 0">
                                                        {{room.room_id}}
                                                    </option>
                                                </select>
                                            </td>
    <!--                                        <td>{{student.resident_info.is_active}}</td>-->
    <!--                                        <td><button class="button gray">{{$trans('adminPage.view_details')}}</button></td>-->
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="margin-top-10 utf-centered-button">
                        <button type="submit" id="sendButton" class="button ripple-effect margin-top-0">{{$trans('adminPage.update')}}</button>
                    </div>

                </form>

                <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                    <nav class="pagination">
                        <ul>
                            <li :class="{ disabled: !pagination.prev_page_url}"
                                @click.prevent="onPageLoad(pagination.prev_page_url, request.sortBy)"
                                class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                            <li v-for="index in pagination.last_page" @click.prevent="onPageLoad(pagination.links[index].url, request.sortBy)"><a href="#" v-bind:class="{current_page: pagination.current_page == index}" class="ripple-effect">{{index}}</a></li>
                            <li :class="{ disabled: !pagination.next_page_url}"
                                @click.prevent="onPageLoad(pagination.next_page_url, request.sortBy)"
                                class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="utf-dashboard-footer-spacer-aera"></div>
                <div class="utf-small-footer margin-top-15">
                    <div class="utf-small-footer-copyrights">Copyright &copy; 2020 All Rights Reserved.</div>
                </div>
            </div>
        </div>
        <!-- Dashboard Content End -->
</template>

<script>

    export default {
        data(){
            return{
                request:{
                    sortBy: '',
                    desc: 1,
                    searchValue: '',
                },
                values:{
                    studentRoomAssistant:{}
                },
                loadData:{
                    studentList:{},
                    assistantList:{},
                    rooms:{},
                },
                pagination: {}
            }
        },

        mounted() {
            this.onPageLoad()
        },

        methods:{
            onPageLoad(page_url, sortBy, elem){
                page_url = page_url || 'api/director/student-list';
                this.setSortBy(sortBy);

                if(elem !== undefined){
                    this.addSortArrow(elem);
                }

                this.$http.post(page_url, {
                    building_id: 0,
                    sort_by: sortBy,
                    desc: this.request.desc,
                    search_value: this.request.searchValue,
                })
                    .then(response => {
                        this.loadData.studentList = response.data.data.studentList.data;
                        this.loadData.assistantList = response.data.data.assistants;
                        this.loadData.rooms = response.data.data.rooms;
                        this.makePagination(response.data.data.studentList);
                    });
            },

            setSortBy(sortType){
                this.request.sortBy = sortType;
                if(this.request.desc === 0){
                    this.request.desc = 1;
                }
                else{
                    this.request.desc = 0;
                }
            },

            addSortArrow(elem){
                let span = document.createElement('span');
                if(this.request.desc) {
                    span.classList.add('icon-material-outline-arrow-drop-up');
                }
                else{
                    span.classList.add('icon-material-outline-arrow-drop-down');
                }

                let columns = document.querySelectorAll('.column-name');
                columns.forEach(elem => {
                    if (elem.children.length === 1){
                        elem.removeChild(elem.firstChild);
                    }
                });

                elem.target.insertBefore(span, elem.target.firstChild);
            },

            setRoomAssistant(){
                Object.keys(this.values.studentRoomAssistant).forEach(key =>{
                    this.$http.post('api/director/connect-student', {
                        applicant_id: this.values.studentRoomAssistant[key].applicant_id,
                        assistant_id: this.values.studentRoomAssistant[key].assistant_id,
                        room_id: this.values.studentRoomAssistant[key].room_id,
                    }).then(response =>{
                        console.log(response);
                    });
                });
            },

            changeAssistant(e){
                if(e.target.dataset.applicant in this.values.studentRoomAssistant){
                    this.values.studentRoomAssistant[e.target.dataset.applicant].assistant_id = e.target.value;
                }
                else{
                    this.values.studentRoomAssistant[e.target.dataset.applicant] = {
                        'applicant_id': e.target.dataset.applicant,
                        'assistant_id': e.target.value
                    }
                }
            },

            changeRoom(e){
                if(e.target.dataset.applicant in this.values.studentRoomAssistant){
                    this.values.studentRoomAssistant[e.target.dataset.applicant].room_id = e.target.value;
                }
                else {
                    this.values.studentRoomAssistant[e.target.dataset.applicant] = {
                        'applicant_id': e.target.dataset.applicant,
                        'room_id': e.target.value
                    }
                }
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
            }
        }
    }
</script>

<style scoped>

</style>
