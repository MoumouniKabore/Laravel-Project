<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import { capitalize, truncate } from '@/Composables/useHelpers'

    defineProps({
        messages: Array,
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

</script>

<template>

    <DashboardLayout>
        <Head title="Messages" />
        <div class="max-w-7xl mx-auto px-6">
            <div>
                <div class="bg-white rounded-xl shadow-sm flex items-center justify-between px-6 py-4 mb-5">
                    <h2 class="text-xl font-bold text-gray-800 capitalize">
                        tous les messages
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

                    <div v-for="message in messages.data" :key="message.id" class="relative bg-white rounded-2xl p-5 hover:shadow-xl transition">
                        <div>
                            <h3 class="font-bold text-md text-gray-800 capitalize">
                                {{ message.firstname }} {{ message.lastname }}
                            </h3>
                            <span v-if="message.statut == 'non lu'" class="absolute top-2 right-2 text-[0.6rem] text-white font-bold rounded-full bg-red-400 text-sm px-2 py-1 capitalize cursor-text" title="En Attente De Lecture">
                                non lu
                            </span>
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-telephone text-gray-500"></i>
                                <span>{{ message.phone }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="bi bi-envelope text-gray-500"></i>
                                <span>{{ message.email }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="bi bi-box text-gray-500"></i>
                                <span>{{ truncate(message.object, 20) }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="bi bi-chat-right-dots text-gray-500"></i>
                                <span>{{ truncate(message.message, 40) }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-2 mt-5 pt-4 border-t border-gray-400 text-sm">
                            <Link :href="route('show.message', message.id)" class="px-2 py-1 text-[13px] text-white rounded-lg bg-green-400 hover:bg-green-500 transition" title="Voir détail">
                                <i class="bi bi-eye"></i>
                            </Link>
                            <button @click="openModal(message)" class="px-2 py-1 text-[13px] text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer" title="Supprimer">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Modale se suppression -->
                    <div
                        v-if="showmodal"
                        class="fixed inset-0 bg-black/50 flex justify-center items-center"
                    >
                        <div class="bg-white p-6 rounded-lg w-90">
                            <h2 class="font-bold">Confirmer la suppression !</h2>
                            <p class="py-4">Voulez-vous vraiment supprimer le message de <strong>{{ capitalize(selectedMessage?.firstname) }} {{ capitalize(selectedMessage?.lastname) }}</strong> ?</p>
                            <div class="flex justify-end gap-3 border-t border-gray-300 pt-3">
                                <button @click="closeModal" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 cursor-pointer">Non</button>
                                <button @click="delete_message" class="px-6 py-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition cursor-pointer">Oui</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex justify-end gap-1 mt-6 pt-4 border-t border-gray-400">
                <Link
                    v-for="(link, index) in messages.links"
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