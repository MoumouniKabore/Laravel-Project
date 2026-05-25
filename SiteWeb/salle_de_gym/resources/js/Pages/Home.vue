<script setup>
    // defineProps : récupère les données envoyées par Laravel (Inertia::render)
    defineProps({
        message: String, // La prop "message" envoyée depuis routes/web.php
    });
</script>

<template>
    <!-- Utilisation de Tailwind CSS pour le style -->
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                {{ message }}
            </h1>
            <p class="text-gray-500">
                Laravel + Vue + Inertia + Tailwind + Ziggy ✅
            </p>

            <!-- Exemple d'utilisation de Ziggy : route('home') -->
            <a
                :href="route('home')"
                class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
            >
                Lien vers l'accueil (via Ziggy)
            </a>
        </div>
    </div>
</template>