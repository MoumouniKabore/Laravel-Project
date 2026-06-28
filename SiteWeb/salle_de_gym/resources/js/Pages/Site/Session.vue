<script setup>
    import { Head } from '@inertiajs/vue3'
    import SiteLayout from '../../Layouts/SiteLayout.vue'
</script>

<template>
    <Head title="Nos différents classes" />
    <SiteLayout>
        <!-- Hero Section -->
        <header class="relative">
            <div>
                <img src="/images/breadcrumb-bg.jpg" class="w-full h-70 md:h-100 object-cover">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="uppercase text-white text-4xl md:text-6xl font-bold">class detail</h1>
                <p class="capitalize text-white font-semibold text-md md:text-xl mt-2">
                    <a :href="route('home')" class="hover:text-gray-300">home</a>
                    <i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i>
                    <a :href="route('service')" class="hover:text-gray-300">Service</a>
                    <i class="bi bi-chevron-right text-[10px] md:text-[12px] px-1"></i>
                    <span class="text-amber-500 text-md md:text-xl">Class</span>
                </p>
            </div>
        </header>

        <section class="bg-black/90 px-10 md:px-25 py-16">
            <div class="lg:flex">

                <!-- Left -->
                <div class="w-full lg:w-[65%] space-y-8 md:pe-6">
                    <div>
                        <img src="/images/classes/class-details/class-detailsl.jpg" class="w-full object-cover">
                    </div>
                    <div>
                        <h3 class="uppercase text-3xl text-white font-bold mb-4">body buiding</h3>
                        <p class="text-gray-300 text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute 
                            irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                            aliqua accusantium doloremque laudantium. Excepteur sint occaecat cupidatat non proident sculpa.
                        </p>
                    </div>
                    <div>
                        <h3 class="uppercase text-3xl text-white font-bold mb-4">Trainer</h3>
                        <p class="text-gray-300 text-sm">
                            Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis 
                            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur officia deserunt mollit.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <img src="/images/classes/class-details/trainer-profile.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-8 pt-4 md:p-6 ">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="capitalize text-2xl text-white font-bold mb-2">arthart rachel</h3>
                                    <p class="uppercase text-gray-200 text-sm mb-2">gym trainer</p>
                                </div>
                                <ul class="flex gap-2 text-gray-300">
                                    <li><a href=""><i class="bi bi-facebook"></i></a></li>
                                    <li><a href=""><i class="bi bi-twitter"></i></a></li>
                                    <li><a href=""><i class="bi bi-youtube"></i></a></li>
                                    <li><a href=""><i class="bi bi-instagram"></i></a></li>
                                    <li><a href=""><i class="bi bi-envelope"></i></a></li>
                                </ul>
                            </div>
                            <p class="text-gray-300 text-sm">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua viverra maecenas lacus vel facilisis.
                            </p>
                            <ul>
                                <li class="text-sm capitalize mb-2">
                                    <span class="text-white font-bold">age</span>
                                    <span class="ms-32 text-gray-300">35</span>
                                </li>
                                <hr class="text-white/20 mb-4">
                                <li class="text-sm capitalize mb-2">
                                    <span class="text-white font-bold">Weight</span>
                                    <span class="ms-26 text-gray-300">148lbs</span>
                                </li>
                                <hr class="text-white/20 mb-4">
                                <li class="text-sm capitalize mb-2">
                                    <span class="text-white font-bold">Height</span>
                                    <span class="ms-27 text-gray-300">10' 2``</span>
                                </li>
                                <hr class="text-white/20 mb-4">
                                <li class="text-sm capitalize mb-2">
                                    <span class="text-white font-bold">Occupation</span>
                                    <span class="ms-20 text-gray-300">no-founder</span>
                                </li>
                            </ul>
                            <p class="text-sm text-gray-300">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua viverra maecenas lacus vel facilisis.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="w-full sm:w-[70%] lg:w-[35%] lg:px-10">
                    <div class="mb-10">
                        <h3 class="text-white text-2xl uppercase font-bold mb-8 mt-10 lg:mt-0">categories</h3>
                        <ul class="space-y-5">
                            <li class="text-sm capitalize text-gray-300 flex justify-between">
                                <span>Yoga</span>
                                <span>12</span>
                            </li>
                            <li class="text-sm capitalize text-gray-300 flex justify-between">
                                <span>Runing</span>
                                <span>32</span>
                            </li>
                            <li class="text-sm capitalize text-gray-300 flex justify-between">
                                <span>Weightloss</span>
                                <span>86</span>
                            </li>
                            <li class="text-sm capitalize text-gray-300 flex justify-between">
                                <span>Cario</span>
                                <span>25</span>
                            </li>
                            <li class="text-sm capitalize text-gray-300 flex justify-between">
                                <span>Body buiding</span>
                                <span>36</span>
                            </li>
                            <li class="text-sm capitalize text-gray-300 flex justify-between">
                                <span>Nutrition</span>
                                <span>15</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-8">
                        <h3 class="text-white text-2xl font-bold uppercase mb-6">latest posts</h3>
                        <div class="relative">
                            <img src="/images/letest-blog/latest-1.jpg" class="w-full object-cover">
                            <div class="px-6 py-4 absolute bottom-0">
                                <h4 class="text-white text-xl capitalize font-bold mb-2">
                                    This Japanese Way of Making Iced Coffee Is a Game...
                                </h4>
                                <p class="text-sm text-gray-500">
                                    <span>Aug 20, 2019</span>
                                    <span class="mx-2">|</span>
                                    <span>20 Comment</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8 flex">
                        <div>
                            <img src="/images/letest-blog/latest-2.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-white">Grilled Potato and Green Bean Salad</h4>
                            <span class="text-sm text-gray-500">Aug 15, 2019</span>
                        </div>
                    </div>
                    <div class="mb-8 flex">
                        <div>
                            <img src="/images/letest-blog/latest-3.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-white">Grilled Potato and Green Bean Salad</h4>
                            <span class="text-sm text-gray-500">Aug 15, 2019</span>
                        </div>
                    </div>
                    <div class="mb-8 flex">
                        <div>
                            <img src="/images/letest-blog/latest-4.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-white">Grilled Potato and Green Bean Salad</h4>
                            <span class="text-sm text-gray-500">Aug 15, 2019</span>
                        </div>
                    </div>
                    <div class="mb-8 flex">
                        <div>
                            <img src="/images/letest-blog/latest-5.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="ms-4">
                            <h4 class="text-white">Grilled Potato and Green Bean Salad</h4>
                            <span class="text-sm text-gray-500">Aug 15, 2019</span>
                        </div>
                    </div>
                    <div>
                        <img src="/images/sidebar-banner.jpg" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Class timetable -->
        <section class="bg-black/90 px-10 md:px-25 py-16">
            <h3 class="text-white text-xl font-bold mb-8">Classes timetable</h3>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table id="class">
                    <thead class="bg-amber-500 text-white/80 capitalize">
                        <tr>
                            <th></th>
                            <th>monday</th>
                            <th>tuesday</th>
                            <th>wednesday</th>
                            <th>thursday</th>
                            <th>friday</th>
                            <th>saturday</th>
                            <th>sunday</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Ligne 1 -->
                        <tr>
                            <td class="hour">6.00am - 8.00am</td>
                            <td>
                                <h4>weight loose</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                            <td>
                                <h4>cardio</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                            <td>
                                <h4>yoga</h4>
                                <span class="name">keaf shen</span>
                            </td>
                            <td>
                                <h4>fitness</h4>
                                <span class="name">kimberly stone</span>
                            </td>
                            <td><span><i class="bi bi-x-lg text-6xl"></i></span></td>
                            <td>
                                <h4>boxing</h4>
                                <span class="name">rachel adam</span>
                            </td>
                            <td>
                                <h4>body building</h4>
                                <span class="name">robert cage</span>
                            </td>
                        </tr>

                        <!-- Ligne 2 -->
                        <tr>
                            <td class="hour">10.00am - 12.00am</td>
                            <td><span><i class="bi bi-x-lg text-6xl"></i></span></td>
                            <td>
                                <h4>fitness</h4>
                                <span class="name">kimberly stone</span>
                            </td>
                            <td>
                                <h4>weight loose</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                            <td>
                                <h4>cardio</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                            <td>
                                <h4>body building</h4>
                                <span class="name">robert cage</span>
                            </td>
                            <td>
                                <h4>Karate</h4>
                                <span class="name">Donald Grey</span>
                            </td>
                            <td><span><i class="bi bi-x-lg text-6xl"></i></span></td>
                        </tr>

                        <!-- Ligne 3 -->
                        <tr>
                            <td class="hour">5.00pm - 7.00pm</td>
                            <td>
                                <h4>boxing</h4>
                                <span class="name">rachel adam</span>
                            </td>
                            <td>
                                <h4>Karate</h4>
                                <span>Donald Grey</span>
                            </td>
                            <td>
                                <h4>body building</h4>
                                <span class="name">robert cage</span>
                            </td>
                            <td><span><i class="bi bi-x-lg text-6xl"></i></span></td>
                            <td>
                                <h4>yoga</h4>
                                <span class="name">keaf shen</span>
                            </td>
                            <td>
                                <h4>cardio</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                            <td>
                                <h4>fitness</h4>
                                <span class="name">kimberly stone</span>
                            </td>
                        </tr>

                        <!-- Ligne 4 -->
                        <tr>
                            <td class="hour">7.00pm - 9.00pm</td>
                            <td>
                                <h4>cardio</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                            <td><span><i class="bi bi-x-lg text-6xl"></i></span></td>
                            <td>
                                <h4>boxing</h4>
                                <span class="name">rachel adam</span>
                            </td>
                            <td>
                                <h4>yoga</h4>
                                <span class="name">keaf shen</span>
                            </td>
                            <td>
                                <h4>Karate</h4>
                                <span class="name">Donald Grey</span>
                            </td>
                            <td>
                                <h4>boxing</h4>
                                <span class="name">rachel adam</span>
                            </td>
                            <td>
                                <h4>weight loose</h4>
                                <span class="name">rLefew d. loee</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </SiteLayout>
