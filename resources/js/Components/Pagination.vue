<script>
export default {
  props: {
    links: Array,
  },
}
import { Link } from '@inertiajs/inertia-vue3'
</script> 
<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, k) in links" :key="k">
        <div v-if="link.url === null"  class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-gray-600 bg-gray-50 hover:text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:ring-gray-300 m-1" v-html="link.label" />
         <a use:inertia
         v-else class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-gray-600 bg-gray-50 hover:text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:ring-gray-300 m-1" :class="{ 'btn-primary text-white': link.active }" :href="link.url" >
         <p v-html="link.label"></p>
        </a>
   </template>
    </div>
  </div>
</template>
  
