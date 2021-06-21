<template>
    <vue-pdf-app :pdf="values.pdf" style="height: 100vh; width: 100vw"></vue-pdf-app>
</template>

<script>
    import VuePdfApp from "vue-pdf-app";
    // import this to use default icons for buttons
    import "vue-pdf-app/dist/icons/main.css";

    export default {
        name: 'Agreement',
        components: {
            VuePdfApp
        },
        data(){
            return{
                values:{
                    pdf: '',
                },
            }
        },
        mounted() {
            this.onPageLoad()
        },
        methods:{
            onPageLoad(){
                this.$http.post('/api/fileToBase64',{
                    file_path: 'C:/xampp/htdocs/dorm-registration/public/agreement/agreement.pdf'
                }).then(response=>{
                    this.base64ToArrayBuffer(response.data.data);
                });
            },

            base64ToArrayBuffer(base64) {
                var binary_string = window.atob(base64);
                var len = binary_string.length;
                var bytes = new Uint8Array(len);
                for (var i = 0; i < len; i++) {
                    bytes[i] = binary_string.charCodeAt(i);
                }
                this.values.pdf = bytes.buffer;
            }
        }
    }
</script>

