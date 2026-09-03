<script setup>
    import Header from '../Components/Header.vue';
    import Footer from '../Components/Footer.vue';
    import { ref, watch } from 'vue';
    import { usePage } from '@inertiajs/vue3';

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
    <!-- Header -->
    <Header/>

    <!-- Contenu -->
    <div 
        v-if="showFlash && $page.props.flash.success" :key="$page.props.flash.id" 
        class="absolute bottom-5 right-5 flex items-center gap-4 bg-red-400 rounded-xl font-bold text-sm text-white p-3 z-60"
    >
        <span><i class="bi bi-check-circle-fill text-4xl"></i></span>
        <span>{{ page.props.flash.success }}</span>
    </div>
    <slot/>

    <!-- Footer -->
    <Footer/>
</template>