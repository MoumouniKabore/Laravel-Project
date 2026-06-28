<script setup>
    import { Head } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'
    import WhyChoose from '../../Components/WhyChoose.vue'
    import Team from '../../Components/Team.vue'
    import Appointment from '../../Components/Appointment.vue'
    import { onMounted, nextTick } from 'vue'
    import { ref } from 'vue'

    const showModal = ref(false)

    // Heros section
    onMounted(async () => {
        await nextTick()
        
        // Initialisation du Swiper avec tes paramètres personnalisés
        new window.Swiper('.testimonie', {
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
    <Head title="À Propos de nous" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">about us</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <a :href="route('home')" class="hover:text-gray-300">home</a><i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i><span class="text-amber-500 text-md md:text-xl">about</span>
                </p>
            </div>
        </header>

        <!-- Why choose us -->
        <WhyChoose/>

        <!-- About us -->
        <section class="bg-black grid lg:grid-cols-2">
            <div>
                <img src="/images/about-us.jpg" class="w-full h-full object-cover">
            </div>
            <div class="p-20">
                <h4 class="uppercase text-md text-amber-500 font-semibold">about us</h4>
                <h3 class="uppercase text-2xl text-white font-bold">what we have done</h3>
                <p class="text-gray-300 my-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                    magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                    aliquip ex ea commodo consequat sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="space-y-6">
                    <div>
                        <p class="text-white flex justify-between items-center mb-2">
                            <span>Body building</span>
                            <span>80%</span>
                        </p>
                        <div class="w-full h-1 bg-gray-500">
                            <div class="w-[80%] h-full bg-white"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-white flex justify-between items-center mb-2">
                            <span>Training</span>
                            <span>85%</span>
                        </p>
                        <div class="w-full h-1 bg-gray-500">
                            <div class="w-[85%] h-full bg-white"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-white flex justify-between items-center mb-2">
                            <span>Fitness</span>
                            <span>75%</span>
                        </p>
                        <div class="w-full h-1 bg-gray-500">
                            <div class="w-[75%] h-full bg-white"></div>
                        </div>
                    </div>                
                </div>
            </div>
        </section>

        <!-- Team -->
        <Team/>

        <!-- Appointment -->
        <Appointment/>

        <!-- Testimonial -->
        <section class="bg-black/90 px-10 md:px-25 py-16">
            <div class="flex flex-wrap justify-between items-center gap-4 mb-10">
                <div>
                    <h4 class="uppercase text-xl text-amber-500 font-semibold">testimonial</h4>
                    <h3 class="uppercase text-3xl text-white font-bold">our client say</h3>
                </div>
                <div>
                    <span @click="showModal = true" class="uppercase text-sm font-semibold text-white bg-amber-500 hover:bg-amber-600 py-3 px-6 duration-400 cursor-pointer">let your opinion</span>
                </div>
            </div>
            <div class="swiper testimonie relative">
                
                <div class="swiper-wrapper cursor-grab">

                    <div class="swiper-slide w-full flex flex-col items-center text-center px-6 space-y-2">
                        <div class="flex justify-center">
                            <img src="/images/testimonial/testimonial-1.jpg" class="w-40 h-40 object-cover rounded-full mb-6">
                        </div>
                        <div class="flex justify-center">
                            <p class="text-gray-300 max-w-2xl">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, esse! Quod, illo quae, eaque, qui hic 
                                a distinctio velit vero reiciendis iusto quisquam illum? Voluptate, odio quisquam. Temporibus, porro dolores.
                            </p>
                        </div>
                        <h4 class="uppercase font-semibold text-xl text-white">marchmello gomez</h4>
                        <span class="space-x-1 text-[12px]">
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                        </span>
                    </div>

                    <div class="swiper-slide w-full flex flex-col items-center text-center px-6 space-y-2">
                        <div class="flex justify-center">
                            <img src="/images/testimonial/testimonial-2.jpg" class="w-40 h-40 object-cover rounded-full mb-6">
                        </div>
                        <div class="flex justify-center">
                            <p class="text-gray-300 max-w-2xl">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, esse! Quod, illo quae, eaque, qui hic 
                                a distinctio velit vero reiciendis iusto quisquam illum? Voluptate, odio quisquam. Temporibus, porro dolores.
                            </p>
                        </div>
                        <h4 class="uppercase font-semibold text-xl text-white">marchmello gomez</h4>
                        <span class="space-x-1 text-[12px]">
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                            <i class="bi-star-fill text-amber-500"></i>
                        </span>
                    </div>

                </div>

                <button 
                    class="custom-prev absolute left-0 md:left-4 top-1/2 -translate-y-1/2 z-10 
                        w-10 h-10 text-xl text-black bg-white/50 backdrop-blur-md 
                        flex justify-center items-center hover:bg-white transition"
                >
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button 
                    class="custom-next absolute right-0 md:right-4 top-1/2 -translate-y-1/2 z-10 
                        w-10 h-10 text-xl text-black bg-white/50 backdrop-blur-md 
                        flex items-center justify-center hover:bg-white transition"
                >
                    <i class="bi bi-chevron-right"></i>
                </button>
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
                    <div
                        v-if="showModal"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
                        @click.self="showModal = false"
                    >
                        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg p-6">
                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="w-75 text-2xl text-black/90 font-bold uppercase">
                                    what's your experience with us ?
                                </h2>

                                <button @click="showModal = false" class="text-2xl text-gray-500 hover:text-red-800 cursor-pointer">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>

                            <!-- Formulaire -->
                            <form class="pb-6 space-y-4 overflow-y-auto pr-3 max-h-[70vh]">
                                <div>
                                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700 capitalize">
                                        your picture
                                    </label>
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                            file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer"
                                    >
                                </div>
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
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
                                        <label for="star" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                            number of star
                                        </label>
                                        <select name="star" id="star"
                                            class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                            required
                                        >
                                            <option value="">-- Choose --</option>
                                            <option value="">1 ⭐</option>
                                            <option value="">2 ⭐</option>
                                            <option value="">3 ⭐</option>
                                            <option value="">4 ⭐</option>
                                            <option value="">5 ⭐</option>
                                        </select>
                                    </div>                        
                                </div>
                                <div>
                                    <label for="opinion" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                        Your opinion
                                    </label>
                                    <textarea name="opinion" id="opinion" rows="4"
                                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                        placeholder="Let your opinion here"
                                        required
                                    ></textarea>
                                </div>
                                <div class="flex justify-end gap-2">
                                    <button type="button" @click="showModal = false" 
                                        class="px-4 py-2 font-semibold capitalize border border-gray-400 cursor-pointer rounded hover:bg-red-600 hover:border-red-600 hover:text-white transition duration-400"
                                    >
                                        close
                                    </button>
                                    <button type="submit" 
                                        class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold capitalize rounded cursor-pointer transition duration-400"
                                    >
                                        send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </Transition>
            </Teleport>
        </section>
    </SiteLayout>
</template>