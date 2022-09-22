<script>
    import axios from 'axios';
import FormQuestions from '../../components/public/FormQuestions.vue';
    export default {
    components: { FormQuestions },
    data() {
            return {
                questions: [],
            };
        },
        mounted() {
            axios.get("http://127.0.0.1:8000/api/questions")
                .then((response) => {
                this.questions = response.data;
            })
                .catch(err => console.log(err));
        },
}
    </script>
    
    <template>
        <FormQuestions :questions="this.questions"/>
    </template>
    
    
    
    <style>
    
    </style>