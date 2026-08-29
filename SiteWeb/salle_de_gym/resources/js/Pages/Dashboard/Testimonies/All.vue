<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import { capitalize, truncate } from '@/Composables/useHelpers'

    defineProps({
        testimonies: Array,
    })

    const showmodal = ref(false)
    const selectedTestimonie = ref(null)

    const openModal = (message) => {
        selectedTestimonie.value = message
        showmodal.value = true
    }

    const closeModal = () => {
        selectedTestimonie.value = null
        showmodal.value = false
    }

    const delete_testimonie = () => {
        router.delete(
            route('delete.testimonie', selectedTestimonie.value.id), {
                onSuccess: () => {
                    closeModal()
                }
            }
        )
    }

</script>

<template>

    <DashboardLayout>
        <Head title="Avis clients" />
        <div class="max-w-7xl mx-auto px-6">
            <div>
                <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-4 mb-5">
                    <h2 class="text-xl font-bold text-gray-800 capitalize">
                        tous les avis
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div v-for="testimonie in testimonies" :key="testimonie.id" class="relative bg-white rounded-2xl p-5 hover:shadow-xl transition">
                        <div class="flex items-center gap-4">
                            <img :src="testimonie.photo ? `/storage/${testimonie.photo}` : '/images/profil_inconnu.jpg'" class="w-14 h-14 rounded-full object-cover"/>
                            <div>
                                <h3 class="font-bold text-md text-gray-800">
                                    {{ capitalize(testimonie.firstname) }} {{ capitalize(testimonie.lastname) }}
                                </h3>
                                <span v-if="testimonie.statut == 'non lu'" class="absolute top-2 right-2 text-[0.6rem] text-white font-bold rounded-full bg-red-400 text-sm px-2 py-1 capitalize cursor-text" title="En Attente De Lecture">
                                    non lu
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-telephone text-gray-500"></i>
                                <span>{{ testimonie.phone }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="bi bi-star text-gray-500"></i>
                                <span>{{ testimonie.star }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="bi bi-chat-right-dots text-gray-500"></i>
                                <span>{{ capitalize(truncate(testimonie.opinion, 40)) }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-2 mt-5 pt-4 border-t border-gray-400 text-sm">
                            <Link :href="route('show.testimonie', testimonie.id)" class="px-2 py-1 text-[13px] text-white rounded-lg bg-green-400 hover:bg-green-500 transition" title="Voir détail">
                                <i class="bi bi-eye"></i>
                            </Link>
                            <button @click="openModal(testimonie)" class="px-2 py-1 text-[13px] text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer" title="Supprimer">
                                <i class="bi bi-trash3"e></i>
                            </button>
                        </div>

                        <!-- Modale se suppression -->
                        <div
                            v-if="showmodal"
                            class="fixed inset-0 bg-black/20 flex justify-center items-center"
                        >
                            <div class="bg-white p-6 rounded-lg w-90">
                                <h2 class="font-bold">Confirmer la suppression</h2>
                                <p class="py-4">Voulez-vous vraiment supprimer l'avis de <strong>{{ selectedTestimonie?.firstname }}</strong> ?</p>
                                <div class="flex justify-end gap-3 border-t border-gray-300 pt-3">
                                    <button @click="closeModal" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 cursor-pointer">Non</button>
                                    <button @click="delete_testimonie" class="px-6 py-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer">Oui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>