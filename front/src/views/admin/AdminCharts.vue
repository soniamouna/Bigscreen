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
    <div>
        <PieCharts6/>
        <PieCharts7/>
        <PieCharts10/>
        <RadarCharts />
    </div>
</template>



<style>

</style>