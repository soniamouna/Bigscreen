
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
            type: String,
        },


    },
}
</script>
<template>
  <div class="titleQuestion col-lg-12">
    <h1 class="text-white font-monospace">
      Question {{ id }}/{{ length }}
    </h1>
    <p class="statement text-white font-monospace">{{ title }}</p>
  </div>
</template>


<style>

</style>