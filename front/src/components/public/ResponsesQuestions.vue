<script>
import axios from 'axios';
import FormQuestionInfos from './FormQuestionInfos.vue';
export default {
    props: {
        questions: {
            type: Array,
            default: () => []
        },
        responses: {
            type: Object,
            default: () => []
        }
    },
    components: { FormQuestionInfos }
}
</script>
    
<template>
    <div>
        <div class="col-12 col-lg-12" v-for="question in this.questions" :key="question.id">
            <div class="formContainer  mt-4 mb-4 col-lg-6 m-auto p-lg-4 pt-4 pb-4">
                <!-- Informations about the question -->
                <FormQuestionInfos :id="question.id" :length="this.questions.length" :title="question.title" />
                <div class=" dotBorder pb-4 pt-4 col-12 col-lg-12 m-auto">
                    <!-- for each question display the value of the question in function of the question -->
                    <div v-for="response in this.responses" :key="response.id">
                        <p class="statement m-auto text-center text-white "
                            v-if="response.questionId==question.id">{{response.value}}</p>
                    </div>
                </div>

            </div>

        </div>




    </div>
</template>
    
    
    
<style>
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

.statement {
    font-size: large;
}

@media screen and (min-width: 300px) and (max-width: 768px) {

    .titleQuestion {
        text-align: center;
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
}
</style>