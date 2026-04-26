<template>
  <header class="relative overflow-hidden rounded-3xl border border-white/10 bg-[#11131a] shadow-[0_24px_80px_rgba(0,0,0,0.45)]">
    <div class="absolute inset-0">
      <img
        :src="backgroundImage"
        :alt="`${title} header`"
        class="h-full w-full object-cover object-center"
      >
      <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/65 to-black/20"></div>
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(0,186,188,0.18),transparent_35%),radial-gradient(circle_at_bottom_left,rgba(255,255,255,0.06),transparent_32%)]"></div>
    </div>

    <div class="relative z-10 p-5 sm:p-6 lg:p-7">
      <div class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">
        <div class="flex min-w-0 flex-col gap-4 md:flex-row md:items-center md:gap-5">
          <div class="relative shrink-0">
