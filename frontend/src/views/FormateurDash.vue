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

            <section v-if="activTab === 'profile'" class="flex flex-col gap-6">
              <div class="bg-[#121215] border border-white/10 rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                  <h3 class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Personal Information</h3>
                  <button class="bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold py-2 px-4 rounded-lg text-[10px] uppercase tracking-widest transition-colors flex items-center gap-2">
                    <i class="fas fa-edit"></i>
                    Edit Profile
                  </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div class="border-b md:border-b-0 md:border-r border-white/10 pb-6 md:pb-0 md:pr-6">
                    <div class="mb-6">
                      <p class="text-[9px] text-gray-600 uppercase tracking-widest mb-2">Full Name</p>
                      <p class="text-base font-bold text-white">{{ user?.fullname || 'N/A' }}</p>
                    </div>
                    
                    <div class="mb-6">
                      <p class="text-[9px] text-gray-600 uppercase tracking-widest mb-2">Username</p>
                      <p class="text-base font-bold text-white">{{ user?.username?.toLowerCase().trim() || 'N/A' }}</p>
                    </div>
                  </div>
                  
                  <div class="md:pl-6">
                    <div class="mb-6">
                      <p class="text-[9px] text-gray-600 uppercase tracking-widest mb-2">Email</p>
                      <p class="text-base font-bold text-[#00babc] truncate">{{ user?.email || 'N/A' }}</p>
                    </div>
                    
                    <div class="mb-6">
                      <p class="text-[9px] text-gray-600 uppercase tracking-widest mb-2">Role</p>
                      <span class="inline-block text-[9px] px-3 py-1.5 rounded bg-[#00babc]/20 text-[#00babc] border border-[#00babc]/25 font-bold uppercase tracking-widest">
                        {{ user?.role || 'FORMATEUR' }}
                      </span>
                    </div>
                    
                    <div>
                      <p class="text-[9px] text-gray-600 uppercase tracking-widest mb-2">Status</p>
                      <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        <span class="text-base font-bold text-green-400">Active</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

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
                <p class="text-2xl font-bold text-white mt-1">{{ activites.length || 0 }}</p>
              </div>

              <div class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all">
                <div class="flex justify-between items-start mb-4">
                  <div class="p-2 bg-red-500/20 rounded-lg text-red-400">
                    <i class="fas fa-user-slash text-xl"></i>
                  </div>
                </div>
                <h3 class="text-gray-400 text-sm font-medium">Abandoned</h3>
                <p class="text-2xl font-bold text-white mt-1">{{ students.status === 'abandoned' ? students.length : 0 }}</p>
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
                  <div v-if="formateurData" class="mt-2">
                  <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 md:gap-5">
                    <div class="lg:col-span-2">
                      <img
                        :src="formateurData?.classes?.link_logo || formateurData?.class_logo || 'https://www.freecodecamp.org/news/content/images/2022/02/arnold-francisca-f77Bh3inUpE-unsplash.jpg'"
                        alt="class_logo"
                        class="w-full h-44 sm:h-52 object-cover rounded-xl border border-white/10"
                      >
                    </div>

                    <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Class Name</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData.classes?.nom || 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Formator</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.fullname || 'N/A' }}</p>
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
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.delegate_name || 'Not Assigned Yet' }}</p>
                      </div>
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Capacity</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ formateurData?.capacite || 'N/A' }}</p>
                      </div>
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

              <div class="mt-6 rounded-2xl border border-white/10 bg-[#101216] p-4 md:p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                  <div>
                    <h2 class="text-white font-black uppercase tracking-wider text-sm md:text-base">Students Details</h2>
                    <p class="text-[10px] md:text-xs text-gray-500 mt-1">Informations des etudiants de la classe {{ formateurData?.classe_name || '' }}</p>
                  </div>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase border border-[#00babc]/30 bg-[#00babc]/10 text-[#00babc]">
                    {{ students.length }} Students
                  </span>
                </div>

                <div v-if="students.length > 0" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                  <article
                    v-for="student in students"
                    :key="student.student_id || student.id"
                    class="rounded-xl border border-white/10 bg-white/5 p-4 hover:border-[#00babc]/40 transition-colors"
                  >
                    <div class="flex items-start gap-3 mb-4">
                      <img
                        v-if="student?.user?.link_profile"
                        :src="student.user.link_profile"
                        alt="Student Image"
                        class="w-12 h-12 rounded-full object-cover border border-white/10"
                      >
                      <div
                        v-else
                        class="w-12 h-12 rounded-full bg-[#00babc]/20 border border-[#00babc]/30 flex items-center justify-center text-[#00babc] font-black"
                      >
                        {{ student.user.fullname.charAt(0) || 'S' }}
                      </div>

                      <div class="min-w-0 flex-1">
                        <h3 class="text-white font-bold text-sm truncate">{{ student.user.fullname || 'Unknown Student' }}</h3>
                        <p class="text-[11px] text-gray-500 truncate">{{ student.user.email || 'No email' }}</p>
                        <div class="mt-2 flex flex-wrap gap-2">
                          <span class="text-[9px] px-2 py-1 rounded bg-[#00babc]/15 text-[#00babc] border border-[#00babc]/25 uppercase tracking-widest font-bold">
                            {{ student.classe.nom || formateurData?.classe_name || 'N/A' }}
                          </span>
                          <span class="text-[9px] px-2 py-1 rounded bg-white/5 text-gray-300 border border-white/10 uppercase tracking-widest font-bold">
                            {{ student.annee || 'N/A' }}
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3 text-left">
                      <div class="rounded-lg border border-white/5 bg-[#0c0c0e] p-3">
                        <p class="text-[9px] uppercase tracking-widest text-gray-500 mb-1">Promotion</p>
                        <p class="text-sm font-semibold text-white">{{ student.promotion || 'N/A' }}</p>
                      </div>

                      <div class="rounded-lg border border-white/5 bg-[#0c0c0e] p-3">
                        <p class="text-[9px] uppercase tracking-widest text-gray-500 mb-1">Status</p>
                        <p class="text-sm font-semibold text-white">{{ student.status || 'N/A' }}</p>
                      </div>

                      <div class="rounded-lg border border-white/5 bg-[#0c0c0e] p-3">
                        <p class="text-[9px] uppercase tracking-widest text-gray-500 mb-1">Status</p>
                        <p class="text-sm font-semibold text-white">{{ student.ville || 'N/A' }}</p>
                      </div>

                      <div class="rounded-lg border border-white/5 bg-[#0c0c0e] p-3">
                        <p class="text-[9px] uppercase tracking-widest text-gray-500 mb-1">Points</p>
                        <p class="text-sm font-semibold text-[#00babc]">{{ student.points || 0 }}</p>
                      </div>
                    </div>
                  </article>
                </div>

                <div v-else class="rounded-xl border border-dashed border-white/10 bg-black/20 p-5 text-center">
                  <p class="text-[11px] text-gray-400 italic tracking-wide">No students linked to this class yet.</p>
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
                  <div>
                    <img v-if="activity?.student" :src="activity?.student?.link_profile" alt="" class="w-8 h-8 rounded-full object-cover border border-white/10">
                    <img v-if="activity?.binome" :src="activity.binome.link_profile" alt="" class="w-8 h-8 rounded-full object-cover border border-white/10">
                  </div>
                  <div class="flex items-center justify-between mt-4 pt-3 border-t border-white/5">
                    <div>
                      <p class="text-[9px] text-gray-600 mb-1">Status</p>
                      <span 
                        :class="{
                          'bg-green-500/20 text-green-400': activity.date_debut < today ? activiteStatus = 'pending': activiteStatus = 'à venir',
                          'bg-amber-500/20 text-amber-400': activity.date_fin > today && activity.date_debut < today ? activiteStatus = 'en cours': activiteStatus = 'à venir',
                          'bg-gray-500/20 text-gray-400': activity.date_fin < today ? activiteStatus = 'terminé': activiteStatus = 'à venir',
                        }"
                        class="inline-block text-[9px] px-2 py-1 rounded border border-current/25 font-bold"
                      >
                       {{ activiteStatus }}
                      </span>
                    </div>
                    <div v-if="activity.ressource" class="text-right">
                      <p class="text-[9px] text-gray-600 mb-1">Resource</p>
                      <a :href="activity.ressource" target="_blank" class="text-[9px] text-[#00babc] hover:text-[#00d1d3] font-bold truncate">
                        View →
                      </a>
                    </div>
                    <div v-if="activity.type != 'brief'">
                      <div v-if="activity.student_id">
                        <button @click="toggle('NoteStudentModal', activity.student_id, activity.binome_id)" class="text-[15px] text-[#00babc] hover:text-[#00d1d3] font-bold truncate border border-[#00babc]/30 rounded-lg px-3 py-1 transition-colors">
                          Noter
                        </button>
                      </div>
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
                        <div class="w-10 h-10 rounded-full bg-[#00babc]/20 border border-[#00babc]/40 flex items-center justify-center text-[10px] font-bold text-[#00babc]">
                          <img :src="student.user?.link_profile" alt="Student Image" class="w-10 h-10 rounded-full">
                        </div>
                        <span class="text-[15px] text-[#00babc] font-bold">{{ student.points || 0 }} POINTS</span>
                      </div>

                      <h3 class="text-white font-bold text-sm truncate">{{ student.user?.fullname || 'Unknown Student' }}</h3>
                      <p class="text-[11px] text-gray-500 truncate mt-1">{{ student.user?.email || 'No email' }}</p>
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

            <section v-if="activTab === 'classes'" class="bg-[#121215] border border-white/10 p-5 sm:p-6 rounded-2xl">
              <div class="mb-6">
                <h1 class="text-white text-lg md:text-xl font-black uppercase tracking-wide">Your Class</h1>
                <p class="text-[11px] text-gray-500 mt-1">Informations completes de votre classe</p>
              </div>

              <div v-if="formateurData" class="space-y-6">
                <div class="relative w-full rounded-2xl border border-white/10 overflow-hidden bg-[#0f0f12] h-48 md:h-64">
                  <img
                    :src="formateurData?.link_logo || formateurData?.class_logo || 'https://www.freecodecamp.org/news/content/images/2022/02/arnold-francisca-f77Bh3inUpE-unsplash.jpg'"
                    alt="class_logo"
                    class="w-full h-full object-cover"
                  >
                  <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                  
                  <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h2 class="text-3xl md:text-4xl font-black text-white uppercase tracking-tighter">{{ formateurData?.classe_name || 'N/A' }}</h2>
                  </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                  <div class="bg-[#0f0f12] border border-white/10 rounded-xl p-4">
                    <p class="text-[9px] text-gray-600 uppercase tracking-widest font-bold mb-2">Class Name</p>
                    <p class="text-base font-bold text-white">{{ formateurData?.classe_name || 'N/A' }}</p>
                  </div>

                  <div class="bg-[#0f0f12] border border-white/10 rounded-xl p-4">
                    <p class="text-[9px] text-gray-600 uppercase tracking-widest font-bold mb-2">Campus</p>
                    <p class="text-base font-bold text-white">{{ formateurData?.campus || 'N/A' }}</p>
                  </div>

                  <div class="bg-[#0f0f12] border border-white/10 rounded-xl p-4">
                    <p class="text-[9px] text-gray-600 uppercase tracking-widest font-bold mb-2">Capacity</p>
                    <p class="text-base font-bold text-white">{{ formateurData?.capacite || '0' }} Students</p>
                  </div>

                  <div class="bg-[#0f0f12] border border-white/10 rounded-xl p-4">
                    <p class="text-[9px] text-gray-600 uppercase tracking-widest font-bold mb-2">Created At</p>
                    <p class="text-base font-bold text-white">{{ formatDate(formateurData?.created_at) || 'N/A' }}</p>
                  </div>

                  <div class="bg-[#0f0f12] border border-white/10 rounded-xl p-4">
                    <p class="text-[9px] text-gray-600 uppercase tracking-widest font-bold mb-2">Current Students</p>
                    <p class="text-base font-bold text-[#00babc]">{{ students.length || 0 }}</p>
                  </div>
                  

                  <div class="bg-[#0f0f12] border border-white/10 rounded-xl p-4">
                    <p class="text-[9px] text-gray-600 uppercase tracking-widest font-bold mb-2">Occupancy Rate</p>
                    <p class="text-base font-bold text-white">{{ Math.round((students.length / (formateurData?.capacite || 1)) * 100) }}%</p>
                  </div>
                </div>
              </div>
            </section>

            <section v-if="activTab==='absences'" class="bg-[#121215] border border-white/10 rounded-2xl p-5 sm:p-6">
              <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                  <h1 class="text-white text-lg md:text-xl font-black uppercase tracking-wide">Absences</h1>
                  <p class="text-[11px] text-gray-500 mt-1">Suivi des absences et validation des justifications</p>
                </div>
                <button @click="toggle('AbsenceModal')" class="flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-bold text-gray-300 transition-colors hover:border-[#00babc]/40 hover:bg-[#00babc]/10 hover:text-[#00babc]">Detect Absence</button>
              </div>

              <div v-if="studentAbsences" class="grid grid-cols-1 xl:grid-cols-3 gap-4">
                <article v-for="Absences in studentAbsences" :key="Absences.id" class="rounded-2xl border border-white/10 bg-[#0f0f12] p-4 sm:p-5 hover:border-[#00babc]/40 transition-colors">
                  <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                      <p class="text-[9px] uppercase tracking-[0.25em] text-gray-500">Absence #01</p>
                      <h3 class="mt-1 text-sm font-bold text-white">Monday, 08:30</h3>
                    </div>
                    <span class="rounded-full border border-amber-400/25 bg-amber-400/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-amber-300">Pending</span>
                  </div>

                  <div class="space-y-2 text-[11px] text-gray-300">
                    <p><span class="text-gray-500">Student:</span> John Doe</p>
                    <p><span class="text-gray-500">Duration:</span> 00:15</p>
                    <p><span class="text-gray-500">Status:</span> Late</p>
                    <p><span class="text-gray-500">Reason:</span> No reason added yet</p>
                  </div>

                  <div class="mt-5 flex items-center justify-between gap-3 border-t border-white/5 pt-4">
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest">Waiting for justification</p>
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
              <option value="veille">Veille</option>
              <option value="debriefing">Debriefing</option>
            </select>
          </div>
          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Student</label>
            <select v-model="student_id" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
              <option value="">Select Student</option>
              <option v-for="student in students" :key="student.student_id" :value="student.student_id">
                {{ student.student_name }}
              </option>
            </select>
          </div>
          <div>
            <label class="text-[10px] uppercase tracking-widest text-gray-400">Binome</label>
            <select v-model="binome_id" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]">
              <option value="">Select Student</option>
              <option v-for="student in students" :key="student.student_id" :value="student.student_id">
                {{ student.student_name }}
              </option>
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
          <button type="submit" class="md:col-span-2 bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold px-4 py-2 rounded text-xs uppercase tracking-widest">
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
    <div class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" id="AbsenceModal">
      <div class="w-full max-w-3xl overflow-hidden rounded-3xl border border-white/10 bg-[#121215] shadow-[0_30px_100px_rgba(0,0,0,0.75)] max-h-[90vh] overflow-y-auto">
        <div class="border-b border-white/10 bg-[linear-gradient(90deg,rgba(0,186,188,0.12),rgba(255,255,255,0.03))] px-6 py-5 md:px-7">
          <div class="flex items-start justify-between gap-4">
            <div>
              <h2 class="mt-2 text-xl font-black uppercase tracking-wider text-white md:text-2xl">Detect Absence</h2>
            </div>
            <button type="button" @click="toggle('AbsenceModal')" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-lg font-bold text-gray-300 transition-colors hover:border-red-400/40 hover:bg-red-500/10 hover:text-red-300">×</button>
          </div>
        </div>

        <form @submit.prevent="submitAbsence" class="grid grid-cols-1 gap-4 px-6 py-6 md:grid-cols-2 md:px-7">
          <div class="space-y-1.5 md:col-span-2">
            <label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Student</label>
            <select v-model="absence_user_id" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors focus:border-[#00babc] focus:bg-[#0f1218]" required>
              <option value="">Select student</option>
              <option v-for="student in students" :key="student.student_id" :value="student.student_id">
                {{ student.student_name }}
              </option>
            </select>
          </div>

          <div class="space-y-1.5">
            <label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Duration</label>
            <input v-model="absence_duree_heure_retard" type="number" min="0" max="4" step="1" placeholder="0" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]" required>
          </div>

          <div class="space-y-1.5">
            <label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Duration</label>
            <input v-model="absence_duree_minute_retard" type="number" min="0" max="59" step="1" placeholder="15" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors placeholder:text-gray-500 focus:border-[#00babc] focus:bg-[#0f1218]" required>
          </div>

          <div class="space-y-1.5">
            <label class="block text-[10px] uppercase tracking-[0.22em] text-gray-400">Status</label>
            <select v-model="absence_status" class="w-full rounded-2xl border border-white/10 bg-[#0c0f14] px-4 py-3 text-sm text-white outline-none transition-colors focus:border-[#00babc] focus:bg-[#0f1218]" required>
              <option value="late">Late</option>
              <option value="absent">Absent</option>
              <option value="excused">Excused</option>
            </select>
          </div>
          <div class="md:col-span-2 flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-end">
            <button type="button" @click="toggle('AbsenceModal')" class="rounded-2xl border border-white/10 bg-white/5 px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-gray-300 transition-colors hover:bg-white/10 hover:text-white">Cancel</button>
            <button type="submit" class="rounded-2xl bg-[#00babc] px-5 py-3 text-xs font-bold uppercase tracking-[0.22em] text-[#121215] transition-colors hover:bg-[#00d1d3]">Submit Absence</button>
          </div>
        </form>
      </div>
    </div>
    <div id="NoteStudentModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
      <div class="w-full max-w-md rounded-xl border border-white/10 bg-[#121215] p-5 md:p-6">
        <div class="flex items-center justify-between mb-5">
          <h2 class="text-sm md:text-base font-black uppercase tracking-widest text-[#00babc]">Grade Student</h2>
          <button @click="toggle('NoteStudentModal')" class="text-gray-400 hover:text-red-400 text-xl leading-none">x</button>
        </div>
        <form @submit.prevent="submitGradeStudent" class="grid grid-cols-1 gap-4">
          
          <div>
            <label for="maitrisesujet" class="text-[10px] uppercase tracking-widest text-gray-400">Maitrise du Sujet</label>
            <input v-model="maitrisesujet" id="maitrisesujet" type="number" min="0" max="25" step="1" placeholder="Enter grade (0-25)" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" required>
          </div>

          <div>
            <label for="applicationtechnique" class="text-[10px] uppercase tracking-widest text-gray-400">Application Technique</label>
            <input v-model="applicationtechnique" id="applicationtechnique" type="number" min="0" max="30" step="1" placeholder="Enter grade (0-30)" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" required>
          </div>

          <div>
            <label for="communicationpedagogique" class="text-[10px] uppercase tracking-widest text-gray-400">Communication Pedagogique</label>
            <input v-model="communicationpedagogique" id="communicationpedagogique" type="number" min="0" max="30" step="1" placeholder="Enter grade (0-30)" class="w-full mt-1 bg-[#0f0f12] border border-white/10 rounded p-2.5 text-sm text-white outline-none focus:border-[#00babc]" required>
          </div>

          <p class="text-sm text-gray-400">Grade: {{ GradeResult }}</p>

          <button type="button" @click="calculateGrade" class="bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold px-4 py-2 rounded text-xs uppercase tracking-widest">
            Calcul Grade
          </button>
          <button type="submit" class="bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold px-4 py-2 rounded text-xs uppercase tracking-widest">
            Submit Grade
          </button>
        </form>
      </div>
    </div>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    const today = new Date().toISOString().split('T')[0];

    return {
      activTab: 'profile',
      user: null,
      students: [],
      activites:null,
      formateurData: null,
      nom: '',
      description: '',
      type: 'brief',
      ressource: '',
      etat: 'pending',
      date_debut: '',
      date_fin: '',
      student_id: '',
      binome_id: '',
      allStudents: [],
      selectedStudentId: '',
      promotion: '',
      annee: String(new Date().getFullYear()),
      selectedDelegateStudentId: '',
      activiteStatus: '',
      studentAbsences: [],
      absence_user_id: '',
      absence_heure_debut: '',
      absence_duree_minute_retard: '',
      absence_duree_heure_retard: '',
      absence_duree_retard: '',
      absence_status: 'late',
      showSidebar: false,
      today,
      absence_jour: today,
      isDesktop: false,
      ActiviteStudentId: '',
      ActiviteStudentId2: '',
      maitrisesujet: 0,
      applicationtechnique: 0,
      communicationpedagogique: 0,
      GradeResult: 0,
    };
  },
  methods: {
    convertominutes(minutes) {
      const hour = Math.floor(minutes / 60);
      const min = minutes % 60;
      return `${String(hour).padStart(2, '0')}:${String(min).padStart(2, '0')}`;
    },
    handleResize() {
      this.isDesktop = window.innerWidth >= 768;
      if (this.isDesktop) {
        this.showSidebar = false;
      }
    },
    closeSidebar() {
      this.showSidebar = false;
    },
    calculateGrade() {
      const avg = (this.maitrisesujet + this.applicationtechnique + this.communicationpedagogique) / 3;
      const grade = Math.floor(avg) + 10;
      this.GradeResult = grade;

    },
    async submitCreateActivity() {
      const classeId = this.formateurData?.classe_id || this.formateurData?.id;
      const formateurId = this.formateurData?.formateur_id || this.user?.id;

      try {
        await api.post('/createactivites', {
          nom: this.nom,
          description: this.description,
          type: this.type,
          formateur_id: formateurId,
          student_id: this.student_id || null,
          binome_id: this.binome_id || null,
          classe_id: classeId,
          ressource: this.ressource || '',
          etat: this.etat,
          date_debut: this.date_debut,
          date_fin: this.date_fin,
        });

        await this.getActivities();
        this.resetActivityForm();
        this.toggle('CreateActivityModal');
      } catch (error) {
        console.error('Error creating activity:', error);
      }
    },
    resetActivityForm() {
      this.nom = '';
      this.description = '';
      this.type = 'brief';
      this.ressource = '';
      this.etat = 'pending';
      this.date_debut = '';
      this.date_fin = '';
      this.student_id = '';
      this.binome_id = '';
    },
    async submitAbsence() {
      try {
        const dureeMinutes = Number(this.absence_duree_heure_retard || 0) * 60 + Number(this.absence_duree_minute_retard || 0);
        const dureeRetard = this.convertominutes(dureeMinutes);

        this.absence_duree_retard = dureeRetard;

        await api.post('/absences', {
          user_id: this.absence_user_id,
          jour: this.absence_jour,
          duree_retard: dureeRetard,
        });

        console.log('Absence submitted:', this.absence_user_id, this.absence_jour, dureeRetard);

        await this.getStudents();
        this.toggle('AbsenceModal');
      } catch (error) {
        console.error('Error creating absence:', error);
      }
    },
    async getAllStudents() {
      try {
        const response = await api.get('/getstudents');
        this.allStudents = response.data?.allStudents || [];
        console.log('Fetched all students:', this.allStudents);
      } catch (error) {
        console.error('Error fetching students:', error);
      }
    },
    async getStudents() {
      try {
        const response = await api.get('/students');
        this.students = response.data.students || [];
        this.studentAbsences = response.data.studentAbsences || [];
        console.log('Fetched student absences:', this.studentAbsences);
        console.log('Fetched students:', this.students);
      } catch (error) {
        console.error('Error fetching students:', error);
      }
    },
    async getActivities() {
      try {
        const response = await api.get('/activites');
        this.activites = response.data.activites || [];
        console.log('Fetched activities:', this.activites);
      } catch (error) {
        console.error('Error fetching activities:', error);
      }
    },
    async getFormateurData() {
      try {
        const response = await api.get('/formateurdata');
        const raw = response.data?.formateurData?.[0] || null;

        if (!raw) {
          this.formateurData = null;
          return;
        }

        const currentClass = Array.isArray(raw.classes) ? raw.classes[0] : null;
        const delegate = Array.isArray(currentClass?.delegate) ? currentClass.delegate[0] : null;

        this.formateurData = {
          ...raw,
          formateur_id: raw.id,
          formateur_name: raw.fullname,
          classe_id: currentClass?.id || null,
          classe_name: currentClass?.nom || null,
          capacite: currentClass?.capacite || null,
          class_logo: currentClass?.link_logo || null,
          delegate_name: delegate?.fullname || null,
          classes: currentClass,
        };

        console.log('Fetched formateur data:', this.formateurData);
      } catch (error) {
        console.error('Error fetching formateur data:', error);
      }
    },
    formatDate(isDate) {
      const isdate = new Date(isDate);
      return isdate.toLocaleDateString();
    },
    logout() {
      localStorage.clear();
      window.location.href = '/';
    },
    async submitAddStudent() {
      try {
        const formateurId = this.formateurData?.formateur_id || this.user?.id;
        const classeId = this.formateurData?.classe_id;

        if (!formateurId || !classeId) {
          console.error('Missing formateur_id or classe_id. Ensure the formateur is assigned to a class.');
          return;
        }

        await api.post('/assignstudentclasse', {
          user_id: this.selectedStudentId,
          points: 0,
          promotion: this.promotion,
          annee: this.annee,
          formateur_id: formateurId,
          classe_id: classeId,
        });
        await this.getStudents();
        this.selectedStudentId = '';
        this.promotion = '';
        this.toggle('AddStudentModal');
      } catch (error) {
        console.error('Error assigning student to class:', error);
      }
    },
    async submitAssignDelegate() {
      try {
        const classeId = this.formateurData?.classe_id;

        if (!this.selectedDelegateStudentId || !classeId) {
          console.error('Please select a student and ensure a class is assigned.');
          return;
        }

        await api.post('/assigndelegate', {
          student_id: this.selectedDelegateStudentId,
          classe_id: classeId,
        });

        await this.getStudents();
        this.selectedDelegateStudentId = '';
        this.toggle('AssignDelegateModal');
        console.log('Delegate assigned successfully');
      } catch (error) {
        console.error('Error assigning delegate:', error);
      }
    },
    async submitGradeStudent() {
      this.calculateGrade();
      console.log('Submitting grade for student_id:', this.ActiviteStudentId, 'binome_id:', this.ActiviteStudentId2, 'grade:', this.GradeResult);
      try {
         await api.post('/gradestudent', {
          student_id: this.ActiviteStudentId ||null,
          binome_id: this.ActiviteStudentId2 || null,
          grade: this.GradeResult,
        });
        

        await this.getActivities();
        this.toggle('NoteStudentModal');
      } catch (error) {
        console.error('Error grading student:', error);
      }
    },
    toggle(id, id2, id3) {
      this.ActiviteStudentId = id2 || '';
      this.ActiviteStudentId2 = id3 || '';

      console.log('Toggling modal:', id, 'with student_id:', this.ActiviteStudentId, 'and binome_id:', this.ActiviteStudentId2);

      const element = document.getElementById(id);
      if (!element) return;

      if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
      } else {
        element.classList.add('hidden');
      }
    },
  },
  mounted() {
    const data = localStorage.getItem('user');
    if (data) {
      this.user = JSON.parse(data);
    }

    this.getStudents();
    this.getAllStudents();
    this.getFormateurData();
    this.getActivities();
    window.addEventListener('resize', this.handleResize);
    this.handleResize();
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.handleResize);
  },
};
</script>