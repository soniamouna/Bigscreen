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
            <div v-for="question,i in this.questions" :key="question.id">
                <h1>Question {{question.id}} / {{questions.length}}</h1>
                <p>{{question.title}}</p> 
                <div>
                    <p>{{responses[i].value}}</p>
                </div>
            </div>
           

                
                
    </div>
    </template>
    
    
    
    <style>
    
    </style>