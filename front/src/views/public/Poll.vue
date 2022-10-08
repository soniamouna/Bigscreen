<script>
import FormPoll from '../../components/public/FormPoll.vue';
export default {
    components: { FormPoll },

}
</script>
    
<template>
    <div class="poll-container m-auto my-lg-5 py-lg-4 col-lg-11">
        <div class="headerBackgroundm-auto mt-lg-2 py-4 col-lg-11 ">
            <!-- Logo -->
            <h1 class="logo text-white m-auto pb-3 col-10 col-lg-10 col-xl-9 ">
                BIGSCREEN
            </h1>
            <!-- Informations page -->
            <p class=" titlePoll text-white text-center fs-5 m-auto col-9 col-lg-9">
                Merci de répondre à toutes les questions et de valider le formulaire en bas de page.
            </p>
        </div>
        <p class="fst-italic text-white text-center m-auto col-9 col-lg-9 "> Tous les champs sont obligatoires </p>
        <!-- Poll's form component -->
        <FormPoll />
    </div>
</template>
    
    
    
<style scoped>
@import "../../assets/pollCss/poll.css";
</style>
