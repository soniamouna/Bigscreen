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
    <div class=" m-auto row col-12 col-md-12 col-lg-12 ">
        <!-- Component navbar admin -->
        <NavbarAdmin page="home" />
        <div class=" scroll-page col-12 col-md-9 col-lg-9 col-xl-9 pb-5 m-auto ">
            <!-- Display the different Charts -->
            <div class=" col-12 col-lg-12 col-xl-12 m-auto row d-flex justify-content-center justify-content-around g-4">
                <!-- Piecharts Question 6 -->
                <div class="chartsContainer border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <PieCharts6 />
                </div>
                <!-- Piecharts Question 7 -->

                <div class=" chartsContainer border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <PieCharts7 />
                </div>

                <!-- Piecharts Question 10 -->

                <div class=" chartsContainer border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <PieCharts10 />
                </div>
                <!-- RadarCharts Question from 11 to 15 -->
                <div class=" chartsContainer border border-dark rounded-5 p-4 col-lg-5 col-xl-5">
                    <RadarCharts />
                </div>

            </div>
        </div>
    </div>
</template>



<style scoped>
@import '../../assets/adminRight/adminRightSide.css'

</style>