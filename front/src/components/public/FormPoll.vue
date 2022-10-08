<script>
import axios from "axios";
import ModalLinkResponses from "./ModalLinkResponses.vue";
import FormQuestionInfos from "./FormQuestionInfos.vue";

export default {
  data() {
    return {
      questions: [],
      responses: [],
      error: "",
      apiURL: import.meta.env.VITE_BASE_API
    };
  },

  mounted() {

    axios.get(this.apiURL + "questions")
      .then((response) => {
        this.questions = response.data; // Get the whole questions
        this.questions.forEach((element) => { // For each question create an empty element into the response's table with id's question
          this.responses[element.id] = "";
        });
      })
      .catch((err) => {
        if (err.response.status == 500 || this.questions.length == 0) { // if the server has an problem, return a message, for the user, corresponding to error500
          this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement.";
        }
      });
  },
  components: { ModalLinkResponses, FormQuestionInfos },
};
</script>

<template>
  <!-- Form Poll Component -->
  <div id="form">
    <!-- If server send an error the paragraph will display -->
    <p v-if="this.error !== ''" class="bg-light rounded-2 fw-bold fs-4 p-5 text-center m-auto mb-5 col-lg-8 ">
      {{ this.error }}
    </p>
    <form>
      <div class="col-12 col-lg-12" v-for="question in this.questions" :key="question.id">
        <div class="form-container m-auto my-4 p-lg-4 py-4 col-lg-6">
          <!-- Informations about the question -->
          <FormQuestionInfos :id="question.id" :length="this.questions.length" :title="question.title" />

          <!--Choices -->
          <div class="dot-border m-auto py-4 col-12 col-lg-12 ">
            <!-- Type A -->
            <div v-if="question.type === 'A'">
              <div v-for="(choice, index) in question.choices" :key="index">
                <div class="row m-auto col-12 col-md-4 col-lg-6 ">
                  <div class="col-2 col-md-2 col-lg-2 ">
                    <!-- For each choice, create radio button with a value corresponding to the choice-->
                    <input :id="'radio'+index+'-'+question.id" class="m-auto" type="radio" :value="choice"
                      :name="question.id" v-model="responses[question.id]" />
                  </div>
                  <!-- Label radio button  -->
                  <div class="col-10 col-md-10 col-lg-10">
                    <label :for="'radio'+index+'-'+question.id" class="text-white "> {{ choice }} </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Type B -->
            <div class="text-center" v-else-if="question.type === 'B'">
              <!-- If question 1 => input email -->
              <div v-if="question.id === 1">
                <label for="email" class="text-white">Saisissez votre email :</label>
                <input id="email" class="rounded-3 pb-2 col-10 col-lg-8 " type="email" :name="question.id"
                  title="Entrez votre email" aria-label="champ email" placeholder="exemple@gmail.com" required
                  maxlength="255" v-model="responses[question.id]" />
              </div>
              
              <!-- If question 2 => input age -->
              <div v-else-if="question.id === 2">
                <label for="age" class="text-white">Saisissez votre âge :</label>
                <input id="age" class="rounded-3 pb-2 col-10 col-lg-8" type="text" :name="question.id"
                  title="Entrez votre âge" aria-label="champ âge" placeholder="ex : 12" maxlength="3"
                  v-model="responses[question.id]" />
              </div>

              <textarea class="rounded-3 col-11 col-lg-11" :name="question.id" title="Entrer votre réponse"
                :aria-label="'champ réponse question'+question.id" cols="30" rows="10" maxlength="255" v-else
                v-model="responses[question.id]" required></textarea>
            </div>

            <!-- Type C -->
            <div class="row m-auto col-12 col-md-12 col-lg-12" v-else-if="question.type === 'C'">
              <div class="m-auto col-2 col-md-2 col-lg-2 " v-for="index in 5" :key="index">
                <!-- From 1 to 5, create radio button with value equal to index (1-5)-->
                <input :id="'quality'+index+'-'+question.id" class="mx-2 col-3 col-md-4 col-lg-3 " type="radio"
                  :name="question.id" title="Notez la qualité" :aria-label="'champ note qualité question'+question.id"
                  :value="index" v-model="responses[question.id]" required />
                <label :for="'quality'+index+'-'+question.id" class="text-white col-2 col-md-6 col-lg-3 "> {{ index }}
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- If no error, display button to send the poll-->
      <div v-if="this.error == ''">
        <ModalLinkResponses :questions="this.questions" :responses="this.responses" />
      </div>
    </form>
  </div>
</template>

<style scoped>
@import "../../assets/pollCss/poll.css";
</style>
