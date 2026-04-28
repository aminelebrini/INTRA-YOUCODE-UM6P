<template>
    <div class="h-full rounded-2xl border border-white/10 bg-[#1a1a1e] p-5 shadow-[0_20px_60px_rgba(0,0,0,0.18)] sm:p-6">
        <div class="mb-5 flex items-start justify-between gap-4 border-b border-white/5 pb-4">
            <div>
                <p class="text-[11px] font-black uppercase tracking-[0.28em] text-[#00babc]/80">Analytics</p>
                <h3 class="mt-2 text-sm font-bold text-white sm:text-base">Absence status</h3>
                <p class="mt-1 text-xs text-gray-400">Part des absences justifiees et non justifiees.</p>
            </div>
        </div>
        <div class="h-[280px] w-full sm:h-[320px]">
            <canvas ref="absencestatus"></canvas>
        </div>
    </div>
</template>
<script>
import { Chart } from 'chart.js/auto';

export default{
    name: 'AbsenceDiagramme',
    props:{
        data: Object,
    },
    mounted() {
        this.createChart();
    },
    methods:{
        createChart() {
            if (!this.data || !this.$refs.absencestatus) {
                return;
            }
            const absencestatusCtx = this.$refs.absencestatus.getContext('2d');
            new Chart(absencestatusCtx, {
                type: 'doughnut',
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
                            text: 'Répartition des absences par statut',
                        },
                    },
                },
            });

        }
    }
}


</script>
