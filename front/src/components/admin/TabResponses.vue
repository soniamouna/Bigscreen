<script>
export default {
    props: {
        questions: {
            type: Array,
            default: () => []
        },
        responses: {
            type: Object,
            default: () => []
        },
        error: {
            type: String,
        }

    },



}
</script>
    
<template>

    <div class="my-4">
        <!-- If there is an error display an error's message -->

        <p class=" fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>
        <!-- For each respondent create a table of responses -->

        <table v-else class=" table  col-lg-12 m-auto mt-4 " v-for="response in responses"
            :key="response.id">
            <tr class="text-white text-center">
                <th>N°</th>
                <th>Questions</th>
                <th>Réponses</th>
            </tr>
            <!-- For each question create a line into the table -->
            <tr v-for="question,i in questions" :key="question.id" class="col-lg-12">
                <td class=" text-center col-lg-1">{{question.id}}</td>
                <td class="break-keep-all col-lg-7">{{question.title}}</td>
                <td class="break text-center col-lg-3">{{response[i].value}}</td>
            </tr>


        </table>
    </div>
</template>
    
    
    
<style scoped>
@import '../../assets/adminRight/adminRightSide.css';
</style>