<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'

    const form = useForm({
        firstname: '',
        lastname: '',
        phone: '',
        email: '',
        object: '',
        message: '',
    })

    const submit = () => {
        form.post(route('storeMessage'), {
            onSuccess: () => {
                form.reset()
            }
        });
    }
</script>

<template>
    <Head title="Contactez-nous" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">contact us</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <Link :href="route('home')" class="hover:text-gray-300">home</Link><i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i><span class="text-amber-500 text-md md:text-xl">contact</span>
                </p>
            </div>
        </header>

        <section class="bg-black/90 px-10 md:px-25 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h4 class="uppercase text-xl text-amber-500 font-semibold">contact us</h4>
                    <h3 class="uppercase text-3xl text-white font-bold">get in touch</h3>
                    
                    <div class="flex items-center gap-3 mt-8">
                        <span class="bg-white/20 text-amber-500 px-4 py-3 rounded-full"><i class="bi bi-telephone-inbound-fill text-2xl"></i></span>
                        <p class="text-md text-gray-200 font-semibold">+225 00 11 22 33 44</p>
                    </div>
                    <div class="flex items-center my-6 gap-3">
                        <span class="bg-white/20 text-amber-500 px-4 py-3 rounded-full"><i class="bi bi-envelope-fill text-2xl"></i></span>
                        <p class="text-md text-gray-200 font-semibold">mkabore.exemple@gmail.com</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="bg-white/20 text-amber-500 px-4 py-3 rounded-full"><i class="bi bi-geo-alt-fill text-2xl"></i></span>
                        <p class="text-md text-gray-200 font-semibold">Abidjan, Côte d'ivoire</p>
                    </div>            
                </div>
                <div>
                    <!-- Formulaire -->
                    <form @submit.prevent="submit" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <div>
                                    <input type="text" name="firstname" placeholder="Firstname" v-model="form.firstname"
                                        class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                        required
                                    >
                                </div>
                                <p v-if="form.errors.firstname" class="text-red-500 text-sm mt-1">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                            <div>
                                <div>
                                    <input type="text" name="lastname" placeholder="Lastname" v-model="form.lastname"
                                        class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                        required
                                    >
                                </div>
                                <p v-if="form.errors.lastname" class="text-red-500 text-sm mt-1">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>                        
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <div>
                                    <input type="text" name="phone" placeholder="Phone Number" v-model="form.phone"
                                        class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                        required
                                    >
                                </div>
                                <p v-if="form.errors.phone" class="text-red-500 text-sm mt-1">
                                    {{ form.errors.phone }}
                                </p>
                            </div>
                            <div>
                                <div>
                                    <input type="email" name="email" placeholder="Email" v-model="form.email"
                                        class="w-full px-4 py-1 text-white border border-gray-500 outline-none placeholder-white/60"
                                        required
                                    >
                                </div>
                                <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                                    {{ form.errors.email }}
                                </p>
                            </div>                        
                        </div>
                        <div>
                            <div>
                                <input type="text" name="object" placeholder="Object" v-model="form.object"
                                    class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                    required
                                >
                            </div>
                            <p v-if="form.errors.object" class="text-red-500 text-sm mt-1">
                                {{ form.errors.object }}
                            </p>
                        </div> 
                        <div>
                            <div>
                                <textarea name="message" rows="4" v-model="form.message "
                                    class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                    placeholder="What's your message ?"
                                    required
                                ></textarea>
                            </div>
                            <p v-if="form.errors.message" class="text-red-500 text-sm mt-1">
                                {{ form.errors.message }}
                            </p>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="w-full py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold capitalize cursor-pointer transition duration-400">
                                submit
                            </button>
                        </div>
                    </form>
                </div>        
            </div>
        </section>

        <!-- Map -->
        <section class="bg-black/90 px-10 md:px-25 py-16">
            <div>
                <iframe class="w-full h-100" src="https://www.google.com/maps/embed?pb=!1m18..." allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </section>
    </SiteLayout>
</template>