<script setup>
    import { Head, useForm } from '@inertiajs/vue3'

    const form = useForm({
        email: '',
    })

    const submit = () => {
        form.post(route('password.email'), {
            onSuccess: () => {
                form.reset('email')
            },
        })
    }
</script>

<template>
    <Head title="Mot de passe oublié" />
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white rounded-xl shadow-md p-8">

            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold mb-4">Mot de passe oublié</h1>
                <p class="mb-4 text-gray-600">
                    Entrez votre adresse email pour recevoir un lien de réinitialisation.
                </p>            
            </div>
            
            <div 
                v-if="$page.props.flash?.success" 
                class="mb-2 px-4 py-2 bg-green-100 border border-green-400 text-green-700 text-sm rounded"
            >
                {{ $page.props.flash.success }}
            </div>
            
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <div>
                        <label for="email" class="block mb-1 text-sm font-medium text-gray-900">
                            Entrer votre e-mail
                        </label>
                        <input type="email" id="email" name="email" placeholder="mkabore@email.com" v-model="form.email" required
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-600 focus:border-blue-600 outline-none placeholder:text-gray-300"
                        >
                    </div>
                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                        {{ form.errors.email }}
                    </p>                    
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span v-if="form.processing">Envoi en cours...</span>
                    <span v-else>Envoyer le lien de réinitialisation</span>
                </button>

            </form>    
        </div>
    </section>
</template>