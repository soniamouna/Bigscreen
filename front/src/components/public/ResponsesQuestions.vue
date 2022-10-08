<script>
import axios from "axios";
import FormQuestionInfos from "./FormQuestionInfos.vue";
export default {
    props: {
        questions: {
            type: Array,
            default: () => [],
        },
        responses: {
            type: Object,
            default: () => [],
        },
    },
    components: { FormQuestionInfos },
};
</script>

<template>
    <div>
        <div v-for="question in this.questions" class="col-12 col-lg-12" :key="question.id">
            <div class="form-container m-auto my-4 p-lg-4 py-4  col-lg-6 ">
                <!-- Informations about the question -->
                <FormQuestionInfos :id="question.id" :length="this.questions.length" :title="question.title" />
                
                <div class="dot-border m-auto py-4 col-12 col-lg-12 ">
                    <!-- for each question display the value of the question in function of the question -->
                    <div v-for="response in this.responses" :key="response.id">
                        <p v-if="response.questionId == question.id" class="statement text-center text-white m-auto ">
                            {{ question.type == "C" ? response.value + "/5" : response.value }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import "../../assets/pollCss/poll.css";
</style>
