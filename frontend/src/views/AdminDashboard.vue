<template>
  <div class="flex justify-center items-start md:items-center md:min-h-screen w-full bg-[#0f0f12] text-white font-sans">
    
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
        <router-link to="/admindashboard" @click="closeSidebar" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          DASHBOARD
        </router-link>

        <router-link to="/admindashboard" @click="closeSidebar" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          PERSONNAL
        </router-link>

        <router-link to="/admindashboard" @click="closeSidebar" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          CLASSES
        </router-link>

        <router-link to="/admindashboard" @click="closeSidebar" class="nav-link group flex items-center px-4 py-3 text-[10px] sm:text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          ABSENCES
        </router-link>
      </nav>

      <div class="p-6 md:p-10 bg-[#0c0c0e] border-t border-white/5">
        <div class="flex items-center space-x-3 mb-4">
          <div class="w-8 h-8 rounded-full bg-[#00babc]/20 border border-[#00babc]/40 flex items-center justify-center text-[10px] font-bold text-[#00babc]">
            <img :src="user?.link_profile" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
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

    <div class="md:flex-1 md:ml-64 flex flex-col p-3 sm:p-4 md:p-6 w-full">
      <div class="md:hidden mb-4 flex items-center justify-between bg-[#121215] border border-white/10 rounded-lg px-4 py-3">
        <img src="@/assets/logo-white.png" alt="Logo" class="w-24 opacity-90">
        <button @click="showSidebar = true" class="text-[#00babc] border border-[#00babc]/40 rounded px-3 py-1.5 text-[10px] uppercase tracking-widest font-bold">
          Menu
        </button>
      </div>

      <main class="p-2 sm:p-3 md:p-10">
        <header class="relative mb-6 p-4 md:p-6 rounded-xl border border-white/10 overflow-hidden w-full min-h-[120px] md:min-h-[160px]">
          <div class="absolute inset-0 z-0">
            <img src="@/assets/bg.jpg" class="w-full h-full object-cover object-center" alt="header_bg">
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 to-black/40 backdrop-blur-[2px]"></div>
          </div>

          <div class="relative z-10 w-full flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-4 md:gap-6 min-w-0">
              <div class="relative shrink-0">
                <img src="https://avatars.githubusercontent.com/u/113290995?v=4" 
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
              <h2 class="text-white font-black uppercase tracking-tighter text-xs sm:text-base md:text-3xl leading-tight break-all md:break-normal md:text-right">
                {{ user?.email || 'a.lebrini@staff.youcode.ma' }}
              </h2>
              <span class="text-[8px] md:text-[10px] text-white/50 font-mono tracking-widest uppercase md:text-right">
                  Role: {{ user?.role || 'Admin' }}
                </span>
            </div>
          </div>
        </header>

        <section class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-xl shadow-2xl">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-8 md:mb-10">
              <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">
                Personnel Management
              </h3>
              <button @click="oppenToggle('createPersonnalModal')" 
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
                  <th class="pb-4 font-black">Designation / Role</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-white/[0.03]">
                <tr v-for="u in users.filter(e => e.id !== user?.id)" :key="u.id" class="group hover:bg-white/[0.02] transition-colors">
                  <td class="py-5 text-sm text-gray-200 font-medium group-hover:text-[#00babc] transition-colors">
                    {{ u?.fullname || 'AMINE LEBRINI' }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                    {{ u?.email || 'example@example.com' }}
                  </td>
                  <td class="py-5">
                    <span class="text-[10px] font-bold px-2 py-1 rounded bg-white/5 border border-white/10 text-gray-300 uppercase tracking-tighter">
                     {{ u?.role || 'User' }}
                    </span>
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

        <section class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-lg mt-6">
          <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
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
          <div v-if="classes && classes.length > 0" class="w-full overflow-x-auto mt-8">
            <table class="w-full min-w-[760px] border-collapse">
              <thead>
                <tr class="text-left text-[10px] text-gray-500 uppercase tracking-[0.2em] border-b border-white/5">
                  <th class="pb-4 font-black">Classe Name</th>
                  <th class="pb-4 font-black">Capacity</th>
                  <th class="pb-4 font-black">Formator</th>
                  <th class="pb-4 font-black">Promo</th>
                  <th class="pb-4 font-black">Campus</th>
                  <th class="pb-4 font-black">Created At</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-white/[0.03]">
                <tr v-for="classe in classes" :key="classe.id" class="group hover:bg-white/[0.02] transition-colors">
                  <td class="py-5 text-sm text-gray-200 font-medium group-hover:text-[#00babc] transition-colors">
                    {{ classe?.nom || 'Unnamed Class' }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono">
                    {{ classe?.capacite || 0 }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono">
                    {{ classe?.formateur?.fullname || 'Unassigned' }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono">
                     {{ classe?.promo || 'N/A' }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono">
                    {{ classe?.campus || 'N/A' }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono">
                    {{ formatDate(classe.created_at) }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
            <div v-else class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
              <p class="text-[10px] text-gray-500 italic font-mono">System_Ready_Waiting_For_Data</p>
              <div class="flex gap-1">
                <span class="w-1 h-1 bg-[#00babc] rounded-full animate-ping"></span>
                <span class="w-1 h-1 bg-[#00babc] rounded-full opacity-50"></span>
              </div>
            </div>
        </section>

        <section class="bg-[#121215] border border-white/5 p-4 sm:p-6 md:p-8 rounded-lg mt-6">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">Absences Management</h3>
            <button @click="oppenToggle('detectAbsencesModal')" class="w-full sm:w-auto bg-[#00babc] text-[#121215] font-bold py-2 px-4 rounded hover:bg-[#00d1d3] transition-all text-[11px] uppercase tracking-widest">
              Detect Absences
            </button>
          </div>
          <div v-if="absences && absences.length > 0" class="w-full overflow-hidden mt-8">
            <div v-for="absence in absences" :key="absence.id">
              <p class="text-sm text-gray-200 font-medium mt-4">
                {{ absence.student.fullname }} - {{ formatDate(absence.date) }} - {{ absence.status }}
              </p>
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
      </main>
    </div>
  </div>

  <!-- <div class="hidden fixed inset-0 bg-black/80 backdrop-blur-md flex items-center justify-center z-50 p-4" id="detectAbsencesModal">
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

<script setup> 
import api from '@/services/api';
import { ref, onMounted, onBeforeUnmount } from 'vue'; 

const showSidebar = ref(false);
const isDesktop = ref(false);
const user = ref(null)
const fullname = ref('')
const campus = ref('')
const role = ref('')
const link_profile = ref('')
const ville = ref('')
const email = ref('')
const password = ref('')
const classename = ref('')
const classecapacity = ref('')
const link_logo = ref('')
const promo = ref('')
const classeCampus = ref('')
const users = ref([]);
const classes = ref([]);
const assignformateurs = ref([]);
const assignclasses = ref([]);
const formator = ref('');
const assignclass = ref('');

 const submitRegistration = async ()=>{
  
  try {
      const response = await api.post('http://localhost:8000/api/createstudents', {

  fullname: fullname.value,
  campus: campus.value,
  role: role.value,
  link_profile: link_profile.value,
  ville: ville.value,
  email: email.value,
  password: password.value

})
    console.log({
      fullname: fullname.value,
      campus: campus.value,
      role: role.value,
      link_profile: link_profile.value,
      ville: ville.value,
      email: email.value,
      password: password.value
    })

    
  }catch (error) {
    console.error("Error creating student:", error);
  }

 }

 const submitClassRegistration = async ()=>{

  try{
    const response = await api.post('http://localhost:8000/api/createclasse', {
      classename: classename.value,
      classecapacity: classecapacity.value,
      promo: promo.value,
      link_logo: link_logo.value,
      campus: classeCampus.value
    })
    console.log({
      classename: classename.value,
      classecapacity: classecapacity.value,
      promo: promo.value,
      link_logo: link_logo.value,
      campus: classeCampus.value
    })
  }catch (error) {
    console.error("Error creating class:", error);
  }
 }

 const submitClassAssignRegistration = async ()=>
 {
  try{
    const response = await api.post('http://localhost:8000/api/assignformateurclasse', {
      formator: formator.value,
      assignedClass: assignclass.value
    })
    console.log({
      formator: formator.value,
      assignedClass: assignclass.value
    })
  }catch (error) {
    console.error("Error assigning formateur to class:", error);
  }
 }
 const logout = () => {
  localStorage.clear();
  window.location.href = '/'
 }

 const Data = async () => {
  try{
    const response = await api.get('/data');
    const data = response.data;
    users.value = data.users;
    classes.value = data.classes;
    assignformateurs.value = data.assignformateurs;
    assignclasses.value = data.assignclasses;
    console.log('Fetched users:', users.value);
    console.log('Fetched classes:', classes.value);
    console.log('Fetched assignformateurs:', assignformateurs.value);
    console.log('Fetched assignclasses:', assignclasses.value);
    //abssence hasha tokon interface
  }
  catch(error){
    console.error('Error fetching users:', error);
  }
 }
onMounted(() => {
  Data();
  syncSidebarWithViewport();
  window.addEventListener('resize', syncSidebarWithViewport);
  const data = localStorage.getItem('user')
  if(data) {
    user.value = JSON.parse(data)
  }
})

onBeforeUnmount(() => {
  window.removeEventListener('resize', syncSidebarWithViewport);
})

function formatDate(isDate)
{
  const date = new Date(isDate);
  return date.toLocaleDateString();
}
function oppenToggle(id)
{
  const modal = document.getElementById(id)
  if(modal) {
    modal.classList.toggle('hidden')
  }
}

function syncSidebarWithViewport() {
  isDesktop.value = window.innerWidth >= 768;
  showSidebar.value = isDesktop.value; // Toujours ouvert sur desktop
}

function closeSidebar() {
  if (!isDesktop.value) {
    showSidebar.value = false; // Ne ferme que sur mobile
  }
}

function toggleSidebar() {
  if (!isDesktop.value) {
    showSidebar.value = !showSidebar.value; // Toggle sur mobile
  }
}

onMounted(() => {
  syncSidebarWithViewport();
  window.addEventListener('resize', syncSidebarWithViewport);

  const data = localStorage.getItem('user');
  if (data) user.value = JSON.parse(data);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', syncSidebarWithViewport);
});

</script>