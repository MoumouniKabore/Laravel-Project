<script setup>
    import { Head, Link } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'
    import Price from '../../Components/Price.vue'
</script>

<template>
    <Head title="Nos Services" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">services</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <Link :href="route('home')" class="hover:text-gray-300">home</Link><i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i><span class="text-amber-500 text-md md:text-xl">services</span>
                </p>
            </div>
        </header>

        <!-- what we do -->
        <section class="bg-black/90 px-10 md:px-25 py-16">
            <h4 class="uppercase text-center text-xl text-amber-500 font-semibold mb-2">what we do ?</h4>
            <h3 class="uppercase text-center text-4xl text-white font-bold">push your limits forward</h3>

            <div class="mt-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 ">
                    <div class="grid grid-cols-1 sm:grid-cols-2 my-2 lg:my-0">
                        <span class="block">
                            <img src="/images/services/services-1.jpg" class="w-full h-full object-cover">
                        </span>
                        <span class="flex flex-col justify-center space-y-2 p-10 bg-white/10 hover:bg-white/20">
                            <h4 class="text-2xl text-white font-bold">Personal training</h4>
                            <p class="text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                sed do eiusmod tempor ut dolore facilisis.
                            </p>
                            <Link :href="route('session')" class="uppercase text-amber-500 hover:text-amber-600 font-semibold">explore</Link>
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 my-2 lg:my-0">
                        <span class="block">
                            <img src="/images/services/services-2.jpg" class="w-full h-full object-cover">
                        </span>
                        <span class="flex flex-col justify-center space-y-2 p-10 bg-white/10 hover:bg-white/20">
                            <h4 class="text-2xl text-white font-bold">Group fitness classes</h4>
                            <p class="text-gray-400">
                                Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.
                            </p>
                            <Link :href="route('session')" class="uppercase text-amber-500 hover:text-amber-600 font-semibold">explore</Link>
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 my-2 lg:my-0">
                        <span class="block order-1 lg:order-2">
                            <img src="/images/services/services-3.jpg" class="w-full h-full object-cover">
                        </span>
                        <span class="flex flex-col justify-center space-y-2 p-10 bg-white/10 hover:bg-white/20 order-2 lg:order-1">
                            <h4 class="text-2xl text-white font-bold">Strength training</h4>
                            <p class="text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                sed do eiusmod tempor ut dolore facilisis.
                            </p>
                            <Link :href="route('session')" class="uppercase text-amber-500 hover:text-amber-600 font-semibold">explore</Link>
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 my-2 lg:my-0">
                        <span class="block order-1 lg:order-2">
                            <img src="/images/services/services-4.jpg" class="w-full h-full object-cover">
                        </span>
                        <span class="flex flex-col justify-center space-y-2 p-10 bg-white/10 hover:bg-white/20 order-2 lg:order-1">
                            <h4 class="text-2xl text-white font-bold">Body building</h4>
                            <p class="text-gray-400">
                                Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.
                            </p>
                            <Link :href="route('session')" class="uppercase text-amber-500 hover:text-amber-600 font-semibold">explore</Link>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-8">
                <Link :href="route('session')" class="uppercase font-semibold text-white bg-amber-500 hover:bg-amber-600 py-3 px-10 duration-400 cursor-pointer">our class</Link>
            </div>
        </section>

        <!-- Video -->
        <section class="bg-black/90 py-16">
            <div class="relative">
                <img src="/images/banner-bg.jpg" alt="" class="w-full h-120 object-cover">
                <div class="text-center px-8 py-6 absolute top-1/2 -translate-y-1/2 w-full">
                    <h1 class="uppercase text-5xl font-bold text-white mb-4">exercise until the body obeys</h1>
                    <p class="uppercase text-xl font-bold text-gray-300 mb-10">where health, beauty and fitness meet.</p>
                    <Link href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="py-5 px-6 rounded-full bg-amber-500 hover:bg-amber-600 text-white">
                        <i class="bi bi-play-fill"></i>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Price -->
        <Price/>

    </SiteLayout>
</template>