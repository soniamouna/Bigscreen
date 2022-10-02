
<script>
import Chart from 'chart.js/auto';
import axios from 'axios';
export default {
    data() {
        return {
            labels: [],
            chartDatas: [],
            error: "",
            apiURL: import.meta.env.VITE_BASE_API,
            message: ""


        }
    },
    async mounted() {
        const token = localStorage.getItem("token")

        await axios.get(this.apiURL + "infosVR/10", {
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + token,
            },
        })
            .then((response) => {
                if (response.status == 204) {
                    this.message = "Aucun sondage enregistré"
                } else {
                    this.labels = response.data.labels;
                    this.chartDatas = response.data.chartDatas;
                }

            })
            .catch((err) => this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement.");

        const ctx = document.getElementById('myChart10');

        const data = {
            labels: this.labels,
            datasets: [{
                label: 'My First Dataset',
                data: this.chartDatas,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 20, 86)',
                    'rgb(255, 205, 186)'
                ],
                hoverOffset: 4
            }],
            options: [{
                responsive: true
            }]

        };

        const myChart10 = new Chart(ctx, {
            type: 'doughnut',
            data: data,
        });


        return myChart10;

    }
}


</script>
        
        
<template>

    <div>
        <p class=" fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>
        <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-else-if="this.message!=''">{{this.message}}</p>

        <canvas v-else id="myChart10" width="400" height="400"></canvas>

    </div>

</template>
        
        
<style>

</style>