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
        <div >
            <div class="col-lg-12 mt-4 text-center">
                <div class="col-lg-4 m-auto">
                    <h1 class="questionTitlePage mb-5 font-orbitron">
                        QUESTIONNAIRE
                    </h1>
                </div>
            </div>
            <table class="table tabQuestionAppearance container mb-4 col-lg-12 m-auto mt-4">
                <tr class="text-white">
                    <th>N°</th>
                    <th>Questions</th>
                    <th>Types</th>
                </tr>
                <tr v-for="question in questions" :key="question.id">
                    <td class="break text-center">{{question.id}}</td>
                    <td>{{question.title}}</td>
                    <td class="break text-center">{{question.type}}</td>
                </tr>
                
    
            </table>
        </div>
    </template>
    
    
    
    <style>

        

    .questionTitlePage{
       
    font-weight: bolder;
    }

    tr,
td,
th {
    border: 1px solid grey;
    font-family: monospace;
    
}

tr>th{
    background-color: rgb(117, 129, 244);
}

.tabQuestionAppearance{
    background-color: rgba(255, 255, 255, 0.694);
    backdrop-filter: blur(22px);
}


.questionTitlePage{
    border-bottom: 1px solid white;
    font-weight: bolder;
}

.break{
    word-break: break-all;
}
    </style>