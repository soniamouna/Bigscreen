<script>
import RadarCharts from '../../components/admin/RadarCharts.vue';
import PieCharts6 from '../../components/admin/PieCharts6.vue';
import PieCharts7 from '../../components/admin/PieCharts7.vue';
import PieCharts10 from '../../components/admin/PieCharts10.vue';
import NavbarAdmin from '../../components/admin/NavbarAdmin.vue';
export default {
    components: { RadarCharts, PieCharts6, PieCharts7, PieCharts10, NavbarAdmin }
}
</script>

<template>
    <div class=" m-auto row col-lg-12 col-md-12 col-12">
    <NavbarAdmin/>
    <div class="br col-lg-9 col-xl-8 p-4 m-auto ">
        <div class="col-lg-12 col-xl-12">
            <div class="br col-lg-12 col-xl-12 m-auto">
                <div class="br m-auto pb-4 col-lg-12 col-xl-12 row">
                    <div class="m-auto chartsContainer p-4 col-lg-5 col-xl-5">
                        <PieCharts6/>
                    </div>
                    <div class="m-auto chartsContainer p-4 col-lg-5 col-xl-5">
                        <PieCharts7/>
                    </div>
        
                </div>
                <div class="m-auto col-lg-12 col-xl-12 row"> 
                    <div class="m-auto chartsContainer p-4 col-lg-5 col-xl-5">   
                        <PieCharts10/>
                    </div>
                    <div class="m-auto chartsContainer p-4 col-lg-5 col-xl-5">
                        <RadarCharts />
                    </div>
                </div>
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