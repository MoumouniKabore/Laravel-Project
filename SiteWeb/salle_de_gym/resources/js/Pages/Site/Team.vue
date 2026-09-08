<script setup>

    import Team from '../../Components/Team.vue'
    import { Head, Link } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'

    defineProps({
        teams: Array,
    })
    
</script>

<template>
    <Head title="Nos Équipes" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">our team</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <Link :href="route('home')" class="hover:text-gray-300">home</Link><i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i><span class="text-amber-500 text-md md:text-xl">Team</span>
                </p>
            </div>
        </header>
        
        <section class="bg-black/90 px-10 md:px-25 py-16">
            <Team/>
            <div v-if="teams.length === 0" class="flex justify-center items-center w-full">
                <div class="flex flex-col justify-center items-center gap-4">
                    <span class="text-8xl text-amber-500"><i class="bi bi-emoji-surprise-fill"></i></span>
                    <p class="text-white text-xl">Hoo, Sorry, there is no team at the moment</p>
                </div>
            </div>
            <div v-else class="pb-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div v-for="team in teams" :key="team.id" class="group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img :src="team.photo ? `/storage/${team.photo}` : '/images/profil_inconnu.jpg'" class="w-full h-full object-cover"/>
                    </div>
                    <div class="space-y-1 w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">{{ team.fullname }}</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">{{ team.fonction }}</p>
                        <ul class="text-gray-200  text-sm flex mt-2 space-x-2">
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="#"><i class="bi bi-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>