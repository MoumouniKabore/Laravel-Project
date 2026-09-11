<script setup>
    import { ref, watch } from 'vue'
    import { Link, usePage } from '@inertiajs/vue3'

    const isMenuOpen = ref(false)

    const toggleMenu = () => {
        isMenuOpen.value = !isMenuOpen.value
    }

    const closeMenu = () => {
        isMenuOpen.value = false
    }

    const page = usePage()
    
    const showFlash = ref(false)
    let timer = null

    watch(
        () => page.props.flash.id,
        () => {
            if (page.props.flash.success) {
                showFlash.value = false
                if (timer) clearTimeout(timer)
                showFlash.value = true
                timer = setTimeout(() => {
                    showFlash.value = false
                }, 6000)
            }
        },
        { immediate: true }
    )
</script>

<template>
    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="fixed md:static inset-y-0 left-0 z-50 w-65 bg-red-500 text-white transform transition-transform duration-300 ease-in-out md:translate-x-0"
            :class="isMenuOpen ? 'translate-x-0' : '-translate-x-full'"
        >
            <div class="flex items-center md:justify-center justify-between px-4 py-5 border-b border-red-300">
                <h1 class="text-2xl font-bold">Dashboard - Gym</h1>
                <button @click="closeMenu" class="md:hidden hover:text-gray-300 text-2xl cursor-pointer">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            
            <nav class="p-4 mt-4 font-semibold space-y-1">
                <Link :href="route('dashboard-home')" :class="['flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-red-600 transition', route().current('dashboard-home') ? 'bg-red-600 transition' : '']">
                    <span class="text-xl"><i class="bi bi-house-check"></i></span>
                    <span>Home</span>
                </Link>
                <Link :href="route('teams.index')" :class="['flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-red-600 transition', route().current('teams.*') ? 'bg-red-600 transition' : '']">
                    <span class="text-xl"><i class="bi bi-person-gear"></i></span>
                    <span>Équipes</span>
                </Link>
                <Link :href="route('all.appointment')" :class="['flex items-center justify-between gap-3 px-4 py-2 rounded-xl hover:bg-red-600 transition', route().current('*.appointment') ? 'bg-red-600 transition' : '']">
                    <div class="space-x-3">
                        <span class="text-xl"><i class="bi bi-journal-check"></i></span>
                        <span>Réservations</span>
                    </div>
                    <span v-if="page.props.appointment_non_lu != 0" class="text-sm rounded-full px-3 py-1 bg-black/50 text-white">{{ page.props.appointment_non_lu }}</span>
                </Link>
                <Link :href="route('all.testimonie')" :class="['flex items-center justify-between gap-3 px-4 py-2 rounded-xl hover:bg-red-600 transition', route().current('*.testimonie') ? 'bg-red-600 transition' : '']">
                    <div class="space-x-3">
                        <span class="text-xl"><i class="bi bi-chat-square-quote"></i></span>
                        <span>Avis Clients</span>
                    </div>
                    <span v-if="page.props.testimonie_non_lu != 0" class="text-sm rounded-full px-3 py-1 bg-black/50 text-white">{{ page.props.testimonie_non_lu }}</span>
                </Link>
                <Link :href="route('all.message')" :class="['flex items-center justify-between gap-3 px-4 py-2 rounded-xl hover:bg-red-600 transition', route().current('*.message') ? 'bg-red-600 transition' : '']">
                    <div class="space-x-3">
                        <span class="text-xl"><i class="bi bi-chat-right-dots"></i></span>
                        <span>Messages</span>
                    </div>
                    <span v-if="page.props.message_non_lu != 0" class="text-sm rounded-full px-3 py-1 bg-black/50 text-white">{{ page.props.message_non_lu }}</span>
                </Link>
                <Link :href="route('home')" class="flex items-center justify-center gap-2 px-4 py-2 mt-8 rounded-xl bg-red-800 hover:bg-red-900 transition">
                    <span><i class="bi bi-box-arrow-right"></i></span>
                    <span>Déconnexion</span>
                </Link>
            </nav>
        </aside>

        <!-- OVERLAY -->
        <div v-if="isMenuOpen" @click="closeMenu" class="fixed inset-0 bg-black/40 z-40 md:hidden transition-opacity"></div>
        
        <!-- MAIN -->
        <div class="flex-1 flex flex-col">
        
            <header class="border-s border-red-300 bg-red-500 px-10 py-3 flex justify-between">
                <div class="flex items-center gap-2 text-white">
                    <button @click="toggleMenu" class="md:hidden text-3xl hover:text-gray-300 cursor-pointer">
                        <i class="bi bi-list"></i>
                    </button>
                    <h2 class="text-2xl font-bold">
                        Dashboard
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <img src="https://i.pravatar.cc/40" class="w-12 h-12 rounded-full border border-gray-500" alt="Avatar utilisateur"/>
                    <div class="">
                        <span class="block font-semibold text-white">Fabrice kan</span>
                        <span class="block text-gray-300">Gestionnaire</span>
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="bg-gray-100 flex-1 p-3 overflow-auto">
                <slot />
            </main>
        </div>
        <div 
            v-if="showFlash && $page.props.flash.success" :key="$page.props.flash.id" 
            class="absolute bottom-5 right-6 flex items-center justify-center gap-4 bg-red-400 rounded-xl font-bold shadow-2xl text-white p-5 z-60 transform translate-4s"
        >
            <span><i class="bi bi-check-circle-fill text-4xl"></i></span>
            <span>{{ page.props.flash.success }}</span>
        </div>
    </div>
</template>