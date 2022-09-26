<script>
export default {
    props: {
        questions: {
            type: Array,
            default: () => []
        },
        responses: {
            type: Array,
            default: () => []
        },

    },



}
</script>
    
<template>
<div>
    <table class="col-lg-12 m-auto mt-5 " v-for="response in responses" :key="response.id">        <tr>
            <th>N°</th>
            <th>Questions</th>
            <th>Réponses</th>
        </tr>

        <tr v-for="question,i in questions" :key="question.id" class="col-lg-12">
            <td class="col-lg-2">{{question.id}}</td>
            <td class="col-lg-8">{{question.title}}</td>
            <td class="col-lg-4">{{response[i].value}}</td>
        </tr>


    </table>
</div>
</template>
    
    
    
<style>
tr,
td,
th {
    border: 1px solid grey;
}
</style>