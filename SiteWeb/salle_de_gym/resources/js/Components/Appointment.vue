<script setup>
    import { ref } from 'vue'
    import { useForm } from '@inertiajs/vue3'

    const showModal = ref(false)

    const form = useForm({
        firstname: '',
        lastname: '',
        phone: '',
        address: '',
        message: '',
        photo: null,
    })

    const submit = () => {
        form.post(route('store.appointment'), {
            forceFormData: true,
            onSuccess: () => {
                form.reset(),
                showModal.value = false
            }
        });
    }
</script>

<template>
    <section class="bg-black/90 py-16">
        <div class="relative">
            <img src="/images/banner-bg.jpg" alt="" class="w-full h-120 object-cover">
            <div class="text-center px-8 py-6 absolute top-1/2 -translate-y-1/2 w-full">
                <h1 class="uppercase text-5xl font-bold text-white mb-4">registration now to get more deals</h1>
                <p class="uppercase text-xl font-bold text-gray-400 mb-10">where health, beauty and fitness meet.</p>
                <span @click="showModal = true" class="uppercase text-white border-2 border-amber-500 hover:bg-amber-500 py-3 px-10 duration-400 cursor-pointer">appointment</span>
            </div>
        </div>
    </section>
        <Teleport to="body">
            <Transition
                enter-active-class="transition duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    v-if="showModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
                    @click.self="showModal = false"
                >
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg p-6">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl text-black/90 font-bold uppercase">
                                make an appointment
                            </h2>

                            <button @click="showModal = false" class="text-2xl text-gray-500 hover:text-red-800 cursor-pointer">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <!-- Formulaire -->
                        <form @submit.prevent="submit" class="pb-6 space-y-4 overflow-y-auto pr-3 max-h-[70vh]">
                            <div>
                                <div>
                                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-700 capitalize">
                                        your picture
                                    </label>
                                    <input type="file" id="photo" name="photo" accept="image/*" @input="form.photo = $event.target.files[0]"
                                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                            file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer"
                                    >
                                </div>
                                <p v-if="form.errors.photo" class="text-red-500 text-sm mt-1">
                                    {{ form.errors.photo }}
                                </p>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <div>
                                        <label for="firstname" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                            first name
                                        </label>
                                        <input type="text" id="firstname" name="firstname" placeholder="Kabore" v-model="form.firstname"
                                            class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                            required
                                        >
                                    </div>
                                    <p v-if="form.errors.firstname" class="text-red-500 text-sm mt-1">
                                        {{ form.errors.firstname }}
                                    </p>
                                </div>
                                <div>
                                    <div>
                                        <label for="lastname" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                            last name
                                        </label>
                                        <input type="text" id="lastname" name="lastname" placeholder="Moumouni" v-model="form.lastname"
                                            class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                            required
                                        >
                                    </div>
                                    <p v-if="form.errors.lastname" class="text-red-500 text-sm mt-1">
                                        {{ form.errors.lastname }}
                                    </p>
                                </div>                       
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <div>
                                        <label for="phone" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                            phone number
                                        </label>
                                        <input type="text" id="phone" name="phone" placeholder="Ex: +225 00 07 00 00 00" v-model="form.phone"
                                            class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                            required
                                        >
                                    </div>
                                    <p v-if="form.errors.phone" class="text-red-500 text-sm mt-1">
                                        {{ form.errors.phone }}
                                    </p>
                                </div>
                                <div>
                                    <div>
                                        <label for="address" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                            your address
                                        </label>
                                        <input type="text" id="address" name="address" placeholder="Ex: Abidjan" v-model="form.address"
                                            class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                            required
                                        >
                                    </div>
                                    <p v-if="form.errors.address" class="text-red-500 text-sm mt-1">
                                        {{ form.errors.address }}
                                    </p>
                                </div>                        
                            </div>
                            <div>
                                <div>
                                    <label for="message" class="block text-sm mb-2 font-medium text-gray-700 capitalize">
                                        your message
                                    </label>
                                    <textarea name="message" id="message" rows="4" v-model="form.message"
                                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                        placeholder="What's your message ?"
                                        required
                                    ></textarea>
                                </div>
                                <p v-if="form.errors.message" class="text-red-500 text-sm mt-1">
                                    {{ form.errors.message }}
                                </p>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="showModal = false" class="px-4 py-2 font-semibold capitalize border border-gray-400 cursor-pointer rounded hover:bg-red-600 hover:border-red-600 hover:text-white transition duration-400">
                                    close
                                </button>
                                <button type="submit" :disabled="form.processing"
                                    class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold capitalize rounded cursor-pointer transition duration-400"
                                >
                                    {{ form.processing ? 'Saving...' : 'Send' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </Transition>
        </Teleport>
</template>