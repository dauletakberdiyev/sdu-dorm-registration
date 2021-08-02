<template>
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf-order-confirm-aera">
                    <i class="icon-feather-check-circle"></i>
                    <h2 class="margin-top-30">{{$trans('registration.success_register_title')}}</h2>
                    <p>{{$trans('registration.success_register_description', {email: this.email})}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container / End -->
</template>

<script>

    export default {
        props: {
            email: String,
        },
        name: "SuccessPage"
    }
</script>
