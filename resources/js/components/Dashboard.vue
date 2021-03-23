<template>
    <div>
        <form enctype="multipart/form-data" @submit.prevent="register" >
            <input type="text" id="firstName" v-model="request.firstName">
            <input type="text" id="lastName" v-model="request.lastName">
            <input type="text" id="father" v-model="request.father">
            <input type="date" id="birthDate" v-model="request.birthDate">
            <input type="text" id="city" v-model="request.city">
            <input type="text" id="typeOfStudy" v-model="request.typeOfStudy">
            <input type="text" id="facultyCode" v-model="request.facultyCode">
            <input type="text" id="programCode" v-model="request.programCode">
            <input type="number" id="course" v-model="request.course">
            <input type="text" id="school" v-model="request.school">
            <input type="text" id="address" v-model="request.address">
            <input type="text" id="fatherNumber" v-model="request.fatherNumber">
            <input type="text" id="motherNumber" v-model="request.motherNumber">
            <input type="text" id="selfNumber" v-model="request.selfNumber">
            <input type="file" id="check" accept="image/*" @change="onFileChange">
            <input type="submit">
        </form>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                request:{
                    firstName:'',
                    lastName:'',
                    father:'',
                    birthDate:'',
                    city:'',
                    typeOfStudy:'',
                    facultyCode:'',
                    programCode:'',
                    course:'',
                    school:'',
                    address:'',
                    fatherNumber:'',
                    motherNumber:'',
                    selfNumber:'',
                    checkPhoto:null
                }
            }
        },
        methods: {
            onFileChange(e){
                this.request.checkPhoto = e.target.files[0];
            },
            register(){
                const formData = new FormData();
                for(const key in this.request){
                    formData.append(key, this.request[key])
                }
                this.$http.post('api/dashboard',formData).then(response=>{
                    console.log(response);
                })
            }
        }
    }
</script>
