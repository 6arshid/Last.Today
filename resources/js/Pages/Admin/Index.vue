<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3'
const props = defineProps({
  users: Array, articles: Array,nfts:Array,transaction:Array,feeds:Array,searches:Array
})
</script>

<template>
    <AppLayout title="Admin Dashboard">
       
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    
                    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <JetApplicationLogo class="block h-12 w-auto" />
            </div>
                        
            <div class="mt-8 text-2xl">
                Welcome to Admin
                
            </div>
            <div class="row">

                <div class="col-md-4">
                    <h3 class="mt-1 mb-1">Searchs</h3>
                          <article  v-for="searche in searches" :key="searche.id">
          <Link  class="btn btn-info me-1 mb-1">  
          {{ searche.title}} - View {{ searche.view}}
        
         </Link> 

        </article>
                </div>

                <div class="col-md-4">
                    <h3 class="mt-1 mb-1">Users</h3>
                          <article  v-for="user in users" :key="user.id">
          <Link :href="`/@${user.username}`" class="btn btn-info me-1 mb-1">  
          {{ user.email}}
        
         </Link> 

        </article>
                </div>

                <div class="col-md-4">
                                        <h3 class="mt-1 mb-1">Articles</h3>
                          <article  v-for="article in articles" :key="article.id">
          <Link :href="`/app/articles/${article.slug}`" class="btn btn-info me-1 mb-1">  
          {{ article.title}}
        
         </Link> 

        </article>
                </div>

                <div class="col-md-4">
               <h3 class="mt-1 mb-1">NFTs</h3>

                          <article  v-for="nft in nfts" :key="nft.id">
          <Link :href="`/nfts/${nft.slug}`" class="btn btn-info me-1 mb-1">  
          {{ nft.title}}
         </Link> 

        </article>
                </div>



                  <div class="col-md-4">
               <h3 class="mt-1 mb-1">Transactions</h3>

                          <article  v-for="transactionrow in transaction" :key="transactionrow.id">
          <Link class="btn btn-info me-1 mb-1">  
         $ {{ transactionrow.amount}} -  {{ transactionrow.success}} 
         </Link> 

        </article>
                </div>


                 <div class="col-md-4">
               <h3 class="mt-1 mb-1">
                  <Link :href="`/admin/feeds`" class="btn btn-success">  
                Feeds
                </Link>
                </h3>

                          <article  v-for="feed in feeds" :key="feed.id">
         <a :href="`${feed.url}`" class="btn btn-info me-1 mb-1" target="_blank">  
          {{ feed.title}}
         </a> 

        </article>
                </div>



            </div>
 
            
        </div>

        
    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
