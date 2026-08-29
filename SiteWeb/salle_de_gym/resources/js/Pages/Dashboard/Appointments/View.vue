<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import { capitalize } from '@/Composables/useHelpers'

    defineProps({
        appointment: Object,
    })

    const showmodal = ref(false)
    const selectedAppointment = ref(null)

    const openModal = (message) => {
        selectedAppointment.value = message
        showmodal.value = true
    }

    const closeModal = () => {
        selectedAppointment.value = null
        showmodal.value = false
    }

    const delete_appointment = () => {
        router.delete(
            route('delete.appointment', selectedAppointment.value.id), {
                onSuccess: () => {
                    closeModal()
                }
            }
        )
    }

    const change_statut = (appointment) => {
        router.patch(
            route('change.statut.appointment', appointment.id)
        )
    }

</script>

<template>
    
    <DashboardLayout>
        <Head title="Réservations" />
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header -->
            <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-4 mb-5">
                <h2 class="text-xl font-bold text-gray-800">
                    Réservation de {{ capitalize(appointment.firstname) }} {{ capitalize(appointment.lastname) }}
                </h2>
            </div>
        </div>
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden mt-10">
            
            <div class="flex justify-between items-center bg-blue-600 p-3">
                <h1 class="text-xl font-bold text-white">
                    {{ capitalize(appointment.firstname) }} {{ capitalize(appointment.lastname) }}
                </h1>
                <button 
                    @click="change_statut(appointment)" 
                    :class="appointment.statut === 'lu' ? 'text-black bg-green-300 hover:bg-green-400' : 'text-white bg-red-500 hover:bg-red-600'" 
                    class="rounded-md font-bold cursor-pointer capitalize"
                >
                    <span v-if="appointment.statut == 'lu'" title="Marquer Comme Non Lu" class="px-4">lu</span>
                    <span v-else title="Clicker Pour Marquer Comme Lu" class="px-4">non lu</span>
                </button>
            </div>
            <div class="py-6 px-6">
                <div class="flex items-centrer justify-around gap-4">
                    <div class="flex items-center justify-center">
                        <img :src="appointment.photo ? `/storage/${appointment.photo}` : '/images/profil_inconnu.jpg'" class="w-35 h-35 rounded-full object-cover"/>
                    </div>
                    <div class="space-y-4 text-sm">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-4 w-70">
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Nom
                                </label>
                                <p class="text-gray-800">
                                    {{ capitalize(appointment.firstname) }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Prénom
                                </label>
                                <p class="text-gray-800">
                                    {{ capitalize(appointment.lastname) }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Téléphone
                                </label>
                                <p class="text-gray-800">
                                    {{ appointment.phone }}
                                </p>
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-500">
                                    Adresse
                                </label>
                                <p class="text-gray-800">
                                    {{ capitalize(appointment.address) }}
                                </p>
                            </div>                    
                        </div>
                        <div class="w-full">
                            <label class="block font-semibold text-gray-500">
                                Message
                            </label>
                            <p class="text-gray-800 w-80">
                                {{ capitalize(appointment.message) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap text-sm font-bold gap-2 justify-end border-t border-gray-400 pt-6">
                    <Link :href="route('all.appointment')" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                        Retour
                    </Link>
                    <button @click="openModal(appointment)" class="p-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition">
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
                        <p class="py-4">Voulez-vous vraiment supprimer la réservation de <strong>{{ selectedAppointment?.firstname }}</strong> ?</p>
                        <div class="flex justify-end gap-3 border-t border-gray-300 pt-3">
                            <button @click="closeModal" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Non</button>
                            <button @click="delete_appointment" class="py-2 px-6 text-white rounded-lg bg-red-600 hover:bg-red-700 transition">Oui</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>