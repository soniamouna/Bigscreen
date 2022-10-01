<script>
import axios from 'axios';
import TabResponses from '../../components/admin/TabResponses.vue';
import NavbarAdmin from '../../components/admin/NavbarAdmin.vue';

export default {
    data() {
        return {
            questions: [],
            responses: [],
        };
    },
    mounted() {
        const token = localStorage.getItem("token")
        axios.get("http://127.0.0.1:8000/api/questions")
        .then((response) => {
                console.log(response.data);
                this.questions = response.data


            })
            .catch(err => console.log(err));

        axios.get("http://127.0.0.1:8000/api/responses", {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
            .then((res) => {
                console.log(res.data);
                this.responses = res.data;
            })
            .catch(err => console.log(err));




    },
    components: { TabResponses, NavbarAdmin }
}
</script>
    
<template>
    <div class="row m-auto col-lg-12 col-md-12 col-12">
        <NavbarAdmin/>
    <div class="scrollPage col-lg-8 p-4  m-auto ">
        <TabResponses :questions="this.questions" :responses="this.responses" />
    </div>
</div>

    
</template>
    
    
    
<style>
    .adminBackground{
        background-color: rgb(255, 255, 255);
        border-radius: 22px;
        box-shadow: 10px 5px 5px rgb(167, 167, 167);
        border: 1px solid black;
    
    
    }
    .scrollPage{
        height: 100vh;
        overflow-y: scroll;
        scrollbar-width: thin;
       
    }
</style>