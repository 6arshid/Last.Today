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
    users: Array,follow_checker:String,userpaginate: Object,

  },
}
</script>
<template>
    <AppLayout title="Users">
      <div class="w-11/12 md:w-12/12 mx-auto">

            <div class="col-xl-10 col-md-12 col-12">
      <div class="d-block">
              
                <h1 class="float-start  pt-10 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200"> Users </h1>

                </div>
<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 my-12 mx-12 w-2xl container px-2 mx-auto">
                    




    <div v-for="user in users" :key="user.id" class="overflow-hidden relative  bg-white shadow-lg ring-1 ring-black/5 rounded-xl flex items-center gap-6 dark:bg-slate-800 dark:highlight-white/5">
    <img class="absolute -left-6 w-24 h-24 rounded-full shadow-lg" :src="`${user.avatar}`">
    <div class="flex flex-col py-5 pl-24">
   
      <strong class="text-slate-900 text-sm font-medium dark:text-slate-200">     <Link class="inline-flex text-gray-800 hover:text-gray-900" :href="`/${user.username}`">
                                      {{user.username}}
                                    </Link></strong>
      <span class="text-slate-500 text-sm font-medium dark:text-slate-400">
        
        <Link v-if="user.follow_checker == 0" :href="`/user/${user.username}/follow`" class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                                </svg>
                                <span>Follow</span>
                            </div>
                        </Link>


                        <Link v-if="user.follow_checker == 1"  class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                                </svg>
                                <span>Waiting for  approved</span>
                            </div>
                        </Link>

                        <Link v-if="user.follow_checker == 2" :href="`/user/${user.username}/unfollow`" class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                                </svg>
                                <span>Unfollow</span>
                            </div>
                        </Link>

                        <Link v-if="user.follow_checker == 3"></Link>
      </span>
    </div>
  </div>

  <pagination class="mt-6 mx-auto" :links="userpaginate.links" />

               

                </div>
            </div>

  
</div>
    </AppLayout>
</template>
