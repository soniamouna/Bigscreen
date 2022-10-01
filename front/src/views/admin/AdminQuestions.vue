<script>
import axios from "axios";
import TabQuestions from "../../components/admin/TabQuestions.vue";
import NavbarAdmin from "../../components/admin/NavbarAdmin.vue";
export default {
    components: { TabQuestions, NavbarAdmin },
    data() {
        return {
            questions: [],
        };
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8000/api/questions")
            .then((response) => {
                console.log(response);
                this.questions = response.data;
            })
            .catch((err) => console.log(err));
    },
};
</script>

<template>
    <div class="row m-auto col-12 col-md-12 col-lg-12">
        <NavbarAdmin />
        <div class="scrollPage col-lg-8 p-4 m-auto m-auto">
            <TabQuestions :questions="this.questions" />
        </div>
    </div>
</template>

<style>
.adminBackground {
    background-color: rgb(255, 255, 255);
    border-radius: 22px;
    box-shadow: 10px 5px 5px rgb(167, 167, 167);
    border: 1px solid black;
}

.scrollPage {
    height: 100vh;
    overflow-y: scroll;
    scrollbar-width: thin;
}
</style>
