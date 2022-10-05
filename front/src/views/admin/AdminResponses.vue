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
    <div class="row m-auto col-lg-12 col-md-12 col-12">
        <!-- Navbar -->
        <NavbarAdmin page="responses" />
        <div class="scrollPage col-lg-9 p-4 m-auto">
            <h1>Liste des différentes réponses du sondage</h1>
            <!-- If there are no poll recorded, display a  message -->
            <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.message!=''">{{this.message}}</p>
            <!-- Else if there is an error, display the error's message -->
            <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-else-if="this.error!=''">{{this.error}}</p>
            <!-- Else display the responses'tables -->
            <TabResponses v-else :questions="this.questions" :responses="this.responses" :error="this.error" />
        </div>
    </div>


</template>
    
    
    
<style>
.adminBackground {
    background-color: rgb(255, 255, 255);
    border-radius: 22px;
    box-shadow: 10px 5px 5px rgb(167, 167, 167);
    border: 1px solid black;


}

.scrollPage {
    height: 100vh;
    overflow-y: scroll;
    scrollbar-width: thin;

}
</style>