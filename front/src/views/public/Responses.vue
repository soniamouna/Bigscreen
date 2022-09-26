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
        <div class="mt-lg-5 mb-lg-5 pb-4 pt-lg-4 col-lg-11 m-auto pollContainer">
            <div class="col-lg-11 headerBackground pt-4 pb-4 m-auto mt-lg-2">
                <h1 class="col-10 col-lg-10 pb-3 m-auto bigscreenTitle text-white font-monospace">
                    BIGSCREEN
                </h1>
                <p class="m-auto col-9 col-lg-10 titlePoll text-white font-monospace">
                    Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{this.createdAt}}
                </p>
            </div>
            <ResponsesQuestions :questions="this.questions" :responses="this.responses" />
        </div>
    </div>
</template>
        
        
        
<style>
    @media screen and (min-width: 800px) and (max-width: 2560px) {
        .bigscreenTitle{
            font-weight: bolder;
        }

        .titlePoll{
            font-size: large;
        }

        .pollContainer{
            background-image: url(../../../img/lavaBackground2.jpg);
            border-radius: 20px;
        }

    }

    @media screen and (min-width: 300px) and (max-width: 768px) {
        .headerBackground{
            background-color: rgba(83, 23, 138, 0.632);
            backdrop-filter: blur(20px);
        }
        
        .pollContainer{
            background-image: url(../../../img/lavaBackground2.jpg);
        }

        .bigscreenTitle{
            text-align: center;
        }

        .titlePoll{
            text-align: center;
        }

}
</style>