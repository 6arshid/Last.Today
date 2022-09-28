<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from '@inertiajs/inertia-vue3'
const props = defineProps({
username:String
})
</script>

<template>
    <AppLayout title="Menu">

        <div class="flex items-end justify-end fixed top-0 right-0 mt-4 mr-4 z-10">
    <div> 
        <Link :href="route('close')"  class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center w-full h-full rounded-full" src="/files/icons/icons8-close-64.png">
        </Link>
    </div>
</div>


        <div class="MainMenu">
                <!-- drawer component -->
                <div id="drawer-bottom-example"
                     class=" z-40 w-full p-4 overflow-y-auto dark:bg-gray-800 transition-transform bottom-0 left-0 right-0 transform-none"
                     tabindex="-1" aria-labelledby="drawer-bottom-label" aria-modal="true" role="dialog">
                    <h5 id="drawer-bottom-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    </h5>
                   
                    <div class="offcanvas-body mt-8 text-center">
                        <div class="grid grid-cols-2 xl:grid-cols-4 md:grid-cols-4 sm:grid-cols-3 gap-4">
                            <!-- <div>
                            <Link :href="route('welcome')" :active="route().current('welcome')" class="w-48">
                            <br/>
                            <img src="/files/logo.png" class="mx-auto d-block  zoom"/>
                            </Link>                               
                            </div> -->
                            <div>
                            <Link :href="route('worldometers')" :active="route().current('worldometers')" >
                            <img src="/files/icons/icons8-globe-48.png" class="mx-auto d-block  zoom"/>
                            <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">WorldOMeters</h4>
                            </Link>                               
                            </div>
                            <div>
                                <Link :href="route('articles')" :active="route().current('articles')">

                                <img src="/files/icons/icons8-news-100.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Contents</h4>
                                </Link>
                            </div>
                            <div>
                                <Link :href="route('user_hashtags_wall')" :active="route().current('user_hashtags_wall')" >

                                <img src="/files/icons/icons8-hashtags-64.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Wall</h4>
                                </Link>
                            </div>
                            <div>
                                <Link :href="route('user_connections_wall')" :active="route().current('user_connections_wall')" >
                            <img src="/files/icons/icons8-agree-64.png" class="mx-auto d-block  zoom" width="48" height="48"/>
                            <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Connections</h4>

                             </Link>
                            </div>
                      
                            <div>
                                <Link :href="route('new_article')" :active="route().current('new_article')">
                                <img src="/files/icons/icons8-pen-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Add Article</h4>
                            </Link>

                            </div>
                            <div>
                                <Link :href="route('users')" :active="route().current('users')">

                                <img src="/files/icons/icons8-group-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Users</h4>
                                </Link>
                            </div>
                           
                            <div>
                                <Link :href="route('youtubelives')" :active="route().current('youtubelives')">

                                <img src="/files/icons/icons8-youtube-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Youtube</h4>
                            </Link>

                            </div>
                            
                            <div>
                                <Link :href="route('nftmarketplace')" :active="route().current('nftmarketplace')">

                                <img src="/files/icons/icons8-nft-64-4.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">NFT Marketplace</h4>
                            </Link>

                            </div>
                            <div>
                                <Link :href="route('notes')" :active="route().current('notes')" >

                                <img src="/files/icons/icons8-note-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Note</h4>
                            </Link>

                            </div>
                           
                            <div>
                                <Link :href="route('userhomeshopindex')" :active="route().current('userhomeshopindex')">

                                <img src="/files/icons/icons8-online-shop-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Shops</h4>
                            </Link>

                            </div>
                            <div>
                                <a href="https://bank.last.today/s/bank/ordertracking" target="_blank">
                                <img src="/files/icons/icons8-ecommerce-64.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Order Tracking</h4>
                                </a>
                            </div>
                            <div>
                                <Link :href="route('mydashboard')" :active="route().current('mydashboard')">
                                <img src="/files/icons/icons8-dashboard-64.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Dashboard</h4>
                                </Link>
                            </div>  
                            <div>
                                <Link :href="route('notifications')" :active="route().current('notifications')">

                                <img src="/files/icons/icons8-notification-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Notifications</h4>
                                </Link>
                            </div>  
                            <div>
                                <Link :href="`/vpn`">
                                <img src="/files/icons/icons8-vpn-60.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Free VPN</h4>
                                </Link>
                            </div>

                            <element v-if="$page.props.user">
                                <Link :href="`/${username}`">
                                <img src="/files/icons/icons8-user-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Your Profile</h4>
                                </Link>
                                 
                            </element>
                            <div>
                                <Link :href="route('information')" :active="route().current('information')">
                                <img src="/files/icons/icons8-info-48.png" class="mx-auto d-block zoom">
                                <h4 class="text-gray-800 dark:text-gray-50 dark:text-slate-200">Information</h4>
                                </Link>
                            </div>



                        </div>
                    </div>
                  
                </div>
            </div>
            <br/><br/><br/><br/><br/><br/>
    </AppLayout>
</template>
