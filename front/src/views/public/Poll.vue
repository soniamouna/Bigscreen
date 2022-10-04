<script>
import FormPoll from '../../components/public/FormPoll.vue';
export default {
    components: { FormPoll },

}
</script>
    
<template>
    <div class="mt-lg-5 mb-lg-5 pb-lg-4 pt-lg-4 col-lg-11 m-auto pollContainer">
        <div class="col-lg-11 headerBackground pt-4 pb-4 m-auto mt-lg-2">
            <h1 class="col-10 col-lg-10 col-xl-9 pb-3 m-auto bigscreenTitle text-white">
                BIGSCREEN
            </h1>
            <p class="text-center m-auto col-9 col-lg-9 titlePoll text-white">
                Merci de répondre à toutes les questions et de valider le formulaire en bas de page.
            </p>
        </div>
        <p class="text-center m-auto col-9 col-lg-9 fst-italic text-white "> Tous les champs sont
            obligatoires </p>
        <FormPoll />
    </div>
</template>
    
    
    
<style>
@media screen and (min-width: 1900px) and (max-width: 4000px) {
    .pollContainer {
        background-image: url(../../../img/lavaBackground2.jpg);
        border-radius: 20px;
        background-size: cover;
    }

    .titlePoll {
        font-size: 30px;
    }

}

@media screen and (min-width: 1024px) and (max-width: 1890px) {
    .bigscreenTitle {
        font-weight: bolder;
    }

    .titlePoll {
        font-size: 21px;
    }

    .pollContainer {
        background-image: url(../../../img/lavaBackground2.jpg);
        border-radius: 20px;
    }
}


@media screen and (min-width: 200px) and (max-width: 990px) {
    .headerBackground {
        background-color: rgba(83, 23, 138, 0.632);
        backdrop-filter: blur(20px);
    }

    .pollContainer {
        background-image: url(../../../img/lavaBackground2.jpg);
    }

    .bigscreenTitle {
        text-align: center;
    }

    .titlePoll {
        text-align: center;
    }

}
</style>