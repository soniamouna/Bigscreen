<script >
    import axios from 'axios';
    import { useRoute } from 'vue-router';
import ResponsesQuestions from '../../components/public/ResponsesQuestions.vue';
    export default {
        components: {ResponsesQuestions },
        data() {
            return {
                responses: [],
                questions:[],
            };
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
                        console.log(response)
                        const idRespondent = response.data.respondent.id
                        console.log(idRespondent)
                        axios.get("http://127.0.0.1:8000/api/responses/" + idRespondent)
                            .then((res) => {
                                this.responses = res.data
                                console.log(this.responses)
                            })
                            .catch(err => console.log(err));
    
    
                    })
                    .catch(err => console.log(err));
    
        },
    
    }
    </script>
        
    <template>
        <ResponsesQuestions :questions="this.questions" :responses="this.responses"/>
    </template>
        
        
        
    <style>
    
    </style>