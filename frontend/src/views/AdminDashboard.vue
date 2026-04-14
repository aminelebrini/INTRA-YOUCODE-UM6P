<template>
  <div class="flex items-start min-h-screen w-full bg-[#0f0f12] text-white font-sans overflow-x-hidden">
    
    <aside 
      :class="[
      showSidebar ? 'translate-x-0 md:translate-x-0' : '-translate-x-full md:translate-x-0',
      'left-0 top-0 w-72 max-w-[85%] md:w-64 bg-[#121215] border-r border-white/5 flex flex-col fixed h-full z-30 transition-transform duration-300'
    ]"
    class="left-0 top-0 w-72 max-w-[85%] md:w-64 bg-[#121215] border-r border-white/5 flex flex-col fixed h-full z-30 transition-transform duration-300">
      <div class="p-6 md:p-8 border-b border-white/5">
        <img src="@/assets/logo-white.png" alt="Logo" class="w-28 md:w-32 opacity-80 hover:opacity-100 transition-opacity">
        <p class="text-[8px] text-[#00babc] font-mono mt-2 tracking-[0.3em]">ADMIN_PANEL_v1.0</p>
      </div>

      <nav class="flex-1 px-3 md:px-4 py-6 md:py-8 space-y-2">
        <p class="text-[9px] text-gray-600 uppercase tracking-[0.2em] font-bold px-4 mb-4">Main_Menu</p>
        <router-link to="/admindashboard" :class="activTab==='profile'" @click="activTab='profile'" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          PROFILE
        </router-link>

        <router-link to="/admindashboard" :class="activTab==='dashboard'" @click="activTab = 'dashboard'" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          DASHBOARD
        </router-link>

        <router-link to="/admindashboard" :class="activTab==='personnel'" @click="activTab = 'personnel'" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          PERSONNEL
        </router-link>

        <router-link to="/admindashboard" :class="activTab==='classes'" @click="activTab = 'classes'" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          CLASSES
        </router-link>

        <router-link to="/admindashboard" :class="activTab==='absences'" @click="activTab = 'absences'" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ABSENCES
        </router-link>

        <router-link to="/admindashboard" :class="activTab==='annance'" @click="activTab = 'annance'" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ANNANCE
        </router-link>
      </nav>

      <div class="p-6 md:p-10 bg-[#0c0c0e] border-t border-white/5">
        <div class="flex items-center space-x-3 mb-4">
          <div class="w-8 h-8 rounded-full bg-[#00babc]/20 border border-[#00babc]/40 flex items-center justify-center text-[10px] font-bold text-[#00babc]">
            <img :src="user?.link_profile || 'https://intranet.youcode.ma/storage/users/profile/0.jpg'" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
          </div>
          <div class="overflow-hidden">
            <p class="text-[11px] font-bold truncate">{{ user?.fullname || 'Admin' }}</p>
            <p class="text-[9px] text-gray-600 truncate">{{ user?.email || 'admin@youcode.ma' }}</p>
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
      class="fixed inset-0 bg-black/60 z-20 md:hidden">
    </button>

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
            <img src="@/assets/bg.jpg" class="w-full h-full object-cover object-center" alt="header_bg">
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 to-black/40 backdrop-blur-[2px]"></div>
          </div>

          <div class="relative z-10 w-full flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-4 md:gap-6 min-w-0">
              <div class="relative shrink-0">
                <img 
                    :src="user?.link_profile || 'https://intranet.youcode.ma/storage/users/profile/0.jpg'" 
                    alt="user_profile" 
                    class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full border-2 border-[#00babc] object-cover shadow-[0_0_15px_rgba(0,186,188,0.3)]">
                <div class="absolute bottom-1 right-1 w-3 h-3 bg-green-500 border-2 border-black rounded-full"></div>
              </div>

              <div class="flex flex-col justify-center min-w-0">
                <h2 class="text-white font-black uppercase tracking-tighter text-sm sm:text-xl md:text-3xl leading-tight truncate">
                  {{ user?.fullname || 'AMINE LEBRINI' }}
                </h2>
                <span class="text-[8px] md:text-[10px] text-white/50 font-mono tracking-widest truncate">
                    ID: {{ user?.username || 'aminelebrini' }}
                  </span>
              </div>
            </div>

            <div class="flex flex-col justify-center min-w-0 w-full md:w-auto md:items-end">
              <h2 class="text-white font-black uppercase tracking-tighter text-xs sm:text-base md:text-2xl leading-tight break-all md:break-normal md:text-right">
                {{ user?.email || 'a.lebrini@staff.youcode.ma' }}
              </h2>
              <div class="flex flex-row items-center justify-start gap-2 mt-1 md:mt-2">
                <span class="text-[8px] md:text-[10px] text-white/50 font-mono tracking-widest truncate">
                    Role: {{ user?.role || 'ADMIN' }}
                  </span>
              </div>
            </div>
          </div>
        </header>

        <section v-if="activTab === 'personnel'" class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-xl shadow-2xl">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-8 md:mb-10">
              <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">
                Personnel Management
              </h3>
              <button @click="oppenToggle('CreatePersonnalModal')" 
                      class="w-full sm:w-auto bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] text-[11px] font-bold uppercase tracking-widest py-2.5 px-4 md:px-6 rounded-lg transition-all duration-300 transform active:scale-95 shadow-lg shadow-[#00babc]/10">
                Create Personnel
              </button>
          </div>

          <div v-if="users && users.length > 0" class="w-full overflow-x-auto">
            <table class="w-full min-w-[620px] border-collapse">
              <thead>
                <tr class="text-left text-[10px] text-gray-500 uppercase tracking-[0.2em] border-b border-white/5">
                  <th class="pb-4 font-black">Full Name</th>
                  <th class="pb-4 font-black">Email Address</th>
                  <th class="pb-4 font-black">username</th>
                  <th class="pb-4 font-black">Designation / Role</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-white/[0.03]">
                <tr v-for="u in users.filter(e => e.id !== user?.id)" :key="u.id" class="group hover:bg-white/[0.02] transition-colors">
                  <td class="flex flex-row justify-content items-center py-5 text-sm text-gray-200 font-medium group-hover:text-[#00babc] transition-colors">
                    <img :src="u?.link_profile || 'https://intranet.youcode.ma/storage/users/profile/0.jpg'" alt="logo" class="w-8 h-8 rounded-full object-cover mr-2">
                      {{ u?.fullname || 'AMINE LEBRINI' }}
                  </td>
                    <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                      {{ u?.email || 'example@example.com' }}
                    </td>
                    <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                      {{ u?.username || 'username' }}
                    </td>
                  <td class="py-5">
                    <span class="text-[10px] font-bold px-2 py-1 rounded bg-white/5 border border-white/10 text-gray-300 uppercase tracking-tighter">
                     {{ u?.role || 'User' }}
                    </span>
                  </td>
                  <td class="py-5 text-right">
                    <button @click="oppenToggle('EditPersonnelModal', u)" class="text-[10px] font-bold px-2 py-1 rounded bg-white/5 border border-white/10 text-gray-300 uppercase tracking-tighter hover:bg-[#00babc] hover:text-[#121215] transition-colors">
                      Edit
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
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

        <section v-if="activTab=== 'dashboard'" class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-lg mt-6 flex flex-col items-start justify-center">
          <div class="text-center">
            <h2 class="text-[#00babc] text-2xl font-black uppercase italic tracking-widest mb-4">
              Welcome to Admin Dashboard
            </h2>
          </div>
          <div class="flex items-center justify-center gap-6 mt-6 w-full">
            <div class="bg-[#1a1a1e] border border-white/10 rounded-lg p-6 w-full max-w-xs text-center">
              <div class="flex items-center justify-center gap-2 mb-3 text-[#00babc]">
                <i class="fas fa-users text-xl"></i>
                <p class="text-[11px] text-gray-400 font-mono uppercase tracking-wider">Total Users</p>
              </div>
              <p class="text-4xl font-black text-white leading-none">{{ totalUsers }}</p>
            </div>
            <div class="bg-[#1a1a1e] border border-white/10 rounded-lg p-6 w-full max-w-xs text-center">
              <div class="flex items-center justify-center gap-2 mb-3 text-[#00babc]">
                <i class="fas fa-chalkboard-teacher text-xl"></i>
                <p class="text-[11px] text-gray-400 font-mono uppercase tracking-wider">Total Classes</p>
              </div>
              <p class="text-4xl font-black text-white leading-none">{{ totalClasses }}</p>
            </div>
            <div class="bg-[#1a1a1e] border border-white/10 rounded-lg p-6 w-full max-w-xs text-center">
              <div class="flex items-center justify-center gap-2 mb-3 text-[#00babc]">
                <i class="fas fa-user-tie text-xl"></i>
                <p class="text-[11px] text-gray-400 font-mono uppercase tracking-wider">Total Formateurs</p>
              </div>
              <p class="text-4xl font-black text-white leading-none">{{ totalFormateurs }}</p>
            </div>
            <div class="bg-[#1a1a1e] border border-white/10 rounded-lg p-6 w-full max-w-xs text-center">
              <div class="flex items-center justify-center gap-2 mb-3 text-[#00babc]">
                <i class="fas fa-user-slash text-xl"></i>
                <p class="text-[11px] text-gray-400 font-mono uppercase tracking-wider">Total Absences</p>
              </div>
              <p class="text-4xl font-black text-white leading-none">{{ totalAbsences }}</p>
            </div>
              <div class="bg-[#1a1a1e] border border-white/10 rounded-lg p-6 w-full max-w-xs text-center">
                <div class="flex items-center justify-center gap-2 mb-3 text-[#00babc]">
                  <i class="fas fa-user-slash text-xl"></i>
                  <p class="text-[11px] text-gray-400 font-mono uppercase tracking-wider">Abandoned Students</p>
                </div>
                <p class="text-4xl font-black text-white leading-none">{{ totalAbandonedStudents }}</p>
              </div>
          </div>

        </section>

        <section v-if="activTab === 'classes'" class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-lg mt-6">
          <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3 mb-8">
              <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">Classes Management</h3>
              <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-3 w-full lg:w-auto">
                <button @click="oppenToggle('createClassModal')" class="w-full sm:w-auto bg-transparent border border-[#00babc] text-[#00babc] font-bold py-2 px-4 rounded hover:bg-[#00babc] hover:text-[#121215] transition-all text-[11px] uppercase tracking-widest">
                  Create Class
                </button>
                <button @click="oppenToggle('AssignClassFormatorModal')" class="w-full sm:w-auto bg-[#00babc] text-[#121215] font-bold py-2 px-4 rounded hover:bg-[#00d1d3] transition-all text-[11px] uppercase tracking-widest">
                  Assign a Formator
                </button>
              </div>
          </div>

          <div v-if="classes && classes.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div v-for="classe in classes" :key="classe.id" class="bg-[#1a1a1e] border border-white/10 hover:border-[#00babc]/60 rounded-lg p-5 transition-all duration-300 hover:shadow-lg hover:shadow-[#00babc]/20 cursor-pointer">
              
              <div class="flex items-start justify-between gap-3 mb-4">
                <div class="flex items-center gap-3 flex-1">
                  <img :src="classe?.link_logo || 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Google_Classroom_Logo.svg/250px-Google_Classroom_Logo.svg.png'" alt="" class="w-10 h-10 rounded-lg object-cover">
                  <div class="min-w-0 flex-1">
                    <h4 class="text-white font-bold text-sm truncate">{{ classe?.nom || 'Unnamed Class' }}</h4>
                    <p class="text-gray-500 text-xs">{{ classe?.promo || 'N/A' }}</p>
                  </div>
                </div>
                <span :class="['px-2.5 py-1 rounded text-[7px] font-bold whitespace-nowrap',
                  classe?.formateur ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400'
                ]">
                  {{ classe?.formateur ? 'Assigned' : 'Unassigned' }}
                </span>
              </div>

              <div class="border-t border-white/5 mb-4"></div>

              <div class="space-y-2.5 text-sm">
                <div class="flex justify-between items-center">
                  <span class="text-gray-500">Capacity</span>
                  <span class="text-white font-semibold">{{ classe?.capacite || 0 }}</span>
                </div>
                <div class="flex justify-between items-center">
                  <span class="text-gray-500">Formator</span>
                  <span class="text-gray-300 text-xs truncate max-w-[140px]">{{ classe.formateurs?.fullname || 'None' }}</span>
                </div>
                <div class="flex justify-between items-center">
                  <span class="text-gray-500">Campus</span>
                  <span class="text-gray-300 text-xs">{{ classe?.campus || 'N/A' }}</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-white/5">
                  <span class="text-gray-600 text-xs">Created</span>
                  <span class="text-gray-500 text-xs">{{ formatDate(classe.created_at) }}</span>
                </div>
              </div>
            </div>
          </div>
          <div v-else class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
            <p class="text-[10px] text-gray-500 italic font-mono">System_Ready_Waiting_For_Data</p>
            <div class="flex gap-1">
              <span class="w-1 h-1 bg-[#00babc] rounded-full animate-ping"></span>
              <span class="w-1 h-1 bg-[#00babc] rounded-full opacity-50"></span>
            </div>
          </div>
        </section>

        <section v-if="activTab === 'absences'" class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-lg mt-6">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">Absences Management</h3>
            <button @click="oppenToggle('detectAbsencesModal')" class="w-full sm:w-auto bg-[#00babc] text-[#121215] font-bold py-2 px-4 rounded hover:bg-[#00d1d3] transition-all text-[11px] uppercase tracking-widest">
              Detect Absences
            </button>
          </div>
          <div v-if="absences && absences.length > 0" class="mt-8 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="absence in absences"
              :key="absence.id"
              class="rounded-xl border border-white/10 bg-[#0f0f12] p-4"
            >
              <div class="flex items-start justify-between gap-3">
                <p class="text-sm font-semibold text-white">
                  {{ absence.users?.fullname || 'Unknown student' }}
                </p>
                <span
                  class="rounded-full px-2.5 py-1 text-[9px] font-bold uppercase tracking-wider"
                  :class="absence.status ? 'bg-red-500 text-white' : 'bg-yellow-500/20 text-yellow-400'">
                  {{ absence.status || 'Pending' }}
                </span>
              </div>

              <div class="mt-3 space-y-1 text-[11px] text-gray-300">
                <p>
                  <span class="text-gray-500">Date:</span>
                  {{ absence.jour ? formatDate(absence.jour) : '-' }}
                </p>
                <p>
                  <span class="text-gray-500">Duration:</span>
                  {{ absence.duree_retard || '-' }}
                </p>
                <p>
                  <span class="text-gray-500">Motif:</span>
                  {{ absence.motif || '-' }}
                </p>
                <p>
                  <span class="text-gray-500">Type document:</span>
                  {{ absence.justification?.type_document || '-' }}
                </p>
                <p>
                  <span class="text-gray-500">Fichier path:</span>
                  <span class="break-all">{{ absence.justification?.fichier_path || '-' }}</span>
                </p>
                <p>
                  <span class="text-gray-500">Date dépôt:</span>
                  {{ absence.justification?.date_depot ? formatDate(absence.justification.date_depot) : '-' }}
                </p>
              </div>

              <div class="mt-4 flex flex-wrap items-center justify-end gap-2">
                <button
                  type="button"
                  class="rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-[10px] font-bold uppercase tracking-widest text-emerald-300 transition-colors hover:bg-emerald-400/20 disabled:cursor-not-allowed disabled:opacity-40"
                  @click="AbsenceStatus(absence.id, 'justifie',absence.type_document)"
                >
                Justified
                </button>
                <button
                  type="button"
                  class="rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-2 text-[10px] font-bold uppercase tracking-widest text-red-300 transition-colors hover:bg-red-500/20 disabled:cursor-not-allowed disabled:opacity-40"
                  @click="AbsenceStatus(absence.id, 'not_justifie', absence.type_document)"
                >
                Not Justified
                </button>
              </div>
            </div>
          </div>
          <div v-else class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
            <p class="text-[10px] text-gray-500 italic font-mono">System_Ready_Waiting_For_Data</p>
            <div class="flex gap-1">
              <span class="w-1 h-1 bg-[#00babc] rounded-full animate-ping"></span>
              <span class="w-1 h-1 bg-[#00babc] rounded-full opacity-50"></span>
            </div>
          </div>
        </section>

        <section v-if="activTab === 'annance'" class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-lg mt-6">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-8">
            <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">Annance Management</h3>
            <span class="text-[10px] text-gray-500 uppercase tracking-widest">Admin Only | {{ announcements.length }} total</span>
          </div>

          <div class="mb-8">
            <h4 class="text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-4">Existing Annances</h4>
            <div v-if="announcements && announcements.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <div v-for="annance in announcements" :key="annance.id" class="rounded-xl border border-white/10 hover:border-[#00babc]/40 bg-[#0f0f12] p-5 hover:shadow-lg hover:shadow-[#00babc]/10 transition-all">
                <div class="flex items-start justify-between gap-3 mb-3">
                  <div class="flex-1">
                    <p class="text-[9px] uppercase tracking-widest font-bold text-[#00babc] mb-1">{{ annance.categorie || 'information' }}</p>
                    <h5 class="text-sm font-bold text-white line-clamp-2">{{ annance.titre }}</h5>
                  </div>
                  <span class="rounded-full px-2.5 py-1 text-[8px] font-bold uppercase tracking-wider whitespace-nowrap flex-shrink-0" :class="annance.status === 'active' ? 'bg-green-500/20 text-green-300 border border-green-500/30' : 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30'">{{ annance.status || 'pending' }}</span>
                </div>
                <p class="text-[12px] text-gray-300 leading-relaxed mb-4 line-clamp-3">{{ annance.description }}</p>
                <div class="space-y-2 border-t border-white/5 pt-3">
                  <div class="flex items-center justify-between text-[10px]">
                    <span class="text-gray-500">Target:</span>
                    <span class="text-[#00babc] font-bold uppercase">{{ annance.cible || 'tout' }}</span>
                  </div>
                  <div class="flex items-center justify-between text-[10px]">
                    <span class="text-gray-500">Posted:</span>
                    <span class="text-gray-400">{{ formatDate(annance.created_at) }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div v-else class="rounded-2xl border border-dashed border-white/10 bg-white/5 p-6 text-center">
              <p class="text-[11px] text-gray-400">📢 No annance found yet.</p>
            </div>
          </div>

          <div class="pt-6 border-t border-white/5 flex justify-end">
            <button @click="oppenToggle('createAnnanceModal')" class="w-full sm:w-auto bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] text-[11px] font-bold uppercase tracking-widest py-3 px-6 rounded-lg transition-all duration-300">
              + Create New Annance
            </button>
          </div>
        </section>
      </main>
    </div>
  </div>

  <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4 " id="CreatePersonnalModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-md shadow-2xl overflow-y-auto max-h-[90vh]">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Create Personal</h1>
        <button @click="oppenToggle('CreatePersonnalModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <form class="flex flex-col justify-center items-start gap-4 w-[100%]" @submit.prevent="submitRegistration">
        <label for="fullname" class="text-[#00babc] text-[11px] uppercase tracking-widest">FULL NAME</label>
        <input type="text" id="fullname" v-model="fullname" placeholder="FULL NAME" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <label for="email" class="text-[#00babc] text-[11px] uppercase tracking-widest">EMAIL ADDRESS</label>
        <input type="email" id="email" v-model="email" placeholder="EMAIL ADDRESS" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%] ">
        <label for="password" class="text-[#00babc] text-[11px] uppercase tracking-widest">PASSWORD</label>
        <input type="password" id="password" v-model="password" placeholder="PASSWORD" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <label for="link_profile" class="text-[#00babc] text-[11px] uppercase tracking-widest">LINK PROFILE</label>
        <input type="url" id="link_profile" v-model="link_profile" placeholder="LINK PROFILE" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <label for="ville" class="text-[#00babc] text-[11px] uppercase tracking-widest">VILLE</label>
        <input type="text" id="ville" v-model="ville" placeholder="VILLE" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <label for="campus" class="text-[#00babc] text-[11px] uppercase tracking-widest">CAMPUS</label>
        <input type="text" id="campus" v-model="campus" placeholder="CAMPUS" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <label for="role" class="text-[#00babc] text-[11px] uppercase tracking-widest">ROLE</label>
        <input type="text" id="role" v-model="role" placeholder="Formateur" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
          Create Account
        </button>
      </form>
    </div>
  </div>

  <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="EditPersonnelModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-md shadow-2xl overflow-y-auto max-h-[90vh]">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Edit Personnel</h1>
        <button @click="oppenToggle('EditPersonnelModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <form v-if="personnel" class="flex flex-col justify-center items-start gap-4 w-[100%]" @submit.prevent="submitEditPersonnel">
        <label for="edit_fullname" class="text-[#00babc] text-[11px] uppercase tracking-widest">FULL NAME</label>
        <input type="text" id="edit_fullname" v-model="personnel.fullname" placeholder="FULL NAME" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="edit_email" class="text-[#00babc] text-[11px] uppercase tracking-widest">EMAIL ADDRESS</label>
        <input type="email" id="edit_email" v-model="personnel.email" placeholder="EMAIL ADDRESS" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="edit_role" class="text-[#00babc] text-[11px] uppercase tracking-widest">ROLE</label>
        <input type="text" id="edit_role" v-model="personnel.role" placeholder="formateur" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="edit_campus" class="text-[#00babc] text-[11px] uppercase tracking-widest">CAMPUS</label>
        <input type="text" id="edit_campus" v-model="personnel.campus" placeholder="CAMPUS" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="edit_ville" class="text-[#00babc] text-[11px] uppercase tracking-widest">VILLE</label>
        <input type="text" id="edit_ville" v-model="personnel.ville" placeholder="VILLE" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="edit_link_profile" class="text-[#00babc] text-[11px] uppercase tracking-widest">LINK PROFILE</label>
        <input type="url" id="edit_link_profile" v-model="personnel.link_profile" placeholder="https://..." class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <label for="edit_etat" class="text-[#00babc] text-[11px] uppercase tracking-widest">Etat</label>
        <input type="text" id="edit_etat" v-model="personnel.etat" placeholder="Leave empty to keep current password" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]">
        <button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
          Save Changes
        </button>
      </form>
    </div>
  </div>

  <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="createClassModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-md shadow-2xl overflow-y-auto max-h-[90vh]">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Create Class</h2>
        <button @click="oppenToggle('createClassModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <form class="flex flex-col justify-center items-start gap-4 w-[100%]" @submit.prevent="submitClassRegistration">
        <label for="classename" class="text-[#00babc] text-[11px] uppercase tracking-widest">Class Name</label>
        <input type="text" id="classename" v-model="classename" placeholder="A1" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="classecapacity" class="text-[#00babc] text-[11px] uppercase tracking-widest">Capacity</label>
        <input type="number" id="classecapacity" v-model="classecapacity" placeholder="30" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" min="1" required>
        <label for="promo" class="text-[#00babc] text-[11px] uppercase tracking-widest">Promo</label>
        <input type="text" id="promo" v-model="promo" placeholder="2026" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="classeCampus" class="text-[#00babc] text-[11px] uppercase tracking-widest">Campus</label>
        <input type="text" id="classeCampus" v-model="classeCampus" placeholder="Youssoufia" class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <label for="link_logo" class="text-[#00babc] text-[11px] uppercase tracking-widest">Logo Link</label>
        <input type="url" id="link_logo" v-model="link_logo" placeholder="https://..." class="bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm w-[100%]" required>
        <button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
          Create Class
        </button>
      </form>
    </div>
  </div>

  <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="AssignClassFormatorModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-md shadow-2xl overflow-y-auto max-h-[90vh]">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Assign Formator</h2>
        <button @click="oppenToggle('AssignClassFormatorModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <form @submit.prevent="submitClassAssignRegistration" class="space-y-4 w-[100%]">
        <label for="formator" class="text-[#00babc] text-[11px] uppercase tracking-widest">Formator</label>
        <select id="formator" v-model="formator_id" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
          <option value="" disabled>Select Formator</option>
          <option v-for="f in assignformateurs" :key="f.formateur_id" :value="f.formateur_id">{{ f.formateur_name }}</option>
        </select>
        <label for="assignclass" class="text-[#00babc] text-[11px] uppercase tracking-widest">Class</label>
        <select id="assignclass" v-model="assignclass_id" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
          <option value="" disabled>Select Class</option>
          <option v-for="c in assignclasses" :key="c.classe_id" :value="c.classe_id">{{ c.classe_name }}</option>
        </select>
        <button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
          Assign
        </button>
      </form>
    </div>
  </div>

  <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="createAnnanceModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-2xl shadow-2xl overflow-y-auto max-h-[90vh]">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Create New Annance</h2>
        <button @click="oppenToggle('createAnnanceModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form @submit.prevent="submitAnnouncement" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="md:col-span-2">
          <label for="modal_annance_titre" class="text-[#00babc] text-[11px] uppercase tracking-widest font-bold">Title</label>
          <input id="modal_annance_titre" type="text" v-model="announcementTitre" placeholder="Announcement title" class="mt-2 w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
        </div>

        <div class="md:col-span-2">
          <label for="modal_annance_description" class="text-[#00babc] text-[11px] uppercase tracking-widest font-bold">Description</label>
          <textarea id="modal_annance_description" v-model="announcementDescription" rows="5" placeholder="Write announcement details" class="mt-2 w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required></textarea>
        </div>

        <div>
          <label for="modal_annance_status" class="text-[#00babc] text-[11px] uppercase tracking-widest font-bold">Status</label>
          <select id="modal_annance_status" v-model="announcementStatus" class="mt-2 w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
            <option value="active">active</option>
            <option value="pending">pending</option>
          </select>
        </div>

        <div>
          <label for="modal_annance_category" class="text-[#00babc] text-[11px] uppercase tracking-widest font-bold">Category</label>
          <select id="modal_annance_category" v-model="announcementCategorie" class="mt-2 w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
            <option value="information">information</option>
            <option value="cme">cme</option>
            <option value="workshop">workshop</option>
            <option value="evenement">evenement</option>
          </select>
        </div>

        <div class="md:col-span-2">
          <label for="modal_annance_target" class="text-[#00babc] text-[11px] uppercase tracking-widest font-bold">Target Audience</label>
          <select id="modal_annance_target" v-model="announcementCible" class="mt-2 w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
            <option value="tout">All Students</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
          </select>
        </div>

        <div class="md:col-span-2 flex justify-end gap-2">
          <button type="button" @click="oppenToggle('createAnnanceModal')" class="w-full sm:w-auto bg-gray-700 hover:bg-gray-600 text-white text-[11px] font-bold uppercase tracking-widest py-3 px-6 rounded-lg transition-all duration-300">
            Cancel
          </button>
          <button type="submit" class="w-full sm:w-auto bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] text-[11px] font-bold uppercase tracking-widest py-3 px-6 rounded-lg transition-all duration-300">
            Create Annance
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="detectAbsencesModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-[100%] max-w-md shadow-2xl overflow-y-auto max-h-[90vh]">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-[#00babc] font-black uppercase tracking-widest text-sm">Detect Absences</h2>
        <button @click="oppenToggle('detectAbsencesModal')" class="text-[#00babc] hover:text-red-500 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <form @submit.prevent="submitAbsenceDetection" class="space-y-4 w-[100%]">
        <label for="detectClass" class="text-[#00babc] text-[11px] uppercase tracking-widest">Class</label>
        <select id="detectClass" v-model="assignclass" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
          <option value="" disabled>Select Class</option>
          <option v-for="c in assignclasses" :key="c.id" :value="c.id">{{ c.classe_name }}</option>
        </select>
        <label for="detectionDate" class="text-[#00babc] text-[11px] uppercase tracking-widest">Date</label>
        <input type="date" id="detectionDate" v-model="detectionDate" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm" required>
        <button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
          Start Detection
        </button>
      </form>
    </div>
  </div>

  <!-- <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="legacyDetectAbsencesModal">
    <div class="bg-[#121215] border border-white/10 p-8 rounded-lg w-full max-w-md shadow-2xl">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-white font-black uppercase tracking-widest text-sm">Scan / Detect Absences</h2>
        <button @click="oppenToggle('detectAbsencesModal')" class="text-gray-400 hover:text-red-500 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <form @submit.prevent="submitClassAssignRegistration" class="space-y-4">
        <select v-model="formator" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm">
          <option value="" disabled selected>Select Formator</option>
          <option v-for="f in assignformateurs" :key="f.id" :value="f.id">{{ f.formateur_name }}</option>
        </select>
        <select v-model="assignclass" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none text-sm">
          <option value="" disabled selected>Select Class</option>
          <option v-for="c in assignclasses" :key="c.id" :value="c.id">{{ c.classe_name }}</option>
        </select>
         <button type="submit" class="w-full bg-[#00babc] text-[#121215] font-bold py-3 rounded mt-2 hover:bg-[#00d1d3] transition-all uppercase tracking-widest text-xs">
          Start Detection
        </button>
      </form>
    </div>
  </div>  -->
  
</template>

<script>
import api from '@/services/api';

export default {
  name: 'AdminDashboard',
  computed: {
    totalUsers() {
      return Array.isArray(this.users) ? this.users.length : 0;
    },
    totalClasses() {
      return Array.isArray(this.classes) ? this.classes.length : 0;
    },
    totalFormateurs() {
      return Array.isArray(this.users.filter(user => user.role === 'formateur')) ? this.users.filter(user => user.role === 'formateur').length : 0;
    },
    totalAbsences() {
      return Array.isArray(this.absences) ? this.absences.length : 0;
    },
    totalAbandonedStudents() {
      return Array.isArray(this.users.filter(user => user.role === 'student' && user.etat === 'abandoned')) ? this.users.filter(user => user.role === 'student' && user.etat === 'abandoned').length : 0;
    } 
  },
  data() {
    return {
      activTab: 'profile',
      showSidebar: false,
      isDesktop: false,
      user: null,
      fullname: '',
      campus: '',
      role: '',
      link_profile: '',
      ville: '',
      email: '',
      password: '',
      classename: '',
      classecapacity: '',
      link_logo: '',
      promo: '',
      classeCampus: '',
      users: [],
      classes: [],
      absences: [],
      assignformateurs: [],
      assignclasses: [],
      formator_id: '',
      assignclass_id: '',
      assignclass: '',
      detectionDate: '',
      personnel: null,
      announcements: [],
    };
  },
  methods: {
    async submitRegistration() {
      try {
        await api.post('/createuser', {
          fullname: this.fullname,
          campus: this.campus,
          role: this.role,
          link_profile: this.link_profile,
          ville: this.ville,
          email: this.email,
          password: this.password
        });

        await this.Data();
        this.oppenToggle('CreatePersonnalModal');

        this.fullname = '';
        this.campus = '';
        this.role = '';
        this.link_profile = '';
        this.ville = '';
        this.email = '';
        this.password = '';
      } catch (error) {
        console.error('Error creating user:', error?.response?.data || error);
      }
    },

    async submitClassRegistration() {
      try {
        await api.post('/createclasse', {
          nom: this.classename,
          capacite: Number(this.classecapacity),
          promo: this.promo,
          link_logo: this.link_logo,
          campus: this.classeCampus
        });

        await this.Data();
        this.oppenToggle('createClassModal');

        this.classename = '';
        this.classecapacity = '';
        this.promo = '';
        this.link_logo = '';
        this.classeCampus = '';
      } catch (error) {
        console.error('Error creating class:', error?.response?.data || error);
      }
    },

    async submitClassAssignRegistration() {
      try {
        console.log('Assign Formateur:', this.formator_id, 'to Class:', this.assignclass_id);
        await api.post('/assignformateurclasse', {
          formateur_id: this.formator_id,
          classe_id: this.assignclass_id
        });

        await this.Data();
        this.oppenToggle('AssignClassFormatorModal');
        this.formator_id = '';
        this.assignclass_id = '';
      } catch (error) {
        console.error('Error assigning formateur to class:', error?.response?.data || error);
      }
    },
    async AbsenceStatus(id, status, typeDocument) {
      try {
        await api.post('/validateabsence', {
          absence_id: id,
          status,
          type_document: typeDocument
        });

        await this.Data();
      } catch (error) {
        console.error('Error validating absence:', error?.response?.data || error);
      }
    },
    async submitEditPersonnel()
    {
      try{
        await api.put('/updateusers', {
          id: this.personnel.id,
          fullname: this.personnel.fullname,
          email: this.personnel.email,
          role: this.personnel.role,
          campus: this.personnel.campus,
          ville: this.personnel.ville,
          link_profile: this.personnel.link_profile,
          etat: this.personnel.etat
        });

      }catch(error)
      {
        console.error('Error updating personnel:', error?.response?.data || error);
      }
      await this.Data();
      this.oppenToggle('EditPersonnelModal');
    },

    async submitAnnouncement() {
      try {
        await api.post('/createannouncement', {
          titre: this.announcementTitre,
          description: this.announcementDescription,
          status: this.announcementStatus,
          categorie: this.announcementCategorie,
          cible: this.announcementCible
        });

        this.announcementTitre = '';
        this.announcementDescription = '';
        this.announcementStatus = 'active';
        this.announcementCategorie = 'information';
        this.announcementCible = 'tout';
      } catch (error) {
        console.error('Error creating announcement:', error?.response?.data || error);
      }
    },
    async getAnnouncements() {
      try {
        const response = await api.get('/getannouncements');
        this.announcements = response.data.announcements || [];
        console.log('Fetched Announcements:', this.announcements);
      } catch (error) {
        console.error('Error fetching announcements:', error?.response?.data || error);
      }
    },

    logout() {
      localStorage.clear();
      window.location.href = '/';
    },

    async Data() {
      try {
        const response = await api.get('/data');
        const data = response.data;

        this.users = data.users;
        this.classes = data.classes;
        this.absences = data.absences || [];
        this.assignformateurs = data.assignformateurs;
        this.assignclasses = data.assignclasses;

        console.log('Fetched Data:', {
          users: this.users,
          classes: this.classes,
          absences: this.absences,
          assignformateurs: this.assignformateurs,
          assignclasses: this.assignclasses
        });
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    },
    async allData() {
      try {
        const response = await api.get('/alldata');
        const Data = response.data;
        console.log('All Data:', Data); 
      } catch (error) {
        console.error('Error fetching all data:', error);
      }
    },

    formatDate(isDate) {
      const date = new Date(isDate);
      return date.toLocaleDateString();
    },

    oppenToggle(id, user) {
     this.personnel = user || null;

      const modal = document.getElementById(id);
      if (modal) {
        modal.classList.toggle('hidden');
      }
    },

    syncSidebarWithViewport() {
      this.isDesktop = window.innerWidth >= 768;
      this.showSidebar = this.isDesktop;
    },

    closeSidebar() {
      if (!this.isDesktop) {
        this.showSidebar = false;
      }
    }
  },
  mounted() {
    this.Data();
    this.allData();
    this.getAnnouncements();
    this.syncSidebarWithViewport();
    window.addEventListener('resize', this.syncSidebarWithViewport);

    const data = localStorage.getItem('user');
    if (data) {
      this.user = JSON.parse(data);
    }
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.syncSidebarWithViewport);
  }
};
</script>