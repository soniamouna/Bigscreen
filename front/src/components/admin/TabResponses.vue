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
<div class="responsesBackground ">
    <div class="col-lg-12 mt-4 text-center">
        <div class=" col-lg-3 m-auto">
            <h1 class="responsesTitlePage mb-5 font-orbitron">
                RÉPONSES
            </h1> 
        </div>
        
    </div>
    <table class="tabResponsesAppearance container mb-4 col-lg-12 m-auto mt-4 " v-for="response in responses" :key="response.id">
        <tr class="text-white text-center">
            <th>N°</th>
            <th>Questions</th>
            <th>Réponses</th>
        </tr>

        <tr v-for="question,i in questions" :key="question.id" class="col-lg-12">
            <td class="text-center col-lg-2">{{question.id}}</td>
            <td class="col-lg-8">{{question.title}}</td>
            <td class="text-center col-lg-4">{{response[i].value}}</td>
        </tr>


    </table>
</div>
</template>
    
    
    
<style>
tr,
td,
th {
    border: 1px solid grey;
    font-family: monospace;
    
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

</style>