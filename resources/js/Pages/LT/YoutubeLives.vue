<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
  lives: Array
})
</script>

<template>
    <AppLayout title="Youtube Lives">
        <div class="w-11/12 md:w-12/12 mx-auto">
            <h1 class="float-start  pt-10 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200">
                Youtube Lives
            </h1>
            <div class="relative  justify-center py-6 sm:py-12">
                <div class="columns-1 md:columns-2 lg:columns-3 2xl:columns-4 gap-6 [column-fill:_balance] box-border mx-auto before:box-inherit after:box-inherit">
                    <Article  v-for="live in lives" :key="live.id" class="break-inside-avoid mb-6">
                        <div class="card p-4">
                            <Link :href="`/app/lives/${live.id}/view`">
                                                                <h3 class="mb-3"> {{live.title}}</h3>
                                                                <div class="CardImg mb-3">
                                    <Link :href="`/app/lives/${live.id}/view`"><img :src="`${live.image}`" :alt="`${live.title}`"></Link>
                                    </div>
                           
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" v-html="live.live_content"></p>
                        </Link>

                        <Link :href="`/app/lives/${live.id}/view`" class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300 w-full">View</Link> 

                            <div class="flex justify-between items-center">
                              
<br/>
                                <div class="flex justify-end w-full d-inline-block">
                                     
                                     <a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-whatsapp-100.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/twitter?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-twitter-100 (1).png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/facebook?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank"  class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-facebook-100 (1).png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-linkedin-100 (1).png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/telegram?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-telegram-app-100.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/email?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-mail-48.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/reddit?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/849484_reddit_512x512.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-gmail-100.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/print?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-print-48.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=/app/lives/${live.id}/view&amp;linkname=${live.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-facebook-messenger-48.png" width="22" height="22">
                                     </a>       
                                     </div>
                            </div>
                        </div>
                    </Article>



                    
             
                </div>

            </div>

        </div>


      
    </AppLayout>
</template>
