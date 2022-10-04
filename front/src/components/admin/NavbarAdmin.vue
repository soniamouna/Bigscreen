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
            apiURL:import.meta.env.VITE_BASE_API,
        }
    },
    methods: {
    
        async logout() {
            const token = localStorage.getItem('token')

            await axios.post(this.apiURL+"logout", null, {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
                .then((response) => {
                    localStorage.removeItem('token')
                    window.location.href = "/login"
                })
                .catch(err =>  alert("Une erreur est survenue. Veuillez recharger la page ultérieurement."));
        }
    },

    mounted() {
        if (!localStorage.getItem("token")) {
            alert("Veuillez vous reconnecter");
            window.location.href = "/login";
        }
    },
}
</script>

<template>
    <div class="col-12 col-md-12 col-lg-3  navbar navbar-expand-lg   d-flex justify-content-lg-center text-lg-center">
        <nav class="col-12 m-auto navbar-expand-lg ">
            <div class="col-12 container-fluid ">
                <div class="row m-auto col-12">
                    <div class="p-2 col-9 col-lg-12">
                        <a class="col-12 col-lg-12 m-auto text-white text-center font-monospace navTitle navbar-brand " href="/administration">BIGSCREEN</a>
                    </div>
                    <div class="text-center toogleContainer col-3 col-lg-6">
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
                            <a :class="this.page=='home'?'activeLink':'text-white nav-link'" href="/administration">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a :class="this.page=='questions'?'activeLink':'text-white nav-link' "  href="/administration/questionnaire">Questionnaire</a>
                        </li>
                        <li class="nav-item" >
                            <a :class="this.page=='responses'?'activeLink':'text-white nav-link'" href="/administration/reponses">Réponses</a>
                        </li>
                        <button class="mt-2 btnDeco col-6 col-md-4 col-lg-6 m-auto p-1" @click="logout()">Déconnexion</button>
                    </ul>

                </div>

            </div>
        </nav>

    </div>
</template>



<style>

   
   .nav-link:hover{
    font-weight: bold;
   }
    .activeLink{
        font-weight: bold;
        color:white;
    }

    .activeLink:hover{
        font-weight: bold;
        color: rgb(130, 134, 255);
    }
  
    .btnDeco{
        border-radius: 8px;
        background: rgb(130, 134, 255);
        border: 1px solid white;
        color:white;
    }
    .btnDeco:hover{
        border-radius: 8px;
        background: white;
        border: 1px solid white;
        color:rgb(130, 134, 255);
        font-weight: bolder;
    }
    .navTitle{
        font-weight: bolder;
    }
    
    
    
    @media screen and (min-width: 800px) and (max-width: 2560px) {
        .navbar {
            height: 100vh;
            display: block;
            border-right: 1px solid black;
            background-image: url(../../../img/navBackground.jpg);
            background-size: cover;
            
            
        }

        
        
    }

    
    @media screen and (min-width: 300px) and (max-width: 768px) {
        .navbar {
          
            background-image: url(../../../img/navBackground.jpg);
            background-size: cover;
            
        }
        
    }
</style>