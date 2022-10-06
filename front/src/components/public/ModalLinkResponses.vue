<script>
import axios from 'axios'
export default {
  name: "ModalLinkResponses",

  props: {

    responses: {
      type: Array
    },
    questions: {
      type: Array
    }
  },

  data() {
    return {
      show: false,
      link: "",
      error: "",
      check: false,
      baseUrl: import.meta.env.VITE_BASE_URL,
      apiURL: import.meta.env.VITE_BASE_API
    }
  },
  methods: {
    reloadPage() { //reload page if the user has the link to see his/her responses
      if (!this.link == "") {
        window.location.reload();
      }

    },
    checkResponses() {
      this.error = ""; // reset the error's message to an empty string
      const reNotEmpty = /^(?!\s*$).+/ // regex not empty
      for (const question of this.questions) {
        //for each question check if the response was complete or not
        if (!reNotEmpty.test(this.responses[question.id])) {
          //if the user hasn't filled in all the inputs 
          this.error = "Veuillez remplir tous les champs du formulaire"; // set the error's message
          this.check = false
          break
        }

        else {
          //Regex email
          const reEmail = /(^$|^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)/;
          //Regex age
          const reDigits = /^[0-9]*$/
          //Check if the email is valid
          if (!reEmail.test(this.responses[1])) {
            this.error = "Veuillez saisir un email valide !";
            this.check = false
            break
          } else {
            //Check if the age is valid

            if (!reDigits.test(this.responses[2])) {
              this.error = "Veuillez saisir un âge valide !";
              this.check = false
              break
            } else {
              this.check = true
            }

          }

        }
      }
    },
    async addResponses() {
      this.checkResponses() // check the responses
      if (this.check == true) {
        // if the responses are validated, send them to database
        await axios.post(this.apiURL + "responses", { email: this.responses[1], responses: this.responses })
          .then(response => {
            this.link = response.data.link // get the link for the new user 
            this.show = true // set show to true -> open modal

          })
          .catch(error => {
            this.show = false
            // if the server has a problem return an error message for the error500
            if (error.response.status == 500) {
              this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement.";
            } else { // if it's a problem about the responses return an error message related to the validations

              this.error = error.response.data.message
            }


          })
      }
    }
  }
}








</script>
    
<template>
  <div class="pb-5">
    <!-- Button trigger modal -->
    <div class="col-lg-12 text-center">
      <!-- The button will display a modal and call the function addResponses() -->
      <button @click="addResponses()" type="button" class=" sendButton" data-bs-toggle="modal"
        data-bs-target="#modalPoll">
        FINALISER
      </button>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="modalPoll" tabindex="-1" aria-labelledby="modal sondage" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!-- Button to close the modal (X) -->
            <button @click.prevent="reloadPage" type="button" class="btn-close" data-bs-dismiss="modal"
              aria-label="Fermer"></button>
          </div>
          <div class="modal-body text-center">
            <div v-if="this.show">
              <p>Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
                votre investissement, nous vous préparons une application toujours plus
                facile à utiliser, seul ou en famille.
                Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
                cette adresse:
              </p> 
              <p class="fst-italic">(Veillez à conserver ce lien. Vous ne pourrez pas le récupérer par la suite)</p>
              <a class="linkRespondent " :href="this.baseUrl+'reponses/' + this.link">
                {{this.baseUrl+'reponses/'+this.link}}
              </a>
            </div>
            <!-- if check=true display the modal with the message for the user and the user's link -->

            <p v-else>{{this.error}}</p>
          </div>
          <div class="modal-footer">
            <!-- Button to close the modal -->
            <button @click.prevent="reloadPage" type="button" class="btn btn-secondary"
              data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>
    
<style>
.linkRespondent {
  text-decoration: none;
  color: rgb(146, 38, 255);
  word-break: break-all;

}

.linkRespondent:hover {
  text-decoration: underline;
  color: rgb(146, 38, 255);
}

@media screen and (min-width: 800px) and (max-width: 4000px) {

  .sendButton,
  .sendButton::after {
    width: 380px;
    height: 80px;
    font-size: 36px;
    font-family: 'Bebas Neue', cursive;
    background: linear-gradient(45deg, transparent 5%, white 5%);
    border: 0;
    color: #dd0297;
    letter-spacing: 3px;
    line-height: 88px;
    box-shadow: 6px 0px 0px #dd0297;
    outline: transparent;
    position: relative;
  }

  .sendButton::after {
    --slice-0: inset(50% 50% 50% 50%);
    --slice-1: inset(80% -6px 0 0);
    --slice-2: inset(50% -6px 30% 0);
    --slice-3: inset(10% -6px 85% 0);
    --slice-4: inset(40% -6px 43% 0);
    --slice-5: inset(80% -6px 5% 0);

    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 3%, white 3%, white 5%, #dd0297 5%);
    text-shadow: -3px -3px 0px white, 3px 3px 0px white;
    clip-path: var(--slice-0);
  }

  .sendButton:hover::after {
    animation: 1s glitch;
    animation-timing-function: steps(2, end);
  }

  @keyframes glitch {
    0% {
      clip-path: var(--slice-1);
      transform: translate(-20px, -10px);
    }

    10% {
      clip-path: var(--slice-3);
      transform: translate(10px, 10px);
    }

    20% {
      clip-path: var(--slice-1);
      transform: translate(-10px, 10px);
    }

    30% {
      clip-path: var(--slice-3);
      transform: translate(0px, 5px);
    }

    40% {
      clip-path: var(--slice-2);
      transform: translate(-5px, 0px);
    }

    50% {
      clip-path: var(--slice-3);
      transform: translate(5px, 0px);
    }

    60% {
      clip-path: var(--slice-4);
      transform: translate(5px, 10px);
    }

    70% {
      clip-path: var(--slice-2);
      transform: translate(-10px, 10px);
    }

    80% {
      clip-path: var(--slice-5);
      transform: translate(20px, -10px);
    }

    90% {
      clip-path: var(--slice-1);
      transform: translate(-10px, 0px);
    }

    100% {
      clip-path: var(--slice-1);
      transform: translate(0);
    }
  }
}

@media screen and (min-width:300px) and (max-width:768px) {
  .sendButton {
    font-size: 36px;
    font-family: 'Bebas Neue', cursive;
    background: linear-gradient(45deg, transparent 5%, white 5%);
    border: 0;
    color: #dd0297;
    letter-spacing: 3px;
    box-shadow: 6px 0px 0px #dd0297;
    outline: transparent;
    position: relative;

  }
}
</style>