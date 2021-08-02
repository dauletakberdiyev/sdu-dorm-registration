<template>
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <!--  Title  -->
                    <div class="utf-left-side">
                        <img src="/images/sdulogo_white.png" alt="">
                        <h3>{{$trans('instruction.title')}}</h3>
                    </div>
                    <!--  Language  -->
                    <nav id="breadcrumbs">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" style="margin-right: 10px;" v-for="lang in this.language.languageList" :value="lang.value" @click="changeLanguage">{{lang.title}}</button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="utf-dashboard-content-inner-aera">
            <div class="col-xl-12 margin-bottom-20">
                <h3 class="headline_part centered">{{$trans('instruction.booking_system')}}</h3>
            </div>
            <div class="col-xl-12">

                <h4 class="headline_part margin-top-0 margin-bottom-15">{{$trans('instruction.booking_steps')}}</h4>
                <div class="col-xl-6 col-md-6">
                    <ul class="list-3 color">
                        <li>{{$trans('instruction.fill_form')}}</li>
                        <li>{{$trans('instruction.payment_way')}}</li>
                        <li>{{$trans('instruction.send_check')}}</li>
                        <li>{{$trans('instruction.boys_number', {number: '+77007006185'})}}</li>
                        <li>{{$trans('instruction.girls_number', {number: '+77007006185'})}}</li>
                    </ul>
                </div>

                <h2 class="headline_part margin-top-0 margin-bottom-15">{{$trans('instruction.important')}}</h2>
                <div class="col-xl-6 col-md-6">
                    <ul class="list-3 color">
                        <li>{{$trans('instruction.day_of_booking')}}</li>
                        <li>{{$trans('instruction.booking_apply')}}</li>
                        <li>{{$trans('instruction.rebooking')}}</li>
                    </ul>
                </div>

                <h4 class="headline_part margin-top-0 margin-bottom-15">{{$trans('instruction.payment_methods')}}</h4>
                <div class="col-xl-6 col-md-6">
                    <ul class="list-3 color">
                        <li>
                            <b>{{$trans('instruction.branches_payment')}}</b><br>
                            {{$trans('instruction.branches_details1')}}<br>
                            {{$trans('instruction.branches_details2')}}<br>
                            {{$trans('instruction.branches_details3')}}<br>
                            {{$trans('instruction.branches_details4')}}<br>
                            {{$trans('instruction.branches_details5')}}<br>
                            {{$trans('instruction.branches_details6')}}<br>
                            {{$trans('instruction.branches_details7')}}<br>
                        </li>
                        <li>
                            <b>{{$trans('instruction.terminal_payment')}}</b><br>
                            {{$trans('instruction.terminal_details1')}}<br>
                            {{$trans('instruction.terminal_details2')}}<br>
                            {{$trans('instruction.terminal_details3')}}<br>
                            {{$trans('instruction.terminal_details4')}}<br>
                            {{$trans('instruction.terminal_details5')}}<br>
                            {{$trans('instruction.terminal_details6')}}<br>
                            {{$trans('instruction.terminal_details7')}}<br>
                            {{$trans('instruction.terminal_details8')}}<br>
                            {{$trans('instruction.terminal_details9')}}<br>
                            {{$trans('instruction.terminal_details10')}}<br>
                            {{$trans('instruction.terminal_details11')}}<br>
                            {{$trans('instruction.terminal_details12')}}<br>
                        </li>
                        <li>
                            <b>{{$trans('instruction.homebank_payment')}}</b><br>
                            {{$trans('instruction.homebank_details1')}}<br><br>
                            <img src="/images/homebank/home1.jpg" style="width: 300px"><br><br>
                            {{$trans('instruction.homebank_details2')}}<br><br>
                            <img src="/images/homebank/home2.jpg" style="width: 300px"><br><br>
                            {{$trans('instruction.homebank_details3')}}<br><br>
                            <img src="/images/homebank/home3.jpg" style="width: 300px"><br><br>
                            {{$trans('instruction.homebank_details4')}}<br><br>
                            <img src="/images/homebank/home4.jpg" style="width: 300px"><br><br>
                            {{$trans('instruction.homebank_details5')}}
                        </li>
                        <li>
                            <b>{{$trans('instruction.kaspi_payment')}}</b><br>
                            {{$trans('instruction.kaspi_details1')}}<br>
                            {{$trans('instruction.kaspi_details2')}}<br>
                            {{$trans('instruction.kaspi_details3')}}<br>
                            {{$trans('instruction.kaspi_details4')}}<br>
                            {{$trans('instruction.kaspi_details5')}}<br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "InstructionPage",

        data(){
            return{
                language:{
                    languageList : [
                        {title : 'EN', value : 'en'},
                        {title : 'KZ', value : 'kz'},
                        {title : 'RU', value : 'ru'}
                    ]
                }
            }
        },

        methods: {
            changeLanguage(e){
                this.$lang.setLocale(e.target.value);
                this.$http.defaults.headers.common['Content-Language'] = this.$lang.getLocale();
            },
        }

    }


</script>

<style scoped>

</style>
