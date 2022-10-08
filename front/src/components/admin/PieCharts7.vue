<script>
import Chart from "chart.js/auto";
import axios from "axios";
export default {
  data() {
    return {
      labels: [],
      chartDatas: [],
      error: "",
      apiURL: import.meta.env.VITE_BASE_API,
      message: "",
    };
  },
  async mounted() {
    const token = localStorage.getItem("token"); //get the token into the localStorage

    await axios.get(this.apiURL + "infosVR/7", {
        // get the different users choices for the question 7
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + token,
        },
      })
      .then((response) => {
        if (response.status == 204) {
          this.message = "Aucun sondage enregistré";
        } else {
          this.labels = response.data.labels; // get the different possibles choices
          this.chartDatas = response.data.chartDatas; // get the choices of the users
        }
      })
      .catch(
        (err) =>
        (this.error =
          "Une erreur est survenue. Veuillez recharger la page ultérieurement.")
      );
    // Define the different graph's params
    const ctx = document.getElementById("myChart7");

    const data = {
      labels: this.labels,
      datasets: [
        {
          label: "Graph question 7",
          data: this.chartDatas,
          backgroundColor: [
            "#D2ABFF",
            "#9EE4FF",
            "#81FFC1",
            "#FFED90",
          ],
          hoverOffset: 4,
        },
      ],
      options: [
        {
          responsive: true,
        },
      ],
    };

    const myChart7 = new Chart(ctx, {
      type: "pie",
      data: data,
    });

    return myChart7;
  },
};
</script>

<template>
  <div>
    <!-- Graph's title -->
    <p>
      <span class="fw-bolder">Question 7 :</span> Achats des contenus VR en fonction des différents magasins
      d'application
    </p>
    <!-- If there is an error, an error message will be display -->
    <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error != ''">
      {{ this.error }}
    </p>
    <!-- Else if there are no responses yet display a message for the admin -->
    <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-else-if="this.message != ''">
      {{ this.message }}
    </p>
    <!-- Else display the graph -->
    <canvas v-else id="myChart7" width="400" height="400" aria-label="Graph-achats-contenus-VR" role="graphique">
    </canvas>
  </div>
</template>

<style>

</style>
