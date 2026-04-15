<template>
    <div class="rounded-2xl border border-white/10 bg-black/25 p-4 md:p-5">
		<div class="mb-4 flex items-center justify-between gap-3">
			<div>
				<p class="text-[9px] uppercase tracking-widest text-gray-500">Profile Links</p>
				<h2 class="mt-1 text-sm font-black uppercase tracking-wider text-white md:text-base">Social Media & Portfolio</h2>
			</div>
            <button type="button" @click="toggle('AddLienModal', studentId)" class="rounded-xl border border-[#00babc]/40 bg-[#00babc]/10 px-3 py-2 text-[10px] font-bold uppercase tracking-widest text-[#00babc] transition-colors hover:bg-[#00babc]/20">
				<i class="fas fa-plus"></i>
			</button>
		</div>

		<div v-if="displayLinks.length" class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3">
			<a
				v-for="link in displayLinks"
				:key="link.label"
				:href="link.url"
				target="_blank"
				rel="noreferrer"
				class="flex items-center justify-between gap-3 rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-left transition-colors hover:border-[#00babc]/40 hover:bg-white/10"
			>
				<div class="min-w-0">
					<p class="text-[9px] uppercase tracking-widest text-gray-500">{{ link.label }}</p>
					<p class="truncate text-sm font-semibold text-white">{{ link.value }}</p>
				</div>
				<span class="text-[#00babc]">&gt;</span>
			</a>
		</div>

		<div v-else class="rounded-xl border border-dashed border-white/10 bg-white/5 p-4 text-center">
			<p class="text-[11px] italic tracking-wide text-gray-400">No links available yet.</p>
		</div>
	</div>
    <div id="AddLienModal" class="hidden flex fixed inset-0 z-50 items-center justify-center overflow-y-auto bg-black/85 px-4 py-6 backdrop-blur-md">
		<div class="relative w-full max-w-2xl overflow-hidden rounded-3xl border border-white/10 bg-[#11131a] shadow-[0_30px_100px_rgba(0,0,0,0.7)]">
			<div class="absolute inset-x-0 top-0 h-px bg-[linear-gradient(90deg,transparent,rgba(0,186,188,0.8),transparent)]"></div>
			<div class="border-b border-white/10 bg-[linear-gradient(90deg,rgba(0,186,188,0.14),rgba(255,255,255,0.03))] px-6 py-5 md:px-7">
				<div class="flex items-start justify-between gap-4">
					<div>
						<p class="text-[9px] font-mono uppercase tracking-[0.35em] text-[#00babc]">Profile Links</p>
						<h2 class="mt-2 text-xl font-black uppercase tracking-wider text-white md:text-2xl">Ajouter un lien</h2>
						<p class="mt-2 max-w-lg text-[11px] leading-relaxed text-gray-400">Ajoute un lien de profil (GitHub, Portfolio, LinkedIn...).</p>
					</div>
					<button type="button" @click="toggle('AddLienModal')" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-lg font-bold text-gray-300 transition-colors hover:border-red-400/40 hover:bg-red-500/10 hover:text-red-300"><i class="fas fa-multiply"></i></button>
				</div>
			</div>

			<form class="grid grid-cols-1 gap-4 px-6 py-6 md:px-7" @submit.prevent="submitLien">
				<div class="space-y-1.5">
					<label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Nom du lien</label>
					<input type="text" v-model="addLienNom" placeholder="Ex: GitHub" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]" required>
				</div>

				<div class="space-y-1.5">
					<label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">URL</label>
					<input type="url" v-model="addLienUrl" placeholder="https://..." class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]" required>
				</div>

				<div class="flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-end">
					<button type="button" @click="toggle('AddLienModal')" class="rounded-2xl border border-white/10 bg-white/5 px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-gray-300 transition-colors hover:bg-white/10 hover:text-white">Cancel</button>
					<button type="submit" class="rounded-2xl bg-[#00babc] px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#121215] transition-colors hover:bg-[#00d1d3]">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</template>
<script>
import api from '../services/api';
export default {
  name: "LienView",
  props: {
    profileLinks: {
      type: Array,
      default: () => []
		},
		liens: {
			type: Array,
			default: () => []
		},
		user_id: {
			type: Number,
			default: null
        }
  },
  computed: {
		displayLinks() {
			const profileLinks = Array.isArray(this.profileLinks) ? this.profileLinks : []
			const savedLinks = Array.isArray(this.liens)
				? this.liens.map((link) => ({
					label: link.nom,
					value: link.lien,
					url: link.lien,
				}))
				: []

			return [...profileLinks, ...savedLinks].filter((link) => link?.value)
		}
  },
  data() {
    return {
	  studentId: this.user_id,
      addLienNom: '',
      addLienUrl: '',
    };
  },
	watch: {
		user_id(newValue) {
			this.studentId = newValue;
		}
	},
  methods:{
    async submitLien()
    {
       try{
         await api.post('/send-lien',{
            user_id: this.studentId,
            nom: this.addLienNom,
            lien: this.addLienUrl
        });
        this.toggle('AddLienModal');
       }catch(error){
        console.error('Error adding lien:', error);
       }
    },
    toggle(modalId, studentId = null) {
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.toggle('hidden');
        if (studentId) {
          this.studentId = studentId;
        }
      }
    },
  }
}
</script>