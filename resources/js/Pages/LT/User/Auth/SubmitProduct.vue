<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
      name: null,
      price : null,
      content: null,
      city:null,
      physicaldeliveryrequired: null,
      attachfiles: null,
    })

    function submit() {
      form.post(`/user/products/submit`)
    }
</script>

<template>
    <AppLayout title="Create New Product">
    
        <div class="md:w-7/12 w-11/12 mx-auto mb-4 pt-5">
          <h1 class="float-start pt-5 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200">
               Add new product
            </h1>
            <form @submit.prevent="submit">
  <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Name</label>
            <input type="text" v-model="form.name" placeholder="Enter Product Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2 mb-2">
       
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
            <input   type="number" v-model="form.price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the price in dollars" required="">
        </div>
        
        <div>
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">City</label>
            <input type="text" v-model="form.city"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter city name, optional">
        </div>  
        <div class="flex items-start mb-2">
        <div class="flex items-center h-5">
        <input  type="checkbox" value="" v-model="form.physicaldeliveryrequired" id="physicaldeliveryrequired"  class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
        </div>
        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">If the product is physical, tick it</label>
    </div>
    
     
    </div>
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Product description</label>
<textarea v-model="form.content"  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product description"></textarea>


<div class="border border-dashed border-gray-500 relative mt-3">
    <input type="file"  @input="form.attachfiles = $event.target.files"  multiple class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
    <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
        <h4>
            Drop files anywhere to upload
            <br/>or
        </h4>
        <p class="">Select Files</p>
    </div>
</div>
    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
    </progress>


    <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>


</div>
    </AppLayout>
</template>
