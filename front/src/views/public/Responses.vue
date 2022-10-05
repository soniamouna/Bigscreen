<script>
import axios from "axios";
import { useRoute } from "vue-router";
import ResponsesQuestions from "../../components/public/ResponsesQuestions.vue";
export default {
  components: { ResponsesQuestions },
  data() {
    return {
      responses: [],
      questions: [],
      createdAt: "",
      error: "",
      apiURL:import.meta.env.VITE_BASE_API
    };
  },

  methods: {
    // Methods to display when the survey was created (dd/mm/yy hhhmin)
    getDateSurvey(date) {
      const dateToString = new Date(date);
      const day = dateToString.getDate();
      const month = dateToString.getMonth();
      const year = dateToString.getFullYear();
      const hours = dateToString.getHours();
      const minutes = dateToString.getMinutes();
      return (day<10?"0":"")+day + "/" + (month<10?"0":"")+month + "/" + year + " à " + hours + "h" + (minutes<10?"0":"")+minutes;
    },
  },
  mounted() {
    const route = useRoute();
    const link = route.params.link; //get the link param in the url

    axios
      .get(this.apiURL+"questions") 
      .then((response) => {
        this.questions = response.data;// get the whole questions
      })
      .catch(
        (err) =>{
          if (err.response.status == 500) { // if the server has an problem, return a message, for the user, corresponding to error500
          this.error ="Une erreur est survenue. Veuillez recharger la page ultérieurement.";
        }
        }
      );

    axios
      .get(this.apiURL+"respondents/" + link) // get the respondent by his/her link
      .then((response) => {
        this.createdAt = this.getDateSurvey(response.data.respondent.created_at); // get the date when he/she was created (same as the survey's creation)
        const idRespondent = response.data.respondent.id; // get the id's respondent
        axios
          .get(this.apiURL+"responses/" + idRespondent) // get the whole responses of this respondent
          .then((res) => {
            this.responses = res.data.responses;
          })
          .catch((err) => console.log(err));
      })
      .catch((err) => {
        if (err.response.status == 500) {
          this.error =
            "Une erreur est survenue. Veuillez recharger la page ultérieurement.";
        } else {
          this.error = err.response.data.message;
        }
      });
  },
};
</script>

<template>
  <div>
    <div class="mt-lg-5 mb-lg-5 pb-4 pt-lg-4 col-lg-11 m-auto pollContainer">
      <div class="col-lg-11 headerBackground pt-4 pb-4 m-auto mt-lg-2">
        <!-- Logo -->
        <h1
          class="col-10 col-lg-10 col-xl-9 pb-3 m-auto bigscreenTitle text-white "
        ><a class="logo text-white text-decoration-none" href="/"> BIGSCREEN</a>
         
        </h1>
        <!-- Display the created_at -->
        <p v-if="this.error == ''" class="m-auto text-center col-9 col-lg-9 titlePoll text-white ">
          Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage
          le {{ this.createdAt }}
        </p>
      </div>
      <!-- If there is an error display the error's message -->
      <p
        class="errorMsg fw-bold p-5 mb-5 fs-4 bg-light text-center col-lg-8 m-auto"
        v-if="this.error != ''"
      >
        {{ this.error }}
      </p>
      <!-- Else display the respondent's responses if the link in the url is correct -->
      <ResponsesQuestions
        v-else
        :questions="this.questions"
        :responses="this.responses"
      />
    </div>
  </div>
</template>

<style></style>
