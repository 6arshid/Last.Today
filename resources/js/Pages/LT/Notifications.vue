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
    notifications1: Object,
    notifications2: Array

  },
}
</script>

<template>
    <AppLayout title="Notifications">
        
        

     <div class="mx-auto md:w-5/12 w-11/12">
        <br/>

        <div class="overflow-auto max-h-full relative mx-auto bg-white dark:bg-slate-800 dark:highlight-white/5 shadow-lg ring-1 ring-black/5 rounded-xl flex flex-col divide-y dark:divide-slate-200/5">
   
            <div class="flex items-center gap-4 p-4" v-for="notifications in notifications2" :key="notifications.id">
                <Link :href="`/${notifications.sender}`">       <img class="w-12 h-12 rounded-full" :src="`${notifications.sender_avatar}`"></Link>
      <div class="flex flex-col">
        <span class="text-slate-500 text-sm font-medium dark:text-slate-400"><Link :href="`/app/${notifications.evtype}/${notifications.evid}`">{{notifications.msg}}</Link></span>
        <small class="text-slate-900 text-sm font-medium dark:text-slate-200">  {{notifications.sender}} -  {{notifications.time}}</small>
      </div>
    </div>

  </div>



     </div>

        <!-- <div class="py-12">
<div class="max-w-lg mx-auto items-center h-screen">


    <div class="flex justify-between px-3 py-1 bg-white items-center gap-1 rounded-lg border border-gray-100 my-3" v-for="notifications in notifications2" :key="notifications.id">
      <div class="relative w-16 h-16 rounded-full hover:bg-red-700 bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-gray-200 rounded-full border-2 border-white">
                <Link :href="`/${notifications.sender}`">   <img class="w-full h-full object-cover rounded-full" :src="`${notifications.sender_avatar}`" :alt="`${notifications.sender}`"></Link>
            </div>
        </div>
        <div>
            <span class="text-left text-slate-900"> <Link :href="`/${notifications.sender}`"> {{notifications.sender}} </link><Link :href="`/app/${notifications.evtype}/${notifications.evid}`">{{notifications.msg}}</Link> </span>
        </div>
        
        <div>
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
            </svg>
        </div>
    </div>

            <pagination class="mt-6" :links="notifications1.links" />

</div>
        </div> -->
    </AppLayout>
</template>
