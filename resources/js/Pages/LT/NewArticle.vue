<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'


const form = useForm({
      content: null,
      attachfiles: [],
    })

    function submit() {
      form.post('/app/articles/submit')
  }

</script>

<template>



    <AppLayout title="Articles">
<div class="mx-auto md:w-5/12 w-11/12 pt-5">
  <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200">
                      New Content
                </h1>
                <form @submit.prevent="submit">
   <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
       <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
           <label for="comment" class="sr-only">Your comment</label>
           <textarea v-model="form.content" id="comment" rows="7" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a content..." required=""></textarea>
       </div>
       <div>
    <div class="border border-dashed border-gray-500 relative">
    <input type="file"  @input="form.attachfiles = $event.target.files"  multiple class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
    <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
        <h4>
            Drop files anywhere to upload
            <br/>or
        </h4>
        <p class="">Select Files</p>
    </div>
</div>
  </div>
  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
 </progress>
       <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
           <button type="submit"  class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
               Send
           </button>
           <!-- <div class="flex pl-0 space-x-1 sm:pl-2">
               <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Attach file</span>
               </button>
               <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Set location</span>
               </button>
               <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Upload image</span>
               </button>
           </div> -->
       </div>

   </div>
</form>
<!-- <p class="ml-auto text-xs text-gray-500 dark:text-gray-400">Remember, contributions to this topic should follow our <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Community Guidelines</a>.</p> -->

</div>
    </AppLayout>
</template>
