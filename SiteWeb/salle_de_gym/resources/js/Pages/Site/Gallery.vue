<script setup>
    import { Head } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue';
    import { ref, watch } from 'vue'

    // Stocke l'URL de l'image actuellement agrandie (null si aucune)
    const activeImage = ref(null)

    // Fonctions pour ouvrir et fermer
    const openImage = (url) => {
        activeImage.value = url
    }
    const closeImage = () => {
        activeImage.value = null
    }

    // Bloquer le scroll de la page quand une image est ouverte
    watch(activeImage, (newValue) => {
        if (newValue) {
            document.body.style.overflow = 'hidden'
        } else {
            document.body.style.overflow = ''
        }
    })
</script>

<template>
    <Head title="Découver quelques images" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">gallery</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <a :href="route('home')" class="hover:text-gray-300">home</a><i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i><span class="text-amber-500 text-md md:text-xl">Gallery</span>
                </p>
            </div>
        </header>

        <!-- Gallery -->
        <section class="bg-black/90 px-10 md:px-25 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-2">
                <div @click="openImage('/images/gallery/gallery-1.jpg')" class="relative group cursor-pointer">
                    <img src="/images/gallery/gallery-1.jpg" class="w-full object-cover">
                    <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                        <i class="bi bi-image text-amber-500 text-5xl"></i>
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <span @click="openImage('/images/gallery/gallery-2.jpg')" class="relative group cursor-pointer block">
                        <img src="/images/gallery/gallery-2.jpg" class="w-full object-cover">
                        <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                            <i class="bi bi-image text-amber-500 text-5xl"></i>
                        </span>
                    </span>
                    <span @click="openImage('/images/gallery/gallery-3.jpg')" class="relative group cursor-pointer block">
                        <img src="/images/gallery/gallery-3.jpg" class="w-full object-cover">
                        <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                            <i class="bi bi-image text-amber-500 text-5xl"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <span @click="openImage('/images/gallery/gallery-4.jpg')" class="relative group cursor-pointer block">
                        <img src="/images/gallery/gallery-4.jpg" class="w-full object-cover">
                        <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                            <i class="bi bi-image text-amber-500 text-5xl"></i>
                        </span>
                    </span>
                    <span @click="openImage('/images/gallery/gallery-5.jpg')" class="relative group cursor-pointer block">
                        <img src="/images/gallery/gallery-5.jpg" class="w-full object-cover">
                        <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                            <i class="bi bi-image text-amber-500 text-5xl"></i>
                        </span>
                    </span>
                </div>
                <div @click="openImage('/images/gallery/gallery-6.jpg')" class="relative group cursor-pointer">
                    <img src="/images/gallery/gallery-6.jpg" class="w-full object-cover">
                    <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                        <i class="bi bi-image text-amber-500 text-5xl"></i>
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-2">
                <div @click="openImage('/images/gallery/gallery-7.jpg')" class="relative group cursor-pointer">
                    <img src="/images/gallery/gallery-7.jpg" class="w-full object-cover">
                    <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                        <i class="bi bi-image text-amber-500 text-5xl"></i>
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <span @click="openImage('/images/gallery/gallery-8.jpg')" class="relative group cursor-pointer block">
                        <img src="/images/gallery/gallery-8.jpg" class="w-full object-cover">
                        <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                            <i class="bi bi-image text-amber-500 text-5xl"></i>
                        </span>
                    </span>
                    <span @click="openImage('/images/gallery/gallery-3.jpg')" class="relative group cursor-pointer block">
                        <img src="/images/gallery/gallery-9.jpg" class="w-full object-cover">
                        <span class="opacity-0 group-hover:opacity-100 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition duration-400">
                            <i class="bi bi-image text-amber-500 text-5xl"></i>
                        </span>
                    </span>
                </div>
            </div>
            <Teleport to="body">
                <Transition
                    enter-active-class="transition duration-300 ease-out"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="transition duration-200 ease-in"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div @click="closeImage" v-if="activeImage"
                        class="fixed inset-0 z-100 flex items-center justify-center bg-black/90 p-4 md:p-8 cursor-zoom-out"
                    >
                        <div class="relative max-w-5xl max-h-full">
                            <button @click="closeImage"
                                class="absolute -top-10 right-0 text-white/70 hover:text-white text-3xl cursor-pointer"
                            >
                                <i class="bi bi-x-lg"></i>
                            </button>

                            <img :src="activeImage"
                                class="rounded shadow-2xl max-w-full max-h-[85vh] object-contain border border-white/10"
                            />
                        </div>
                    </div>
                </Transition>
            </Teleport>
        </section>
    </SiteLayout>
</template>