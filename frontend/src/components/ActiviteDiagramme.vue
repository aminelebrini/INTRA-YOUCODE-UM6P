<template>
    <div class="h-full rounded-2xl border border-white/10 bg-[#1a1a1e] p-5 shadow-[0_20px_60px_rgba(0,0,0,0.18)] sm:p-6">
        <div class="mb-5 border-b border-white/5 pb-4">
            <h3 class="text-sm font-bold text-white">Activities Overview</h3>
            <p class="mt-1 text-xs text-gray-400">Activite des etudiants par type.</p>
        </div>
        <div class="h-[280px] w-full sm:h-[320px]">
            <canvas ref="activitechart"></canvas>
        </div>
    </div>
</template>
<script>
import { Chart } from 'chart.js/auto';

export default{
    name: 'ActiviteDiagramme',
    props:{
        data: Object,
    },
    mounted() {
        this.createChart();
    },
    methods:{
        createChart() {
            if (!this.data || !this.$refs.activitechart) {
                return;
            }
            const ctx = this.$refs.activitechart.getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: this.data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Activité des étudiants au fil du temps',
                        }
                    }
                }
            });
        }
    }
}

</script>
