<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
const props = defineProps({
 feeds:Array
})
const form = useForm({
      title: null,
      url: null,
      lang: null,
      category: null,
    })

    function submit() {
      form.post('/admin/feed')
    }

</script>

<template>
    <AppLayout title="Add New Feed">
  
 <section class="row justify-content-center">
                    <div class="col-md-6">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg card-body">
                    <form @submit.prevent="submit" class="mb-4">
    <input type="text" v-model="form.title" rows="5" class="form-control mb-3" placeholder="Enter Title">
    <input type="url" v-model="form.url" rows="5" class="form-control mb-3" placeholder="Enter Url">
    <input type="text" v-model="form.lang" rows="5" class="form-control mb-3" placeholder="Enter Language">
    <input type="text" v-model="form.category" rows="5" class="form-control mb-3" placeholder="Enter Category">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


    <article  v-for="feed in feeds" :key="feed.id">
         <a :href="`${feed.url}`" class="btn btn-info me-1 mb-1" target="_blank">  
          {{ feed.title}}
         </a> 
 <Link :href="`/admin/feed/${feed.id}`" method="delete" as="button" type="button" class="btn btn-danger text-dark me-1 mb-1">  
         Delete
         </Link> 
  
         
           wget -q -O /dev/null  https://last.today/feedreader/{{feed.id}}
        
        	
        </article>

                </div>
            </div>
        </div>
          </div>
  </section>
    </AppLayout>
</template>
