<script>
import Chart from "chart.js/auto";
import axios from "axios";
export default {
    data() {
        return {
            labels: [],
            chartDatas: [],
            error: "",
        };
    },
    async mounted() {
        const token = localStorage.getItem("token");

        await axios
            .get("http://127.0.0.1:8000/api/infosVR/6", {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
            .then((response) => {
                this.labels = response.data.labels;
                this.chartDatas = response.data.chartDatas;
            })
            .catch((err) =>this.error ="Une erreur est survenue. Veuillez recharger la page ultérieurement.");

        const ctx = document.getElementById("myChart6");

        const data = {
            labels: this.labels,
            datasets: [
                {
                    label: "My First Dataset",
                    data: this.chartDatas,
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(54, 162, 235)",
                        "rgb(255, 205, 86)",
                        "rgb(154, 162, 235)",
                        "rgb(255, 335, 86)",
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

        const myChart6 = new Chart(ctx, {
            type: "doughnut",
            data: data,
        });

        return myChart6;
    },
};
</script>

<template>
    <div>
        <p class=" fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>
        <canvas  v-else id="myChart6" width="400" height="400"></canvas>
    </div>
</template>

<style>

</style>
