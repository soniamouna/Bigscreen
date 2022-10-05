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

        await axios
            .get(this.apiURL + "infosVR/10", { // get the different users choices for the question 10
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

        const ctx = document.getElementById("myChart10");

        const data = {
            labels: this.labels,
            datasets: [
                {
                    label: "Graph question 10",
                    data: this.chartDatas,
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(54, 162, 235)",
                        "rgb(255, 205, 86)",
                        "rgb(255, 20, 86)",
                        "rgb(255, 205, 186)",
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

        const myChart10 = new Chart(ctx, {
            type: "doughnut",
            data: data,
        });

        return myChart10;
    },
};
</script>

<template>
    <div>
        <!-- Graph's title -->

        <p>
            <span class="fw-bolder">Question 10 :</span> Utilisation principale de
            Bigscreen
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

        <canvas v-else id="myChart10" width="400" height="400" aria-label="Graph-utilisation-principale"
            role="graphique"></canvas>
    </div>
</template>

<style>

</style>
