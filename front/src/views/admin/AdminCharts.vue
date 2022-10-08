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
    <div class=" col-12 col-md-12 col-lg-9 col-xl-10 ">
        <div class="py-4  col-12 col-md-12 col-lg-12 col-xl-12 ">
            <!-- Display the different Charts -->
            <div class="row d-flex justify-content-center justify-content-around g-5 m-auto col-12 col-lg-12 col-xl-12 ">
                <!-- Piecharts Question 6 -->
                <div class="border border-dark rounded-5 p-4 col-12 col-lg-5 col-xl-5">
                    <PieCharts6 />
                </div>

                <!-- Piecharts Question 7 -->
                <div class=" border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <PieCharts7 />
                </div>

                <!-- Piecharts Question 10 -->
                <div class=" border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <PieCharts10 />
                </div>
                
                <!-- RadarCharts Question from 11 to 15 -->
                <div class=" border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <RadarCharts />
                </div>

            </div>
        </div>
    </div>
</template>



<style scoped>
@import '../../assets/adminRight/adminRightSide.css'
</style>