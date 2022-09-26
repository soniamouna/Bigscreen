<script>
    import axios from 'axios';
    import TabQuestions from '../../components/admin/TabQuestions.vue';
        export default {
        components: { TabQuestions },
        data() {
                return {
                    questions: [],
                };
            },
            mounted() {
                axios.get("http://127.0.0.1:8000/api/questions")
                    .then((response) => {
                        console.log(response)
                    this.questions = response.data;
                })
                    .catch(err => console.log(err));
            },
    }
        </script>
    
    <template>
      <TabQuestions :questions="this.questions"/>
    </template>
    
    
    
    <style>
    
    </style>