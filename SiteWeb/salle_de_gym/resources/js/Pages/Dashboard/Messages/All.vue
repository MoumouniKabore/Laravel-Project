<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link } from '@inertiajs/vue3'

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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl p-5 hover:shadow-xl transition">
                        <div class="flex items-center gap-4">
                            <div>
                                <h3 class="font-bold text-md text-gray-800">
                                    Kouassi Jean
                                </h3>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-telephone text-gray-500"></i>
                                <span>+225 07 00 00 00 00</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="bi bi-envelope text-gray-500"></i>
                                <span>exemple@gmail.com</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="bi bi-box text-gray-500"></i>
                                <span>Rendez-vous</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="bi bi-chat-right-dots text-gray-500"></i>
                                <span>Lorem ipsum dolor sit amet consectetur adipisicing...</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-2 mt-5 pt-4 border-t border-gray-400 text-sm">
                            <Link :href="route('messages-view')" class="p-2 text-white rounded-lg bg-green-400 hover:bg-green-500 transition" title="Voir détail">
                                <i class="bi bi-eye"></i>
                            </Link>
                            <a href="#" class="p-2 text-white rounded-lg bg-red-600 hover:bg-red-700 transition" title="Supprimer">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>