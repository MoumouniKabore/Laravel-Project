<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link } from '@inertiajs/vue3'

</script>

<template>
    
    <DashboardLayout>
        <Head title="Avis clients" />
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header -->
            <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-4 mb-5">
                <h2 class="text-xl font-bold text-gray-800">
                    Avis client - Kouassi Marc
                </h2>
            </div>
        </div>
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden mt-10">
            
            <div class="bg-blue-600 p-3">
                <h1 class="text-xl font-bold text-white">
                    Kouassi Marc
                </h1>
            </div>
            <div class="py-6 px-6">
                <div class="flex items-centrer justify-around gap-4">
                    <div class="flex items-center justify-center">
                        <img src="https://via.placeholder.com/200" class="w-30 h-30 rounded-full object-cover border-3 border-blue-700 shadow-md">
                    </div>
                    <div class="space-y-4 text-sm">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-70">
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Nom
                                </label>
                                <p class="text-gray-800">
                                    Kouassi
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Prénom
                                </label>
                                <p class="text-gray-800">
                                    Marc
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Téléphone
                                </label>
                                <p class="text-gray-800">
                                    +225 07 00 00 00 00
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Étoile laisser
                                </label>
                                <p class="text-gray-800">
                                    4
                                </p>
                            </div>                    
                        </div>
                        <div class="w-full">
                            <label class="block font-semibold text-gray-500">
                                Opinion
                            </label>
                            <p class="text-gray-800 w-80">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem hic nihil quibusdam quis. Neque tempore id autem dele.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap text-sm font-bold gap-2 justify-end border-t border-gray-400 pt-6">
                    <Link :href="route('testimonies-all')" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                        Retour
                    </Link>
                    <a href="#" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Supprimer
                    </a>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>