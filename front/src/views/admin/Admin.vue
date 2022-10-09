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