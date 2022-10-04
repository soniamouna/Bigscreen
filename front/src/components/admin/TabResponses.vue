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
        error:{
                type:String,
            }

    },



}
</script>
    
<template>
<div class="responsesBackground ">
    <p class=" fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>

    <table v-else class="tabResponsesAppearance container mb-4 col-lg-12 m-auto mt-4 " v-for="response in responses" :key="response.id">
        <tr class="text-white text-center">
            <th>N°</th>
            <th>Questions</th>
            <th>Réponses</th>
        </tr>

        <tr v-for="question,i in questions" :key="question.id" class="col-lg-12">
            <td class="break text-center col-lg-2">{{question.id}}</td>
            <td class="break col-lg-6">{{question.title}}</td>
            <td class="break text-center col-lg-3">{{response[i].value}}</td>
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

tr>th{
    background-color: rgb(117, 129, 244);
}

.tabResponsesAppearance{
    background-color: rgba(255, 255, 255, 0.694);
    backdrop-filter: blur(22px);
}


.responsesTitlePage{
    border-bottom: 1px solid white;
    font-weight: bolder;
}

.break{
    word-break: break-all;
}

</style>