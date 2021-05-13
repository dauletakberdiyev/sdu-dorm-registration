<template>


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
                        <div class="dashboard-box">
                            <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                                <div class="dashboard-list-box table-responsive invoices with-icons">
                                    <form id="relate-student" @submit.prevent="connectStudent">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>{{$trans('adminPage.name')}}</th>
                                                <th>{{$trans('adminPage.surname')}}</th>
                                                <th>{{$trans('adminPage.city')}}</th>
                                                <th>{{$trans('adminPage.faculty')}}</th>
                                                <th>{{$trans('adminPage.speciality')}}</th>
                                                <th>{{$trans('adminPage.course')}}</th>
                                                <th>{{$trans('adminPage.school')}}</th>
                                                <th>{{$trans('adminPage.room')}}</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="student in values.relatedStudents">
                                                <td>{{student.first_name}}</td>
                                                <td>{{student.last_name}}</td>
                                                <td>{{student.city}}</td>
                                                <td>{{student.faculty}}</td>
                                                <td>{{student.speciality}}</td>
                                                <td>{{student.course}}</td>
                                                <td>{{student.school}}</td>
                                                <td>{{student.room_id}}</td>
                                                <td>
                                                    <div class="checkbox" style="margin-bottom: 10px;" v-if="$props.assistId == student.assistant_id">
                                                        <input type="checkbox" :id="student.applicant_id" :data-applicant="student.applicant_id" @click="checkStudent" checked>
                                                        <label :for="student.applicant_id"><span class="checkbox-icon"></span></label>
                                                    </div>
                                                    <div class="checkbox" style="margin-bottom: 10px;" v-else>
                                                        <input type="checkbox" :id="student.applicant_id" :data-applicant="student.applicant_id" @click="checkStudent" >
                                                        <label :for="student.applicant_id"><span class="checkbox-icon"></span></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9"><input type="submit" class="button ripple-effect" form="relate-student" value="Connect"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</template>

<script>
    export default {
        name: "RelateStudent",
        props: {
            roomId: String,
            assistId: Number,
        },

        data(){
            return{
                values:{
                    relatedStudents:[],
                    checkedStudents:[],
                },
            }
        },

        mounted() {
            this.relatedStudent()
        },

        methods: {
            relatedStudent() {
                this.$http.post('/api/director/related-student', {
                    related_room: this.roomId
                })
                    .then(response => {
                        this.values.relatedStudents = response.data.data;
                    });
            },

            checkStudent(e){
                if(e.target.checked){
                    this.values.checkedStudents.push({"applicant_id": e.target.dataset.applicant});
                }
                else {
                    for (let i = 0; i < this.values.checkedStudents.length; i++) {
                        if (this.values.checkedStudents[i]['applicant_id'] == e.target.dataset.applicant) {
                            this.values.checkedStudents.splice(i, 1);
                        }
                    }
                }
            },

            connectStudent(){
                this.values.checkedStudents.forEach((elem)=>{
                    this.$http.post('/api/director/connect-student', {
                        applicant_id: elem.applicant_id,
                        assistant_id: this.assistId
                    })
                        .then(response => {
                            this.$router.push({name: 'assistantPage'});
                        });
                });
            }

        }
    }
</script>

<style scoped>

</style>
