<script setup>
    import { Head, useForm, usePage } from '@inertiajs/vue3'

    const page = usePage()

    const form = useForm({})

    const resend = () => {
        form.post(route('verification.send'))
    }
</script>

<template>
    <Head title=" Vérification email" />
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white rounded-xl shadow-md p-8">
            <div class="mb-4 text-center">
                <h2 class="text-3xl font-bold text-gray-800">Vérifiez votre adresse email</h2>
                <p class="text-start text-gray-800 mt-2">
                    Un lien de vérification a été envoyé à votre adresse email.
                </p>
            </div>
            <p v-if="$page.props.flash.success" class="mb-2 px-2 py-1 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ page.props.flash.success }}
            </p>
            <form @submit.prevent="resend">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Renvoyer l'Email de vérification
                </button>
            </form>        
        </div>
    </div>
</template>