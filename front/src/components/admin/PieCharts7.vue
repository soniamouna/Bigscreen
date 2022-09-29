
<script>
    import Chart from 'chart.js/auto';
    import axios from 'axios';
    export default {
        data() {
            return {
                labels: [],
                chartDatas: []
            }
        },
        async mounted() {
            const token = localStorage.getItem("token")
    
            await axios.get("http://127.0.0.1:8000/api/infosVR/7", {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
            })
                .then((response) => {
                    this.labels = response.data.labels
                    this.chartDatas = response.data.chartDatas
    
                })
                .catch(err => console.log(err));
    
            const ctx = document.getElementById('myChart7');
    
            const data = {
                labels: this.labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: this.chartDatas,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };
    
            const myChart7 = new Chart(ctx, {
                type: 'doughnut',
                data: data,
            });
            
    
            return myChart7;
    
        }
    }
    
    
    </script>
        
        
    <template>
    
        <div>
            <canvas id="myChart7" width="400" height="400"></canvas>
    
        </div>
    
    </template>
        
        
    <style>
    
    </style>