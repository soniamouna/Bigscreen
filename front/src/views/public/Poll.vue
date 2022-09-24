<script>
    import axios from 'axios';
import FormPoll from '../../components/public/FormPoll.vue';
    export default {
    components: { FormPoll },
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
        <FormPoll :questions="this.questions"/>
    </template>
    
    
    
    <style>
    
    </style>