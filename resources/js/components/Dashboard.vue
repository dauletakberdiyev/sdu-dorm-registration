<template>
    <div>
        <form enctype="multipart/form-data" @submit.prevent="register" >
            <input type="text" id="firstName" v-model="request.firstName">
            <input type="text" id="lastName" v-model="request.lastName">
            <input type="text" id="father" v-model="request.father">
            <input type="date" id="birthDate" v-model="request.birthDate">
            <input type="text" id="city" v-model="request.city">
            <select v-model="request.typeOfStudy">
                <option v-for="typeOfStudy in values.typeOfStudies" :value="typeOfStudy.id">
                    {{ typeOfStudy.title }}
                </option>
            </select>
            <select v-model="request.facultyCode" @change="getProgramTitle()">
                <option v-for="facultyCode in values.facultyCodes" :value="facultyCode.id">
                    {{ facultyCode.title }}
                </option>
            </select>
            <select v-model="request.programCode">
                <option v-for="programCode in values.programCodes" :value="programCode.id">
                    {{ programCode.title }}
                </option>
            </select>
<!--            <input type="text" id="programCode" v-model="request.programCode">-->
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
                    checkPhoto:null,
                },
                values:{
                    typeOfStudies:[],
                    facultyCodes:[],
                    programCodes:[],
                }
            }
        },

        mounted() {
            this.getTypeOfStudies(),
            this.getFacultyTitle()
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
                this.$http.post('api/dashbgtioard',formData).then(response=>{
                    console.log(response);
                })
            },

            getTypeOfStudies(){
                this.$http.post('api/getTypeOfStudy')
                    .then(response => {
                        this.values.typeOfStudies = response.data.data;
                    })
            },

            getFacultyTitle(){
                this.$http.post('api/getFacultyTitle')
                    .then(response => {
                        this.values.facultyCodes = response.data.data;
                    })
            },

            getProgramTitle(){
                this.$http.post('api/getProgramTitle',{
                    faculty_code: this.request.facultyCode
                })
                    .then(response => {
                        this.values.programCodes = response.data.data;
                    });
            }
        }
    }
</script>
