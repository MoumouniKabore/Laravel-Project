<script setup>
    import { ref, onMounted, onUnmounted } from 'vue'

    const isScrolled = ref(false)
    const handleScroll = () => {
        isScrolled.value = window.scrollY > 50
    }

    const isMenuOpen = ref(false)
    const toggleMenu = () => {
        isMenuOpen.value = !isMenuOpen.value
    }

    const menuRef = ref(null)
    const buttonRef = ref(null)

    const handleClickOutside = (event) => {
        if ( menuRef.value && !menuRef.value.contains(event.target) && buttonRef.value && !buttonRef.value.contains(event.target) ) {
            isMenuOpen.value = false
        }
    }

    onMounted(() => {
        window.addEventListener('scroll', handleScroll)
        document.addEventListener('click', handleClickOutside)
    })

    onUnmounted(() => {
        window.removeEventListener('scroll', handleScroll)
        document.removeEventListener('click', handleClickOutside)
    })
</script>

<template>
    <nav :class="['fixed top-0 left-0 w-full z-50 transition-all duration-800 px-10 py-3 md:py-5 md:px-20 text-white', 
        isScrolled ? 'backdrop-blur-3xl border-b border-white/40' : 'bg-transparent']"
    >
        <div class="flex justify-between items-center">
        
            <!-- Logo -->
            <div class="text-xl font-bold">
                <a :href="route('home')"><img src="/images/logo.png" alt="" class="w-25 sm:w-35"></a>
            </div>

            <!-- Menu Desktop -->
            <ul class="hidden md:flex space-x-6 font-semibold text-sm">
                <li><a :href="route('home')" :class="[ 'hover:text-amber-500 uppercase', {'text-amber-500': route().current('home') | route().current('gallery')} ]">accueil</a></li>
                <li><a :href="route('about')" :class="[ 'hover:text-amber-500 uppercase', {'text-amber-500': route().current('about')} ]">à propos</a></li>
                <li><a :href="route('service')" :class="[ 'hover:text-amber-500 uppercase', {'text-amber-500': route().current('service') | route().current('session')} ]">services</a></li>
                <li><a :href="route('team')" :class="[ 'hover:text-amber-500 uppercase', {'text-amber-500': route().current('team')} ]">équipes</a></li>
                <li><a :href="route('contact')" :class="[ 'hover:text-amber-500 uppercase', {'text-amber-500': route().current('contact')} ]">contact</a></li>
            </ul>

            <!-- Bouton Hamburger Mobile -->
            <button ref="buttonRef" @click="toggleMenu" class="md:hidden hover:text-gray-300 text-2xl sm:text-4xl cursor-pointer">
                <i :class="isMenuOpen ? 'bi bi-x' : 'bi bi-list'"></i>
            </button>
        </div>

        <!-- Menu Mobile -->
        <div ref="menuRef" v-if="isMenuOpen"
            :class="['md:hidden mt-4 rounded-lg shadow-lg', isScrolled ? 'backdrop-blur text-white' : 'bg-slate-900/95 text-white']"
        >
            <ul class="flex flex-col p-4 space-y-4 font-semibold text-sm">
                <li><a :href="route('home')" :class="['hover:text-amber-500 uppercase', route().current('home') | route().current('gallery') ? 'text-amber-500' : '']">accueil</a></li>
                <li><a :href="route('about')" :class="['hover:text-amber-500 uppercase', route().current('about') ? 'text-amber-500' : '']">à propos</a></li>
                <li><a :href="route('service')" :class="['hover:text-amber-500 uppercase', route().current('service') | route().current('session') ? 'text-amber-500' : '']">services</a></li>
                <li><a :href="route('team')" :class="['hover:text-amber-500 uppercase', route().current('team') ? 'text-amber-500' : '']">Équipes</a></li>
                <li><a :href="route('contact')" :class="['hover:text-amber-500 uppercase', route().current('contact') ? 'text-amber-500' : '']">contact</a></li>
            </ul>
        </div>
    </nav>
</template>