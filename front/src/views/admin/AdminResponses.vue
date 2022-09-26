<script>
import axios from 'axios';
import TabResponses from '../../components/admin/TabResponses.vue';

export default {
    data() {
        return {
            questions: [],
            responses: [],
        };
    },
    mounted() {
        const token = localStorage.getItem("token")
        axios.get("http://127.0.0.1:8000/api/questions")
        .then((response) => {
                console.log(response.data);
                this.questions = response.data


            })
            .catch(err => console.log(err));

        axios.get("http://127.0.0.1:8000/api/responses", {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
            .then((res) => {
                console.log(res.data);
                this.responses = res.data;
            })
            .catch(err => console.log(err));




    },
    components: { TabResponses }
}
</script>
    
<template>
        <TabResponses :questions="this.questions" :responses="this.responses" />

    
</template>
    
    
    
<style>

</style>