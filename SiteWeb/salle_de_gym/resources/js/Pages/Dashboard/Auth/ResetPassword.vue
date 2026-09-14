<script setup>
    import { Head, useForm } from '@inertiajs/vue3'
    import { computed, ref } from 'vue'

    // Nouveau Mot de passe
    const showPassword1 = ref(false)
    const inputType1 = computed(() => {
        if (showPassword1.value) {
            return 'text'
        }
        return 'password'
    });
    const togglePassword1 = () => {
        showPassword1.value = !showPassword1.value
    };

    // Confirmer mot de passe
    const showPassword2 = ref(false)
    const inputType2 = computed(() => {
        if (showPassword2.value) {
            return 'text'
        }
        return 'password'
    });
    const togglePassword2 = () => {
        showPassword2.value = !showPassword2.value
    };

    const props = defineProps({
        token: String,
        email: String,
    })

    const form = useForm({
        token: props.token,
        email: props.email,
        password: '',
        password_confirmation: '',
    })

    const submit = () => {
        form.post(route('password.update'), {
            preserveScroll: true,
            onFinish: () => {
                form.reset('password', 'password_confirmation')
            },
        })
    }
</script>

<template>
    <Head title="Modifier mot de passe" />
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <div class="mb-4 text-center">
                <h2 class="text-3xl font-bold text-gray-800">Réinitialiser le mot de passe</h2>
                <p class="text-gray-600 mt-2">
                    Entrez votre nouveau mot de passe ci-dessous.
                </p>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
            
                <input type="hidden" v-model="form.email" />
                <input type="hidden" v-model="form.token" />

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        Adresse email
                    </label>
                    <input
                        type="email"
                        :value="form.email"
                        disabled
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 cursor-not-allowed"
                    />                    
                </div>

                <!-- Nouveau mot de passe -->
                <div>
                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-900">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input :type=inputType1 id="password" name="password" placeholder="********" v-model="form.password" required
                                class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 outline-none placeholder:text-gray-500"
                            >
                            <button
                                type="button" @click="togglePassword1"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 mt-0.5 text-md text-gray-800 hover:text-gray-900 focus:outline-none cursor-pointer"
                            >
                                <i v-if="showPassword1" class="bi bi-eye"></i>
                                <i v-else class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                        {{ form.errors.password }}
                    </p>                    
                </div>

                <!-- Confirmation mot de passe -->
                <div>
                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-900">
                            Confirmer le mot de passe
                        </label>
                        <div class="relative">
                            <input :type=inputType2 id="password_confirmation" name="password_confirmation" placeholder="********" v-model="form.password_confirmation" required
                                class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 outline-none placeholder:text-gray-500"
                            >
                            <button
                                type="button" @click="togglePassword2"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 mt-0.5 text-md text-gray-800 hover:text-gray-900 focus:outline-none cursor-pointer"
                            >
                                <i v-if="showPassword2" class="bi bi-eye"></i>
                                <i v-else class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">
                        {{ form.errors.password_confirmation }}
                    </p>                    
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span v-if="form.processing">Réinitialisation...</span>
                    <span v-else>Réinitialiser</span>
                </button>

            </form>
            
            <div class="mt-4 text-center">
                <Link :href="route('login')" class="text-blue-600 hover:underline">
                    ← Retour à la connexion
                </Link>
            </div>
        </div>
    </section>
</template>