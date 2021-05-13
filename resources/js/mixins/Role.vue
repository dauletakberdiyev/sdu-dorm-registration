<template>

</template>

<script>

    export default {
        data(){
            return {
                hasAccess: '',
            }
        },
        methods: {
            $can(roleName) {
                this.$http.post('api/getUserRole')
                    .then(response => {
                        if (response.data.data == roleName){
                            this.hasAccess = true;
                        }else{
                            this.hasAccess = false;
                        }
                    });
                return this.hasAccess;
            },
        },
    };

</script>

<style scoped>

</style>
