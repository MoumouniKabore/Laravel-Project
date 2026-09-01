<script setup>

    import DashboardLayout from '../../../Layouts/DashboardLayout.vue'
    import { Head, Link, useForm } from '@inertiajs/vue3'

    const props = defineProps({
        team: Object,
    })

    const form = useForm({
        fullname: props.team.fullname,
        fonction: props.team.fonction,
        phone: props.team.phone,
        email: props.team.email,
        address: props.team.address,
        photo: null,
    })

    const submit = () => {
        form.patch(route('teams.update', props.team.id), {
            forceFormData: true,
            onSuccess: () => {
                form.reset()
            }
        });
    }

</script>

<template>
    <DashboardLayout>
        <Head title="Équipes" />
        <div class="max-w-xl mx-auto p-6 my-5 bg-white rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-700 mb-6 border-3 border-gray-400 text-center rounded-xl py-2 capitalize">
                modification - {{ team.fullname }}
            </h2>
            <form @submit.prevent="submit" class="space-y-3">

                <div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-700">
                            Photo
                        </label>
                        <input type="file" id="photo" name="photo" accept="image/*" @input="form.photo = $event.target.files[0]"
                            class="block text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                            file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer"
                        >
                    </div>
                    <p v-if="form.errors.photo" class="text-red-500 text-sm mt-1">
                        {{ form.errors.photo }}
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div>
                            <label for="fullname" class="inline text-sm font-medium text-gray-700">
                                Nom complet*
                            </label>
                            <input type="text" id="fullname" name="fullname" placeholder="Moumouni Kabore" v-model="form.fullname" required
                                class="capitalize w-full px-4 py-1 mt-1 border border-gray-300 rounded-lg hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                            >
                        </div>
                        <p v-if="form.errors.fullname" class="text-red-500 text-sm mt-1">
                            {{ form.errors.fullname }}
                        </p>
                    </div>
                    <div>
                        <div>
                            <label for="fonction" class="inline text-sm font-medium text-gray-700">
                                Fonction*
                            </label>
                            <select name="fonction" id="fonction" v-model="form.fonction" required
                                class="capitalize w-full px-4 py-1 mt-1 border border-gray-300 hover:border-gray-400 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm"
                            >
                                <option value="">-- {{ team.fonction }} --</option>
                                <option v-show="props.team.fonction !== 'coach principal'" value="coach principal">Coach Principal</option>
                                <option v-show="props.team.fonction !== 'coach sportif'" value="coach sportif">Coach Sportif</option>
                                <option v-show="props.team.fonction !== 'instructeur fitness'" value="instructeur fitness">Instructeur Fitness</option>
                                <option v-show="props.team.fonction !== 'éducateur sportif'" value="éducateur sportif">Éducateur Sportif</option>
                                <option v-show="props.team.fonction !== 'moniteur plateau'" value="moniteur plateau">Moniteur Plateau</option>
                            </select>
                        </div>
                        <p v-if="form.errors.fonction" class="text-red-500 text-sm mt-1">
                            {{ form.errors.fonction }}
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div>
                            <label for="phone" class="inline text-sm font-medium text-gray-700">
                                Téléphone*
                            </label>
                            <input type="text" id="phone" name="phone" placeholder="+225 01 02 03 04 05" v-model="form.phone" required
                                class="w-full px-4 py-1 mt-1 border border-gray-300 rounded-lg hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                            >
                        </div>
                        <p v-if="form.errors.phone" class="text-red-500 text-sm mt-1">
                            {{ form.errors.phone }}
                        </p>
                    </div>
                    <div>
                        <div>
                            <label for="email" class="inline text-sm font-medium text-gray-700">
                                E-mail*
                            </label>
                            <input type="email" id="email" name="email" placeholder="Moumouni Kabore" v-model="form.email" required
                                class="w-full px-4 py-1 mt-1 border border-gray-300 rounded-lg hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                            >
                        </div>
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                            {{ form.errors.email }}
                        </p>
                    </div>
                </div>
                <div>
                    <div class="w-full">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-700">
                            Adresse*
                        </label>
                        <textarea id="adresse" name="address" rows="3" placeholder="Adresse complète" v-model="form.address" required
                            class="w-full px-4 py-1 border border-gray-300 hover:border-gray-400 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none placeholder:text-sm"
                        ></textarea>
                    </div>
                    <p v-if="form.errors.address" class="text-red-500 text-sm mt-1">
                        {{ form.errors.address }}
                    </p>
                </div>

                <!-- Bouton -->
                <div class="flex justify-between gap-4">
                    <button type="submit" :disabled="form.processing"
                        class="w-full bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition duration-300"
                    >
                        {{ form.processing ? 'Modification...' : 'Modifier' }}
                    </button>
                    <Link :href="route('teams.index')" class="px-10 bg-red-600 text-white py-3 rounded-lg font-medium hover:bg-red-700 transition duration-300">
                        Retour
                    </Link>
                </div>
            </form>
        </div>   
    </DashboardLayout>

</template>