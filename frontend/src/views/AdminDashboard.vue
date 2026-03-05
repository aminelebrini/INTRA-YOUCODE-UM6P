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

    <div class="flex-1 ml-64 flex flex-col">
      <main class="p-10">
        <header class="relative mb-10 flex justify-between items-center p-6 rounded-lg border border-white/5 overflow-hidden min-h-[180px]">
          <div class="absolute inset-0 z-0">
            <img src="@/assets/bg.jpg" class="w-full h-full object-cover object-center" alt="header_bg">
            <div class="absolute inset-0 bg-black/70 backdrop-blur-[1px]"></div>
          </div>
          <div class="relative z-10 flex items-center gap-5">
            <img src="https://avatars.githubusercontent.com/u/113290995?v=4" alt="user_profile" class="w-16 h-16 rounded-full border-2 border-[#00babc] object-cover">
            <div class="flex flex-col">
              <h2 class="text-white font-black uppercase tracking-tighter text-2xl leading-none">{{ user?.fullname }}</h2>
              <span class="text-[9px] text-[#00babc] font-mono tracking-[0.4em] uppercase mt-1">ACCESS LEVEL: {{ user?.role }}</span>
            </div>
          </div>
        </header>

        <section class="bg-[#121215] border border-white/5 p-8 rounded-lg">
          <h3 class="text-lg font-bold mb-4 uppercase tracking-wide">Student Management</h3>
          <div class="flex flex-row items-center justify-between">
              <p>Student List</p>
              <button @click="oppenToggle('createStudentModal')" class="bg-[#00babc] text-white font-bold py-2 px-4 rounded hover:bg-[#00a89c] transition-colors">
                Create Student
              </button>
          </div>
          <div v-if="user">

          </div>
            <p class="text-xs text-gray-500 italic">// System_Ready_Waiting_For_Data</p>
        </section>
      </main>
    </div>
  </div>
  <div v-else class="min-h-screen bg-[#0f0f12] flex items-center justify-center">
    <p class="text-[#00babc] font-mono animate-pulse uppercase tracking-[0.5em]">Loading_System...</p>
  </div>
  <div class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4" id="createStudentModal">
  
  <div class="bg-[#121215] border border-white/5 p-8 rounded-lg w-full max-w-md shadow-2xl overflow-y-auto">
    
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-white font-black uppercase tracking-widest">Create New Student</h2>
      <button @click="oppenToggle('createStudentModal')" class="text-gray-400 hover:text-white transition-colors">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <form @submit.prevent="submitRegistration" class="space-y-4">
      <input type="text" v-model="fullname" placeholder="Full Name" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="text" v-model="campus" placeholder="Campus" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="text" v-model="role" placeholder="Role" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="url" v-model="studentImage" placeholder="Image URL" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="text" v-model="ville" placeholder="Ville" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="email" v-model="email" placeholder="Email" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="password" v-model="password" placeholder="Password" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      
      <button type="submit" class="w-full bg-[#00babc] text-black font-bold py-3 rounded mt-2 hover:bg-[#00a89c] transition-colors uppercase tracking-widest">
        Register Student
      </button>
    </form> 
    </div>
  </div>
</template>

<script setup> 
import { ref, onMounted } from 'vue'; 

const user = ref(null)
const isfalse = ref(false)

onMounted(() => {
  const data = localStorage.getItem('user')
  if(data) {
    user.value = JSON.parse(data)
  }
})

function oppenToggle(id)
{
  const modal = document.getElementById(id)
  if(modal) {
    modal.classList.toggle('hidden')
  }
}
</script>