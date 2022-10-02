<script>
import axios from "axios";
import useVuelidate from "@vuelidate/core";
import { required, email, helpers } from "@vuelidate/validators";
export default {
  setup() {
    return {
      v$: useVuelidate({ $autoDirty: true }),
    };
  },
  data() {
    return {
      email: "",
      password: "",
      error: "",
      statusCode:"",
      apiURL:import.meta.env.VITE_BASE_API
    };
  },

  methods: {
    async login(event) {
      this.v$.$validate();
      if (this.v$.$error == true) {
        event.preventDefault();
      } else {
        await axios
          .post(this.apiURL+"login", {
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            const localToken = localStorage.getItem("token");
            if (localToken == null) {
              localStorage.setItem("token", response.data.data.token);
            } else {
              localStorage.removeItem("token");
              localStorage.setItem("token", response.data.data.token);
            }
            window.location.href = "/administration";
          })
          .catch((err) => {
            if(err.response.status==500){
                this.statusCode=err.response.status
                this.error="Une erreur est survenue. Veuillez recharger la page ultérieurement."
            }else{
                this.error = err.response.data.data.error

            }
        });
      }
    },
  },
  validations() {
    return {
      email: {
        required: helpers.withMessage("Veuillez remplir tous les champs", required),
        email: helpers.withMessage("Veuillez saisir un email valide", email),
      },
      password: {
        required: helpers.withMessage("Veuillez remplir tous les champs", required),
      },
    };
  },
};
</script>

<template>
    <div>
        <p class="errorMsg fw-bold p-5 mb-5 fs-4 bg-light text-center col-lg-8 m-auto" v-if="this.statusCode==500 && this.error!=''">{{this.error}}</p>
        <form
        @submit.prevent="login"
        class="p-5 m-auto bgForm rounded-5 col-lg-6 row d-flex justify-content-center"
      >
        <div class="mb-3">
          <p class="text-danger fw-bolder" v-if="this.error != ''">{{ this.error }}</p>
          <label for="inputEmail" class="form-label text-white font-monospace fs-5"
            >Email</label
          >
          <input
            type="email"
            class="form-control"
            id="inputEmail"
            placeholder="Ex : exemple@gmail.com"
            v-model="this.email"
          />
          <div class="error" v-if="v$.email.$error">
            {{ v$.email.$errors[0].$message }}
          </div>
        </div>
        <div class="mb-4">
          <label for="inputPassword" class="form-label text-white font-monospace fs-5"
            >Password</label
          >
          <input
            type="password"
            class="form-control"
            id="inputPassword"
            placeholder="Entrez votre mot de passe"
            v-model="this.password"
          />
          <div class="error" v-if="v$.password.$error">
            {{ v$.password.$errors[0].$message }}
          </div>
        </div>
        <button
          type="submit"
          class="btnLogin col-10 col-md-5 col-lg-8 col-xl-10 font-monospace col-xxl-8 p-2 m-auto fs-5 fw-bolder"
        >
          Se connecter
        </button>
      </form>
    </div>
  
</template>

<style>
.error {
  color: white;
}

.bgForm {
  background: rgba(255, 255, 255, 0.208);
  box-shadow: 0px 5px 5px rgba(104, 104, 104, 0.484);
}

.btnLogin {
  border-radius: 10px;
  color: rgba(157, 102, 244, 1);
  background: white;
  border: transparent;
  box-shadow: 2px 5px 5px rgba(104, 104, 104, 0.358);
}

.btnLogin:hover {
  outline: 5px solid rgb(126, 73, 212);
}
</style>
