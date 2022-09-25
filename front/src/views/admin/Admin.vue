<script>
import NavBarAdmin from '../../components/admin/NavBarAdmin.vue';
    export default {
    components: { NavBarAdmin },
    mounted() {
        if(!localStorage.getItem('token')){
            alert("Veuillez vous reconnecter")
            window.location.href="/login"
        }
    },
}
    </script>
    
    <template>
    <NavBarAdmin/>
    </template>
    
    
    
    <style>
    
    </style>