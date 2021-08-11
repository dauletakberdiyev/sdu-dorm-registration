<template>
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>{{$trans('adminPage.booked_student')}}</h3>
                </div>
            </div>
        </div>

        <div class="utf-dashboard-content-inner-aera">
            <form @submit="acceptStudent">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                            <div class="dashboard-list-box table-responsive invoices with-icons">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="column-name">{{$trans('adminPage.student_id')}}</th>
                                        <th class="column-name">{{$trans('adminPage.name')}}</th>
                                        <th class="column-name">{{$trans('adminPage.surname')}}</th>
                                        <th class="column-name">{{$trans('adminPage.iin')}}</th>
                                        <th class="column-name">{{$trans('adminPage.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="student in loadData.studentList">
                                        <td>{{student.applicant_id}}</td>
                                        <td>{{student.first_name}}</td>
                                        <td>{{student.last_name}}</td>
                                        <td>{{student.iin}}</td>
                                        <td>
                                            <div class="checkbox" style="margin-bottom: 10px;">
                                                <input type="checkbox" :id="student.applicant_id" :data-applicant="student.applicant_id" :data-email="student.applicant_email" @click="checkStudent">
                                                <label :for="student.applicant_id"><span class="checkbox-icon"></span></label>
                                            </div>
                                        </td>
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
        </div>

    </div>
</template>

<script>
    export default {
        name: "BookingStudents",
        data(){
            return{
                values:{
                    acceptedStudents:{}
                },
                loadData:{
                    studentList:{},
                },
            }
        },

        mounted() {
            this.onPageLoad()
        },

        methods: {
            onPageLoad() {
                this.$http.get('api/director/bookingStudents')
                    .then(response =>{
                       this.loadData.studentList = response.data.data.bookingStudents;
                       console.log(this.loadData.studentList);
                    });
            },

            acceptStudent(){
                Object.keys(this.values.acceptedStudents).forEach(key =>{
                    this.$http.post('api/director/acceptStudent', {
                        applicant_id: this.values.acceptedStudents[key].applicant_id,
                        email: this.values.acceptedStudents[key].email,
                    }).then(response =>{
                        console.log(response);
                    });
                });
            },

            checkStudent(e){
                if(e.target.dataset.applicant in this.values.acceptedStudents){
                    delete this.values.acceptedStudents[e.target.dataset.applicant];
                }
                else{
                    this.values.acceptedStudents[e.target.dataset.applicant] = {
                        'applicant_id': e.target.dataset.applicant,
                        'email': e.target.dataset.email
                    }
                }

                // console.log(this.values.acceptedStudents['56'].email);
            },
        }
    }
</script>

<style scoped>

</style>
