<template>
	<div class="min-h-screen w-full overflow-x-hidden bg-[#0f0f12] text-white font-sans">
		<div class="fixed inset-0 pointer-events-none">
			<div class="absolute inset-0 bg-[linear-gradient(180deg,#0f0f12_0%,#121215_100%)]"></div>
			<div class="absolute inset-x-0 top-0 h-24 bg-[linear-gradient(90deg,rgba(0,186,188,0.14),transparent_35%,rgba(255,255,255,0.05),transparent_70%,rgba(0,186,188,0.12))]"></div>
			<div class="absolute -left-24 top-24 h-80 w-80 rounded-full bg-[#00babc]/10 blur-3xl"></div>
			<div class="absolute -right-24 bottom-0 h-80 w-80 rounded-full bg-white/5 blur-3xl"></div>
		</div>

		<div class="relative z-10 flex min-h-screen">
			<aside class="fixed left-0 top-0 hidden h-full w-72 flex-col border-r border-white/5 bg-[#121215] lg:flex">
				<div class="border-b border-white/5 p-6">
					<img src="@/assets/logo-white.png" alt="Logo" class="w-28 opacity-80 hover:opacity-100 transition-opacity">
					<p class="mt-2 text-[8px] font-mono tracking-[0.3em] text-[#00babc]">STUDENT_PANEL_v1.0</p>
				</div>

				<nav class="flex-1 px-3 py-6 space-y-2">
					<p class="mb-4 px-4 text-[9px] font-bold uppercase tracking-[0.2em] text-gray-600">Main_Menu</p>
					<router-link to="/studentdashboard" @click="activTab='profile'" :class="['group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-all', activTab === 'profile' ? 'bg-[#1d1d21] text-white' : 'text-gray-500 hover:bg-[#1d1d21] hover:text-white']">
						<span :class="activTab === 'profile' ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'" class="mr-2 text-[#00babc] transition-opacity">&gt;</span>
						Profile
					</router-link>
					<router-link to="/studentdashboard" @click="activTab='classroom'" :class="['group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-all', activTab === 'classroom' ? 'bg-[#1d1d21] text-white' : 'text-gray-500 hover:bg-[#1d1d21] hover:text-white']">
						<span :class="activTab === 'classroom' ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'" class="mr-2 text-[#00babc] transition-opacity">&gt;</span>
						Class Info
					</router-link>
					<router-link to="/studentdashboard" @click="activTab='activities'" :class="['group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-all', activTab === 'activities' ? 'bg-[#1d1d21] text-white' : 'text-gray-500 hover:bg-[#1d1d21] hover:text-white']">
						<span :class="activTab === 'activities' ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'" class="mr-2 text-[#00babc] transition-opacity">&gt;</span>
						Activities
					</router-link>
					<router-link to="/studentdashboard" @click="activTab='leaderboard'" :class="['group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-all', activTab === 'leaderboard' ? 'bg-[#1d1d21] text-white' : 'text-gray-500 hover:bg-[#1d1d21] hover:text-white']">
						<span :class="activTab === 'leaderboard' ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'" class="mr-2 text-[#00babc] transition-opacity">&gt;</span>
						Leaderboard
					</router-link>
					<router-link to="/studentdashboard" @click="activTab='absences'" :class="['group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-all', activTab === 'absences' ? 'bg-[#1d1d21] text-white' : 'text-gray-500 hover:bg-[#1d1d21] hover:text-white']">
						<span :class="activTab === 'absences' ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'" class="mr-2 text-[#00babc] transition-opacity">&gt;</span>
						Absences
					</router-link>
					<router-link to="/studentdashboard" @click="activTab='annance'" :class="['group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-all', activTab === 'annance' ? 'bg-[#1d1d21] text-white' : 'text-gray-500 hover:bg-[#1d1d21] hover:text-white']">
						<span :class="activTab === 'annance' ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'" class="mr-2 text-[#00babc] transition-opacity">&gt;</span>
						Annance
					</router-link>
				</nav>

				<div class="border-t border-white/5 bg-[#0c0c0e] p-6">
					<div class="mb-4 flex items-center space-x-3">
						<div class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full border border-[#00babc]/40 bg-[#00babc]/20 text-[10px] font-bold text-[#00babc]">
							<img v-if="studentAvatar" :src="studentAvatar" alt="student avatar" class="h-full w-full object-cover">
							<span v-else>{{ studentInitial }}</span>
						</div>
						<div class="min-w-0">
							<p class="truncate text-[11px] font-bold text-white">{{ studentName }}</p>
							<p class="truncate text-[9px] text-gray-600">{{ studentEmail }}</p>
							<p class="truncate text-[9px] text-gray-600">{{ studentClass }}</p>
						</div>
					</div>
					<div class="space-y-2 text-[9px] uppercase tracking-widest text-gray-500">
						<div class="flex items-center justify-between">
							<span>Status</span>
							<span class="text-green-400">{{ studentStatus }}</span>
						</div>
						<div class="flex items-center justify-between">
							<span>Student Points</span>
							<span class="text-[#00babc]">{{ studentPoints || 0 }}</span>
						</div>
						<button @click="logout" class="w-full text-left text-[9px] text-red-500/60 hover:text-red-500 font-bold uppercase tracking-widest transition-colors">
          					[ DISCONNECT ]
        				</button>
					</div>
				</div>
			</aside>

			<div class="flex-1 lg:ml-72">
				<div class="px-4 py-4 sm:px-6 sm:py-6 lg:px-6 lg:py-6">
					<div class="mb-4 flex items-center justify-between rounded-lg border border-white/10 bg-[#121215] px-4 py-3 lg:hidden">
						<img src="@/assets/logo-white.png" alt="Logo" class="w-24 opacity-90">
						<span class="rounded border border-[#00babc]/30 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">Student Panel</span>
					</div>

					<main class="mx-auto w-full max-w-7xl space-y-6">
						<header id="profile" v-if="activTab==='profile'" class="relative overflow-hidden rounded-xl border border-white/10 min-h-[180px] md:min-h-[220px]">
							<div class="absolute inset-0">
								<img src="@/assets/formateurbg.avif" alt="header_bg" class="h-full w-full object-cover object-center">
								<div class="absolute inset-0 bg-gradient-to-r from-black/90 to-black/40"></div>
							</div>

							<div class="relative z-10 flex h-full flex-col justify-between gap-6 p-5 md:p-6 lg:p-7">
								<div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
									<div class="flex items-center gap-4 md:gap-6 min-w-0">
										<div class="relative shrink-0">
											<img v-if="studentAvatar" :src="studentAvatar" alt="student avatar" class="h-full w-full object-cover rounded-full border-2 border-[#00babc] bg-[#00babc]/15 text-lg font-black text-[#00babc] shadow-[0_0_15px_rgba(0,186,188,0.3)] md:h-20 md:w-20 md:text-2xl">
											<div v-else class="flex h-14 w-14 items-center justify-center rounded-full border-2 border-[#00babc] bg-[#00babc]/15 text-lg font-black text-[#00babc] shadow-[0_0_15px_rgba(0,186,188,0.3)] md:h-20 md:w-20 md:text-2xl">
												S
											</div>
											<div class="absolute bottom-1 right-1 h-3 w-3 rounded-full border-2 border-black bg-green-500"></div>
										</div>

										<div class="min-w-0">
											<h1 class="truncate text-sm font-black uppercase tracking-tighter text-white sm:text-xl md:text-3xl">{{ studentName }}</h1>
											<p class="mt-1 truncate text-[9px] font-mono tracking-widest text-white/50 md:text-[20px]">ID: {{ studentUsername }}</p>
											<p class="mt-1 truncate text-[9px] text-white/60 md:text-[15px]">{{ studentEmail }}</p>
										</div>
									</div>

									<div class="flex flex-wrap items-center gap-2 md:justify-end">
										<span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[15px] font-bold uppercase tracking-widest text-gray-200">{{ studentClass }}</span>
										<span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[15px] font-bold uppercase tracking-widest text-gray-200"><i class="fas fa-school"></i> {{ studentCampus }}</span>
										<button type="button" @click="openProfileEditModal" class="rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1.5 text-[11px] font-bold uppercase tracking-widest text-[#00babc] transition-colors hover:bg-[#00babc]/20">
											<i class="fas fa-edit mr-1"></i>
											Edit Profile
										</button>
									</div>
								</div>

								<div class="grid grid-cols-2 gap-3 md:grid-cols-4">
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Points</p>
										<p class="mt-2 text-sm font-bold text-white md:text-base">{{ studentPoints || 0 }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Announced tasks</p>
										<p class="mt-2 text-sm font-bold text-white md:text-base">{{ countActivite || 0 }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Completed tasks</p>
										<p class="mt-2 text-sm font-bold text-white md:text-base">{{ countCompletedTasks || 0 }}</p>
									</div>
								</div>
								<LienView :profileLinks="profileLinks" :liens="studentLinks" :user_id="studentId" />
							</div>
						</header>
						<section v-if="activTab==='classroom'" id="classroom" class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
							<div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Class Information</h2>
									<p class="mt-1 text-[10px] text-gray-500">Overview of your assigned class</p>
								</div>
								<span class="inline-flex items-center rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">Assigned</span>
							</div>

							<div class="grid grid-cols-1 gap-4 lg:grid-cols-5">
								<div class="lg:col-span-2">
									<img :src="studentClassLogo" :alt="studentClassLogo" class="h-48 w-full rounded-xl border border-white/10 object-cover">
								</div>

								<div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:col-span-3">
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Class Name</p>
										<p class="truncate text-sm font-semibold text-white">{{ studentClass }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Formateur</p>
										<p class="truncate text-sm font-semibold text-white">{{ studentFormateur }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Campus</p>
										<p class="truncate text-sm font-semibold text-white">{{ studentCampus }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Delegate</p>
										<div class="flex items-center gap-2">
											<img :src="studentClasseDelegate[0]?.link_profile" alt="userlogo" class="w-8 h-8 rounded-full">
											<p class="truncate text-sm font-semibold text-white">{{ studentClasseDelegate[0]?.fullname }}</p>
										</div>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Capacity</p>
										<p class="truncate text-sm font-semibold text-white">{{ studentClassCapacity }}</p>
									</div>
								</div>
							</div>
						</section>

						<div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="EditProfileModal">
							<div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-md shadow-2xl overflow-y-auto max-h-[90vh]">
								<div class="flex justify-between items-center mb-6">
									<h1 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Edit My Profile</h1>
									<button @click="toggle('EditProfileModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
									</button>
								</div>
								<form class="flex flex-col justify-center items-start gap-4 w-[100%]" @submit.prevent="submitEditProfile">
									<label for="admin_fullname" class="text-[#00babc] text-[11px] uppercase tracking-widest">FULL NAME</label>
									<input type="text" id="admin_fullname" v-model="editProfileForm.fullname" placeholder="FULL NAME" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
									<label for="admin_email" class="text-[#00babc] text-[11px] uppercase tracking-widest">EMAIL ADDRESS</label>
									<input type="email" id="admin_email" v-model="editProfileForm.email" placeholder="EMAIL ADDRESS" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
									<label for="admin_campus" class="text-[#00babc] text-[11px] uppercase tracking-widest">CAMPUS</label>
									<input type="text" id="admin_campus" v-model="editProfileForm.campus" placeholder="CAMPUS" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
									<label for="admin_ville" class="text-[#00babc] text-[11px] uppercase tracking-widest">VILLE</label>
									<input type="text" id="admin_ville" v-model="editProfileForm.ville" placeholder="VILLE" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
									<label for="admin_link_profile" class="text-[#00babc] text-[11px] uppercase tracking-widest">LINK PROFILE</label>
									<input type="url" id="admin_link_profile" v-model="editProfileForm.link_profile" placeholder="https://..." class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
									<button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
										Save Changes
									</button>
								</form>
							</div>
						</div>

						<section v-if="activTab==='activities'" id="activities" class="rounded-2xl border border-white/10 bg-[#11131a] p-5 md:p-6 shadow-[0_20px_50px_rgba(0,0,0,0.35)]">
							<div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Activities</h2>
									<p class="mt-1 text-[10px] text-gray-500">Upcoming and ongoing class work</p>
								</div>
								<span class="inline-flex items-center rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">{{ doingActivite.length }} Active</span>
							</div>

							<div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
								<div class="rounded-xl border border-[#00babc]/20 bg-[#0c0f14] p-4 min-h-[360px]">
									<div class="w-full mb-3 flex items-center justify-between">
										<p class="text-[11px] uppercase tracking-[0.18em] text-gray-400">Upcoming</p>
										<p class="rounded-full border border-[#00babc]/35 bg-[#00babc]/15 px-3 py-1 text-[10px] font-bold tracking-wider text-[#00babc]">To Do</p>
									</div>
									<div class="space-y-3 max-h-[420px] overflow-y-auto pr-1">
										<div v-for="Activite in todoActivite" :key="Activite.id" class="rounded-xl border border-[#00babc]/20 bg-[linear-gradient(180deg,rgba(0,186,188,0.08),rgba(255,255,255,0.02))] p-4 text-left">
											<p class="mb-2 text-[9px] uppercase tracking-widest text-[#00babc]">{{ Activite.type }}</p>
											<h3 class="text-sm font-semibold text-white leading-snug">{{ Activite.nom }}</h3>
											<p class="mt-2 text-[10px] text-gray-300">Starts on: {{ Activite.date_debut }}</p>
										</div>
									</div>
									<p v-if="!todoActivite.length" class="rounded-xl border border-dashed border-white/20 bg-white/5 p-4 text-center text-[11px] text-gray-300">No upcoming activities.</p>
								</div>
								<div class="rounded-xl border border-amber-400/20 bg-[#0c0f14] p-4 min-h-[360px]">
									<div class="w-full mb-3 flex items-center justify-between">
										<p class="text-[11px] uppercase tracking-[0.18em] text-gray-400">In Progress</p>
										<p class="rounded-full border border-amber-300/40 bg-amber-300/10 px-3 py-1 text-[10px] font-bold tracking-wider text-amber-300">Doing</p>
									</div>
									<div class="space-y-3 max-h-[420px] overflow-y-auto pr-1">
										<div v-for="Activite in doingActivite" :key="Activite.id" class="rounded-xl border border-amber-300/20 bg-[linear-gradient(180deg,rgba(251,191,36,0.08),rgba(255,255,255,0.02))] p-4 text-left">
											<p class="mb-2 text-[9px] uppercase tracking-widest text-amber-300">{{ Activite.type }}</p>
											<h3 class="text-sm font-semibold text-white leading-snug">{{ Activite.nom }}</h3>
											<div class="flex flex-row items-center justify-between">
												<p class="mt-2 text-[10px] text-gray-300">Starts on: {{ Activite.date_debut }}</p>
												<button v-if="!isLivrableSubmitted(Activite.id)" @click="toggle('LivrableModal', Activite.id)" class="mt-2 rounded-md bg-emerald-500/20 p-2 text-[10px] font-bold text-emerald-300 hover:bg-emerald-500/30">Deliver</button>
												<span v-else class="mt-2 rounded-md bg-emerald-500/20 p-2 text-[10px] font-bold text-emerald-300">Submitted</span>
											</div>
										</div>
									</div>
									<p v-if="!doingActivite.length" class="rounded-xl border border-dashed border-white/20 bg-white/5 p-4 text-center text-[11px] text-gray-300">No ongoing activities.</p>
								</div>
								<div class="rounded-xl border border-emerald-400/20 bg-[#0c0f14] p-4 min-h-[360px]">
									<div class="w-full mb-3 flex items-center justify-between">
										<p class="text-[11px] uppercase tracking-[0.18em] text-gray-400">Completed</p>
										<p class="rounded-full border border-emerald-300/40 bg-emerald-300/10 px-3 py-1 text-[10px] font-bold tracking-wider text-emerald-300">Done</p>
									</div>
									<div class="space-y-3 max-h-[420px] overflow-y-auto pr-1">
										<div v-for="Activite in doneActivite" :key="Activite.id" class="rounded-xl border border-emerald-300/20 bg-[linear-gradient(180deg,rgba(16,185,129,0.08),rgba(255,255,255,0.02))] p-4 text-left">
											<p class="mb-2 text-[9px] uppercase tracking-widest text-emerald-300">{{ Activite.type }}</p>
											<h3 class="text-sm font-semibold text-white leading-snug">{{ Activite.nom }}</h3>
											<p class="mt-2 text-[10px] text-gray-300">Starts on: {{ Activite.date_debut }}</p>
										</div>
									</div>
									<p v-if="!doneActivite.length" class="rounded-xl border border-dashed border-white/20 bg-white/5 p-4 text-center text-[11px] text-gray-300">No completed activities yet.</p>
								</div>
							</div>
							<div id="LivrableModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/85 px-4 py-6 backdrop-blur-md">
							<div class="relative w-full max-w-3xl overflow-hidden rounded-3xl border border-white/10 bg-[#11131a] shadow-[0_30px_100px_rgba(0,0,0,0.7)]">
								<div class="absolute inset-x-0 top-0 h-px bg-[linear-gradient(90deg,transparent,rgba(0,186,188,0.8),transparent)]"></div>
								<div class="border-b border-white/10 bg-[linear-gradient(90deg,rgba(0,186,188,0.14),rgba(255,255,255,0.03))] px-6 py-5 md:px-7">
									<div class="flex items-start justify-between gap-4">
										<div>
											<p class="text-[9px] font-mono uppercase tracking-[0.35em] text-[#00babc]">Student Submission</p>
											<h2 class="mt-2 text-xl font-black uppercase tracking-wider text-white md:text-2xl">Submit Livrable</h2>
											<p class="mt-2 max-w-lg text-[11px] leading-relaxed text-gray-400">Fill the fields linked to the livrable model. Keep the submission clean and readable.</p>
										</div>
										<button type="button" @click="toggle('LivrableModal')" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-lg font-bold text-gray-300 transition-colors hover:border-red-400/40 hover:bg-red-500/10 hover:text-red-300">×</button>
									</div>
								</div>

								<form class="grid grid-cols-1 gap-4 px-6 py-6 md:grid-cols-2 md:px-7" @submit.prevent="SendLivrable">
									<div class="hidden space-y-1.5">
										<label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Activity ID</label>
										<input type="text" v-for="Activite in doingActivite" :key="Activite.id" v-model="activite_id" :value="Activite.id" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]" readonly>
									</div>

									<div class="space-y-1.5 md:col-span-2">
										<label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Lien Github</label>
										<input type="text" v-model="lien_github" placeholder="GitHub link, Drive URL, or file path" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]">
									</div>

									<div class="space-y-1.5 md:col-span-2">
										<label for="commentaire" class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Commentaire</label>
										<textarea id="commentaire" v-model="commentaire" rows="4" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]"></textarea>
									</div>

									<div class="md:col-span-2 flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-end">
										<button type="button" @click="toggle('LivrableModal')" class="rounded-2xl border border-white/10 bg-white/5 px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-gray-300 transition-colors hover:bg-white/10 hover:text-white">Cancel</button>
										<button type="submit" class="rounded-2xl bg-[#00babc] px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#121215] transition-colors hover:bg-[#00d1d3]">Submit Livrable</button>
									</div>
								</form>
							</div>
						</div>
						</section>
						
						<section v-if="activTab==='leaderboard'" class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
							<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Leaderboard</h2>
									<p class="mt-1 text-[10px] text-gray-500">Top students ranking snapshot</p>
								</div>
							</div>

							<div class="grid grid-cols-1 gap-4 xl:grid-cols-1 w-full">
								<div class="xl:col-span-2 overflow-hidden rounded-2xl border border-white/10 bg-[#0c0f14]">
									<div class="grid grid-cols-12 border-b border-white/10 px-4 py-3 text-[9px] font-bold uppercase tracking-[0.2em] text-gray-500">
										<p class="col-span-2">Rank</p>
										<p class="col-span-3">Student</p>
										<p class="col-span-3">Classe</p>
										<p class="col-span-2">Campus</p>
										<p class="col-span-2 text-right">Points</p>
									</div>

									<div class="space-y-1 p-3">
										<div v-for="leader in leaderboard" :key="leader.id" class="grid grid-cols-12 items-center rounded-xl border border-[#00babc]/35 bg-[#00babc]/12 px-3 py-3">
											<div class="col-span-2"><span class="inline-flex h-7 w-7 items-center justify-center rounded-full border border-[#00babc]/50 bg-[#00babc]/25 text-[10px] font-black text-[#b7ffff]">1</span></div>
											<div class="col-span-3 flex items-center gap-2">
												<img :src="leader?.user?.link_profile || 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png'" alt="student_profile" class="h-8 w-8 rounded-full border border-[#00babc]/40 bg-[#00babc]/20 object-cover inline-block mr-2">
												<p class="text-sm font-semibold text-white">{{ leader?.user?.fullname || 'Unknown Student' }}</p>
											</div>
											<p class="col-span-3 text-[10px] uppercase tracking-widest text-gray-300">{{ leader?.classe?.nom || leader?.classe?.class_name || 'Class N/A' }}</p>
											<p class="col-span-2 text-[10px] uppercase tracking-widest text-gray-300">{{ leader?.classe?.campus || 'Campus N/A' }}</p>
											<p class="col-span-2 text-right text-sm font-black text-[#a8ffff]">{{ leader.points }}</p>
										</div>
									</div>
								</div>
							</div>
						</section>
						<section v-if="activTab==='absences'" id="absences" class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
							<div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Absences And Delay</h2>
									<p class="mt-1 text-[10px] text-gray-500">Overview of your recent absences</p>
								</div>
								<span class="inline-flex items-center rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">Records</span>
							</div>

							<div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-3">
								<div
									v-for="absence in studentAbsences || []"
									:key="absence.id"
									class="rounded-2xl border border-white/10 bg-[#0c0f14] p-4"
								>
									<div class="mb-3 flex items-start justify-between gap-3">
										<div>
											<h3 class="mt-1 text-sm font-semibold text-white">{{ absence.jour }}</h3>
										</div>
										<span class="rounded-full px-3 p-2 text-[10px] font-bold uppercase tracking-widest" :class="absence.status === 'justifie' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
											{{ absence.status }}
										</span>
									</div>

									<div class="space-y-2 text-[11px] text-gray-300">
										<p><span class="text-gray-500">Start:</span> {{ absence.heure_debut || '-' }}</p>
										<p><span class="text-gray-500">Duration:</span> {{ absence.duree_retard > '04:00:00' ? 'absent' : absence.duree_retard + ' retard' }}</p>
										<p><span class="text-gray-500">Motif:</span> {{ absence.motif || 'No motif provided' }}</p>
									</div>

									<div class="mt-4 flex items-center justify-end">
										<button type="button" v-if="!absence.status" @click="toggle('JustificateModal', absence.id)" class="rounded-xl border border-[#00babc]/30 bg-[#00babc]/10 px-4 py-2 text-[10px] font-bold uppercase tracking-widest text-[#00babc] transition-colors hover:bg-[#00babc]/20">Justify</button>
									</div>
								</div>
							</div>

							<div v-if="!studentAbsences || !studentAbsences.length" class="rounded-2xl border border-dashed border-white/10 bg-white/5 p-6 text-center">
								<p class="text-[11px] text-gray-400">No absences found.</p>
							</div>
						</section>

						<section v-if="activTab==='annance'" id="annance" class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
							<div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Annance</h2>
									<p class="mt-1 text-[10px] text-gray-500">Latest announcements for your class</p>
								</div>
								<span class="inline-flex items-center rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">{{ announcements.length }} Items</span>
							</div>

							<div v-if="announcements.length" class="grid grid-cols-1 gap-4 lg:grid-cols-2">
								<div v-for="annance in announcements" :key="annance.id" class="rounded-2xl border border-white/10 bg-[#0c0f14] p-4">
									<div class="mb-3 flex items-start justify-between gap-3">
										<div>
											<p class="text-[9px] uppercase tracking-widest text-[#00babc]">{{ annance.categorie || 'information' }}</p>
											<h3 class="mt-1 text-sm font-semibold text-white">{{ annance.titre }}</h3>
										</div>
										<span class="rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-widest" :class="annance.status === 'active' ? 'bg-green-500/20 text-green-300 border border-green-500/30' : 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30'">
											{{ annance.status || 'pending' }}
										</span>
									</div>
									<p class="text-[12px] leading-relaxed text-gray-300">{{ annance.description }}</p>
									<p class="mt-3 text-[10px] uppercase tracking-widest text-gray-500">Target: {{ annance.cible || 'tout' }}</p>
								</div>
							</div>

							<div v-else class="rounded-2xl border border-dashed border-white/10 bg-white/5 p-6 text-center">
								<p class="text-[11px] text-gray-400">No announcement available for your class.</p>
							</div>
						</section>

						<div id="JustificateModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/85 px-4 py-6 backdrop-blur-md">
							<div class="relative w-full max-w-3xl overflow-hidden rounded-3xl border border-white/10 bg-[#11131a] shadow-[0_30px_100px_rgba(0,0,0,0.7)]">
								<div class="absolute inset-x-0 top-0 h-px bg-[linear-gradient(90deg,transparent,rgba(0,186,188,0.8),transparent)]"></div>
								<div class="border-b border-white/10 bg-[linear-gradient(90deg,rgba(0,186,188,0.14),rgba(255,255,255,0.03))] px-6 py-5 md:px-7">
									<div class="flex items-start justify-between gap-4">
										<div>
											<h2 class="mt-2 text-xl font-black uppercase tracking-wider text-white md:text-2xl">Justify Absence</h2>
												<p class="mt-2 max-w-lg text-[11px] leading-relaxed text-gray-400">Absence ID: {{ absence_id || '-' }}</p>
										</div>
										<button type="button" @click="toggle('JustificateModal')" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-lg font-bold text-gray-300 transition-colors hover:border-red-400/40 hover:bg-red-500/10 hover:text-red-300">×</button>
									</div>
								</div>

								<form class="grid grid-cols-1 gap-4 px-6 py-6 md:grid-cols-2 md:px-7" @submit.prevent="submitJustification">
									
									<div class="space-y-1.5 md:col-span-2">
										<label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Document</label>
										<input type="url" v-model="fichier_path" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-gray-300 outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]" placeholder="Link to justification document" required="">
									</div>

									<div class="space-y-1.5 md:col-span-2">
										<label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Document Type</label>
										<select v-model="type_document" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-gray-300 outline-none transition-colors focus:border-[#00babc] focus:bg-[#0f1218]">
											<option value="">Select a type</option>
											<option value="medical">Medical Certificate</option>
											<option value="family">Family Emergency</option>
											<option value="other">Other</option>
										</select>
									</div>

									<div class="md:col-span-2 flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-end">
										<button type="submit" class="rounded-2xl bg-[#00babc] px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#121215] transition-colors hover:bg-[#00d1d3]">Submit Justification</button>
									</div>
								</form>
							</div>
						</div>

					</main>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import api from '@/services/api';
import LienView from '@/components/LienView.vue';

export default {
	components: {
		LienView
	},
	data() {
		
	 return {
		activTab: 'profile',
		userData: null,
		studentId: null,
	    studentName: 'Student Name',
	    studentEmail: 'student@youcode.ma',
		studentUsername: 'student-001',
	    studentClass: 'Class A1',
		studentClassLogo: 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png',
		studentFormateur: 'Formateur Name',
		studentClasseDelegate: 'Delegate Name',
		studentCampus: 'Campus',
		studentClassCapacity: 30,
		studentAnnee: 'A1',
		studentAvatar: '',
		studentStatus: 'active',
		studentPoints: 0,
	    attendanceRate: 92,
	    completedWork: 18,
	    upcomingTasks: 4,
	    averageScore: 14.8,
	    studentActivite: [],
		announcements: [],
		todoActivite: [],
		doingActivite: [],
		doneActivite: [],
		countActivite: 0,
		Livrables: [],
		studentLinks: [],
		activite_id: '',
		studentAbsences: [],
		studentClassId: null,
		fichier_path: '',
		type_document: '',
		absence_id: null,
		lien_github: '',
		commentaire: '',
		countCompletedTasks: 0,
		leaderboard: [],
		editProfileForm: {
			fullname: '',
			email: '',
			campus: '',
			ville: '',
			link_profile: '',
		},
		today: new Date().toISOString().split('T')[0],
	   }
	},
	computed: {
		studentInitial() {
			const name = this.studentName || ''
			return name.trim().charAt(0).toUpperCase() || 'S'
		},
	},
	methods:{
		normalizeRole(role) {
			const value = String(role || '').toLowerCase().trim()
			if (value === 'student') return 'etudiant'
			if (value === 'teacher') return 'formateur'
			return value || 'etudiant'
		},
		openProfileEditModal() {
			this.editProfileForm = {
				fullname: this.studentName || this.userData?.fullname || '',
				email: this.studentEmail || this.userData?.email || '',
				campus: this.studentCampus || this.userData?.campus || '',
				ville: this.userData?.ville || '',
				link_profile: this.studentAvatar || this.userData?.link_profile || '',
			}
			this.toggle('EditProfileModal')
		},
		async submitEditProfile() {
			try {
				await api.put('/updateusers', {
					id: this.studentId,
					fullname: this.editProfileForm.fullname,
					email: this.editProfileForm.email,
					role: this.normalizeRole(this.userData?.role),
					campus: this.editProfileForm.campus || null,
					ville: this.editProfileForm.ville || null,
					link_profile: this.editProfileForm.link_profile || null,
					etat: this.userData?.etat || this.studentStatus || 'active',
				})

				const storedUser = JSON.parse(localStorage.getItem('user') || '{}')
				const updatedUser = {
					...storedUser,
					fullname: this.editProfileForm.fullname,
					email: this.editProfileForm.email,
					campus: this.editProfileForm.campus || null,
					ville: this.editProfileForm.ville || null,
					link_profile: this.editProfileForm.link_profile || null,
				}
				localStorage.setItem('user', JSON.stringify(updatedUser))
				this.userData = updatedUser

				await this.getStudentData()
				this.toggle('EditProfileModal')
			} catch (error) {
				console.error('Failed to update student profile', error?.response?.data || error)
			}
		},
		async getStudentData() {
			try {
				const response = await api.get('/studentdata')
				const studentData = response.data?.studentData
				const delegateData = studentData?.classe?.delegate
				const delegateName = Array.isArray(delegateData)
					? (delegateData[0]?.fullname || 'No Delegate')
					: (delegateData?.fullname || delegateData || 'No Delegate')

				this.studentId = studentData?.user_id || this.studentId
				this.studentName = studentData?.user?.fullname || this.studentName
				this.studentEmail = studentData?.user?.email || this.studentEmail
				this.studentUsername = studentData?.user?.username || this.studentUsername
				this.studentClass = studentData?.classe?.nom || 'Class Not Assigned Yet'
				this.studentClassId = studentData?.classe?.id || this.studentClassId
				this.studentAnnee = studentData?.classe?.annee || this.studentAnnee
				this.studentClassCapacity = studentData?.classe?.capacite || this.studentCapacity
				this.studentClasseDelegate = delegateName
				this.studentClassLogo = studentData?.classe?.link_logo || this.studentClassLogo
				this.studentFormateur = studentData?.classe?.formateurs?.[0]?.fullname || studentData?.formateur?.fullname || this.studentFormateur
				this.studentCampus = studentData?.user?.campus || this.studentCampus
				this.studentAvatar = studentData?.user?.link_profile || this.studentAvatar
				this.studentPoints = studentData?.points || this.studentPoints,
				this.studentActivite = studentData?.activites || this.studentActivite
				this.countActivite = this.count(this.studentActivite) || this.countActivite
				this.Livrables = studentData?.livrables || this.Livrables
				this.studentLinks = studentData?.liens || this.studentLinks
				this.studentAbsences = studentData?.absences || this.studentAbsences

				console.log('student data', studentData);
				console.log('delegate', this.studentClasseDelegate);
				console.log('formateur:', this.studentFormateur);
				console.log('absences:', this.studentAbsences);
				this.ActiviteStatus(this.studentActivite);
				// console.log('Fetched student data:', response.data)
				console.log('Student Activities:', this.studentActivite)

			} catch (error) {
				console.error('Failed to fetch student data', error)
			}
		},
		count(array) {
			return Array.isArray(array) ? array.length : 0
		},
		isLivrableSubmitted(activiteId)
		{
			return this.Livrables.some(livrable => livrable.activite_id === activiteId);
		},
		logout() {
			localStorage.removeItem('user')
			this.$router.push('/')
		},
		toggle(id, Id) {
			const modal = document.getElementById(id)
			if (modal) {
				this.activite_id = Id || this.activite_id;
				this.absence_id = Id || this.absence_id;
				modal.classList.toggle('hidden')
				modal.classList.toggle('flex')
			}
		},
		ActiviteStatus(activites) {
			if (!Array.isArray(activites)) {
				this.todoActivite = []
				this.doingActivite = []
				this.doneActivite = []
				this.countCompletedTasks = 0
				return
			}

			const today = new Date().toISOString().split('T')[0]
			this.todoActivite = activites.filter(activite => activite.date_debut > today)
			this.doingActivite = activites.filter(activite => activite.date_debut <= today && activite.date_fin >= today)
			this.doneActivite = activites.filter(activite => activite.date_fin < today)
			this.countCompletedTasks = this.doneActivite.length

			console.log('To Do Activities:', this.todoActivite)
			console.log('Doing Activities:', this.doingActivite)
			console.log('Done Activities:', this.doneActivite)
		},
		async SendLivrable()
		{
			const response = await api.post('/sendlivrable',
			{
				student_id: this.studentId,
				activite_id: this.activite_id,
				classe_id: this.studentClassId,
				lien_github: this.lien_github,
				commentaire: this.commentaire,


			});

			await this.getStudentData()
			return response
		},
		async submitJustification()
		{
			try{
				const dateDepot = new Date().toISOString().split('T')[0];
				const response = await api.post('/absencejustification',
				{
					absence_id: this.absence_id,
					user_id: this.studentId,
					fichier_path: this.fichier_path,
					type_document: this.type_document || null,
					date_depot: dateDepot,
				});
	
				await this.getStudentData()
				this.toggle('JustificateModal')
				this.fichier_path = ''
				this.type_document = ''
				return response
			} catch (error) {
				console.error('Failed to submit justification', error)
			}
		},
		async getLeaderboard() {
			try {
				const response = await api.get('/leaderboard')
				this.leaderboard = response.data?.leaderboard || []
				this.leaderboard = this.leaderboard.filter(leader => leader.classe !== null);
				console.log('Leaderboard data:', this.leaderboard)
			} catch (error) {
				console.error('Failed to fetch leaderboard data', error)
			}
		},
		async getAnnouncements() {
			try {
				const response = await api.get('/getannouncements')
				this.announcements = response.data?.announcements.filter(announcement => announcement.cible === this.studentAnnee || announcement.cible === 'tout') || []
				console.log('Fetched announcements:', this.announcements)
			} catch (error) {
				console.error('Failed to fetch announcements', error)
			}
		}
		
	},
	mounted() {
		this.getStudentData()
		this.getLeaderboard()
		this.getAnnouncements()
		const data = localStorage.getItem('user');
		if (!data) return
		console.log('Student Initial:', this.today);
		try {
			const userData = JSON.parse(data)
			this.userData = userData
		} catch (error) {
			console.error('Invalid user data in localStorage', error)
		}
	}
	
};

</script>

