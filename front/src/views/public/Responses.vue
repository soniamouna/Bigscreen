<script >
import axios from 'axios';
import { useRoute } from 'vue-router';
import ResponsesQuestions from '../../components/public/ResponsesQuestions.vue';
export default {
    components: { ResponsesQuestions },
    data() {
        return {
            responses: [],
            questions: [],
            createdAt:""
            
        };
    },

    methods: {
        getDateSurvey(date){
            const dateToString = new Date(date);
            const day = dateToString.getDate();
            const month = dateToString.getMonth();
            const year = dateToString.getFullYear();
            const hours = dateToString.getHours();
            const minutes = dateToString.getMinutes();
            return day+"/"+month+"/"+year+" à "+ hours+"h"+minutes;
             


        }
    },
    mounted() {
        const route = useRoute();
        const link = route.params.link;


        axios.get("http://127.0.0.1:8000/api/questions")
            .then((response) => {
                this.questions = response.data;
                console.log(this.questions)
            })
            .catch(err => console.log(err));

        axios.get("http://127.0.0.1:8000/api/respondents/" + link)
            .then((response) => {
                this.createdAt=this.getDateSurvey(response.data.respondent.created_at)
                const idRespondent = response.data.respondent.id
                console.log(idRespondent)
                axios.get("http://127.0.0.1:8000/api/responses/" + idRespondent)
                    .then((res) => {
                        this.responses = res.data
                    })
                    .catch(err => console.log(err));


            })
            .catch(err => console.log(err));

    },

}
</script>
        
<template>
    <div>
        <h1>BIGSCREEN</h1>
        <p>Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{this.createdAt}}</p>
        <ResponsesQuestions :questions="this.questions" :responses="this.responses" />
    </div>
</template>
        
        
        
<style>

</style>