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
    products: Object,
    products2: Array

  },
}
</script>
<template>
    <AppLayout title="Products">
        <div class="w-11/12 md:w-12/12 mx-auto">
            <h1 class="float-start  pt-10 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200">
                Products
            </h1>
            <Link href="/user/products/new" class="btn btn-primary float-end mt-3 mb-3">Add New</Link>

            <div class="relative flex min-h-screen flex-col justify-center py-6 sm:py-12">
                <div class="columns-1 md:columns-2 lg:columns-3 2xl:columns-4 gap-6 [column-fill:_balance] box-border mx-auto before:box-inherit after:box-inherit">
                    <Article  v-for="first31postrow in products2" :key="first31postrow.id" class="break-inside-avoid mb-6">
                        <div class="card p-4">
                            <Link :href="`/app/products/${first31postrow.slug}`">
                                                                <h3 class="mb-3"> {{first31postrow.title}}</h3>
                           
                            <div class="CardImg mb-3" v-html="first31postrow.image"></div>
                           
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" v-html="first31postrow.content"></p>
                        </Link>
                            <div class="flex justify-between items-center">
                                <!-- Views: <div class="ml-1 text-gray-400 text-ms"> {{first31postrow.view}}</div> -->
                                <!-- <a href="#" class="card-link">#Forex</a> -->
<br/>
                                <div class="flex justify-end w-full d-inline-block">
                                     
    
                                     <a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-whatsapp-100.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/twitter?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-twitter-100 (1).png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/facebook?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank"  class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-facebook-100 (1).png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-linkedin-100 (1).png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/telegram?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-telegram-app-100.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/email?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-mail-48.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/reddit?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/849484_reddit_512x512.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-gmail-100.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/print?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-print-48.png" width="22" height="22">
                                     </a>
                                     <a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=/app/products/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
                                     <img src="/images/icons/icons8-facebook-messenger-48.png" width="22" height="22">
                                     </a>       
                                     </div>
                            </div>
                        </div>
                    </Article>



                    
             
                </div>

            </div>
            <pagination class="mt-6" :links="products.links" />

        </div>


    </AppLayout>
</template>
