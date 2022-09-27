<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from '@inertiajs/inertia-vue3'
</script>

<script>
import Pagination from '@/Components/Pagination'
  
export default {
  components: {
    Pagination
  },
  props: {
    articles: Object,
    articles2: Array

  },
}
</script>
<template>
    <AppLayout title="Articles">
        <div class="mx-auto mb-4 ">











<div class="d-block">
          <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-slate-200">
              Articles
          </h1>
      </div>
      <div class="clearfix"></div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-12 mx-12 w-2xl container px-2 mx-auto">
 


  

                  <div v-for="first31postrow in articles2" :key="first31postrow.id" class="bg-white shadow rounded-lg mt-10 mb-4 ">
          <div class="flex flex-row px-2 py-3 mx-3">
            
              <div class="w-auto h-auto rounded-full border-2 border-green-500">
                <Link :href="`/${first31postrow.username}`"> <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer"  src="{{first31postrow.avatar}}"></Link>
              </div>
              <div class="flex flex-col mb-2 ml-4 mt-1">
                  <div class="text-gray-600 text-sm font-semibold"> <Link :href="`/${first31postrow.username}`"> {{first31postrow.username}}</Link></div>
                  <div class="flex w-full mt-1">
                    
                      <div class="text-gray-400 font-thin text-xs">
                          • <Link :href="`/app/articles/${first31postrow.slug}`">{{first31postrow.time}}</Link>
                      </div>
                  </div>
                  
              </div>
             <div class="mt-3 mx-5 w-full flex justify-end text-xs">
                  <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Views: <div class="ml-1 text-gray-400 text-ms"> {{first31postrow.view}}</div></div>
              </div>
          </div>
          <div class="border-b border-gray-100"></div>
          <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
          <Link :href="`/app/articles/${first31postrow.slug}`"> <div v-html="first31postrow.image"></div></Link>    
          </div>
          <div class="text-gray-600 font-semibold  mb-2 mx-3 px-2"><Link :href="`/app/articles/${first31postrow.slug}`"> {{first31postrow.title}}</Link></div>
           <p class="card-text p-4" v-html="first31postrow.content"></p>
                      
         
                               <div class="flex justify-start mb-4 border-t border-gray-100">
           
              <div class="flex justify-end w-full mt-1 p-4 mb-3 pr-5">
           
                  
                                  <div class="flex justify-end w-full d-inline-block">
                                 

<a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-whatsapp-100.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/twitter?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-twitter-100 (1).png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/facebook?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank"  class="d-inline-block zoom">
<img src="/images/icons/icons8-facebook-100 (1).png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-linkedin-100 (1).png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/telegram?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-telegram-app-100.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/email?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-mail-48.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/reddit?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/849484_reddit_512x512.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-gmail-100.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/print?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-print-48.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-facebook-messenger-48.png" width="22" height="22">
</a>       
</div>

              </div>


          </div>

         
      </div>
         

 
    <pagination class="mt-6" :links="articles.links" />

</div>
  </div>
  
    </AppLayout>
</template>
