<script>
    export default {
        props: {
        questions: {
            type: Array,
            default: () => []
        }
    },
        
    }
    </script>
    
    <template>
        <form >
            <!-- Informations about the question -->
            <div v-for="question,i in questions" :key="question.id">
            <div>
                <h1>Question {{question.id}}/{{questions.length}} </h1>
                <p>{{question.title}}</p>
            </div>
            <!-- Choices -->
            <div>
                <!-- Type A -->
                <div>
                    <input type="text" name="" id="">
                </div>
                <!-- Type B -->
                <div>
                    <textarea type="text" name="" id=""></textarea>
                </div>
                <!-- Type C -->
                <div>
                    <input type="text" name="" id="">
                </div>
            </div></div>
            <button>Finaliser</button>
        </form>
    </template>
    
    
    
    <style>
    
    </style>