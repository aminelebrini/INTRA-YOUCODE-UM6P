<template>
    <div v-if="user" class="flex items-start min-h-screen w-full bg-[#0f0f12] text-white font-sans overflow-x-hidden">
        <aside
          :class="[
            showSidebar ? 'translate-x-0 md:translate-x-0' : '-translate-x-full md:translate-x-0',
            'left-0 top-0 w-72 max-w-[85%] md:w-64 bg-[#121215] border-r border-white/5 flex flex-col fixed h-full z-30 transition-transform duration-300'
          ]"
        >
      <div class="p-6 md:p-8 border-b border-white/5">
        <img src="@/assets/logo-white.png" alt="Logo" class="w-28 md:w-32 opacity-80 hover:opacity-100 transition-opacity">
        <p class="text-[8px] text-[#00babc] font-mono mt-2 tracking-[0.3em]">ADMIN_PANEL_v1.0</p>
      </div>

      <nav class="flex-1 px-3 md:px-4 py-6 md:py-8 space-y-2">
        <p class="text-[9px] text-gray-600 uppercase tracking-[0.2em] font-bold px-4 mb-4">Main_Menu</p>
        <router-link to="/formateurdashboard" :class="activTab === 'profile'  " @click="activTab = 'profile';   " class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span :class="activTab === 'profile'  " class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          PROFILE
        </router-link>
        <router-link to="/formateurdashboard" :class="activTab === 'dashboard'  " @click="activTab = 'dashboard';   " class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span :class="activTab === 'dashboard'  " class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          DASHBOARD
        </router-link>

        <router-link to="/formateurdashboard" :class="activTab === 'activities'  " @click="activTab = 'activities';   " class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span :class="activTab === 'activities'  " class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ACTIVITIES
        </router-link>

        <router-link to="/formateurdashboard" :class="activTab === 'students'  " @click="activTab = 'students';   " class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span :class="activTab === 'students'  " class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          STUDENTS
        </router-link>

        <router-link to="/formateurdashboard" :class="activTab === 'classes'  " @click="activTab = 'classes';   " class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span :class="activTab === 'classes'  " class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          CLASSE
        </router-link>

        <router-link to="/formateurdashboard" :class="activTab === 'absences'  " @click="activTab = 'absences';   " class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span :class="activTab === 'absences'  " class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ABSENCES
        </router-link>
        </nav>

      <div v-if="formateurData" :key="formateurData.formateur_id" class="p-6 bg-[#0c0c0e] border-t border-white/5">
        <div class="flex items-center space-x-3 mb-4">
          <div class="w-8 h-8 rounded-full bg-[#00babc]/20 border border-[#00babc]/40 flex items-center justify-center text-[10px] font-bold text-[#00babc]">
            <img :src="user?.link_profile || 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg'" alt="logo" class="w-6 h-6 rounded-full">
          </div>
          <div class="overflow-hidden">
            <p class="text-[11px] font-bold truncate">{{ formateurData?.formateur_name || user?.fullname || 'Admin' }}</p>
            <p class="text-[9px] text-gray-600 truncate">{{ user?.email || 'admin@youcode.ma' }}</p>
            <p class="text-[9px] text-gray-600 truncate">{{ formateurData?.classe_name || 'No Class Assigned' }}</p>
          </div>
        </div>
        <button @click="logout" class="w-full text-left text-[9px] text-red-500/60 hover:text-red-500 font-bold uppercase tracking-widest transition-colors">
          [ DISCONNECT ]
        </button>
      </div>
    </aside>

    <button
      v-if="showSidebar && !isDesktop"
      @click="closeSidebar"
      class="fixed inset-0 bg-black/60 z-20 md:hidden"
    ></button>

        <div class="md:flex-1 md:ml-64 flex flex-col p-3 sm:p-4 md:p-6 w-full min-h-screen">
          <div class="md:hidden mb-4 flex items-center justify-between bg-[#121215] border border-white/10 rounded-lg px-4 py-3">
            <img src="@/assets/logo-white.png" alt="Logo" class="w-24 opacity-90">
            <button @click="showSidebar = true" class="text-[#00babc] border border-[#00babc]/40 rounded px-3 py-1.5 text-[10px] uppercase tracking-widest font-bold">
              <i class="fas fa-bars"></i>
            </button>
          </div>

          <main class="w-full max-w-7xl mx-auto p-2 sm:p-3 md:p-2 pb-8">
            <header v-if="activTab === 'profile'" class="relative mb-6 p-4 md:p-6 rounded-xl border md:flex md:flex-row md:justify-between md:items-center border-white/10 overflow-hidden w-full min-h-[120px] md:min-h-[200px]">
              <div class="absolute inset-0 z-0">
                <img src="@/assets/formateurbg.avif" class="w-full h-full object-cover object-center" alt="header_bg">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 to-black/40 backdrop-blur-[2px]"></div>
              </div>

              <div class="relative z-10 w-full flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="flex items-center gap-4 md:gap-6 min-w-0">
                  <div class="relative shrink-0">
                    <img
                      :src="user?.link_profile || 'https://intranet.youcode.ma/storage/users/profile/0.jpg'"
                      alt="user_profile"
                      class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full border-2 border-[#00babc] object-cover shadow-[0_0_15px_rgba(0,186,188,0.3)]"
                    >
                    <div class="absolute bottom-1 right-1 w-3 h-3 bg-green-500 border-2 border-black rounded-full"></div>
                  </div>

                  <div class="flex flex-col justify-center min-w-0">
                    <h2 class="text-white font-black uppercase tracking-tighter text-sm sm:text-xl md:text-3xl leading-tight truncate">
                      {{ user?.fullname || 'FORMATEUR' }}
                    </h2>
                    <span class="text-[8px] md:text-[10px] text-white/50 font-mono tracking-widest truncate">
                      ID: {{ user?.username || 'formateur' }}
                    </span>
                  </div>
                </div>

                <div class="flex flex-col justify-center min-w-0 w-full md:w-auto md:items-end">
                  <h2 class="text-white font-black uppercase tracking-tighter text-xs sm:text-base md:text-2xl leading-tight break-all md:break-normal md:text-right">
                    {{ user?.email || 'formateur@youcode.ma' }}
                  </h2>
                  <div class="flex flex-row items-center justify-start gap-2 mt-1 md:mt-2">
                    <span class="text-[8px] md:text-[10px] text-white/50 font-mono tracking-widest truncate">
                      Role: {{ user?.role || 'FORMATEUR' }}
                    </span>
                  </div>
                </div>
              </div>
            </header>

            <div v-if="activTab === 'dashboard'" class="flex flex-col items-start justify-center w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 p-2 sm:p-4 w-full">
              <div class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all cursor-default">
                <div class="flex justify-between items-start mb-4">
                  <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                    <i class="fas fa-user-graduate text-xl"></i>
                  </div>
                </div>
                <h3 class="text-gray-400 text-sm font-medium">Total Students</h3>
                <p class="text-2xl font-bold text-white mt-1">{{ students.length || 0 }}</p>
              </div>

              <div class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all">
                <div class="flex justify-between items-start mb-4">
                  <div class="p-2 bg-green-500/20 rounded-lg text-green-400">
                    <i class="fas fa-tasks text-xl"></i>
                  </div>
                </div>
                <h3 class="text-gray-400 text-sm font-medium">Total Activities</h3>
                <p class="text-2xl font-bold text-white mt-1">42</p>
              </div>

              <div class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all">
                <div class="flex justify-between items-start mb-4">
                  <div class="p-2 bg-red-500/20 rounded-lg text-red-400">
                    <i class="fas fa-user-slash text-xl"></i>
                  </div>
                </div>
                <h3 class="text-gray-400 text-sm font-medium">Abandoned</h3>
                <p class="text-2xl font-bold text-white mt-1">7</p>
              </div>
              </div>
              <div class="relative w-full mt-6 rounded-2xl border border-white/10 overflow-hidden bg-[#101216]">
                <div class="absolute inset-0"></div>
                <div class="relative p-4 md:p-6">
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                    <div>
                      <h1 class="text-white font-black uppercase tracking-wider text-sm md:text-base">Classe Information</h1>
                      <p class="text-[10px] md:text-xs text-gray-500 mt-1">Overview of the assigned class</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase border border-[#00babc]/30 bg-[#00babc]/10 text-[#00babc]">
                      {{ formateurData ? 'Assigned' : 'Unassigned' }}
                    </span>
                  </div>

                  <div v-if="formateurData" class="grid grid-cols-1 lg:grid-cols-5 gap-4 md:gap-5">
                    <div class="lg:col-span-2">
                      <img
                        :src="formateurData?.link_logo || formateurData?.class_logo || 'https://www.freecodecamp.org/news/content/images/2022/02/arnold-francisca-f77Bh3inUpE-unsplash.jpg'"
                        alt="class_logo"
                        class="w-full h-44 sm:h-52 object-cover rounded-xl border border-white/10"
                      >
                    </div>

                    <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Class Name</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.classe_name || 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Formator</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.formateur_name || 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Created At</p>
                        <p class="text-sm md:text-base font-semibold text-white">{{ formateurData?.created_at ? formatDate(formateurData.created_at) : 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Campus</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.campus || 'N/A' }}</p>
                      </div>
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Delegate</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.delegate_name || 'N/A' }}</p>
                      </div>
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Capacity</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.capacite || 'N/A' }}</p>
                      </div>
                    </div>
                  </div>
                  

                  <div v-else class="mt-2 rounded-xl border border-white/10 bg-white/5 p-4 flex items-center justify-between">
                    <p class="text-[11px] text-gray-400 italic tracking-wide">No class assigned yet for this formateur.</p>
                    <div class="flex gap-1">
                      <span class="w-1.5 h-1.5 bg-[#00babc] rounded-full animate-ping"></span>
                      <span class="w-1.5 h-1.5 bg-[#00babc] rounded-full opacity-50"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <section v-if="activTab=== 'activities'" class="bg-[#121215] border border-white/10 p-5 sm:p-6 rounded-2xl">
              <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                  <h1 class="text-white text-lg md:text-xl font-black uppercase tracking-wide">Activities</h1>
                  <p class="text-[11px] text-gray-500 mt-1">Activites de la classe</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 w-full lg:w-auto">
                  <select class="w-full sm:w-auto bg-[#0f0f12] border border-white/10 text-gray-400 text-sm rounded-lg focus:border-[#00babc] block p-2.5 outline-none transition-colors">
                    <option value="">Filter By Type</option>
                    <option value="brief">Brief</option>
                    <option value="live-coding">Live Coding</option>
                    <option value="workshop">Workshop</option>
                    <option value="veille">Veille Technologique</option>
                    <option value="debriefing">Debriefing</option>
                  </select>
                  <button
                    @click="toggle('CreateActivityModal')"
                    class="w-full sm:w-auto bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold py-2.5 px-4 rounded-lg text-[11px] uppercase tracking-widest transition-colors"
                  >
                    Add Activity
                  </button>
                </div>
              </div>

              <div v-if="activites.length > 0" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">
                <article
                  v-for="activity in activites"
                  :key="activity.id"
                  class="bg-[#0f0f12] border border-white/10 rounded-xl p-4 hover:border-[#00babc]/50 transition-colors"
                >
                  <div class="flex items-start justify-between gap-3 mb-3">
                    <div class="flex-1 min-w-0">
                      <h3 class="text-white font-bold text-sm truncate">{{ activity.nom || 'Untitled Activity' }}</h3>
                      <p class="text-[10px] text-gray-500 truncate mt-1">{{ formatDate(activity.date_debut) }} - {{ formatDate(activity.date_fin) }}</p>
                    </div>
                    <span 
                      :class="{
                        'bg-blue-500/15 text-blue-400 border-blue-500/25': activity.type === 'brief',
                        'bg-purple-500/15 text-purple-400 border-purple-500/25': activity.type === 'live-coding',
                        'bg-green-500/15 text-green-400 border-green-500/25': activity.type === 'workshop',
                        'bg-orange-500/15 text-orange-400 border-orange-500/25': activity.type === 'veille',
                        'bg-pink-500/15 text-pink-400 border-pink-500/25': activity.type === 'debriefing',
                        'bg-gray-500/15 text-gray-400 border-gray-500/25': !activity.type
                      }"
                      class="text-[8px] px-2 py-1 rounded border uppercase tracking-widest font-bold whitespace-nowrap flex-shrink-0"
                    >
                      {{ activity.type || 'N/A' }}
                    </span>
                  </div>

                  <p v-if="activity.description" class="text-[11px] text-gray-400 line-clamp-2 mb-3">{{ activity.description }}</p>

                  <div class="flex items-center justify-between mt-4 pt-3 border-t border-white/5">
                    <div>
                      <p class="text-[9px] text-gray-600 mb-1">Status</p>
                      <span 
                        :class="{
                          'bg-green-500/20 text-green-400': activity.etat === 'done' || activity.etat === 'completed',
                          'bg-amber-500/20 text-amber-400': activity.etat === 'in_progress',
                          'bg-gray-500/20 text-gray-400': activity.etat === 'pending' || !activity.etat
                        }"
                        class="inline-block text-[9px] px-2 py-1 rounded border border-current/25 font-bold"
                      >
                        {{ activity.etat === 'in_progress' ? 'In Progress' : activity.etat === 'done' ? 'Done' : 'Pending' }}
                      </span>
                    </div>
                    <div v-if="activity.ressource" class="text-right">
                      <p class="text-[9px] text-gray-600 mb-1">Resource</p>
                      <a :href="activity.ressource" target="_blank" class="text-[9px] text-[#00babc] hover:text-[#00d1d3] font-bold truncate">
                        View →
                      </a>
                    </div>
                  </div>
                </article>
              </div>

              <div v-else class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
                <p class="text-[10px] text-gray-600 font-mono italic tracking-widest">
                  System_Ready_Waiting_For_Data
                </p>
                <div class="flex gap-1">
                  <span class="w-1 h-1 bg-[#00babc] rounded-full animate-ping"></span>
                  <span class="w-1 h-1 bg-[#00babc] rounded-full opacity-50"></span>
                </div>
              </div>
            </section>

            <section v-if="activTab=== 'students'" class="bg-[#121215] border border-white/10 p-5 sm:p-6 rounded-2xl mt-6">
              <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                  <h1 class="text-white text-lg md:text-xl font-black uppercase tracking-wide">Students</h1>
                  <p class="text-[11px] text-gray-500 mt-1">Gestion des etudiants de la classe</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 w-full lg:w-auto">
                  <button
                    @click="toggle('AddStudentModal')"
                    class="w-full sm:w-auto bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold py-2.5 px-4 rounded-lg text-[11px] uppercase tracking-widest transition-colors"
                  >
                    Add Student
                  </button>
                  <button
                    @click="toggle('AssignDelegateModal')"
                    class="w-full sm:w-auto bg-transparent border border-[#00babc]/40 hover:border-[#00babc] text-[#00babc] font-bold py-2.5 px-4 rounded-lg text-[11px] uppercase tracking-widest transition-colors"
                  >
                    Assign Delegate
                  </button>
                </div>
              </div>

              <div v-if="students.length > 0" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">
                <article
                  v-for="student in students"
                  :key="student.student_id || student.id"
                  class="bg-[#0f0f12] border border-white/10 rounded-xl p-4 hover:border-[#00babc]/50 transition-colors"
                >
                  <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                      <div class="flex items-center gap-3 mb-2">
                        <img :src="student.student_image" alt="Student Image" class="w-10 h-10 rounded-full object-cover border border-white/10 mb-2">
                        <span class="text-[15px] text-[#00babc] font-bold">{{ student.points || 0 }} POINTS</span>
                      </div>

                      <h3 class="text-white font-bold text-sm truncate">{{ student.student_name || 'Unknown Student' }}</h3>
                      <p class="text-[11px] text-gray-500 truncate mt-1">{{ student.email || 'No email' }}</p>
                    </div>
                    <span class="text-[9px] px-2 py-1 rounded bg-[#00babc]/15 text-[#00babc] border border-[#00babc]/25 uppercase tracking-widest font-bold">
                      Student
                    </span>
                  </div>
                </article>
              </div>

              <div v-else class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
                <p class="text-[10px] text-gray-600 font-mono italic tracking-widest">
                  System_Ready_Waiting_For_Data
                </p>
                <div class="flex gap-1">
                  <span class="w-1 h-1 bg-[#00babc] rounded-full animate-ping"></span>
                  <span class="w-1 h-1 bg-[#00babc] rounded-full opacity-50"></span>
                </div>
              </div>
            </section>
          </main>
        </div>
    </div>

    <div
      class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" id="CreateActivityModal">
      <div class="w-full max-w-2xl rounded-xl border border-white/10 bg-[#121215] p-5 md:p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-5">
          <h2 class="text-sm md:text-base font-black uppercase tracking-widest text-[#00babc]">Create Activity</h2>
          <button @click="toggle('CreateActivityModal')" class="text-gray-400 hover:text-red-400 text-xl leading-none">x</button>
        </div>

        <form @submit.prevent="submitCreateActivity" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="md:col-span-2">
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Activity Name</label>
            <input v-model="nom" type="text" required class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
          </div>

          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Type</label>
            <select v-model="type" required class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
              <option value="brief">Briefs</option>
              <option value="live-coding">Live Coding</option>
              <option value="workshop">Workshop</option>
              <option value="tech-watch">Tech Watch</option>
              <option value="debriefing">Debriefing</option>
            </select>
          </div>
          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Student</label>
            <select v-model="student_id" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
              <option value="">Select Student</option>
              <option v-for="student in students" :key="student.student_id || student.id" :value="student.id">
                {{ student.student_name }}
              </option>
            </select>
          </div>
          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Binome</label>
            <select v-model="binome_id" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
              <option value="">Select Student</option>
              <option v-for="student in students" :key="student.student_id || student.id" :value="student.id">
                {{ student.student_name }}
              </option>
            </select>
          </div>

          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Status</label>
            <select v-model="etat" required class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
              <option value="pending">Pending</option>
              <option value="in_progress">In Progress</option>
              <option value="done">Done</option>
            </select>
          </div>

          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Start Date</label>
            <input v-model="date_debut" type="date" required class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
          </div>

          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">End Date</label>
            <input v-model="date_fin" type="date" required class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
          </div>

          <div class="md:col-span-2">
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Resource</label>
            <input v-model="ressource" type="text" placeholder="GitHub, Notion, PDF..." class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
          </div>

          <div class="md:col-span-2">
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Description</label>
            <textarea v-model="description" rows="4" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]"></textarea>
          </div>
          <button @click="submitCreateActivity" class="md:col-span-2 bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold px-4 py-2 rounded text-xs uppercase tracking-widest">
            Create Activity
          </button>
        </form>
      </div>
    </div>

    <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" id="AddStudentModal">
      <div class="w-full max-w-md rounded-xl border border-white/10 bg-[#121215] p-5 md:p-6">
        <div class="flex items-center justify-between mb-5">
          <h2 class="text-sm md:text-base font-black uppercase tracking-widest text-[#00babc]">Add Student</h2>
          <button @click="toggle('AddStudentModal')" class="text-gray-400 hover:text-red-400 text-xl leading-none">x</button>
        </div>
        <form @submit.prevent="submitAddStudent" class="grid grid-cols-1 gap-4">
          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Full Name</label>
            <select name="student_id" id="student_id" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" v-model="selectedStudentId" required>
              <option disabled value="" class="text-gray-400">Select a student</option>
              <option v-for="student in allStudents" :key="student.id" :value="student.user_id || student.id" class="text-white">
                {{ student.user?.fullname || student.fullname || 'Unknown student' }}
              </option>
            </select>
          </div>

          <div>
            <label for="promotion" class="text-[10px] uppercase tracking-widest text-gray-400">Promotion</label>
            <input type="text" id="promotion" v-model="promotion" placeholder="2022-2024" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" required>
          </div>

          <div>
            <label for="annee" class="text-[10px] uppercase tracking-widest text-gray-400">Annee</label>
            <input type="text" id="annee" v-model="annee" placeholder="A1" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" required>
          </div>

          <div>
            <label for="formateur_id" class="text-[10px] uppercase tracking-widest text-gray-400">Formateur ID</label>
            <input type="text" id="formateur_id" :value="formateurData?.formateur_id || ''" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-gray-400 outline-none" readonly>
          </div>

          <div>
            <label for="classe_id" class="text-[10px] uppercase tracking-widest text-gray-400">Classe ID</label>
            <input type="text" id="classe_id" :value="formateurData?.classe_id || ''" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-gray-400 outline-none" readonly>
          </div>

          <button @click="submitAddStudent" class="bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold px-4 py-2 rounded text-xs uppercase tracking-widest">
            Add Student
          </button>
        </form>
      </div>
    </div>

    <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4" id="AssignDelegateModal">
      <div class="w-full max-w-md rounded-xl border border-white/10 bg-[#121215] p-5 md:p-6">
        <div class="flex items-center justify-between mb-5">
          <h2 class="text-sm md:text-base font-black uppercase tracking-widest text-[#00babc]">Assign Class Delegate</h2>
          <button @click="toggle('AssignDelegateModal')" class="text-gray-400 hover:text-red-400 text-xl leading-none">x</button>
        </div>
        <form @submit.prevent="submitAssignDelegate" class="grid grid-cols-1 gap-4">
          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Select Student</label>
            <select v-model="selectedDelegateStudentId" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" required>
              <option disabled value="" class="text-gray-400">Choose a delegate</option>
              <option v-for="student in students" :key="student.student_id || student.id" :value="student.student_id || student.id" class="text-white">
                {{ student.student_name || 'Unknown Student' }}
              </option>
            </select>
          </div>

          <div class="bg-white/5 border border-white/10 rounded p-3 text-[11px] text-gray-400">
            <p class="mb-2"><span class="text-[#00babc]">•</span> The selected student will be marked as class delegate</p>
            <p><span class="text-[#00babc]">•</span> Only one delegate per class is allowed</p>
          </div>

          <button type="submit" class="bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold px-4 py-2 rounded text-xs uppercase tracking-widest">
            Assign Delegate
          </button>
        </form>
      </div>
    </div>
