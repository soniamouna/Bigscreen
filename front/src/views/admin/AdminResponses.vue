<script>
import axios from 'axios';
import TabResponses from '../../components/admin/TabResponses.vue';
import NavbarAdmin from '../../components/admin/NavbarAdmin.vue';

export default {
    data() {
        return {
            questions: [],
            responses: [],
            error: "",
            apiURL: import.meta.env.VITE_BASE_API,
            message: ""

        };
    },
    mounted() {
        const token = localStorage.getItem("token") //get the token into the localStorage
        axios.get(this.apiURL + "questions") //get the whole questions from the database
            .then((response) => {
                this.questions = response.data
            })
            .catch((err) => this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement.");

        axios.get(this.apiURL + "responses", { //get the whole responses for each respondent
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + token,
            },
        })
            .then((res) => {
                if (res.status == 204) {
                    this.message = "Aucun sondage enregistré"
                } else {
                    this.responses = res.data;
                }

            })
            .catch((err) => this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement.");
    },
    components: { TabResponses, NavbarAdmin }
}
</script>
    
<template>
    <div class=" m-auto col-12 col-md-12 col-lg-9 col-xl-10 ">
        <div class="m-auto p-4  col-lg-12 ">
            <h1 class="fw-bolder text-center">Liste des différentes réponses du sondage</h1>
            <!-- If there are no poll recorded, display a  message -->
            <p class="fw-bold fs-lg-5 fs-xl-5 text-center " v-if="this.message!=''">{{this.message}}</p>
            <!-- Else if there is an error, display the error's message -->
            <p class="fw-bold fs-lg-5 fs-xl-5 text-center " v-else-if="this.error!=''">{{this.error}}</p>
            <!-- Else display the responses'tables -->
            <TabResponses v-else :questions="this.questions" :responses="this.responses" :error="this.error" />
        </div>
    </div>


</template>
    
    
    
<style scoped>
@import '../../assets/adminRight/adminRightSide.css'
</style>