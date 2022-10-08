<script>
import axios from 'axios';

export default {
    props: {
        page: {
            type: String
        }
    },
    data() {
        return {
            apiURL: import.meta.env.VITE_BASE_API,
        }
    },
    methods: {
        // methods to loggout from the admin
        async logout() {
            const token = localStorage.getItem('token') //get the token in the localStorage

            await axios.post(this.apiURL + "logout", null, {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
                .then((response) => {
                    localStorage.removeItem('token') //remove the token into the localStorage
                    window.location.href = "/login" // redirect to Login page
                })
                .catch(err => {
                    console.log(err)
                    if (err.response.status == 401) {
                        alert("Vous êtes déjà déconnecté(e)")
                        window.location.href = "/login"
                    }
                    alert("Une erreur est survenue. Veuillez recharger la page ultérieurement.")
                    window.location.href = "/login"

                });
        },
    },

   
}
</script>

<template>
    <div
        class=" navbar navbar-expand-lg   d-flex justify-content-lg-center text-lg-center col-12 col-md-12 col-lg-3 col-xl-2 ">
        <!-- Navbar admin -->
        <nav role="navigation" class="navbar-expand-lg m-auto col-12 ">
            <div class="container-fluid col-12 ">
                <div class="row m-auto col-12">
                    <div class="p-2 col-9 col-lg-12">
                        <!-- Logo -->
                        <a class="logo text-white text-center  navbar-brand m-auto col-12 col-lg-12 "
                            href="/administration">BIGSCREEN</a>
                    </div>
                    <div class="toogleContainer text-center col-3 col-lg-6">
                        <!-- Toggle button displaying navbar in small screen -->
                        <button class="border-light border-2 navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon navbar-dark "></span>
                        </button>
                    </div>
                </div>


                <div class="text-center collapse navbar-collapse pt-2" id="navbarSupportedContent">
                    <ul class="row  navbar-nav m-auto  col-lg-12">

                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'adminCharts'}">Accueil</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'adminQuestions'}">Questions</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name:'adminResponses'}">Réponses</router-link>
                        </li>
                        <button class="btnDeco p-1 m-auto mt-2 col-6 col-md-4 col-lg-8 "
                            @click="logout()">Déconnexion</button>
                    </ul>

                </div>

            </div>
        </nav>

    </div>
</template>



<style>
.navbar {
    background-image: url(../../../img/navBackground.jpg);
    background-size: cover;
}

.nav-link {
    color: white;
}

.nav-link:focus {
    font-weight: bold;
    color: white;
    text-decoration: underline;
}

.nav-link:hover {
    font-weight: bold;
    color: white;
    text-decoration: underline;
}


.btnDeco {
    border-radius: 8px;
    background: rgb(130, 134, 255);
    border: 1px solid white;
    color: white;
}

.btnDeco:hover {
    border-radius: 8px;
    background: white;
    border: 1px solid white;
    color: rgb(130, 134, 255);
    font-weight: bolder;
}


@media screen and (min-width: 1000px) and (max-width: 2560px) {
    .navbar {
        height: 100vh;
        display: block;
    }

}
</style>