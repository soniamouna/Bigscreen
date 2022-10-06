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
      statusCode: "",
      apiURL: import.meta.env.VITE_BASE_API
    };
  },

  methods: {
    async login(event) {
      this.v$.$validate();
      if (this.v$.$error == true) {
        event.preventDefault();
      } else {
        await axios
          .post(this.apiURL + "login", { // send the credentials to log in    
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            // Check if "token" exist in localStorage
            const localToken = localStorage.getItem("token");
            if (localToken == null) { // if token doesn't exist in localstorage
              localStorage.setItem("token", response.data.data.token); // save current user's token in localStorage
            } else { // else, set the current user's token into localstorage
              localStorage.removeItem("token");
              localStorage.setItem("token", response.data.data.token);
            }
            window.location.href = "/administration"; // then redirect admin to the admin's page
          })
          .catch((err) => {
            if (err.response.status == 500) {
              this.statusCode = err.response.status
              this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement."
            } else { // if the credentials aren't correct send message to the user
              this.email = ""
              this.password = ""
              this.error = err.response.data.data.error

            }
          });
      }
    },
  },
  validations() {
    return {
      //type's validations for email and password with the error message for the user
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
    <!-- Display the error's message if there is an error500  -->
    <p class="errorMsg fw-bold p-5 mb-5 fs-4 bg-light text-center col-lg-8 m-auto"
      v-if="this.statusCode==500 && this.error!=''">{{this.error}}</p>
    <!-- Login form to sign in -->
    <form @submit.prevent="login" class="p-5 m-auto bgForm rounded-5 col-lg-6 row d-flex justify-content-center">
      <div class="mb-3">
        <!-- Display error's message if the user enters wrong credentials -->
        <p class="error text-center fw-bolder" v-if="this.error != ''">{{ this.error }}</p>
        <!-- Email field -->
        <label for="inputEmail" class="form-label text-white  fs-5">Email</label>
        <input id="inputEmail" type="email" class="form-control" name="email" title="Entrer votre email"
          aria-label="champ email" required placeholder="Ex : exemple@gmail.com" v-model="this.email" />
        <!-- display error's message based on form validations -->
        <div class="error" v-if="v$.email.$error">
          {{ v$.email.$errors[0].$message }}
        </div>
      </div>
      <div class="mb-4">
        <!-- Password field -->
        <label for="inputPassword" class="form-label text-white  fs-5">Password</label>
        <input id="inputPassword" type="password" class="form-control" name="password" title="Entrer votre mot de passe"
          aria-label="champ mot de passe" required placeholder="Entrez votre mot de passe" v-model="this.password" />
        <!-- display error's message based on form validations -->
        <div class="error" v-if="v$.password.$error">
          {{ v$.password.$errors[0].$message }}
        </div>
      </div>
      <button type="submit" class="btnLogin col-10 col-md-5 col-lg-8 col-xl-10  col-xxl-8 p-2 m-auto fs-5 fw-bolder">
        Se connecter
      </button>
    </form>
  </div>

</template>

<style>
.error {
  color: rgb(136, 1, 52);
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
