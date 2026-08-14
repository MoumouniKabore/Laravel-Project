<script setup>
    import { Head, Link } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'
    import { computed, ref } from 'vue'

    const height = ref('');
    const weight = ref('');
    const bmi = ref(null);

    const calculate = () => {
        const h = parseFloat(height.value)
        const w = parseFloat(weight.value)

        bmi.value = (w / (h*h)).toFixed(2)
    };

    const reset = () => {
        height.value = ''
        weight.value = ''
        bmi.value = null
    };

</script>

<template>
    <Head title="Calculer votre IMC" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">bmi calculator</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <Link :href="route('home')" class="hover:text-gray-300">home</Link><i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i><span class="text-amber-500 text-md md:text-xl">bmi</span>
                </p>
            </div>
        </header>

        <section class="bg-black/90 px-10 md:px-25 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div>
                    <h4 class="uppercase text-xl text-amber-500 font-semibold">check your body</h4>
                    <h3 class="uppercase text-3xl text-white font-bold mb-8">calculate your bmi</h3>

                    <p class="text-gray-200">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. 
                        Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                    </p>

                    <form @submit.prevent="calculate" class="space-y-4 mt-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <input type="text" v-model.number="height" step="0.01" placeholder="Height / m"
                                    class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                    required
                                >
                            </div>
                            <div>
                                <input type="text" v-model.number="weight" step="0.01" placeholder="Weight / kg"
                                    class="w-full px-4 py-1 text-white border border-white/30 outline-none placeholder-white/60"
                                    required
                                >
                            </div>                        
                        </div>
                        <div class="flex gap-2">
                            <button @click="calculate" type="submit" 
                                class="w-full py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold uppercase cursor-pointer transition duration-400"
                            >
                                calculate
                            </button>
                            <button @click="reset" class="bg-red-600 hover:bg-red-700 text-white font-bold px-5 uppercase cursor-pointer">
                                reset
                            </button>
                        </div>
                    </form>
                    <div class="space-x-2 mt-8 text-2xl flex justify-center items-center">
                        <span class="text-gray-200 font-black">BMI : </span>
                        <span v-if="bmi !== null" class="text-amber-500 font-black">{{ bmi }}</span>
                        <span v-else class="text-white">---</span>
                    </div>
                </div>
                <div>
                    <h4 class="uppercase text-xl text-amber-500 font-semibold">check your body</h4>
                    <h3 class="uppercase text-3xl text-white font-bold mb-8">bmi calculator chart</h3>

                    <table id="bmi" class="text-white">
                        <thead>
                            <tr>
                                <th class="w-60">bmi</th>
                                <th>weight status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr :class="bmi > 0 && bmi < 18.5 ? 'font-bold text-amber-500' : ''">
                                <td>Below 18.5</td>
                                <td>Underweight</td>
                            </tr>
                            <tr :class=" bmi >= 18.5 && bmi < 25 ? 'font-bold text-amber-500' : ''">
                                <td>18.5 - 24.9</td>
                                <td>Healthy</td>
                            </tr>
                            <tr :class=" bmi >= 25 && bmi < 30 ? 'font-bold text-amber-500' : ''">
                                <td>25.0 - 29.9</td>
                                <td>Overweight</td>
                            </tr>
                            <tr :class=" bmi > 30 ? 'font-bold text-amber-500' : ''">
                                <td>30.0 - and Above</td>
                                <td>Obese</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>

<style>
    #bmi {
        width: 100%;
        border: 1px solid rgb(59, 51, 51);
    }

    #bmi thead tr th {
        padding: 0.8rem 2rem;
        text-align: start;
        border: 1px solid rgb(59, 51, 51);
        color: rgb(221, 210, 210);
        font-weight: 600;
        background-color: black;
        text-transform: uppercase;
    }

    #bmi tbody tr:nth-child(odd) {
        background-color: rgb(38, 36, 36);
    }

    #bmi tbody tr:nth-child(even) {
        background-color: rgb(22, 21, 21);
    }

    #bmi tbody tr td {
        padding: 0.8rem 2rem;
        text-align: start;
        border: 1px solid rgb(59, 51, 51);
    }
</style>