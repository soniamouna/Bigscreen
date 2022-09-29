<script>
import RadarCharts from '../../components/admin/RadarCharts.vue';
import PieCharts6 from '../../components/admin/PieCharts6.vue';
import PieCharts7 from '../../components/admin/PieCharts7.vue';
import PieCharts10 from '../../components/admin/PieCharts10.vue';
export default {
    components: { RadarCharts, PieCharts6, PieCharts7, PieCharts10 }
}
</script>

<template>
    <div class="col-lg-12">
        <div class="col-lg-12 m-auto">
            <div class="text-center mb-4">
                <h1 class="m-auto col-lg-2 titleWelcome font-monospace">
                    ACCUEIL
                </h1>
            </div>
            <div class="m-auto pb-4 col-lg-9 row">
                <div class="m-auto chartsContainer p-4 col-lg-5">
                    <PieCharts6/>
                </div>
                <div class="m-auto chartsContainer p-4 col-lg-5">
                    <PieCharts7/>
                </div>
    
            </div>
            <div class="m-auto col-lg-9 row"> 
                <div class="m-auto chartsContainer p-4 col-lg-5">   
                    <PieCharts10/>
                </div>
                <div class="m-auto chartsContainer p-4 col-lg-5">
                    <RadarCharts />
                </div>
            </div>
        </div>

    </div>
</template>



<style>

    .chartsContainer{
        border: 1px solid black;
        border-radius: 22px;
    }

    .titleWelcome{
        font-weight: bolder;
        border-bottom: 1px solid black;
    }
    

</style>