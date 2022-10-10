<script>

import Chart from 'chart.js/auto';
import axios from 'axios';
export default {
    data() {
        return {
            averages: [],
            error: "",
            apiURL: import.meta.env.VITE_BASE_API,
            message: ""

        }
    },
    async mounted() {
        const token = localStorage.getItem("token") //get the token into the localStorage

        await axios.get(this.apiURL + "quality", { // get the averages of the different users choices for the question 11 to 15
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + token,
            },
        })
            .then((response) => {
                if (response.status == 204) {
                    this.message = "Aucun sondage enregistré"
                } else {
                    this.averages = response.data // get the different averages
                }


            })
            .catch((err) => this.error = "Une erreur est survenue. Veuillez recharger la page ultérieurement.");

        // Define the different graph's params

        const ctx = document.getElementById('myRadarChart');
        const data = {
            labels: [
                "Image",
                "Confort d'utilisation",
                "Connexion réseau",
                "Graphismes 3D",
                "Audio",
            ],
            datasets: [{
                label: 'Moyenne de la qualité de Bigscreen',
                data: this.averages,
                fill: true,
                backgroundColor: 'rgba(210,171,255,0.3)',
                borderColor: 'rgba(163,84,255,0.6)',
                pointBackgroundColor: 'rgba(98, 2, 210 ,0.8)',
                pointBorderColor: 'rgba(243, 227, 255 ,1)',
                pointHoverBackgroundColor: 'rgba(243, 227, 255 ,1)',
                pointHoverBorderColor: 'rgba(163,84,255,0.6)'
            }],
            options: [{
                responsive: true
            }]
        };



        const myRadarChart = new Chart(ctx, {
            type: 'radar',
            data: data,
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }

            },
        });


        return myRadarChart;

    }
}


</script>


<template>

    <div>
        <!-- Graph's title -->

        <p><span class="fw-bolder">Questions 11 à 15 :</span> Moyenne de la qualité des services de Bigscreen</p>
        <!-- If there is an error, an error's message will be display -->

        <p class=" fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>
        <!-- Else if there are no responses yet display a message for the admin -->

        <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-else-if="this.message!=''">{{this.message}}</p>
        <!-- Else display the graph -->

        <canvas v-else id="myRadarChart" width="400" height="400" aria-label="Graph-moyenne-qualité"
            role="graphique"></canvas>
    </div>

</template>


<style>

</style>