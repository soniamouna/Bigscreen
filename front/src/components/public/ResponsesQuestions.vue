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
            <div class="col-12 col-lg-12" v-for="question in this.questions" :key="question.id">
                <div class="formContainer  mt-4 mb-4 col-lg-6 m-auto p-lg-4 pt-4 pb-4">
                    <div class="col-lg-12">
                        <h1 class="text-white font-monospace">Question {{question.id}} / {{questions.length}}</h1>
                        <p class="text-white font-monospace">{{question.title}}</p> 
                    </div>
                   <div class=" dotBorder pb-4 pt-4 col-12 col-lg-12 m-auto">
                    <div  v-for="response in this.responses" :key="response.id">
                        <p class="m-auto text-center text-white font-monospace" v-if="response.questionId==question.id">{{response.value}}</p>
                    </div>
                   </div>
                    
                </div>
                
            </div>
           

                
                
    </div>
    </template>
    
    
    
    <style>
    
        .br{
            border: 1px solid red;
        }
        
        .formContainer {
          border-radius: 20px;
          background-color: rgba(115, 115, 115, 0.498);
          backdrop-filter: blur(10px);
        }
        
        .dotBorder {
          border: 2px dotted white;
          border-radius: 10px;
        }
        
        .area {
          border-radius: 20px;
        }
    </style>