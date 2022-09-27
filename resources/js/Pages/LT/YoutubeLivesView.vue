<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
const props = defineProps({
  live: Object,
    image: String,
    url:String

})
</script>

<template>
    <AppLayout :title="`${live.live_title}`">
            <div class="mx-auto">
                <div class="overflow-hidden shadow-xl">
                    <iframe width="100%" height="850px" :src="`${live.live_content}`" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
<br/>
                <div class="md:w-5/12 flex mx-auto mt-5 text-center">
                                           
    
                                           <a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-whatsapp-100.png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/twitter?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-twitter-100 (1).png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/facebook?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank"  class="mx-auto">
                                           <img src="/images/icons/icons8-facebook-100 (1).png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-linkedin-100 (1).png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/telegram?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-telegram-app-100.png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/email?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-mail-48.png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/reddit?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/849484_reddit_512x512.png" width="42" height="42">
                                               </a>
                                           <a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-gmail-100.png" width="42" height="42">
                                               </a>
                                           <a :href="`https://www.addtoany.com/add_to/print?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-print-48.png" width="42" height="42">
                                               </a>
                                           <a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=${url}&amp;linkname=${live.live_title}`" target="_blank" class="mx-auto">
                                           <img src="/images/icons/icons8-facebook-messenger-48.png" width="42" height="42">
                                           </a>       
                                            </div>
            </div>
    </AppLayout>
</template>
