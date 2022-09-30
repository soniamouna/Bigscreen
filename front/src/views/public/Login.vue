<script>
import FormLogin from '../../components/public/FormLogin.vue';

export default {
  components: { FormLogin }
}
</script>
        
    
<template>
  <div class="bgLogin  "> 
    <div class="col-lg-12 ">
      <h1 class=" text-center col-lg-2 p-4"><a href="/" class="buttonBigscreenLogin font-monospace">BIGSCREEN</a></h1>
    </div>
    <div class="loginFormContainer container">
      <h1 class="m-auto fw-bolder text-center text-white mb-4 col-lg-9 font-monospace">Connectez-vous !</h1>

      <div class="">
        <FormLogin />
      </div>
    </div>

  </div>

</template>
    
    
<style>
.bgLogin {
  height: 100vh;
  background: rgb(108, 0, 100);
  background: linear-gradient(132deg, rgba(108, 0, 100, 1) 0%, rgba(157, 102, 244, 1) 50%, rgba(117, 191, 251, 1) 100%);
}

.loginFormContainer{
  margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
}


.buttonBigscreenLogin{
  color: white;
  text-decoration: none;
}

.buttonBigscreenLogin:hover{
 text-decoration: underline;
 color: white;
}

</style>