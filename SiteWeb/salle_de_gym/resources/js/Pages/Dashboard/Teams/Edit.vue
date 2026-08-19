<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link } from '@inertiajs/vue3'

</script>

<template>
    <DashboardLayout>
        <Head title="Équipes" />
        <div class="max-w-xl mx-auto p-6 my-5 bg-white rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-700 mb-6 border-3 border-gray-400 text-center rounded-xl py-2">
                Modification - Moumouni Kabore
            </h2>
            <form class="space-y-3">

                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">
                        Photo
                    </label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="block text-sm text-gray-600
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100 cursor-pointer"
                    >
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="fullname" class="inline text-sm font-medium text-gray-700">
                            Nom complet
                        </label>
                        <input type="text" id="fullname" name="fullname" placeholder="Moumouni Kabore"
                            class="w-full px-4 py-1 mt-1 border border-gray-300 rounded-lg hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                        >
                    </div>
                    <div>
                        <label for="fonction" class="inline text-sm font-medium text-gray-700">
                            Fonction
                        </label>
                        <select name="text" id="fonction"
                            class="w-full px-4 py-1 mt-1 border border-gray-300 hover:border-gray-400 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm"
                        >
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>  
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="inline text-sm font-medium text-gray-700">
                            Téléphone
                        </label>
                        <input type="text" id="phone" name="phone" placeholder="+225 01 02 03 04 05"
                            class="w-full px-4 py-1 mt-1 border border-gray-300 rounded-lg hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                        >
                    </div>
                    <div>
                        <label for="email" class="inline text-sm font-medium text-gray-700">
                            E-mail
                        </label>
                        <input type="email" id="email" name="email" placeholder="Moumouni Kabore"
                            class="w-full px-4 py-1 mt-1 border border-gray-300 rounded-lg hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                        >
                    </div>
                </div>
                <div class="w-full">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-700">
                        Adresse
                    </label>
                    <textarea id="adresse" name="address" rows="3" placeholder="Adresse complète"
                        class="w-full px-4 py-1 border border-gray-300 hover:border-gray-400 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                    ></textarea>
                </div>

                <!-- Bouton -->
                <div class="flex justify-between gap-4">
                    <button
                        type="submit"
                        class="w-full bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition duration-300"
                    >
                        Enregistrer
                    </button>
                    <Link :href="route('teams-all')" class="px-10 bg-red-600 text-white py-3 rounded-lg font-medium hover:bg-red-700 transition duration-300">
                        Retour
                    </Link>
                </div>
            </form>
        </div>   
    </DashboardLayout>

</template>