<script setup>
    import { Head } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'
    import WhyChoose from '../../Components/WhyChoose.vue'
    import Appointment from '../../Components/Appointment.vue'
    import Price from '../../Components/Price.vue'
    import Team from '../../Components/Team.vue'
    import { onMounted, nextTick } from 'vue'
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

    // Heros section
    onMounted(async () => {
        await nextTick()
        new window.Swiper('.heroSwiper', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.custom-next',
                prevEl: '.custom-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        })
    })

</script>

<template>
    <Head title="Page Accueil" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative h-[1/2] md:h-screen">
            <div class="swiper heroSwiper h-[1/2] md:h-screen">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img
                            src="/images/hero/hero-1.jpg"
                            class="w-full h-[1/2] md:h-screen object-cover"
                        >
                    </div>
                    <div class="swiper-slide">
                        <img
                            src="/images/hero/hero-2.jpg"
                            class="w-full h-[1/2] md:h-screen object-cover"
                        >
                    </div>
                </div>
                <button
                    class="custom-prev absolute left-5 md:left-10 top-1/2 -translate-y-1/2 z-10 md:w-12 md:h-12 md:text-2xl rounded-full
                    w-8 h-8 text-sm cursor-pointer
                    bg-white/40 backdrop-blur-md
                    flex items-center justify-center
                    hover:bg-white/80 transition"
                >
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button
                    class="custom-next absolute right-5 md:right-10 top-1/2 -translate-y-1/2 z-10 md:w-12 md:h-12 md:text-2xl rounded-full
                    w-8 h-8 text-sm cursor-pointer
                    bg-white/40 backdrop-blur-md
                    flex items-center justify-center
                    hover:bg-white/80 transition"
                >
                    <i class="bi bi-arrow-right"></i>
                </button>
                <div class="swiper-pagination"></div>
            </div>
            <div class="absolute top-22 sm:top-40 md:top-60 right-32 sm:right-20 text-center sm:text-start text-white z-10">
                <span class="uppercase text-sm sm:text-xl tracking-widest">shape your body</span>
                <h1 class="uppercase text-3xl sm:text-5xl md:text-7xl font-black">be <span class="text-amber-500">strong</span></h1>
                <h1 class="uppercase text-3xl sm:text-5xl md:text-7xl font-black">training hard</h1>
                <ul class="mt-6">
                    <li><a :href="route('about')" class="uppercase font-semibold bg-amber-500 hover:bg-amber-600 py-2 md:py-4 px-6 md:px-10 rounded-md">get info</a></li>
                </ul>
            </div>
        </header>

        <!-- Why choose us -->
        <WhyChoose/>

        <!-- Our class -->
        <section class="bg-black/90 px-14 py-16">
            <h4 class="uppercase text-center text-xl text-amber-500 font-semibold mb-2">Our Classes</h4>
            <h3 class="uppercase text-center text-4xl text-white font-bold">what we can offer</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                <div class="">
                    <img src="/images/classes/class-1.jpg" alt="" class="w-full object-cover">
                    <div class="w-full h-50 -mt-25 bg-zinc-950 pt-10 [clip-path:polygon(0_50%,200%_0,100%_100%,0_100%)]">
                        <div class="flex justify-around items-center mt-20">
                            <div>
                                <span class="uppercase text-amber-500 font-semibold">strength</span>
                                <h4 class="uppercase text-xl text-white font-bold">weightlifting</h4>
                            </div>
                            <div>
                                <span class="text-2xl px-3 py-2 bg-white/30"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <img src="/images/classes/class-2.jpg" alt="" class="w-full object-cover">
                    <div class="w-full h-50 -mt-25 bg-zinc-950 pt-10 [clip-path:polygon(0_50%,200%_0,100%_100%,0_100%)]">
                        <div class="flex justify-around items-center mt-20">
                            <div class="">
                                <span class="uppercase text-amber-500 font-semibold">cardio</span>
                                <h4 class="uppercase text-xl text-white font-bold">indoor cycling</h4>
                            </div>
                            <div class="">
                                <span class="text-2xl px-3 py-2 bg-white/30"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <img src="/images/classes/class-3.jpg" alt="" class="w-full object-cover">
                    <div class="w-full h-50 -mt-25 bg-zinc-950 pt-10 [clip-path:polygon(0_50%,200%_0,100%_100%,0_100%)]">
                        <div class="flex justify-around items-center mt-20">
                            <div class="">
                                <span class="uppercase text-amber-500 font-semibold">strength</span>
                                <h4 class="uppercase text-xl text-white font-bold">kettlebell power</h4>
                            </div>
                            <div class="">
                                <span class="text-2xl px-3 py-2 bg-white/30"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:hidden">
                    <img src="/images/classes/class-4.jpg" alt="" class="w-full object-cover">
                    <div class="w-full h-50 -mt-25 bg-zinc-950 pt-10 [clip-path:polygon(0_50%,200%_0,100%_100%,0_100%)]">
                        <div class="flex justify-around items-center mt-20">
                            <div class="">
                                <span class="uppercase text-amber-500 font-semibold">strength</span>
                                <h4 class="uppercase text-xl text-white font-bold">weightlifting</h4>
                            </div>
                            <div class="">
                                <span class="text-2xl px-3 py-2 bg-white/30"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <div class="hidden lg:block">
                    <img src="/images/classes/class-4.jpg" alt="" class="w-full object-cover">
                    <div class="w-full h-50 -mt-25 bg-zinc-950 pt-10 [clip-path:polygon(0_50%,200%_0,100%_100%,0_100%)]">
                        <div class="flex justify-around items-center mt-20">
                            <div class="">
                                <span class="uppercase text-amber-500 font-semibold">cardio</span>
                                <h4 class="uppercase text-xl text-white font-bold">indoor cycling</h4>
                            </div>
                            <div class="">
                                <span class="text-2xl px-3 py-2 bg-white/30"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <img src="/images/classes/class-5.jpg" alt="" class="w-full object-cover">
                    <div class="w-full h-50 -mt-25 bg-zinc-950 pt-10 [clip-path:polygon(0_50%,200%_0,100%_100%,0_100%)]">
                        <div class="flex justify-around items-center mt-20">
                            <div class="">
                                <span class="uppercase text-amber-500 font-semibold">training</span>
                                <h4 class="uppercase text-xl text-white font-bold">boxing</h4>
                            </div>
                            <div class="">
                                <span class="text-2xl px-3 py-2 bg-white/30"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Appointment -->
        <Appointment/>

        <!-- Price -->
        <Price/>

        <!-- Gallery -->
        <section class="bg-black/90 py-16">
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
            <div class="flex justify-center mt-4">
                <a :href="route('gallery')" class="uppercase font-semibold text-white bg-amber-500 hover:bg-amber-600 py-3 px-10 duration-400 cursor-pointer">see more</a>
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

        <!-- Team -->
        <Team/>
        
    </SiteLayout>
</template>

<style>
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: white;
    }

    .swiper-pagination-bullet-active {
        width: 10px;
        height: 10px;
    }
</style>