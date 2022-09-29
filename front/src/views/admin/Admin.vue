<script>
import axios from 'axios';
import AdminCharts from './AdminCharts.vue';
import AdminQuestions from './AdminQuestions.vue';
import AdminResponses from './AdminResponses.vue';
export default {
    data() {
        return {
            page: 1
        }
    },
    methods: {
        display(adminPage) {
            this.page = adminPage;

        },
        async logout() {
            const token = localStorage.getItem('token')

            await axios.post("http://127.0.0.1:8000/api/logout", null, {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
                .then((response) => {
                    localStorage.removeItem('token')
                    window.location.href = "/login"
                })
                .catch(err => console.log(err));
        }
    },

    mounted() {
        if (!localStorage.getItem("token")) {
            alert("Veuillez vous reconnecter");
            window.location.href = "/login";
        }
    },
    components: { AdminCharts, AdminQuestions, AdminResponses }
}
</script>
    
<template>
    <div class="row col-lg-12 col-md-12 col-12">
        <!-- Navbar Admin Vertical -->
        <div class="col-12 col-md-12 col-lg-3  navbar navbar-expand-lg   d-flex justify-content-lg-center text-lg-center">
            <nav class=" navbar-expand-lg ">
                <div class="container-fluid ">
                    <a class="text-white font-orbitron navTitle navbar-brand" href="#">BIGSCREEN</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class=" navbar-nav me-auto  row col-lg-12">
                            <li class="nav-item" @click="display(1)">
                                <a class="text-white nav-link " href="#">Accueil</a>
                            </li>
                            <li class="nav-item" @click="display(2)">
                                <a class="text-white nav-link" href="#">Questionnaire</a>
                            </li>
                            <li class="nav-item" @click="display(3)">
                                <a class="text-white nav-link" href="#">Réponses</a>
                            </li>
                            <button class="" @click="logout()">Déconnexion</button>
                        </ul>

                    </div>

                </div>
            </nav>

        </div>


        <!-- Different displays  -->
        <div class="col-lg-8 p-4 m-auto mt-5 mb-4 adminBackground ">
            <AdminCharts v-if="this.page==1" />
            <AdminQuestions v-else-if="this.page==2" />
            <AdminResponses v-else-if="this.page==3"  />

        </div>
    </div>
</template>
    
    
    
<style>
.br {
    border: 1px solid red;
}

.adminBackground{
    background-color: rgb(255, 255, 255);
    border-radius: 22px;
    border:1px solid black;
    box-shadow: 10px 5px 5px rgb(167, 167, 167);


}

.navTitle{
    font-weight: bolder;
}



@media screen and (min-width: 800px) and (max-width: 2560px) {
    .navbar {
        height: 100vh;
        display: block;
        border-right: 1px solid black;
        box-shadow: 10px 5px 5px rgb(167, 167, 167);
        background-image: url(../../../img/navBackground.jpg);
        
    }
}
</style>