</template>

<script setup>
import api from '@/services/api';
import {onBeforeUnmount, onMounted, ref } from 'vue';

const activTab = ref('profile');
const user = ref(null);
const students = ref([]);
const activites = ref([]);
const formateurData = ref([]);
const nom = ref('');
const description = ref('');
const type = ref('briefs');
const ressource = ref('');
const etat = ref('pending');
const date_debut = ref('');
const date_fin = ref('');
const student_id = ref('');
const binome_id = ref('');
const allStudents = ref([]);
const selectedStudentId = ref('');
const promotion = ref('');
const annee = ref(String(new Date().getFullYear()));
const selectedDelegateStudentId = ref('');

const showSidebar = ref(false);
const isDesktop = ref(window.innerWidth >= 768);

const handleResize = () => {
  isDesktop.value = window.innerWidth >= 768;
  if (isDesktop.value) {
    showSidebar.value = false;
  }
};

const closeSidebar = () => {
  showSidebar.value = false;
};



const submitCreateActivity = async () => {
  const classeId = formateurData.value?.classe_id || formateurData.value?.id;
  const formateurId = formateurData.value?.formateur_id || user.value?.id;
  
  try {
    await api.post('/createactivites', {
      nom:nom.value,
      description: description.value,
      type: type.value,
      formateur_id: formateurId,
      classe_id: classeId,
      ressource: ressource.value || '',
      etat: etat.value,
      date_debut: date_debut.value,
      date_fin: date_fin.value
    });

    await getActivities();
    resetActivityForm();
    toggle('CreateActivityModal');
  } catch (error) {
    console.error('Error creating activity:', error);
  }
};

