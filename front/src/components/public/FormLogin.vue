<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                email:"",
                password:""
            }
        },

        methods: {
            async login(){
                await axios.post("http://127.0.0.1:8000/api/login",{
                    email:this.email,
                    password:this.password
                })
                .then((response) => {
                    const localToken=localStorage.getItem('token');
                    if(localToken==null) {
                        localStorage.setItem('token', response.data.data.token)
                    }else{
                        localStorage.removeItem('token')
                        localStorage.setItem('token', response.data.data.token)
                    }
                    window.location.href = "/admin"
                    
                
            })
                .catch(err => console.log(err));
            }
        },
    }
    </script>
    

<template>
  <form @submit.prevent="login">
    <h1>Connectez-vous !</h1>
    <input type="email" v-model="this.email"/>
    <input type="password" v-model="this.password"/>
    <button>Se connecter</button>
  </form>
</template>


<style>

</style>