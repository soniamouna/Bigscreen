<script>
export default {
    props: {
        questions: {
            type: Array,
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
        <!-- Table listing the questions -->
        <table v-else class="table m-auto col-lg-12 ">
            <tr class="text-white">
                <th>N°</th>
                <th>Questions</th>
                <th>Types</th>
            </tr>
            <!-- For each question create a ligne into the table -->
            <tr v-for="question in questions" :key="question.id">
                <td class="break text-center">{{question.id}}</td>
                <td>{{question.title}}</td>
                <td class="break text-center">{{question.type}}</td>

            </tr>


        </table>
    </div>
</template>
    
    
    
<style scoped>
@import '../../assets/adminRight/adminRightSide.css';
</style>