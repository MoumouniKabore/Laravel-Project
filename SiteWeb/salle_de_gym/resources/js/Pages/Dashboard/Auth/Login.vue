<script setup>
    import { Head, useForm, Link, usePage } from '@inertiajs/vue3'
    import { onMounted, computed, ref } from 'vue'

    const page = usePage()
    const message = ref(page.props.flash.success)
    onMounted(() => {
        setTimeout(() => {
            message.value = null
        }, 5000)
    })

    const showPassword = ref(false);

    const togglePassword = () => {
        showPassword.value = !showPassword.value;
    };

    const inputType = computed(() => {
        if (showPassword.value) {
            return 'text';
        }
        return 'password';
    });

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    })

    // Fonction de soumission du formulaire
    const submit = () => {
        form.post(route('login.post'), {
            onFinish: () => {
                form.reset('password');
            },
        });
    }
</script>

<template>
    <Head title="Login" />
    <section class="relative">
        <img src="/images/login-image.jpg" class="w-full h-screen object-cover">
        <div class="w-90 py-6 px-6 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border-2 border-gray-200 rounded-xl backdrop-blur-sm">
            <h1 class="capitalize text-2xl font-bold text-white">Se connecter</h1>
            <p class="text-sm text-white">Bon retour parmi nous !!!</p>

            <form @submit.prevent="submit" class="space-y-5 mt-6">
                <div class="grid gap-3">
                    <div>
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium text-white">
                                E-mail
                            </label>
                            <input type="email" id="email" name="email" placeholder="mkabore@email.com" v-model="form.email" required
                                class="w-full px-4 py-2 text-sm text-white border border-gray-300 rounded-lg focus:ring-1 focus:ring-gray-100 focus:border-gray-100 outline-none placeholder:text-gray-300"
                            >
                        </div>
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                            {{ form.errors.email }}
                        </p>                    
                    </div>

                    <div>
                        <div>
                            <label for="password" class="block mb-1 text-sm font-medium text-white">
                                Mot de passe
                            </label>
                            <div class="relative">
                                <input :type=inputType id="password" name="password" placeholder="********" v-model="form.password" required
                                    class="w-full px-4 py-2 text-sm text-white border border-gray-300 rounded-lg focus:ring-1 focus:ring-gray-100 focus:border-gray-100 outline-none placeholder:text-gray-300"
                                >
                                <button
                                    type="button" @click="togglePassword"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 mt-0.5 text-md text-white hover:text-gray-300 focus:outline-none cursor-pointer"
                                >
                                    <i v-if="showPassword" class="bi bi-eye"></i>
                                    <i v-else class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                            {{ form.errors.password }}
                        </p>                    
                    </div>
 

                    <div class="flex justify-between items-center text-gray-200 text-sm">
                        <label class="flex items-center gap-1 cursor-pointer">
                            <input type="checkbox" v-model="form.remember" class="outline-none cursor-pointer">
                            <span class="hover:underline">Se souvenir de moi</span>
                        </label>
                        <div class="cursor-pointer">
                            <Link :href="route('password.request')" class="hover:underline">
                                Mot de passe oublié
                            </Link>
                        </div>
                    </div>            
                </div>

                <div class="">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full font-bold text-white py-2 mt-2 rounded-md bg-green-700 hover:bg-green-800 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span v-if="form.processing">Connexion en cours...</span>
                        <span v-else>Se connecter</span>
                    </button>
                </div>
            </form>
        </div>
        <div 
            v-if="message" 
            class="absolute bottom-5 right-6 flex items-center justify-center gap-4 bg-red-400 rounded-xl font-bold shadow-2xl text-white p-5 z-60 transform translate-4s"
        >
            <span><i class="bi bi-check-circle-fill text-4xl"></i></span>
            <span>{{ message }}</span>
        </div>
    </section>
</template>