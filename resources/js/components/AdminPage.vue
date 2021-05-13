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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                            <div class="dashboard-list-box table-responsive invoices with-icons">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{$trans('adminPage.student_id')}}</th>
                                        <th>{{$trans('adminPage.name')}}</th>
                                        <th>{{$trans('adminPage.surname')}}</th>
                                        <th>{{$trans('adminPage.city')}}</th>
                                        <th>{{$trans('adminPage.faculty')}}</th>
                                        <th>{{$trans('adminPage.speciality')}}</th>
                                        <th>{{$trans('adminPage.school')}}</th>
                                        <th>{{$trans('adminPage.course')}}</th>
                                        <th>{{$trans('adminPage.add_info')}}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="student in loadData.studentList.data">
                                        <td>{{student.id}}</td>
                                        <td>{{student.first_name}}</td>
                                        <td>{{student.last_name}}</td>
                                        <td>{{student.city}}</td>
                                        <td>{{student.faculty}}</td>
                                        <td>{{student.speciality}}</td>
                                        <td>{{student.school}}</td>
                                        <td>{{student.course}}</td>
<!--                                        <td>{{student.resident_info.is_active}}</td>-->
                                        <td><button class="button gray">{{$trans('adminPage.view_details')}}</button></td>
                                    </tr>

<!--                                    <tr>-->
<!--                                        <td>0431261</td>-->
<!--                                        <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="images/thumb-1.jpg" width="50" height="50" data-tippy-placement="top" title="John Williams" data-tippy=""></td>-->
<!--                                        <td>Standard Plan</td>-->
<!--                                        <td>12 Dec 2020</td>-->
<!--                                        <td>Paypal</td>-->
<!--                                        <td><span class="badge badge-pill badge-primary text-uppercase">Approved</span></td>-->
<!--                                        <td><a href="#" class="button gray"><i class="icon-feather-eye"></i> View Detail</a></td>-->
<!--                                    </tr>-->

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
                loadData:{
                    studentList:{},
                },
                pagination: {}
            }
        },

        mounted() {
            this.onPageLoad()
        },

        methods:{
            onPageLoad(page_url){
                page_url = page_url || 'api/director/student-list';

                this.$http.post(page_url)
                    .then(response => {
                        this.loadData.studentList = response.data.data;
                        this.makePagination(response.data.data);
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
            }
        }
    }
</script>

<style scoped>

</style>
