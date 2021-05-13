export const goTo={
    methods:{
        goTo(place,props){
            if(this.$route.name!=place){
                this.$router.push({name:place,params:props});
                this.$emit('close');
            }
        }
    }
}
