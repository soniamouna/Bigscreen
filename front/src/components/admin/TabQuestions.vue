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
        <div>
       
            <table class="table table-bordered">
                <tr>
                    <th>N°</th>
                    <th>Questions</th>
                    <th>Types</th>
                </tr>
                <tr v-for="question in questions" :key="question.id">
                    <td>{{question.id}}</td>
                    <td>{{question.title}}</td>
                    <td>{{question.type}}</td>
                </tr>
                
    
            </table>
        </div>
    </template>
    
    
    
    <style>
    
    </style>