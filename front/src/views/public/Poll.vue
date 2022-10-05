<script>
import FormPoll from '../../components/public/FormPoll.vue';
export default {
    components: { FormPoll },

}
</script>
    
<template>
    <div class="mt-lg-5 mb-lg-5 pb-lg-4 pt-lg-4 col-lg-11 m-auto poll-container">
        <div class="col-lg-11 headerBackground pt-4 pb-4 m-auto mt-lg-2">
            <!-- Logo -->
            <h1 class="col-10 col-lg-10 col-xl-9 pb-3 m-auto logo text-white">
                BIGSCREEN
            </h1>
            <!-- Informations page -->
            <p class="text-center fs-5 m-auto col-9 col-lg-9 titlePoll text-white">
                Merci de répondre à toutes les questions et de valider le formulaire en bas de page.
            </p>
        </div>
        <p class="text-center m-auto col-9 col-lg-9 fst-italic text-white "> Tous les champs sont obligatoires </p>
        <!-- Poll's form component -->
        <FormPoll />
    </div>
</template>
    
    
    
<style scoped>
@import "../../assets/pollCss/poll.css";
</style>
