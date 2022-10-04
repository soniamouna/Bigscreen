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
    axios
      .get(this.apiURL + "questions")
      .then((response) => {
        this.questions = response.data;
        this.questions.forEach((element) => {
          this.responses[element.id] = "";
        });
      })
      .catch((err) => {
        if (err.response.status == 500) {
          this.error =
            "Une erreur est survenue. Veuillez recharger la page ultérieurement.";
        }
      });
  },
  components: { ModalLinkResponses, FormQuestionInfos },
};
</script>

<template>
  <div id="form">
    <p v-if="this.error !== ''" class="errorMsg fw-bold p-5 mb-5 fs-4 bg-light text-center col-lg-8 m-auto">
      {{ this.error }}
    </p>

    <!-- Informations about the question -->
    <form>
      <!-- Informations about the question -->
      <div class="col-12 col-lg-12" v-for="question in this.questions" :key="question.id">
        <div class="formContainer mt-4 mb-4 col-lg-6 m-auto p-lg-4 pt-4 pb-4">
          <!-- Informations about the question -->
          <FormQuestionInfos :id="question.id" :length="this.questions.length" :title="question.title" />
          <!--Choices -->
          <div class="dotBorder pb-4 pt-4 col-12 col-lg-12 m-auto">
            <!-- Type A -->
            <div   v-if="question.type === 'A'">
              <div  v-for="(choice, index) in question.choices" :key="index">
                <div class="col-12 col-md-4 col-lg-6 row m-auto">
                  <div class="col-2 col-md-2 col-lg-2">
                    <input :id="'radio'+index+'-'+question.id"  class="m-auto" type="radio" :value="choice" :name="question.id"
                      v-model="responses[question.id]"  />
                  </div>
                  <div class="col-10 col-md-10 col-lg-10">
                    <label :for="'radio'+index+'-'+question.id"  class="text-white font-monospace"> {{ choice }} </label>
                  </div>
                </div>
              </div>
            </div>
            <!-- Type B -->

            <div class="text-center" v-else-if="question.type === 'B'">
              <div v-if="question.id === 1">
                <label for="email" class="text-white">Saisissez votre email ci-dessous :</label>
                <input id="email" class="col-10 inputForm col-lg-8 pb-2 pb-2" type="email" :name="question.id"
                  title="Entrer votre email" aria-label="champ email" placeholder="exemple@gmail.com" required
                  maxlength="255" v-model="responses[question.id]" />
              </div>

              <div v-else-if="question.id === 2">
                <label for="age" class="text-white">Saisissez votre age ci-dessous :</label>
                <input id="age" class="col-10 inputForm col-lg-8 pb-2 pb-2"  type="text" :name="question.id"
                title="Entrer votre âge" aria-label="champ âge" placeholder="ex : 12" maxlength="3" v-model="responses[question.id]" />
              </div>

              <textarea class="area col-11 col-lg-11" :name="question.id"
              title="Entrer votre réponse" :aria-label="'champ réponse question'+question.id" cols="30" rows="10" maxlength="255" v-else
                v-model="responses[question.id]" required></textarea>
            </div>
            <!-- Type C -->
            <div class="col-12 col-md-12 col-lg-12 m-auto row" v-else-if="question.type === 'C'">
              <div class="col-2 col-md-2 col-lg-2 m-auto" v-for="index in 5" :key="index">
                <input :id="'quality'+index+'-'+question.id" class="col-3 col-md-4 col-lg-3 mx-2" type="radio" :name="question.id"
                title="Notez la qualité" :aria-label="'champ note qualité question'+question.id" :value="index"
                  v-model="responses[question.id]" required />
                <label :for="'quality'+index" class="col-2 col-md-6 col-lg-3 text-white"> {{ index }} </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="this.error == ''">
        <ModalLinkResponses :questions="this.questions" :responses="this.responses" />
      </div>
    </form>
  </div>
</template>

<style>
.errorMsg {
  border-radius: 10px;
}

@media screen and (min-width: 800px) and (max-width: 4000px) {
  .inputForm {
    border-radius: 10px;
  }

  .formContainer {
    border-radius: 20px;
    background-color: rgba(115, 115, 115, 0.498);
    backdrop-filter: blur(10px);
  }

  .dotBorder {
    border: 2px dotted white;
    border-radius: 10px;
  }

  .area {
    border-radius: 20px;
  }

  div>.statement {
    font-size: 20px;
  }
}

@media screen and (min-width: 300px) and (max-width: 768px) {
  .inputForm {
    border-radius: 10px;
  }

  .titleQuestion {
    text-align: center;
  }

  .formContainer {
    border-radius: 20px;
    background-color: rgba(115, 115, 115, 0.498);
    backdrop-filter: blur(10px);
  }

  .dotBorder {
    border: 2px dotted white;
    border-radius: 10px;
  }

  .area {
    border-radius: 20px;
  }
}
</style>
