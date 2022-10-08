<script>
import axios from 'axios';
import NavbarAdmin from '../../components/admin/NavbarAdmin.vue';

export default {
    props: {
        page: {
            type: String
        }
    },
    data() {
        return {
            apiURL: import.meta.env.VITE_BASE_API,
        };
    },
    methods: {
        // methods to loggout from the admin
        async logout() {
            const token = localStorage.getItem("token"); //get the token in the localStorage
            await axios.post(this.apiURL + "logout", null, {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
                .then((response) => {
                    localStorage.removeItem("token"); //remove the token into the localStorage
                    window.location.href = "/login"; // redirect to Login page
                })
                .catch(err => {
                    console.log(err);
                    if (err.response.status == 401) {
                        alert("Vous êtes déjà déconnecté(e)");
                        window.location.href = "/login";
                    }
                    alert("Une erreur est survenue. Veuillez recharger la page ultérieurement.");
                    window.location.href = "/login";
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
    components: { NavbarAdmin }
}
</script>
        
<template>
    <div class=" row m-0 col-lg-12 col-xl-12 ">
        <!-- Navbar Admin component -->
        <NavbarAdmin />
        <!-- All the admin's page -->
        <router-view class="scroll-page"></router-view>
    </div>
</template>
        
        
        
<style>

</style>