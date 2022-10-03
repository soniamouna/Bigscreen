<script>

import Chart from 'chart.js/auto';
import axios from 'axios';
export default {
    data() {
        return {
            averages:[],
            error:"",
            apiURL:import.meta.env.VITE_BASE_API,
            message:""

        }
    },
    methods: {
        
    },
    async mounted() {
        const token = localStorage.getItem("token")

        await axios.get(this.apiURL+"quality",{
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
        .then((response) => {
            if (response.status == 204) {
                    this.message = "Aucun sondage enregistré"
                } else {
                    this.averages=response.data
                }
                    
                    
            })
            .catch((err) =>this.error ="Une erreur est survenue. Veuillez recharger la page ultérieurement.");

       
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
                data: this.averages ,
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }],
            options:[{
                responsive:true
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
        <p><span class="fw-bolder">Question 11 à 15 :</span> Moyenne de la qualité des services de Bigscreen</p>
        <p class=" fw-bold text-center fs-lg-5 fs-xl-5" v-if="this.error!=''">{{this.error}}</p>
        <p class="fw-bold text-center fs-lg-5 fs-xl-5" v-else-if="this.message!=''">{{this.message}}</p>

        <canvas v-else id="myRadarChart" width="400" height="400"></canvas>
    </div>

</template>


<style>

</style>