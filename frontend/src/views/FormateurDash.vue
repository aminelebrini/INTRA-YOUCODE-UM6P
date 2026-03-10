<template>
    <div v-if="user" class="flex min-h-screen bg-[#0f0f12] text-white font-sans">
        <aside class="w-64 bg-[#121215] border-r border-white/5 flex flex-col fixed h-full z-20">
      <div class="p-8 border-b border-white/5">
        <img src="@/assets/logo-white.png" alt="Logo" class="w-32 opacity-80 hover:opacity-100 transition-opacity">
        <p class="text-[8px] text-[#00babc] font-mono mt-2 tracking-[0.3em]">ADMIN_PANEL_v1.0</p>
      </div>

      <nav class="flex-1 px-4 py-8 space-y-2">
        <p class="text-[9px] text-gray-600 uppercase tracking-[0.2em] font-bold px-4 mb-4">Main_Menu</p>
        <router-link to="/admindashboard" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          DASHBOARD
        </router-link>

        <router-link to="/activities" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ACTIVITIES
        </router-link>

        <router-link to="/admindashboard" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          STUDENTS
        </router-link>

        <router-link to="/admindashboard" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          CLASSE
        </router-link>

        <router-link to="/admindashboard" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ABSENCES
        </router-link>
        </nav>

      <div class="p-6 bg-[#0c0c0e] border-t border-white/5">
        <div class="flex items-center space-x-3 mb-4">
          <div class="w-8 h-8 rounded-full bg-[#00babc]/20 border border-[#00babc]/40 flex items-center justify-center text-[10px] font-bold text-[#00babc]">
            {{ user?.fullname ? user.fullname.split(' ').map(n => n[0]).join('').toUpperCase() : 'A' }}
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

        <div class="ml-64 flex-1 flex flex-col min-h-screen">
          <main class="flex-1 p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
              <div class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all cursor-default">
                <div class="flex justify-between items-start mb-4">
                  <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                    <i class="fas fa-user-graduate text-xl"></i>
                  </div>
                </div>
                <h3 class="text-gray-400 text-sm font-medium">Total Students</h3>
                <p class="text-2xl font-bold text-white mt-1">1,284</p>
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

              <div>
                <h1>Classe Information</h1>
              </div>
            </div>

            <section class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all">
              <div class="flex flex-row items-center justify-between">
                <h2 class="text-gray-400 text-lg font-bold">Activities List</h2>
                <div class="flex space-x-2">
                  <select class="bg-white/5 border border-white/10 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option disabled selected>Filter By Activity</option>
                    <option value="briefs">Briefs</option>
                    <option value="live-coding">Live Coding</option>
                    <option value="workshop">Workshop</option>
                    <option value="tech-watch">Tech Watch</option> 
                    <option value="debriefing">Debriefing</option> 
                  </select>
                  <button class="bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">
                    Add Activity
                  </button>
                  
                </div>
              </div>
              <div v-if="activities">
              </div>
              <div v-else>
                <p class="text-gray-500 text-sm italic">No activities available. Please select an activity type from the dropdown above.</p>
              </div>
            </section>

            <section class="bg-white/5 border border-white/10 p-5 rounded-2xl backdrop-blur-sm hover:bg-white/10 transition-all mt-6">
                <div class="flex flex-row items-center justify-between">
                  <h1 class="text-gray-400 text-lg font-bold">Student List</h1>
                  <div class="flex space-x-2">
                    <button class="bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">Add Student</button>
                    <button class="bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">Assign a Student</button>
                    <button class="bg-[#00babc]/20 hover:bg-[#00babc]/30 text-white font-bold py-2 px-4 rounded">Assign a Delegate</button>

                  </div>
                </div>
                <div v-if="students.length > 0">
                  <p class="text-gray-500 text-sm italic">Students available.</p>
                </div>
                <div v-else>
                  <p class="text-gray-500 text-sm italic">No students available. Please add students using the button above.</p>
                </div>
            </section>
          </main>
        </div>
    </div>
</template>

<script setup>
import api from '@/services/api';
import { onMounted , ref} from 'vue';
const user = ref(null);
const students = ref([]);
const activities = ref([]);

    const getStudents = async () => {
      try{
        const response = await api.get('/students');
        students.value = response.data;
      }
      catch(error){
        console.error('Error fetching students:', error);
      }
    }

    const logout = () => {
        localStorage.clear();
        window.location.href = '/';
    };
    onMounted(()=>{
        getStudents();
        const data = localStorage.getItem('user');
        if (data) {
            user.value = JSON.parse(data);
        }
    })
</script>