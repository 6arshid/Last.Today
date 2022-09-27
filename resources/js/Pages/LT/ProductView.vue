<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
    purl:String,product: Object,creator:String,owner:String,getfiles:Array,products2:Array,action_button:String,x_slug:String

})
</script>
<template>
    <AppLayout :title="`${product.product_name}`">






      <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                <img class="w-full" v-for="afile in getfiles" :key="afile.f_id"  :src="`${afile.f_path}`" />
            </div> 
            <div class="md:hidden">
                <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">


                    <img class="md:w-48 md:h-48 w-full"  v-for="afile in getfiles" :key="afile.f_id"  :src="`${afile.f_path}`"  />
    
                </div>
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">{{product.product_name}}</p>
                    <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">{{product.product_price}} $                  <Link :href="`/user/products/delete/${product.product_uniqid}`" v-if="action_button == 1"  method="delete" as="button" type="button" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded  float-right">Delete</Link>
             </h1>
                </div>

                <a :href="`https://bank.last.today/${creator}/pay/product/${x_slug}/`" target="_blank" class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                    <img class="mr-3 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1.svg" alt="location">
                    <img class="mr-3 hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1dark.svg" alt="location">
                    Buy Now
                </a>



          

                
                <div>
                    <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">{{product.product_description}}</p>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">City : {{product.product_city}}</p>
                </div>


                <div class="flex">
                                           
    
                                           <a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-whatsapp-100.png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/twitter?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-twitter-100 (1).png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/facebook?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank"  class="d-inline-block">
                                           <img src="/images/icons/icons8-facebook-100 (1).png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-linkedin-100 (1).png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/telegram?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-telegram-app-100.png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/email?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-mail-48.png" width="42" height="42">
                                           </a>
                                           <a :href="`https://www.addtoany.com/add_to/reddit?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/849484_reddit_512x512.png" width="42" height="42">
                                               </a>
                                           <a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-gmail-100.png" width="42" height="42">
                                               </a>
                                           <a :href="`https://www.addtoany.com/add_to/print?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-print-48.png" width="42" height="42">
                                               </a>
                                           <a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=${purl}&amp;linkname=${product.product_name}`" target="_blank" class="d-inline-block">
                                           <img src="/images/icons/icons8-facebook-messenger-48.png" width="42" height="42">
                                           </a>       
                                            </div>


                 

                    <div class="max-w-5xl m-auto">
        <h1 class="text-center font-semibold text-sm mt-4 mb-2 text-gray-600 dark:text-gray-300">Others Products</h1>
        <ul class="border border-gray-200 rounded overflow-hidden shadow-md">
            <li v-for="products in products2" :key="products.id" class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">  <Link :href="`/app/products/${products.slug}`">{{products.title}}</Link>  <p class="float-right">$ {{products.price}}</p></li>
        </ul>
    </div>



    
            </div>
        </div>

    </AppLayout>
</template>
