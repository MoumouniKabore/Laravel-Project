<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { ref } from 'vue'

    defineProps({
        team: Object,
    })

    const showmodal = ref(false)
    const selectedTeam = ref(null)

    const openModal = (message) => {
        selectedTeam.value = message
        showmodal.value = true
    }

    const closeModal = () => {
        selectedTeam.value = null
        showmodal.value = false
    }

    const delete_team = () => {
        router.delete(
            route('teams.destroy', selectedTeam.value.id), {
                onSuccess: () => {
                    closeModal()
                }
            }
        )
    }

</script>

<template>
    
    <DashboardLayout>
        <Head title="Équipes" />
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header -->
            <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-4 mb-5">
                <h2 class="text-xl font-bold text-gray-800 capitalize">
                    équipes - {{ team.fullname }}
                </h2>
            </div>
        </div>
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden mt-10">
            
            <div class="bg-blue-600 p-3">
                <h1 class="text-xl font-bold text-white capitalize">
                    {{ team.fullname }} - {{ team.fonction }}
                </h1>
            </div>
            <div class="p-6">
                <div class="flex items-centrer justify-around gap-6 pb-6">
                    <div class="flex items-center justify-center">
                        <img :src="team.photo ? `/storage/${team.photo}` : '/images/profil_inconnu.jpg'" class="w-30 h-30 rounded-full object-cover"/>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Nom complet
                                </label>
                                <p class="text-gray-800 capitalize">
                                    {{ team.fullname }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Téléphone
                                </label>
                                <p class="text-gray-800">
                                    {{ team.phone }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Fonction
                                </label>
                                <p class="text-gray-800 capitalize">
                                    {{ team.fonction }}
                                </p>
                            </div>                    
                        </div>
                        <div class="w-full">
                            <label class="block font-semibold text-gray-500">
                                Email
                            </label>
                            <p class="text-gray-800">
                                {{ team.email }}
                            </p>
                        </div>
                        <div class="w-full">
                            <label class="block font-semibold text-gray-500">
                                Adresse
                            </label>
                            <p class="text-gray-800 text-wrap">
                                {{ team.address }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap text-sm font-bold gap-2 justify-end border-t border-gray-400 pt-4">
                    <Link :href="route('teams.index')" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                        Retour
                    </Link>
                    <button @click="openModal(team)" class="p-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition">
                        Supprimer
                    </button>
                </div>

                <!-- Modale se suppression -->
                <div
                    v-if="showmodal"
                    class="fixed inset-0 bg-black/20 flex justify-center items-center"
                >
                    <div class="bg-white p-6 rounded-lg w-90">
                        <h2 class="font-bold">Confirmer la suppression</h2>
                        <p class="capitalize py-4">Voulez-vous vraiment supprimer l'employer <strong>{{ selectedTeam?.fullname }} -  {{ selectedTeam?.fonction }}</strong> ?</p>
                        <div class="flex justify-end gap-3 border-t border-gray-300 pt-3">
                            <button @click="closeModal" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 cursor-pointer">Non</button>
                            <button @click="delete_team" class="px-6 py-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer">Oui</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>