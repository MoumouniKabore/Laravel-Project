<script setup>

    import DashboardLayout from '../../Layouts/DashboardLayout.vue'
    import { Head, Link, usePage } from '@inertiajs/vue3'
    import { computed } from 'vue';

    const page = usePage()
    const moyenne = computed(() => {
        return page.props.testimonie_star_avg
    })

    const props = defineProps({
        teams: Array,
        testimonies: Array,
        avis_graphiques: {
            type: Array,
            default: () => []
        }
    })

    import {
        Chart as ChartJS,
        Title,
        Tooltip,
        Legend,
        BarElement,
        CategoryScale,
        LinearScale
    } from 'chart.js'

    import { Bar } from 'vue-chartjs'

    ChartJS.register(
        Title,
        Tooltip,
        Legend,
        BarElement,
        CategoryScale,
        LinearScale
    )

    // Données du graphique
    const chartData = {
        labels: props.avis_graphiques.map(avis_graphique => avis_graphique.star),

        datasets: [
            {
                label: "Nombre d'étoile",
                data: props.avis_graphiques.map(avis_graphique => avis_graphique.total),

                backgroundColor: [
                    '#3B82F6',
                    '#EF4444',
                    '#22C55E',
                    '#22C55E',
                    '#H89E0B'
                ],

                // Arrondir légèrement les barres
                borderRadius: 4,

                // Largeur des barres
                barPercentage: 1,
                categoryPercentage: 0.7
            }
        ]
    }

    // Configuration du graphique
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            title: {
                display: true,
                text: "Nombre d'étoile",
                font: {
                    size: 14,
                    weight: 'bold'
                },
                padding: {
                    bottom: 10
                }
            },

            legend: {
                display: false
            },

            tooltip: {
                enabled: true
            }
        },

        scales: {

            // AXE X
            x: {
                title: {
                    display: true,
                    text: 'Étoiles',
                    font: {
                        size: 14,
                        weight: 'bold'
                    }
                },

                ticks: {
                    font: {
                        size: 12
                    }
                },

                grid: {
                    display: false
                }
            },

            // AXE Y
            y: {
                beginAtZero: true,

                title: {
                    display: true,
                    text: 'Nombres',
                    font: {
                        size: 14,
                        weight: 'bold'
                    }
                },

                ticks: {
                    precision: 0,
                    stepSize: 1
                },

                grid: {
                    color: '#E5E7EB'
                }
            }
        }
    }

</script>

