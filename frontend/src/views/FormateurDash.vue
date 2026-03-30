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

      <div v-for="formateur in formateurEntries" :key="formateur.formateur_id" class="p-6 bg-[#0c0c0e] border-t border-white/5">
        <div class="flex items-center space-x-3 mb-4">
          <div class="w-8 h-8 rounded-full bg-[#00babc]/20 border border-[#00babc]/40 flex items-center justify-center text-[10px] font-bold text-[#00babc]">
            <img :src="user?.link_profile || 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg'" alt="logo" class="w-6 h-6 rounded-full">
          </div>
          <div class="overflow-hidden">
            <p class="text-[11px] font-bold truncate">{{ user?.fullname || 'Admin' }}</p>
            <p class="text-[9px] text-gray-600 truncate">{{ user?.email || 'admin@youcode.ma' }}</p>
            <p class="text-[9px] text-gray-600 truncate">{{ formateur?.classe_name || 'No Class Assigned' }}</p>
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
                <p class="text-2xl font-bold text-white mt-1">{{ students.length }}</p>
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
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(0,186,188,0.18),transparent_45%)]"></div>
                <div class="relative p-4 md:p-6">
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                    <div>
                      <h1 class="text-white font-black uppercase tracking-wider text-sm md:text-base">Classe Information</h1>
                      <p class="text-[10px] md:text-xs text-gray-500 mt-1">Overview of the assigned class</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase border border-[#00babc]/30 bg-[#00babc]/10 text-[#00babc]">
                      {{ currentClasse ? 'Assigned' : 'Unassigned' }}
                    </span>
                  </div>

                  <div v-if="currentClasse" class="grid grid-cols-1 lg:grid-cols-5 gap-4 md:gap-5">
                    <div class="lg:col-span-2">
                      <img
                        :src="currentClasse?.link_logo || currentClasse?.class_logo || 'https://www.freecodecamp.org/news/content/images/2022/02/arnold-francisca-f77Bh3inUpE-unsplash.jpg'"
                        alt="class_logo"
                        class="w-full h-44 sm:h-52 object-cover rounded-xl border border-white/10"
                      >
                    </div>

                    <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Class Name</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ currentClasse?.classe_name || currentClasse?.name || 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Formator</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ user?.fullname || 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Created At</p>
                        <p class="text-sm md:text-base font-semibold text-white">{{ currentClasse?.created_at ? formatDate(currentClasse.created_at) : 'N/A' }}</p>
                      </div>

                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Campus</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ currentClasse?.campus || 'N/A' }}</p>
                      </div>
                      <div class="bg-white/5 border border-white/10 rounded-xl p-3">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Capacity</p>
                        <p class="text-sm md:text-base font-semibold text-white truncate">{{ currentClasse?.capacite || 'N/A' }}</p>
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

            <section v-if="activTab=== 'activities'" class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all">
              <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <h2 class="text-gray-400 text-lg font-bold">Activities List</h2>
                <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                  <select class="w-full sm:w-auto bg-white/5 border border-white/10 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option disabled selected>Filter By Activity</option>
                    <option value="briefs">Briefs</option>
                    <option value="live-coding">Live Coding</option>
                    <option value="workshop">Workshop</option>
                    <option value="tech-watch">Tech Watch</option> 
                    <option value="debriefing">Debriefing</option> 
                  </select>
                  <button class="w-full sm:w-auto bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">
                    Add Activity
                  </button>
                  
                </div>
              </div>
              <div v-if="activities">
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

            <section v-if="activTab=== 'students'" class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all mt-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                  <h1 class="text-gray-400 text-lg font-bold">Student List</h1>
                  <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    <button class="w-full sm:w-auto bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">Add Student</button>
                    <button class="w-full sm:w-auto bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">Assign a Delegate</button>
                  </div>
                </div>
                <div v-if="students.length > 0">
                  <p class="text-gray-500 text-sm italic">Students available.</p>
                  <div v-for="student in students" :key="student.id">
                    
                    <p class="text-white text-sm">{{ student.fullname }}</p>  
                  </div>
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
</template>

<script setup>
import api from '@/services/api';
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';

const activTab = ref('profile');
const user = ref(null);
const students = ref([]);
const activities = ref([]);
const formateurData = ref([]);
const showSidebar = ref(false);
const isDesktop = ref(window.innerWidth >= 768);

const formateurEntries = computed(() => {
  const rows = formateurData.value?.formateurData;
  if (!Array.isArray(rows) || !user.value?.id) return [];
  return rows.filter((f) => f.formateur_id === user.value.id);
});

const currentClasse = computed(() => {
  if (!formateurEntries.value.length) return null;
  return formateurEntries.value[0];
});

const handleResize = () => {
  isDesktop.value = window.innerWidth >= 768;
  if (isDesktop.value) {
    showSidebar.value = false;
  }
};

const closeSidebar = () => {
  showSidebar.value = false;
};

    const getStudents = async () => {
      try{
        const response = await api.get('/students');
        students.value = response.data;
        console.log('Fetched students:', students.value);
      }
      catch(error){
        console.error('Error fetching students:', error);
      }
    }

    const getFormateurData = async () => {
      try{
        const response = await api.get('/formateurdata');
        formateurData.value = response.data;
           
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
      getFormateurData();
      window.addEventListener('resize', handleResize);
      handleResize();
    });

    onBeforeUnmount(() => {
      window.removeEventListener('resize', handleResize);
    });
</script>