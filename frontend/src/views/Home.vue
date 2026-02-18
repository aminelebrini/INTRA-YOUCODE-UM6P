<template>
  <div class="flex h-screen w-full bg-[#0f0f12] overflow-hidden">
    
    <div class="hidden lg:flex relative w-1/2 flex-col items-center justify-center p-12 bg-center bg-no-repeat bg-cover bg-[url('https://lh3.googleusercontent.com/p/AF1QipOy4r7u8QiTSaZMwVtpNsp3t-0qDZRaNG_BeCMY=s680-w680-h510-rw')]">
      <div class="absolute inset-0 bg-black/75 backdrop-blur-[2px]"></div>

      <div class="absolute top-10 left-10 z-20">
          <img src="@/assets/logo-white.png" alt="Logo YouCode" class="w-40 drop-shadow-2xl opacity-90">
      </div>        

      <div class="relative z-10 text-center space-y-6">
        <h1 class="text-white text-7xl font-black tracking-tighter uppercase leading-[0.9]">
          Welcome to <br>
          <span class="text-[#00babc] drop-shadow-[0_0_25px_rgba(0,186,188,0.5)]">INTRA YOUCODE</span>
        </h1>
        <p class="text-gray-500 font-mono text-[10px] tracking-[0.5em] uppercase animate-pulse">
          // RECODE YOUR FUTURE
        </p>
      </div>
    </div>

    <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 md:p-16 bg-[#121215] border-l border-white/5 relative">
      
      <div class="lg:hidden absolute top-8">
        <img src="@/assets/logo-white.png" alt="Logo YouCode" class="w-32">
      </div>

      <div class="w-full max-w-sm space-y-10">
        
        <div class="space-y-3">
          <h2 class="text-[#00babc] text-2xl font-black uppercase italic tracking-widest">
            Login_Intra
          </h2>
          <div class="h-[2px] w-16 bg-[#00babc]"></div>
        </div>

        <form @submit.prevent="handleLogin" class="space-y-8">
          <div class="space-y-3 group">
            <label class="text-[10px] text-gray-500 group-focus-within:text-[#00babc] uppercase font-bold tracking-[0.2em] transition-colors">
              01_Email Address
            </label>
            <input 
              type="email" 
              required
              placeholder="votre-login@student.youcode.ma" 
              class="w-full bg-[#1d1d21] border-b-2 border-transparent p-4 text-white focus:border-[#00babc] focus:bg-[#25252a] outline-none transition-all duration-300 placeholder:text-gray-700"
            >
          </div>

          <div class="space-y-3 group">
            <div class="flex justify-between items-center">
              <label class="text-[10px] text-gray-500 group-focus-within:text-[#00babc] uppercase font-bold tracking-[0.2em] transition-colors">
                02_Password
              </label>
              <a href="#" class="text-[9px] text-gray-700 hover:text-white uppercase tracking-tighter transition-colors underline-offset-4 underline">Forgot?</a>
            </div>
            <input 
              type="password" 
              required
              placeholder="••••••••" 
              class="w-full bg-[#1d1d21] border-b-2 border-transparent p-4 text-white focus:border-[#00babc] focus:bg-[#25252a] outline-none transition-all duration-300 placeholder:text-gray-700"
            >
          </div>

          <button class="w-full bg-[#00babc] text-[#0f0f12] font-black py-5 uppercase tracking-[0.3em] text-xs hover:bg-white hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] transition-all duration-500 transform active:scale-95">
            Authenticate
          </button>
        </form>

        <p class="text-center text-[9px] text-gray-800 uppercase tracking-widest pt-4">
          © 2026 YouCode - Secure Access Only
        </p>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "HomePage",
  // methods: {
  //   handleLogin() {
  //     console.log("Tentative de connexion...");
      
  //   }
  // }
}
</script>