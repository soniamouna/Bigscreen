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
                });
        }
    },

    mounted() {
        // chek if token exist or not 
        if (!localStorage.getItem("token")) {
            alert("Veuillez vous reconnecter");
            window.location.href = "/login";
        }
    },
}
</script>

<template>
    <div
        class="col-12 col-md-12 col-lg-3 col-xl-3   navbar navbar-expand-lg   d-flex justify-content-lg-center text-lg-center">
        <!-- Navbar admin -->
        <nav class="col-12 m-auto navbar-expand-lg ">
            <div class="col-12 container-fluid ">
                <div class="row m-auto col-12">
                    <div class="p-2 col-9 col-lg-12">
                        <!-- Logo -->
                        <a class="col-12 col-lg-12 m-auto text-white text-center  logo navbar-brand "
                            href="/administration">BIGSCREEN</a>
                    </div>
                    <div class="text-center toogleContainer col-3 col-lg-6">
                        <!-- Toggle button displaying navbar in small screen -->
                        <button class="border-light border-2 navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon navbar-dark "></span>
                        </button>
                    </div>
                </div>


                <div class="text-center collapse navbar-collapse pt-2" id="navbarSupportedContent">
                    <ul class=" navbar-nav m-auto  row col-lg-12">
                        <li class="nav-item">
                            <a :class="this.page=='home'?' nav-link disabled':' nav-link'" 
                                href="/administration">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a :class="this.page=='questions'?' nav-link disabled':' nav-link' " 
                                href="/administration/questionnaire">Questionnaire</a>
                        </li>
                        <li class="nav-item">
                            <a :class="this.page=='responses'?' nav-link disabled':' nav-link'" 
                                href="/administration/reponses">Réponses</a>
                        </li>
                        <button class="mt-2 btnDeco col-6 col-md-4 col-lg-6 m-auto p-1"
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

li>.nav-link {
    color: white;
}

.nav-link:hover {
    font-weight: bold;
    color: rgb(130, 134, 255);
}

.nav-link.disabled {
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


@media screen and (min-width: 800px) and (max-width: 2560px) {
    .navbar {
        height: 100vh;
        display: block;
    }

}
</style>