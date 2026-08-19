<script setup>
    import { Head } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Login" />
    <section class="relative">
        <img src="/images/login-image.jpg" class="w-full h-screen object-cover">
        <div class="w-90 py-6 px-6 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border-2 border-gray-200 rounded-xl backdrop-blur-sm">
            <h1 class="capitalize text-2xl font-bold text-white">Se connecter</h1>
            <p class="text-sm text-white">Bon retour parmi nous !!!</p>

            <form class="space-y-5 mt-6">
                <div class="grid gap-3">
                
                    <div>
                        <label for="email" class="block mb-1 text-sm font-medium text-white">
                            E-mail
                        </label>
                        <input type="email" id="email" name="email" placeholder="mkabore@email.com" required
                            class="w-full px-4 py-2 text-sm text-white border border-gray-300 rounded-lg focus:ring-1 focus:ring-gray-100 focus:border-gray-100 outline-none placeholder:text-gray-300"
                        >
                    </div>

                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-white">
                            Mot de passe
                        </label>
                        <input type="password" id="password" name="password" placeholder="********" required
                            class="w-full px-4 py-2 text-sm text-white border border-gray-300 rounded-lg focus:ring-1 focus:ring-gray-100 focus:border-gray-100 outline-none placeholder:text-gray-300"
                        >
                    </div>    
                
                    <div class="flex justify-between items-center">
                        <label class="flex items-center gap-1 cursor-pointer">
                            <input type="checkbox" class="outline-none cursor-pointer">
                            <span class="text-sm text-black/80 font-semibold hover:text-black/70">Se souvenir de moi</span>
                        </label>
                        <div class="cursor-pointer">
                            <span  class="text-sm text-black/80 font-semibold underline hover:text-black/70">
                                Mot de passe oublié
                            </span>
                        </div>
                    </div>            
                </div>

                <div class="">
                    <button
                        type="submit"
                        class="w-full font-bold text-white py-2 mt-2 rounded-md bg-green-700 hover:bg-green-800"
                    >
                        <span>Se connecter</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>