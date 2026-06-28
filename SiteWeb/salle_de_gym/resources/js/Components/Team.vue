<script setup>
    import { ref } from 'vue'
    import { onMounted, nextTick } from 'vue'

    // Team Modal Appointment
    const showModal = ref(false)

    // Tream Section
    onMounted(async () => {
        await nextTick()
        
        new window.Swiper('.teamSwiper', {
            loop: true,
            speed: 1000, // Un peu plus rapide (1s) pour que ce soit fluide
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            // --- AJOUTS POUR LA LISTE D'ÉQUIPE ---
            spaceBetween: 10, // Espace entre les cartes en pixels
            slidesPerView: 1, // Par défaut (mobile) : 1 seule carte
            breakpoints: {
                // Quand l'écran est >= 640px (Tablette)
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                // Quand l'écran est >= 1024px (PC Portable)
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
            // ------------------------------------
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
    <section class="bg-black/90 px-10 md:px-25 pt-16 pb-20">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h4 class="uppercase text-xl text-amber-500 font-semibold">our team</h4>
                <h3 class="uppercase text-3xl text-white font-bold">train with experts</h3>
            </div>
            <div>
                <span @click="showModal = true" class="uppercase text-white border-2 border-amber-500 hover:bg-amber-500 py-3 px-10 duration-400 cursor-pointer">appointment</span>
            </div>
        </div>
        <div class="swiper teamSwiper cursor-grab pb-14">
            <div class="swiper-wrapper">
                <div class="swiper-slide group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img src="/images/team/team-1.jpg" class="w-full h-110 object-cover" />
                    </div>
                    <div class="w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">athart rachel</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">gym trainer</p>
                    </div>
                </div>
                <div class="swiper-slide group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img src="/images/team/team-2.jpg" class="w-full h-110 object-cover" />
                    </div>
                    <div class="w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">athart rachel</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">gym trainer</p>
                    </div>
                </div>
                <div class="swiper-slide group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img src="/images/team/team-3.jpg" class="w-full h-110 object-cover" />
                    </div>
                    <div class="w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">athart rachel</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">gym trainer</p>
                    </div>
                </div>
                <div class="swiper-slide group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img src="/images/team/team-4.jpg" class="w-full h-110 object-cover" />
                    </div>
                    <div class="w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">athart rachel</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">gym trainer</p>
                    </div>
                </div>
                <div class="swiper-slide group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img src="/images/team/team-5.jpg" class="w-full h-110 object-cover" />
                    </div>
                    <div class="w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">athart rachel</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">gym trainer</p>
                    </div>
                </div>
                <div class="swiper-slide group relative overflow-hidden">
                    <div class="w-full h-full">
                        <img src="/images/team/team-6.jpg" class="w-full h-110 object-cover" />
                    </div>
                    <div class="w-full h-30 absolute bottom-0 bg-zinc-950 border-t-5 border-amber-500 flex flex-col justify-center items-center transform translate-y-full transition-transform duration-500 ease-out group-hover:translate-y-0">
                        <h3 class="capitalize text-2xl font-semibold text-white">athart rachel</h3>
                        <p class="uppercase text-sm font-medium text-gray-400">gym trainer</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination mt-20"></div>
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
                <div @click.self="showModal = false" v-if="showModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
                    
                >
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg p-6">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl text-black/90 font-bold uppercase">
                                make an appointment
                            </h2>

                            <button @click="showModal = false" class="text-2xl text-gray-500 hover:text-red-800 cursor-pointer">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <!-- Formulaire -->
                        <form class="pb-6 space-y-4 overflow-y-auto pr-3 max-h-[70vh]">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="firstname" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                        first name
                                    </label>
                                    <input type="text" id="firstname" name="firstname" placeholder="Kabore"
                                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="lastname" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                        last name
                                    </label>
                                    <input type="text" id="lastname" name="lastname" placeholder="Moumouni"
                                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                        required
                                    >
                                </div>                        
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="phone" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                        phone number
                                    </label>
                                    <input type="text" id="phone" name="phone" placeholder="Ex: +225 00 07 00 00 00"
                                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="address" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                        your address
                                    </label>
                                    <input type="text" id="address" name="address" placeholder="Ex: Abidjan"
                                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                        required
                                    >
                                </div>                        
                            </div>
                            <div>
                                <label for="message" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                    your message
                                </label>
                                <textarea name="message" id="message" rows="4"
                                    class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                    placeholder="What's your message ?"
                                    required
                                ></textarea>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 font-semibold capitalize border border-gray-400 cursor-pointer rounded hover:bg-red-600 hover:border-red-600 hover:text-white transition duration-400">
                                    close
                                </button>
                                <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold capitalize rounded cursor-pointer transition duration-400">
                                    send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </Transition>
        </Teleport>
    </section>
</template>