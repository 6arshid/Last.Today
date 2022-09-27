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
    hashtags:Array,follow_checker:String
  },
}
</script>
<template>
    <AppLayout title="Hashtags">


        
        <div class="dark:text-white shadow rounded-lg p-3 mx-auto mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-md-12 col-12">
                        <div class="d-block">
                <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-slate-200">
                    Hashtagsxxxx
                </h1>
            </div>
<div class="grid grid-cols-2 lg:grid-cols-5 gap-6 my-12 mx-12 w-2xl container px-2 mx-auto">
                    <Article  v-for="hashtag in hashtags" :key="hashtag.name">
           <Link :href="`/app/tags/${hashtag.name}`" class="m-2 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-gray-600 bg-gray-50 hover:text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:ring-gray-300">
              #{{hashtag.name}}</Link>
                <p v-if="hashtag.follow_checker == 0"><Link :href="`/user/tags/${hashtag.name}/follow`" class="mb-3 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300">Follow</Link></p>
                <p v-if="hashtag.follow_checker == 2"><Link :href="`/user/tags/${hashtag.name}/unfollow`" class="mb-2 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300">Unfollow</Link></p>
                    </Article>
   

               
            

                </div>
            </div>

        </div>
    </div>
</div>
    </AppLayout>
</template>