<template>

    <DashboardLayout>
        <Head title="Home Dashboard" />
        <div class="px-4">
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-2">
                <div class="bg-red-600 text-white rounded-xl">
                    <div class="bg-amber-400 py-2 w-full rounded-t-xl"></div>
                    <div class="flex justify-around items-center py-4 px-2">
                        <div class="text-center text-md font-semibold">
                            <p>Membres Équipes</p>
                            <p>{{ page.props.team_all }}</p>
                        </div>
                        <div class="border-l text-sm ps-2">
                            <div class="space-x-2">
                                <span><i class="bi bi-wifi"></i></span>
                                <span>{{ page.props.team_publier }}</span>
                            </div>
                            <div class="space-x-2">
                                <span><i class="bi bi-wifi-off"></i></span>
                                <span>{{ page.props.team_non_publier }}</span>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="bg-red-600 text-white rounded-xl">
                    <div class="bg-amber-400 py-2 w-full rounded-t-xl"></div>
                    <div class="flex justify-around items-center py-4 px-2">
                        <div class="text-center text-md font-semibold">
                            <p>Réservations</p>
                            <p>{{ page.props.appointment_all }}</p>
                        </div>
                        <div class="border-l text-sm ps-2">
                            <div class="space-x-2">
                                <span><i class="bi bi-eye"></i></span>
                                <span>{{ page.props.appointment_lu }}</span>
                            </div>
                            <div class="space-x-2">
                                <span><i class="bi bi-eye-slash"></i></span>
                                <span>{{ page.props.appointment_non_lu }}</span>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="bg-red-600 text-white rounded-xl">
                    <div class="bg-amber-400 py-2 w-full rounded-t-xl"></div>
                    <div class="flex justify-around items-center py-4 px-2">
                        <div class="text-center text-md font-semibold">
                            <p>Avis Clients</p>
                            <p>{{ page.props.testimonie_all }}</p>
                        </div>
                        <div class="border-l text-sm ps-2">
                            <div class="space-x-2">
                                <span><i class="bi bi-wifi"></i></span>
                                <span>{{ page.props.testimonie_publier }}</span>
                            </div>
                            <div class="space-x-2">
                                <span><i class="bi bi-eye"></i></span>
                                <span>{{ page.props.testimonie_lu }}</span>
                            </div>
                            <div class="space-x-2">
                                <span><i class="bi bi-eye-slash"></i></span>
                                <span>{{ page.props.testimonie_non_lu }}</span>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="bg-red-600 text-white rounded-xl">
                    <div class="bg-amber-400 py-2 w-full rounded-t-xl"></div>
                    <div class="flex justify-around items-center py-4 px-2">
                        <div class="text-center text-md font-semibold">
                            <p>Messages</p>
                            <p>{{ page.props.message_all }}</p>
                        </div>
                        <div class="border-l text-sm ps-2">
                            <div class="space-x-2">
                                <span><i class="bi bi-eye"></i></span>
                                <span>{{ page.props.message_lu }}</span>
                            </div>
                            <div class="space-x-2">
                                <span><i class="bi bi-eye-slash"></i></span>
                                <span>{{ page.props.message_non_lu }}</span>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="bg-red-600 text-white rounded-xl">
                    <div class="bg-amber-400 py-2 w-full rounded-t-xl"></div>
                    <div class="flex justify-center items-center py-4 px-2">
                        <div class="text-center text-md font-semibold">
                            <p>Moyenne des Avis</p>
                            <p>{{ moyenne }}</p>
                        </div>     
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-8">
                <div class="shadow-md rounded-2xl py-2 px-4">
                    <div class="flex justify-between items-center text-sm mb-2">
                        <h4 class="font-bold uppercase">Les avis non lu</h4>
                        <Link :href="route('all.testimonie')" class="text-red-400 hover:text-red-600 font-semibold">Voir toute la liste</Link>                    
                    </div>
                    <table class="w-full">
                        <thead class="bg-red-300 px-2">
                            <tr class="text-sm">
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Étoiles</th>
                                <th>Détail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="testimonie in testimonies" :key="testimonie.id" class="text-sm text-center border-b border-gray-200">
                                <td class="flex justify-center">
                                    <span><img :src="testimonie.photo ? `/storage/${testimonie.photo}` : '/images/profil_inconnu.jpg'" class="w-8 h-8 rounded-full object-cover p-1"/></span>
                                </td>
                                <td><span class="capitalize">{{ testimonie.firstname }}</span></td>
                                <td><span class="capitalize">{{ testimonie.lastname }}</span></td>
                                <td><span class="">{{ testimonie.star }}</span></td>
                                <td>
                                    <Link :href="route('show.testimonie', testimonie.id)" class="text-amber-500 hover:text-amber-600" title="Voir détail">
                                        <i class="bi bi-eye"></i>
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shadow-md p-2 rounded-2xl">
                    <Bar
                        :data="chartData"
                        :options="chartOptions"
                    />
                </div>
            </div>
            <div class="mt-6">
                <div class="shadow-md rounded-2xl py-2 px-4">
                    <div class="flex justify-between items-center text-sm mb-2">
                        <h4 class="font-bold uppercase">Équipes</h4>
                        <Link :href="route('teams.index')" class="text-red-400 hover:text-red-600 font-semibold">Voir toute la liste</Link>                    
                    </div>
                    <div class="">
                        <table class="w-full">
                            <thead class="bg-red-300 px-2">
                                <tr class="text-sm ">
                                    <th>Photo</th>
                                    <th>Nom complet</th>
                                    <th>Fonction</th>
                                    <th>Téléphone</th>
                                    <th>Détail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="team in teams" :key="team.id" class="text-sm text-center border-b border-gray-200">
                                    <td class="flex justify-center">
                                        <span><img :src="team.photo ? `/storage/${team.photo}` : '/images/profil_inconnu.jpg'" class="w-8 h-8 rounded-full object-cover p-1"/></span>
                                    </td>
                                    <td><span class="capitalize">{{ team.fullname }}</span></td>
                                    <td><span class="capitalize">{{ team.fonction }}</span></td>
                                    <td><span class="">{{ team.phone }}</span></td>
                                    <td>
                                        <Link :href="route('teams.show', team.id)" class="text-amber-500 hover:text-amber-600" title="Voir détail">
                                            <i class="bi bi-eye"></i>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>

</template>