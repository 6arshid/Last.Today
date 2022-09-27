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
    hashtags:Array,follow_checker:String,randclass:String
  },
}
</script>
<template>
    <AppLayout title="Hashtags">
        <div class="w-11/12 md:w-12/12 mx-auto">

            <h2 class="mx-auto text-center mb-5">Hashtags</h2>





                    
        <div class="bg-white p-4 flex justify-center items-center flex-wrap">

           
  <span v-for="hashtag in hashtags" :key="hashtag.name" class="inline-flex items-center m-2 px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-full text-sm font-semibold text-gray-600">
    <Link :href="`/app/tags/${hashtag.name}`">
        <p v-if="hashtag.follow_checker == 0"><Link :href="`/user/tags/${hashtag.name}/follow`"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg></Link></p>
                <p v-if="hashtag.follow_checker == 2"><Link :href="`/user/tags/${hashtag.name}/unfollow`"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
</svg></Link></p>	<span class="ml-1">
	    #{{hashtag.name}}
	</span></Link>
  </span>
</div>

</div>
    </AppLayout>
</template>
