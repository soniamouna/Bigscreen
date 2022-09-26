<script>
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
            
        }
    },

    mounted() {
        console.log(this.page)
        if (!localStorage.getItem("token")) {
            alert("Veuillez vous reconnecter");
            window.location.href = "/login";
        }
    },
    components: { AdminCharts, AdminQuestions, AdminResponses }
}
</script>
    
<template>
    <div class="row col-lg-12">
        <!-- Navbar Admin Vertical -->
        <div class="col-lg-3 navbar br m-auto ">
            <h1>BIGSCREEN</h1>
            <nav>
                <ul>
                    <li @click="display(1)"><a href="#">Accueil</a></li>
                    <li @click="display(2)"><a href="#">Questionnaire</a></li>
                    <li @click="display(3)"><a href="#">Réponses</a></li>
                </ul>
            </nav>
        </div>

        <!-- Display Admin -->
        <div class="col-lg-9 br">
            <AdminCharts v-if="this.page==1" />
            <AdminQuestions v-else-if="this.page==2" />
            <AdminResponses v-else  />

        </div>
    </div>
</template>
    
    
    
<style>
.br {
    border: 1px solid red;
}

.navbar {
    height: 100vh;
    display: block;
}
</style>