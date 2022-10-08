<script>
export default {

}
</script>
<template>
    <!-- Display this page when wrong url -->
    <div class="bg-404Page text-center m-auto pt-5">
        <div class="text-white mt-5 pt-5">
            <h1>ERREUR 404</h1>
            <h2>La page à laquelle vous tentez d'accéder est introuvable.</h2>
            <h3 class="pt-5"><a class="link404 text-decoration-none  p-3  " href="/">Revenir à la page d'accueil</a></h3>
        </div>


    </div>
</template>

<style>
.bg-404Page {
    height: 100vh;
    background-image: url(../../../img/bg-404Page.jpg);
    background-size: cover;
}

.link404 {
    display: inline-block;
    border-radius: 10px;
    background-color: white;
    color: rgb(47, 0, 69);
}

.link404:hover {
    background-color: rgb(185, 142, 249);
    color: white;
}
</style>