const resetActivityForm = () => {
  nom.value = '';
  description.value = '';
  type.value = 'brief';
  ressource.value = '';
  etat.value = 'pending';
  date_debut.value = '';
  date_fin.value = '';
  student_id.value = '';
  binome_id.value = '';
};
    const getAllStudents = async () => {
      try{
        const response = await api.get('/getstudents');
        allStudents.value = response.data?.allStudents || [];
        console.log('Fetched all students:', allStudents.value);
      }
      catch(error){
        console.error('Error fetching students:', error);
      }
    }
    const getStudents = async () => {
      try{
        const response = await api.get('/students');
        students.value = response.data.students || [];
        console.log('Fetched students:', students.value);
      }
      catch(error){
        console.error('Error fetching students:', error);
      }
    }
    const getActivities = async () => {
      try{
        const response = await api.get('/activites');
        activites.value = response.data.activites || [];
        console.log('Fetched activities:', activites.value);
      }
      catch(error){
        console.error('Error fetching activities:', error);
      }
    }

    const getFormateurData = async () => {
      try{
        const response = await api.get('/formateurdata');
        formateurData.value = response.data.formateurData[0];
           
        console.log('Fetched formateur data:', formateurData.value);
      }
      catch(error){
        console.error('Error fetching formateur data:', error);
      }
    }
    function formatDate(isDate)
    {
      const isdate = new Date(isDate);
      return isdate.toLocaleDateString();
    }
    const logout = () => {
        localStorage.clear();
        window.location.href = '/';
    };
    onMounted(() => {
        const data = localStorage.getItem('user');
        if (data) {
            user.value = JSON.parse(data);
            // console.log('User data loaded:', user.value);
        }
        getStudents();
        getAllStudents();
      getFormateurData();
      getActivities();
      window.addEventListener('resize', handleResize);
      handleResize();
    });

    const submitAddStudent = async () => {
      try {
        const formateurId = formateurData.value?.formateur_id || user.value?.id;
        const classeId = formateurData.value?.classe_id;

        if (!formateurId || !classeId) {
          console.error('Missing formateur_id or classe_id. Ensure the formateur is assigned to a class.');
          return;
        }

        await api.post('/assignstudentclasse', {
          user_id: selectedStudentId.value,
          points: 0,
          promotion: promotion.value,
          annee: annee.value,
          formateur_id: formateurId,
          classe_id: classeId
        })
        await getStudents();
        selectedStudentId.value = '';
        promotion.value = '';
        toggle('AddStudentModal');
      } catch (error) {
        console.error('Error assigning student to class:', error);
      }
    };

    const submitAssignDelegate = async () => {
      try {
        const classeId = formateurData.value?.classe_id;

        if (!selectedDelegateStudentId.value || !classeId) {
          console.error('Please select a student and ensure a class is assigned.');
          return;
        }

        await api.post('/assigndelegate', {
          student_id: selectedDelegateStudentId.value,
          classe_id: classeId
        });

        await getStudents();
        selectedDelegateStudentId.value = '';
        toggle('AssignDelegateModal');
        console.log('Delegate assigned successfully');
      } catch (error) {
        console.error('Error assigning delegate:', error);
      }
    };

    onBeforeUnmount(() => {
      window.removeEventListener('resize', handleResize);
    });

    function toggle(id)
    {
      const element = document.getElementById(id);
      if(element.classList.contains('hidden'))
      {
        element.classList.remove('hidden');
      }
      else
      {
        element.classList.add('hidden');
      }
    }
</script>