<script>
import FormLogin from '../../components/public/FormLogin.vue';

export default {
  components: { FormLogin }
}
</script>
        
    
<template>
  <div class="bgLogin  ">
    <div class="container  pt-5 ">
      <h1 class="text-center"><a href="/" class="text-decoration-none text-white ">BIGSCREEN</a></h1>
      <div class="mt-lg-5 mt-md-5 mt-5">
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
</style>