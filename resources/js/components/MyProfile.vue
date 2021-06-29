<template>
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>My Profile</h3>
                </div>
            </div>
        </div>

        <div class="utf-dashboard-content-inner-aera">
            <div class="row">
                <div class="col-xl-6">
                    <div class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3>Change Password</h3>
                        </div>
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Current Password</h5>
                                        <input type="password" class="utf-with-border" data-tippy-placement="top" placeholder="********" data-tippy="" data-original-title="Current Password">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>New Password</h5>
                                        <input type="password" class="utf-with-border" data-tippy-placement="top" placeholder="********" data-tippy="" data-original-title="The password must be at least 8 characters">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Confirm New Password</h5>
                                        <input type="password" class="utf-with-border" data-tippy-placement="top" placeholder="********" data-tippy="" data-original-title="The password must be at least 8 characters">
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="button ripple-effect big margin-top-10">Changes Password</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3>Change Number of Free Place</h3>
                        </div>
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Number of Free Place</h5>
                                        <input type="number" class="utf-with-border" placeholder="Number of Free Place">
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="button ripple-effect big margin-top-10">Changes Free Place</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MyProfile"
    }
</script>

<style scoped>

</style>
