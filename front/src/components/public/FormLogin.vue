<script>
import axios from 'axios';
import useVuelidate from "@vuelidate/core";
import {
    required,
    email,
    helpers,
} from "@vuelidate/validators";
export default {
    setup() {
        return {
            v$: useVuelidate({ $autoDirty: true }),
        };
    },
    data() {
        return {
            email: "",
            password: ""
        }
    },

    methods: {
        async login(event) {
            this.v$.$validate();
            if (this.v$.$error == true) {
                event.preventDefault();
            } else {
                await axios.post("http://127.0.0.1:8000/api/login", {
                    email: this.email,
                    password: this.password
                })
                    .then((response) => {
                        const localToken = localStorage.getItem('token');
                        if (localToken == null) {
                            localStorage.setItem('token', response.data.data.token)
                        } else {
                            localStorage.removeItem('token')
                            localStorage.setItem('token', response.data.data.token)
                        }
                        window.location.href = "/administration"


                    })
                    .catch(err => console.log(err));
            }
        }
    },
    validations() {
        return {
            email: {
                required: helpers.withMessage('Veuillez remplir tous les champs', required),
                email: helpers.withMessage('Veuillez saisir un email valide', email),

            },
            password: {
                required: helpers.withMessage('Veuillez remplir tous les champs', required),
            },

        }
    },
}
</script>
    

<template>
    <form @submit.prevent="login" class="p-5 m-auto bg-light rounded-5 col-lg-10 row d-flex justify-content-center">
        <h1 class="text-center">Connectez-vous !</h1>

        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Ex : exemple@gmail.com" v-model="this.email">
            <div class="error" v-if="v$.email.$error">
                {{ v$.email.$errors[0].$message }}
            </div>
        </div>
        <div class="mb-4">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Entrez votre mot de passe" v-model="this.password">
            <div class="error" v-if="v$.password.$error">
                {{ v$.password.$errors[0].$message }}
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-lg-4 m-auto">Se connecter</button>
    </form>
</template>


<style>
    .error{
        color:red
    }
</style>