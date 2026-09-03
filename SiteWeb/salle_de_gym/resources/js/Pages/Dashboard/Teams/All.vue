<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import { truncate, capitalize } from '@/Composables/useHelpers'

    defineProps({
        teams: Array,
    })

    const showmodal = ref(false)
    const selectedTeam = ref(null)

    const openModal = (team) => {
        selectedTeam.value = team
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
            <div>
                <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-2 mb-5">
                    <h2 class="text-xl font-bold text-gray-800 capitalize">
                        toutes l'équipes
                    </h2>
                    <Link :href="route('teams.create')" class="px-8 py-2 text-bold space-x-2 font-bold bg-red-400 text-white rounded-lg hover:bg-red-500 transition">
                        <span>Ajouter</span>
                        <span><i class="bi bi-person-plus-fill"></i></span>
                    </Link>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div v-for="team in teams.data" :key="team.id" class="bg-white rounded-2xl p-5 hover:shadow-md transition">
                        <div class="flex items-center gap-4">
                            <img :src="team.photo ? `/storage/${team.photo}` : '/images/profil_inconnu.jpg'" class="w-14 h-14 rounded-full object-cover"/>
                            <div>
                                <h3 class="font-bold text-md text-gray-800 capitalize">
                                    {{ team.fullname }}
                                </h3>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-telephone text-gray-500"></i>
                                <span>{{ team.phone }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="bi bi-envelope text-gray-500"></i>
                                <span>{{ team.email }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="bi bi-geo-alt text-gray-500"></i>
                                <span>{{ truncate(team.address, 20) }}</span>
                            </div>
                            <div class="flex items-start gap-2 capitalize">
                                <i class="bi bi-person-workspace text-gray-500"></i>
                                <span>{{ team.fonction }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-2 mt-5 pt-4 border-t border-gray-400 text-sm">
                            <Link :href="route('teams.show', team.id)" class="p-2 text-white rounded-lg bg-green-400 hover:bg-green-500 transition" title="Voir détail">
                                <i class="bi bi-eye"></i>
                            </Link>
                            <Link :href="route('teams.edit', team.id)" class="p-2 text-white rounded-lg bg-amber-400 hover:bg-amber-500 transition" title="Modifier">
                                <i class="bi bi-pen"></i>
                            </Link>
                            <button @click="openModal(team)" class="px-2 py-1 text-[13px] text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer" title="Supprimer">
                                <i class="bi bi-trash3"e></i>
                            </button>
                        </div>

                        <!-- Modale se suppression -->
                        <div
                            v-if="showmodal"
                            class="fixed inset-0 bg-black/20 flex justify-center items-center"
                        >
                            <div class="bg-white p-6 rounded-lg w-90">
                                <h2 class="font-bold">Confirmer la suppression !</h2>
                                <p class="py-4">Voulez-vous vraiment supprimer l'employer <strong>{{ capitalize(selectedTeam?.fullname) }} -  {{ capitalize(selectedTeam?.fonction) }}</strong> ?</p>
                                <div class="flex justify-end gap-3 border-t border-gray-300 pt-3">
                                    <button @click="closeModal" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 cursor-pointer">Non</button>
                                    <button @click="delete_team" class="px-6 py-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer">Oui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-1 mt-6 pt-4 border-t border-gray-400">
                <Link
                    v-for="(link, index) in teams.links"
                    :key="index"
                    :href="link.url ?? '#'"
                    v-html="link.label"
                    :class="[
                        'px-4 py-2 border rounded',
                        link.active ? 'bg-red-400 text-white border-red-300' : 'bg-white text-gray-700 hover:bg-gray-100 border-red-300',
                        !link.url ? 'opacity-50 cursor-not-allowed pointer-events-none' : ''
                    ]"
                />
            </div>
        </div>
    </DashboardLayout>

</template>