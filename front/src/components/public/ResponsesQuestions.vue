<script>
    import axios from 'axios';
    export default {
    
        props: {
            questions: {
                type: Array,
                default: () => []
            },
            responses: {
                type: Array,
                default: () => []
            }
        },
    
    
    }
    </script>
    
    <template>
        <div >
            <div v-for="question in this.questions" :key="question.id">
                <h1>Question {{question.id}} / {{questions.length}}</h1>
                <p>{{question.title}}</p> 
                <div v-for="response in this.responses" :key="response.id">
                    <p v-if="response.questionId==question.id">{{response.value}}</p>
                </div>
            </div>
           

                
                
    </div>
    </template>
    
    
    
    <style>
    
    </style>