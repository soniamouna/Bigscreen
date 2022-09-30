<script>
import axios from 'axios';

export default {
    methods: {
    
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
}
</script>

<template>
    <div class="col-12 col-md-12 col-lg-3  navbar navbar-expand-lg   d-flex justify-content-lg-center text-lg-center">
        <nav class=" navbar-expand-lg ">
            <div class=" container-fluid ">
                <a class="m-auto text-white font-orbitron navTitle navbar-brand" href="#">BIGSCREEN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class=" navbar-nav m-auto  row col-lg-12">
                        <li class="nav-item">
                            <a class="text-white nav-link " href="/administration">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" href="/administration/questionnaire">Questionnaire</a>
                        </li>
                        <li class="nav-item" >
                            <a class="text-white nav-link" href="/administration/reponses">Réponses</a>
                        </li>
                        <button class="btnDeco col-lg-6 m-auto p-1" @click="logout()">Déconnexion</button>
                    </ul>

                </div>

            </div>
        </nav>

    </div>
</template>



<style>
   
    
   
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
            box-shadow: 10px 5px 5px rgb(167, 167, 167);
            background-image: url(../../../img/navBackground.jpg);
            
            
        }
        
    }

    
    @media screen and (min-width: 300px) and (max-width: 768px) {
        .navbar {
          
            background-image: url(../../../img/navBackground.jpg);

            
        }
        
    }
</style>