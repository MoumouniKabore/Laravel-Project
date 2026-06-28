<script setup>
    import { Head } from '@inertiajs/vue3'
    import SiteLayout from '../../../Layouts/SiteLayout.vue'
</script>

<template>
    <Head title="Page non disponibe" />
    <section class="relative">
        <!-- Image -->
        <img src="/images/gallery/gallery-1.jpg" class="w-full h-screen object-cover">

        <!-- Fond noir transparent -->
        <div class="absolute top-0 w-full h-screen bg-black opacity-60 z-5"></div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center space-y-4 z-10">
            <h1 class="font-bold text-7xl md:text-9xl text-white">404</h1>
            <p class="text-white text-md md:text-2xl uppercase font-semibold">opps! this page could not be found!</p>
            <span class="inline-block text-white text-sm md:text-md">Sorry bit the page you are looking for does not exist, have been removed or name changed</span>
            <div class="inline-block space-x-2 border-b border-gray-300 pb-1">
                <i class="bi bi-house-check-fill text-amber-500 text-md sm:text-xl"></i>
                <a :href="route('home')" class="uppercase font-bold text-white text-md sm:text-xl">go back home</a>
            </div>
        </div>
    </section>
</template>