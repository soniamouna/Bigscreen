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
      baseUrl: import.meta.env.VITE_BASE_URL,
      error: "",
      apiURL:import.meta.env.VITE_BASE_API
    }
  },
  methods: {

    checkResponses() {
      this.error = "";
      for (const question of this.questions) {
        if (this.responses[question.id] == '') {
          this.error="Veuillez remplir tous les champs du formulaire";
          this.show = false
          return false

        } else {
          var re = /(^$|^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)/;
          if (!re.test(this.responses[1])) {
            this.error="Veuillez saisir un email valide !";
            this.show = false
            return false
          }
          return true
        }
      }
    },
    async addResponses() {

      if (this.checkResponses() == true) {
        this.show = true
        await axios.post(this.apiURL+"responses", { email: this.responses[1], responses: this.responses })
          .then(response => {
            this.show = true
            this.link = response.data.link
          })
          .catch(error => {
            this.show=false 
            this.error=error.response.data.message
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

      <button @click="addResponses()" type="button" class=" sendButton" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        FINALISER
      </button>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button @click.prevent type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <p v-if="this.show">Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
              votre investissement, nous vous préparons une application toujours plus
              facile à utiliser, seul ou en famille.
              Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
              cette adresse:
              <a class="linkRespondent" :href="this.baseUrl+'reponses/' + this.link">{{this.baseUrl+'reponses/'+this.link}}</a>
            </p>
            <p v-else>{{this.error}}</p>
          </div>
          <div class="modal-footer">
            <button @click.prevent type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>
    
<style>
  .linkRespondent{
    text-decoration: none;
    color: rgb(146, 38, 255);
    
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

    content: 'FINALISER';
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