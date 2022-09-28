<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'));
};

</script>

<style>
    .last-today-logo .cls-1 {
        fill: url(#linear-gradient);
    }

    .last-today-logo .cls-2 {
        fill: url(#linear-gradient-2);
    }

    .last-today-logo .cls-3 {
        fill: url(#linear-gradient-3);
    }

    .last-today-logo .cls-4 {
        fill: url(#linear-gradient-4);
    }

    .last-today-logo .cls-5 {
        fill: url(#linear-gradient-5);
    }

    .last-today-logo .cls-6 {
        fill: url(#linear-gradient-6);
    }

    .last-today-logo .cls-7 {
        fill: url(#linear-gradient-7);
    }

    .last-today-logo .cls-8 {
        fill: url(#linear-gradient-8);
    }

    .last-today-logo .cls-9 {
        fill: url(#linear-gradient-9);
    }

    .last-today-logo .cls-10 {
        fill: url(#linear-gradient-10);
    }

    .last-today-logo .cls-11 {
        fill: url(#linear-gradient-11);
    }

    .last-today-logo .text-light {
        fill: var(--setxo-h) !important;
    }</style>

<template>
   
        <Head :title="title" />

        <JetBanner />

  
       


            <main>

                <div v-if="$page.props.flash.message" class="alert">
        {{ $page.props.flash.message }}
      </div>
    
                <slot />
              

                <header class="grid place-items-center">
        <nav class="bg-white  dark:bg-slate-700 rounded-full p-3 opacity-75 hover:opacity-100 dark:text-white mb-10 flex mx-auto flex-wrap items-center justify-between w-9/12 py-1 fixed bottom-0 mt-10">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="/" class="flex items-center">
                    <img src="/files/logo.png" class="ml-3 h-6 sm:h-9 zoom" alt="LT">
                </a>
                <div class="flex md:order-2">
                
                <!-- <Link :href="route('dashboard')" :active="route().current('dashboard')">
                <img src="/files/icons/icons8-circled-menu-48.png" class="zoomappindex"/>
                </Link> -->
                <Link :href="route('setting')"><img src="/files/icons/icons8-setting-64.png" class="zoomappindex"/></Link>
                <Link :href="route('mydashboard')" :active="route().current('mydashboard')">
                        <img src="/files/icons/icons8-user-48.png" class="zoomappindex"/>
                        </Link>
                    <Link :href="route('menu')">
            <img class="zoomappindex" src="/files/icons/icons8-circled-menu-48.png">
              </Link>
                </div>
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 mt-4 rounded-lg border border-gray-100 md:flex-row md:space-x-2 md:mt-0 md:text-sm md:font-medium md:border-0 dark:border-gray-700">
                   
                           <li>
                <Link :href="route('articles')" :active="route().current('articles')">
                            <img src="/files/icons/icons8-news-100.png" class="zoomappindex"/>
                     </Link>
            
            </li> 
                        <li>
                            <Link :href="route('worldometers')" :active="route().current('worldometers')" >
                            <img src="/files/icons/icons8-globe-48.png" class="zoomappindex"/>
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('user_hashtags_wall')" :active="route().current('user_hashtags_wall')" >
                            <img src="/files/icons/icons8-hashtags-64.png" class="zoomappindex" width="48" height="48"/>
                             </Link>
                        </li>
                         <li>
                            <Link :href="route('user_connections_wall')" :active="route().current('user_connections_wall')" >
                            <img src="/files/icons/icons8-agree-64.png" class="zoomappindex" width="48" height="48"/>
                             </Link>
                        </li>
                        <!-- <li>
                            <img src="/files/icons/icons8-spotify-48.png" class="zoomappindex"/>
                        </li> -->
                        <li>
                    <Link :href="route('youtubelives')" :active="route().current('youtubelives')">

                            <img src="/files/icons/icons8-youtube-48.png" class="zoomappindex"/>

                            </Link>
                        </li>
                        <li>
                            <Link :href="route('new_article')" :active="route().current('new_article')">
                            <img src="/files/icons/icons8-pen-48.png" class="zoomappindex"/>
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('nftmarketplace')" :active="route().current('nftmarketplace')">
                            <img src="/files/icons/icons8-nft-64-4.png" class="zoomappindex"/>
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('userhomeshopindex')" :active="route().current('userhomeshopindex')">
                            <img src="/files/icons/icons8-online-shop-48.png" class="zoomappindex"/>
                            </Link>
                        </li>
                       
                        <li>
                      <Link :href="route('users')" :active="route().current('users')">

                            <img src="/files/icons/icons8-group-48.png" class="zoomappindex"/>
                        </Link>
                    
                        </li>
                        <li>
                                <Link :href="`/vpn`">
                                <img src="/files/icons/icons8-vpn-60.png" height="40"  class="zoomappindex">
                                </Link>
                            </li>
                        <li>
                            <Link :href="route('notifications')" :active="route().current('notifications')">

                    <img src="/assets/img/icons8-notification-48.png" height="40"  class="zoomappindex">
                    
                </Link>
                        </li>
                  

                       
                        <!-- <li>
   <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
    Toggle login modal
    </button>   
    
    </li> -->
                    </ul>
                </div>

            </div>
        </nav>

    </header>
            </main>
<!-- 
            <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
    <div> 
        <Link :href="route('menu')"  class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center w-full h-full rounded-full" src="/files/icons/icons8-circled-menu-48.png">
        </Link>
    </div>
</div>
 -->

</template>
