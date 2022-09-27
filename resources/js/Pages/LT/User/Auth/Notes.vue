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
    note_paginate: Object,
    notes: Array
  },
}
</script>
<template>
  <AppLayout title="Notes">

    
    <div class="w-11/12 md:w-12/12 mx-auto">
  
       
            
      <div class="d-block">
        <h1 class="float-start  pt-10 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200"> Notes </h1>
                     

                <Link :href="`/user/notes/add`" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
   <i class="bi bi-sticky-fill me-2"></i>Add Note
  </span>
</Link>
                    
                </div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6  px-2 mx-auto">
                    <div  v-for="note in notes" :key="note.id">
                        <div class="card" :style="`${note.color}`">
                            <div class="card-body">
                                <p class="card-text">
                                    <Link :href="`/user/note/${note.slug}`">
                                {{note.content}}
                              </Link>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-text"><small class="text-muted">{{note.time}}</small></div>
                                    <div class="">
                                        <Link :href="`/user/note/${note.slug}`"  class="btn btn-light">
                                            <i class="bi bi-pencil-square"></i>
                                        </Link>
                                         <Link :href="`/user/notes/delete/${note.slug}`"  method="delete" as="button" type="button" class="btn btn-light">
                                            <i class="bi bi-trash"></i>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                </div>
                      <pagination class="mt-6" :links="note_paginate.links" />

         

        
 
</div>

    </AppLayout>
</template>
