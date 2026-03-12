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

        <router-link to="/admindashboard" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          PERSONNAL
        </router-link>

        <router-link to="/admindashboard" class="nav-link group flex items-center px-4 py-3 text-[11px] font-bold text-gray-500 hover:text-white hover:bg-[#1d1d21] rounded-sm transition-all uppercase tracking-widest">
          <span class="text-[#00babc] opacity-0 group-hover:opacity-100 transition-opacity mr-2">></span>
          CLASSES
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

        <section class="bg-[#121215] border border-white/5 p-8 rounded-xl shadow-2xl">
          <div class="flex flex-row items-center justify-between mb-10">
              <h3 class="text-xs font-black uppercase tracking-[0.3em] text-[#00babc] opacity-70">
                Personnel Management
              </h3>
              <button @click="oppenToggle('createPersonnalModal')" 
                      class="bg-[#00babc] hover:bg-[#00d1d3] text-[#121215] font-bold py-2.5 px-6 rounded-lg transition-all duration-300 transform active:scale-95 shadow-lg shadow-[#00babc]/10">
                + Create Personnel
              </button>
          </div>

          <div v-if="users" class="w-full overflow-hidden">
            <table class="w-full border-collapse">
              <thead>
                <tr class="text-left text-[10px] text-gray-500 uppercase tracking-[0.2em] border-b border-white/5">
                  <th class="pb-4 font-black">Full Name</th>
                  <th class="pb-4 font-black">Email Address</th>
                  <th class="pb-4 font-black">Designation / Role</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-white/[0.03]">
                <tr v-for="user in users.filter(e => e.id !== user.id)" :key="user.id" class="group hover:bg-white/[0.02] transition-colors">
                  <td class="py-5 text-sm text-gray-200 font-medium group-hover:text-[#00babc] transition-colors">
                    {{ user.fullname }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                    {{ user.email }}
                  </td>
                  <td class="py-5">
                    <span class="text-[10px] font-bold px-2 py-1 rounded bg-white/5 border border-white/10 text-gray-300 uppercase tracking-tighter">
                     {{ user.role }}
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

        <section class="bg-[#121215] border border-white/5 p-8 rounded-lg mt-6">
          <div class="flex flex-row items-center justify-between">
              <h3 class="text-lg font-bold uppercase tracking-wide">Classes Management</h3>
              <div class="flex flex-row items-center justify-between gap-3">
                <button @click="oppenToggle('createClassModal')" class="bg-[#00babc] text-white font-bold py-2 px-4 rounded hover:bg-[#00a89c] transition-colors">
                  Create Class
                </button>
                <button @click="oppenToggle('AssignClassFormatorModal')" class="bg-[#00babc] text-white font-bold py-2 px-4 rounded hover:bg-[#00a89c] transition-colors">
                  Assign a Formator
                </button>
              </div>
          </div>
          <div v-if="classes" class="w-full overflow-hidden mt-4">
            <table class="w-full border-collapse">
              <thead>
                <tr class="text-left text-[10px] text-gray-500 uppercase tracking-[0.2em] border-b border-white/5">
                  <th class="pb-4 font-black">Classe Name</th>
                  <th class="pb-4 font-black">Classe Capacity</th>
                  <th class="pb-4 font-black">Formator</th>
                  <th class="pb-4 font-black">Classe Promo</th>
                  <th class="pb-4 font-black">Campus</th>
                  <th class="pb-4 font-black">Created At</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-white/[0.03]">
                <tr v-for="classe in classes" :key="classe.id" class="group hover:bg-white/[0.02] transition-colors">
                  <td class="py-5 text-sm text-gray-200 font-medium group-hover:text-[#00babc] transition-colors">
                    {{ classe.nom }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                    {{ classe.capacite }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                    {{ classe.formateur ? classe.formateur.fullname : 'No Assigned' }}
                  </td>
                  <td class="py-5">
                    <span class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                     {{ classe.promo }}
                    </span>
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                    {{ classe.campus }}
                  </td>
                  <td class="py-5 text-sm text-gray-400 font-mono tracking-tight">
                    {{ formatDate(classe.created_at) }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
            <div v-else class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
              <p class="text-xs text-gray-500 italic">// System_Ready_Waiting_For_Data</p>
            </div>
        </section>

        <section>
          <div>
            <h3 class="text-lg font-bold mb-4 uppercase tracking-wide">Absences Management</h3>
            <button @click="detectAbsences" class="bg-[#00babc] text-white font-bold py-2 px-4 rounded hover:bg-[#00a89c] transition-colors">
              Detect Absences
            </button>
          </div>
          <div>
            

            <p class="text-xs text-gray-500 italic">// System_Ready_Waiting_For_Data</p>
          </div>
        </section>
      </main>
    </div>
  </div>
  <div v-else class="min-h-screen bg-[#0f0f12] flex items-center justify-center">
    <p class="text-[#00babc] font-mono animate-pulse uppercase tracking-[0.5em]">Loading_System...</p>
  </div>
  <div class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4" id="createPersonnalModal">
  
  <div class="bg-[#121215] border border-white/5 p-8 rounded-lg w-full max-w-md shadow-2xl max-h-[90vh] overflow-y-auto custom-scrollbar">
    
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-white font-black uppercase tracking-widest">Create New Personnal</h2>
      <button @click="oppenToggle('createPersonnalModal')" class="text-gray-400 hover:text-white transition-colors">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <form @submit.prevent="submitRegistration" class="space-y-4">
      <input type="text" v-model="fullname" placeholder="Full Name" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="text" v-model="campus" placeholder="Campus" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <select v-model="role" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
        <option value="" disabled selected>Select Role</option>
        <option value="etudiant">Etudiant</option>
        <option value="admin">Admin</option>
        <option value="formateur">Formateur</option>
      </select>
      <input type="url" v-model="link_profile" placeholder="Image URL" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="text" v-model="ville" placeholder="Ville" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="email" v-model="email" placeholder="Email" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <input type="password" v-model="password" placeholder="Password" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
      <button type="submit" class="w-full bg-[#00babc] text-black font-bold py-3 rounded mt-2 hover:bg-[#00a89c] transition-colors uppercase tracking-widest">
        Register Personnal
      </button>
    </form> 
    </div>
  </div>
  <div class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4" id="AssignClassFormatorModal">
    <div class="bg-[#121215] border border-white/5 p-8 rounded-lg w-full max-w-md shadow-2xl max-h-[90vh] overflow-y-auto custom-scrollbar">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-white font-black uppercase tracking-widest">Assign Class to Formator</h1>
        <button @click="oppenToggle('AssignClassFormatorModal')" class="text-gray-400 hover:text-white transition-colors">
          <i class="fas fa-times"></i>
        </button>
      </div>

    <form @submit.prevent="submitClassAssignRegistration" class="space-y-4">
      <select v-model="formator" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
        <option value="" disabled selected>Select Formator</option>
        <option v-for="formateur in assignformateurs" :key="formateur.id" :value="formateur.id">
          {{ formateur.formateur_name }}
        </option>
      </select>
      <select v-model="assignclass" class="w-full bg-[#0f0f12] border border-white/10 p-3 text-white rounded focus:border-[#00babc] outline-none">
        <option value="" disabled selected>Select Class</option>
        <option v-for="classe in assignclasses" :key="classe.id" :value="classe.id">
          {{ classe.classe_name }}
        </option>
      </select>
       <button type="submit" class="w-full bg-[#00babc] text-black font-bold py-3 rounded mt-2 hover:bg-[#00a89c] transition-colors uppercase tracking-widest">
        Assign Formator
      </button>
    </form>
  </div>

  <div class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4" id="createClassModal">
  <div class="bg-[#121215] border border-white/5 p-8 rounded-lg w-full max-w-md shadow-2xl max-h-[90vh] overflow-y-auto custom-scrollbar">
    <div>
      <h1>Create Class</h1>
      <button @click="oppenToggle('createClassModal')"><i class="fas fa-times"></i></button>
    </div>

    <form @submit.prevent="submitClassRegistration">
       <input type="text" v-model="classename" placeholder="Class Name">
       <input type="number" v-model="classecapacity" placeholder="Class Capacity">
       <input type="text" v-model="promo" placeholder="Promotion">
       <input type="url" v-model="link_logo" placeholder="Logo de Classe URL">
       <input type="text" v-model="classeCampus" placeholder="Campus">
       <button type="submit">Create Class</button>
    </form>
  </div>
  </div>
  </div>
</template>

<script setup> 
import api from '@/services/api';
import { ref, onMounted } from 'vue'; 

const user = ref(null)
const isfalse = ref(false)
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
const classeDate = ref('');
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
  const data = localStorage.getItem('user')
  if(data) {
    user.value = JSON.parse(data)
  }
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
</script>