</template>

<style>
    #class {
        width: 100%;
        border: 1px solid rgb(62, 59, 59);
    }

    #class thead tr th {
        padding: 1rem 2rem;
        text-align: center;
        border: 1px solid rgb(45, 43, 43);
        color: rgb(221, 210, 210);
        font-weight: 500;
    }

    #class tbody tr:nth-child(odd) td:nth-child(even) {
        background-color: rgb(18, 16, 16);
    }

    #class tbody tr:nth-child(even) td:nth-child(odd) {
        background-color: rgb(18, 16, 16);
    }

    #class tbody tr td {
        padding: 2rem 0.5rem;
        text-align: center;
    }

    #class tbody tr .hour {
        color: rgb(94, 164, 14);
        font-size: 0.8rem;
        font-weight: 600;
        background-color: rgb(12, 11, 11) !important;
        border: 1px solid rgb(45, 43, 43);
    }

    #class tbody tr td h4 {
        font-size: 1.2rem;
        font-weight: bold;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.20);
    }

    #class tbody tr td span {
        font-size: 0.8rem;
        text-transform: capitalize;
        color: rgba(255, 255, 255, 0.2);
    }

    #class tbody tr td:hover h4 {
        color: white !important;
        transition: 0.6s;
    }

    #class tbody tr td:hover .name {
        color: white !important;
        transition: 0.6s;
    }
</style>