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
					<a href="#overview" class="group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-500 transition-all hover:bg-[#1d1d21] hover:text-white">
						<span class="mr-2 text-[#00babc] opacity-0 transition-opacity group-hover:opacity-100">&gt;</span>
						Overview
					</a>
					<a href="#dashboard" class="group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-500 transition-all hover:bg-[#1d1d21] hover:text-white">
						<span class="mr-2 text-[#00babc] opacity-0 transition-opacity group-hover:opacity-100">&gt;</span>
						Dashboard
					</a>
					<a href="#class-info" class="group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-500 transition-all hover:bg-[#1d1d21] hover:text-white">
						<span class="mr-2 text-[#00babc] opacity-0 transition-opacity group-hover:opacity-100">&gt;</span>
						Class Info
					</a>
					<a href="#activities" class="group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-500 transition-all hover:bg-[#1d1d21] hover:text-white">
						<span class="mr-2 text-[#00babc] opacity-0 transition-opacity group-hover:opacity-100">&gt;</span>
						Activities
					</a>
					<a href="#attendance" class="group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-500 transition-all hover:bg-[#1d1d21] hover:text-white">
						<span class="mr-2 text-[#00babc] opacity-0 transition-opacity group-hover:opacity-100">&gt;</span>
						Attendance
					</a>
					<a href="#support" class="group flex items-center rounded-sm px-4 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-500 transition-all hover:bg-[#1d1d21] hover:text-white">
						<span class="mr-2 text-[#00babc] opacity-0 transition-opacity group-hover:opacity-100">&gt;</span>
						Support
					</a>
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
						<header id="overview" class="relative overflow-hidden rounded-xl border border-white/10 min-h-[180px] md:min-h-[220px]">
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
									</div>
								</div>

								<div class="grid grid-cols-2 gap-3 md:grid-cols-4">
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Points</p>
										<p class="mt-2 text-sm font-bold text-white md:text-base">{{ studentPoints || 0 }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Tasks due</p>
										<p class="mt-2 text-sm font-bold text-white md:text-base">04</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Rank</p>
										<p class="mt-2 text-sm font-bold text-white md:text-base">05 / 28</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-black/30 p-3 md:p-4">
										<p class="text-[9px] uppercase tracking-widest text-gray-500">Score</p>
										<p class="mt-2 text-sm font-bold text-[#00babc] md:text-base">14.8</p>
									</div>
								</div>
							</div>
						</header>

						<section id="dashboard" class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
							<article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition-colors hover:bg-white/10">
								<p class="text-[10px] uppercase tracking-widest text-gray-500">Attendance</p>
								<p class="mt-3 text-3xl font-black text-white md:text-4xl">92%</p>
								<p class="mt-2 text-sm text-gray-400">Current period presence rate.</p>
							</article>

							<article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition-colors hover:bg-white/10">
								<p class="text-[10px] uppercase tracking-widest text-gray-500">Completed work</p>
								<p class="mt-3 text-3xl font-black text-white md:text-4xl">18</p>
								<p class="mt-2 text-sm text-gray-400">Assignments submitted on time.</p>
							</article>

							<article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition-colors hover:bg-white/10">
								<p class="text-[10px] uppercase tracking-widest text-gray-500">Upcoming tasks</p>
								<p class="mt-3 text-3xl font-black text-white md:text-4xl">04</p>
								<p class="mt-2 text-sm text-gray-400">Tasks due this week.</p>
							</article>

							<article class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition-colors hover:bg-white/10">
								<p class="text-[10px] uppercase tracking-widest text-gray-500">Average score</p>
								<p class="mt-3 text-3xl font-black text-[#00babc] md:text-4xl">14.8</p>
								<p class="mt-2 text-sm text-gray-400">Average across current activities.</p>
							</article>
						</section>

						<section id="class-info" class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
							<div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Class Information</h2>
									<p class="mt-1 text-[10px] text-gray-500">Overview of your assigned class</p>
								</div>
								<span class="inline-flex items-center rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">Assigned</span>
							</div>

							<div class="grid grid-cols-1 gap-4 lg:grid-cols-5">
								<div class="lg:col-span-2">
									<img src="@/assets/bg.jpg" alt="class_logo" class="h-48 w-full rounded-xl border border-white/10 object-cover">
								</div>

								<div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:col-span-3">
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Class Name</p>
										<p class="truncate text-sm font-semibold text-white">A1 Web Development</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Formateur</p>
										<p class="truncate text-sm font-semibold text-white">Instructor Team</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Campus</p>
										<p class="truncate text-sm font-semibold text-white">{{ studentCampus }}</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Delegate</p>
										<p class="truncate text-sm font-semibold text-white">Student Delegate</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Current Module</p>
										<p class="truncate text-sm font-semibold text-white">Frontend Basics</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-white/5 p-3">
										<p class="mb-1 text-[9px] uppercase tracking-widest text-gray-500">Capacity</p>
										<p class="truncate text-sm font-semibold text-white">28 Students</p>
									</div>
								</div>
							</div>
						</section>

						<section id="activities" class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
							<div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
								<div>
									<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Activities</h2>
									<p class="mt-1 text-[10px] text-gray-500">Upcoming and ongoing class work</p>
								</div>
								<span class="inline-flex items-center rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">3 Active</span>
							</div>

							<div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
								<article class="rounded-xl border border-white/10 bg-[#0f0f12] p-4 hover:border-[#00babc]/40 transition-colors">
									<div class="flex items-start justify-between gap-3">
										<div class="min-w-0">
											<h3 class="truncate text-sm font-bold text-white">Live Coding</h3>
											<p class="mt-1 text-[10px] text-gray-500">09:00 - 11:00</p>
										</div>
										<span class="rounded-full border border-blue-500/25 bg-blue-500/10 px-2 py-1 text-[9px] font-bold uppercase tracking-widest text-blue-400">In progress</span>
									</div>
									<p class="mt-3 text-sm text-gray-400">Responsive layout practice with components and utilities.</p>
								</article>

								<article class="rounded-xl border border-white/10 bg-[#0f0f12] p-4 hover:border-[#00babc]/40 transition-colors">
									<div class="flex items-start justify-between gap-3">
										<div class="min-w-0">
											<h3 class="truncate text-sm font-bold text-white">Workshop</h3>
											<p class="mt-1 text-[10px] text-gray-500">14:00 - 16:00</p>
										</div>
										<span class="rounded-full border border-[#00babc]/25 bg-[#00babc]/10 px-2 py-1 text-[9px] font-bold uppercase tracking-widest text-[#00babc]">Upcoming</span>
									</div>
									<p class="mt-3 text-sm text-gray-400">Practice session and feedback with the instructor team.</p>
								</article>

								<article class="rounded-xl border border-white/10 bg-[#0f0f12] p-4 hover:border-[#00babc]/40 transition-colors">
									<div class="flex items-start justify-between gap-3">
										<div class="min-w-0">
											<h3 class="truncate text-sm font-bold text-white">Debriefing</h3>
											<p class="mt-1 text-[10px] text-gray-500">17:30 - 18:00</p>
										</div>
										<span class="rounded-full border border-white/15 bg-white/5 px-2 py-1 text-[9px] font-bold uppercase tracking-widest text-gray-300">Planned</span>
									</div>
									<p class="mt-3 text-sm text-gray-400">Daily review, questions, and next-step alignment.</p>
								</article>
							</div>
						</section>

						<section id="attendance" class="grid grid-cols-1 gap-6 xl:grid-cols-3">
							<article class="xl:col-span-2 rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
								<div class="mb-5 flex items-center justify-between gap-4">
									<div>
										<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Attendance</h2>
										<p class="mt-1 text-[10px] text-gray-500">Monthly status overview</p>
									</div>
									<span class="rounded-full border border-[#00babc]/30 bg-[#00babc]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#00babc]">92%</span>
								</div>

								<div class="rounded-xl border border-white/10 bg-black/20 p-5">
									<div class="flex items-end justify-between gap-4">
										<div>
											<p class="text-sm text-gray-400">Presence</p>
											<p class="mt-2 text-5xl font-black text-white">27</p>
										</div>
										<div class="text-right">
											<p class="text-sm text-gray-400">Absent</p>
											<p class="mt-2 text-5xl font-black text-red-400">2</p>
										</div>
									</div>

									<div class="mt-5 h-3 overflow-hidden rounded-full bg-white/5">
										<div class="h-full w-[92%] rounded-full bg-gradient-to-r from-[#00babc] via-[#2ed3d5] to-[#bfffff]"></div>
									</div>

									<div class="mt-5 grid gap-3 text-sm text-gray-400">
										<div class="flex items-center justify-between">
											<span>Attendance rate</span>
											<span class="font-bold text-white">92%</span>
										</div>
										<div class="flex items-center justify-between">
											<span>Justifications pending</span>
											<span class="font-bold text-white">1</span>
										</div>
									</div>
								</div>
							</article>

							<article class="rounded-2xl border border-white/10 bg-[#121215] p-5 md:p-6">
								<h2 class="text-sm font-black uppercase tracking-wider text-white md:text-base">Announcements</h2>
								<p class="mt-1 text-[10px] text-gray-500">Latest updates for your class</p>

								<div class="mt-5 space-y-3">
									<div class="rounded-xl border border-white/10 bg-white/5 p-4">
										<p class="text-[10px] uppercase tracking-widest text-[#00babc]">Notice</p>
										<p class="mt-2 text-sm font-bold text-white">Project checkpoint</p>
										<p class="mt-2 text-sm text-gray-400">Submit your milestone before Friday 18:00.</p>
									</div>

									<div class="rounded-xl border border-white/10 bg-white/5 p-4">
										<p class="text-[10px] uppercase tracking-widest text-[#00babc]">Reminder</p>
										<p class="mt-2 text-sm font-bold text-white">Bring your laptop</p>
										<p class="mt-2 text-sm text-gray-400">The next session will be fully hands-on.</p>
									</div>
								</div>
							</article>
						</section>

						<section id="support" class="grid grid-cols-1 gap-4 lg:grid-cols-2">
							<article class="rounded-2xl border border-white/10 bg-white/5 p-5 md:p-6">
								<p class="text-[10px] uppercase tracking-[0.35em] text-gray-500">Quick actions</p>
								<div class="mt-4 grid gap-3 sm:grid-cols-2">
									<div class="rounded-xl border border-white/10 bg-[#121215] p-4">
										<p class="text-sm font-bold text-white">Check grades</p>
										<p class="mt-2 text-sm leading-6 text-gray-400">Review your latest evaluation results.</p>
									</div>
									<div class="rounded-xl border border-white/10 bg-[#121215] p-4">
										<p class="text-sm font-bold text-white">Send justification</p>
										<p class="mt-2 text-sm leading-6 text-gray-400">Prepare proof for an absence if needed.</p>
									</div>
								</div>
							</article>

							<article class="rounded-2xl border border-white/10 bg-white/5 p-5 md:p-6">
								<p class="text-[10px] uppercase tracking-[0.35em] text-gray-500">Support</p>
								<h2 class="mt-2 text-2xl font-black uppercase tracking-tight text-white">Need help?</h2>
								<p class="mt-3 text-sm leading-6 text-gray-400">
									Reach out to your formateur or the administration team if you need access to your class, attendance, or resources.
								</p>
								<div class="mt-5 flex flex-wrap gap-3">
									<a href="/" class="rounded-xl border border-[#00babc]/25 bg-[#00babc]/10 px-4 py-3 text-[11px] font-bold uppercase tracking-[0.2em] text-[#00babc] transition-colors hover:bg-[#00babc]/20">Go to login</a>
									<a href="#overview" class="rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-[11px] font-bold uppercase tracking-[0.2em] text-gray-200 transition-colors hover:border-white/20 hover:bg-white/10">Back to top</a>
								</div>
							</article>
						</section>
					</main>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import api from '@/services/api';
export default {
  name: 'StudentDashboard',
  data() {
	return {
		userData: null,
	    studentName: 'Student Name',
	    studentEmail: 'student@youcode.ma',
		studentUsername: 'student-001',
	    studentClass: 'Class A1',
		studentCampus: 'Campus',
		studentAvatar: '',
		studentStatus: 'active',
		studentPoints: 120,
	    attendanceRate: 92,
	    completedWork: 18,
	    upcomingTasks: 4,
	    averageScore: 14.8
	   }
	},
	computed: {
		studentInitial() {
			const name = this.studentName || ''
			return name.trim().charAt(0).toUpperCase() || 'S'
		}
	},
	methods:{
		async getStudentData() {
			try {
				const response = await api.get('/studentdata')
				const studentData = response.data?.studentData
				this.studentName = studentData?.user?.fullname || this.studentName
				this.studentEmail = studentData?.user?.email || this.studentEmail
				this.studentUsername = studentData?.user?.username || this.studentUsername
				this.studentClass = studentData?.classe?.nom || 'Class Not Assigned Yet'
				this.studentCampus = studentData?.user?.campus || this.studentCampus
				this.studentAvatar = studentData?.user?.link_profile || this.studentAvatar
				this.studentPoints = studentData?.points || this.studentPoints

				console.log('Fetched student data:', response.data)
			} catch (error) {
				console.error('Failed to fetch student data', error)
			}
		}
	},
	mounted() {
		this.getStudentData()
		const data = localStorage.getItem('user');
		if (!data) return

		try {
			const userData = JSON.parse(data)
			this.userData = userData
		} catch (error) {
			console.error('Invalid user data in localStorage', error)
		}
	}
}
</script>

