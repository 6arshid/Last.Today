<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
product: Object,creator:String,owner:String,getfiles:Array,products2:Array,action_button:String

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

                <a :href="`https://bank.last.today/${creator}/pay/${product.product_price}/${product.product_name}/`" target="_blank" class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                    <img class="mr-3 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1.svg" alt="location">
                    <img class="mr-3 hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1dark.svg" alt="location">
                    Buy Now
                </a>



          

                
                <div>
                    <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">{{product.product_description}}</p>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">City : {{product.product_city}}</p>
                </div>

            </div>
        </div>
        
        
    



<div class="row flex items-center justify-center mt-5">
     <div class="col-md-8 mx-auto">
        <div class="row">
          <div class="col-md-8">
 <h1>{{product.product_name}}</h1>
         <a :href="`https://bank.last.today/@${creator}/pay/${product.product_price}/${product.product_uniqid}/`" target="_blank" class="btn btn-primary mb-3 me-3 float-end">Buy Now</a>
 
 
    <Link :href="`/user/products/delete/${product.product_uniqid}`" v-if="action_button == 1"  method="delete" as="button" type="button" class="btn btn-danger me-1 text-dark">Delete</Link>

        <p>{{ product.product_description}}</p>
        <h5>${{product.product_price}}</h5>
       <br>
   <div class="row">
      <article v-for="afile in getfiles" :key="afile.f_id" class="col-md-4 mb-2 mt-3">
 <a :href="`${afile.f_path}`" target="_blank"><img :src="`${afile.f_path}`"/></a>
 </article>
   </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-3"  v-for="products in products2" :key="products.id">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                   
                                    <h3 class="d-inline-block">
                                        <Link :href="`/products/${products.slug}`">{{products.title}}</Link>
                                    </h3>
                                    <button type="button" class="btn btn-primary">
                                      $ {{products.price}}
                                    </button>
                                </div>
                            </div>
                        </div>
                  
          </div>
        </div>
    </div>
  </div>


     
    </AppLayout>
</template>
