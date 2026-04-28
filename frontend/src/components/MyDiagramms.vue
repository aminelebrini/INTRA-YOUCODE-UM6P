<template>
    <div class="h-full rounded-2xl border border-white/10 bg-[#1a1a1e] p-5 shadow-[0_20px_60px_rgba(0,0,0,0.18)] sm:p-6">
        <div class="mb-5 flex items-start justify-between gap-4 border-b border-white/5 pb-4">
            <div>
                <p class="text-[11px] font-black uppercase tracking-[0.28em] text-[#00babc]/80">Analytics</p>
                <h3 class="mt-2 text-sm font-bold text-white sm:text-base">Users by role</h3>
                <p class="mt-1 text-xs text-gray-400">Vue globale des comptes dans la plateforme.</p>
            </div>
        </div>
        <section class="h-[280px] w-full sm:h-[320px]">
            <canvas ref="usersdata"></canvas>
        </section>
    </div>
</template>
<script>
import { Chart } from 'chart.js/auto';

export default {
    name: 'MyDiagramms',
    props: {
        data: Object,
    },
    mounted() {
        console.log('Data reçue dans MyDiagramms:', this.data);
        this.createChart();
    },
    methods:{
        createChart() {
            if (!this.data || !this.$refs.usersdata) {
                return;
            }

            const ctx = this.$refs.usersdata.getContext('2d');
            new Chart(ctx, {
                type: 'bar',
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
                            text: 'Nombre d\'utilisateurs par rôle',
                        },
                    },
                },
            });
        }
    }

}
</script>
