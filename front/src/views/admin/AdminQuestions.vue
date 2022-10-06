<script>
import axios from "axios";
import TabQuestions from "../../components/admin/TabQuestions.vue";
import NavbarAdmin from "../../components/admin/NavbarAdmin.vue";
export default {
    components: { TabQuestions, NavbarAdmin },
    data() {
        return {
            questions: [],
            error:"",
            apiURL:import.meta.env.VITE_BASE_API
        };
    },
    mounted() {
        axios
            .get(this.apiURL+"questions") //get the whole questions from the database
            .then((response) => {
                this.questions = response.data;
            })
            .catch((err) =>this.error ="Une erreur est survenue. Veuillez recharger la page ultérieurement.");
    },
};
</script>

<template>
    <div class="row m-auto col-12 col-md-12 col-lg-12">
        <!-- Component navbar Admin -->
        <NavbarAdmin page="questions"/>
        <div class="scroll-page col-lg-9 p-4 m-auto">
            <h1 class="fw-bolder text-center">Liste des questions du sondage</h1>
            <!-- If there is an error display the error's message -->
            <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>
            <!-- Table with the questions'list -->
            <TabQuestions v-else :questions="this.questions" :error="this.error"/>
        </div>
    </div>
</template>

<style>
@import '../../assets/adminRight/adminRightSide.css'
</style>
