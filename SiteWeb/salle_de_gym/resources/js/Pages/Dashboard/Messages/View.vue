<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { ref } from 'vue'

    defineProps({
        message: Object,
    })

    const showmodal = ref(false)
    const selectedMessage = ref(null)

    const openModal = (message) => {
        selectedMessage.value = message
        showmodal.value = true
    }

    const closeModal = () => {
        selectedMessage.value = null
        showmodal.value = false
    }

    const delete_message = () => {
        router.delete(
            route('delete.message', selectedMessage.value.id), {
                onSuccess: () => {
                    closeModal()
                }
            }
        )
    }

    const change_statut = (message) => {
        router.patch(
            route('change.statut', message.id)
        )
    }

</script>

<template>
    
    <DashboardLayout>
        <Head title="Messages" />
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header -->
            <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-4 mb-5">
                <h2 class="text-xl font-bold text-gray-800">
                    Message de <span class="capitalize">{{ message.firstname }} {{ message.lastname }}</span>
                </h2>
            </div>
        </div>
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden mt-10">
            
            <div class="flex justify-between items-center bg-blue-600 p-3">
                <h1 class="text-xl font-bold text-white capitalize">
                    {{ message.firstname }} {{ message.lastname }}
                </h1>
                <button 
                    @click="change_statut(message)" 
                    :class="message.statut === 'lu' ? 'text-black bg-green-300 hover:bg-green-400' : 'text-white bg-red-500 hover:bg-red-600'" 
                    class="rounded font-bold cursor-pointer capitalize flex items-center"
                >
                    <span v-if="message.statut == 'lu'" title="Déjà Lu"><i class="bi bi-check text-2xl px-4"></i></span>
                    <span v-else title="Pas Encore Lu"><i class="bi bi-x text-2xl px-4"></i></span>
                </button>
            </div>
            <div class="p-6">
                <div class="flex items-centrer justify-around">
                    <div class="space-y-2 text-sm">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Nom Complet
                                </label>
                                <p class="text-gray-800">
                                    {{ message.firstname }} {{ message.lastname }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Téléphone
                                </label>
                                <p class="text-gray-800">
                                    {{ message.phone }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Email
                                </label>
                                <p class="text-gray-800">
                                    {{ message.email }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Objet
                                </label>
                                <p class="text-gray-800">
                                    {{ message.object }}
                                </p>
                            </div>                    
                        </div>
                        <div class="w-full">
                            <label class="block font-semibold text-gray-500">
                                Messages
                            </label>
                            <p class="text-gray-800">
                                {{ message.message }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap text-sm font-bold gap-2 justify-end border-t border-gray-400 pt-4">
                    <Link :href="route('all.message')" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                        Retour
                    </Link>
                    <button @click="openModal(message)" class="p-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition">
                        Supprimer
                    </button>
                </div>

                <!-- Modale se suppression -->
                <div
                    v-if="showmodal"
                    class="fixed inset-0 bg-black/50 flex justify-center items-center"
                >
                    <div class="bg-white p-6 rounded-lg w-90">
                        <h2 class="font-bold">Confirmer la suppression</h2>
                        <p class="py-4">Voulez-vous vraiment supprimer le message de <strong>{{ selectedMessage?.firstname }}</strong> ?</p>
                        <div class="flex justify-end gap-3 border-t border-gray-300 pt-3">
                            <button @click="closeModal" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Non</button>
                            <button @click="delete_message" class="py-2 px-6 text-white rounded-lg bg-red-600 hover:bg-red-700 transition">Oui</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>