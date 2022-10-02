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
            .get(this.apiURL+"questions")
            .then((response) => {
                this.questions = response.data;
            })
            .catch((err) =>this.error ="Une erreur est survenue. Veuillez recharger la page ultérieurement.");
    },
};
</script>

<template>
    <div class="row m-auto col-12 col-md-12 col-lg-12">
        <NavbarAdmin page="questions"/>
        <div class="scrollPage col-lg-9 p-4 m-auto">
            <TabQuestions :questions="this.questions" :error="this.error"/>
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
