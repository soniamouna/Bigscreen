
<script>
export default {
    props: {
        id: {
            type: Number,
        },
        title: {
            type: String,
        },
        length: {
            type: Number,
        },


    },
}
</script>
<template>
  <div class="titleQuestion col-lg-12">
    <h1 class="text-white ">
      Question {{ id }}/{{ length }}
    </h1>
    <p class="statement text-white ">{{ title }}</p>
  </div>
</template>


<style>

</style>