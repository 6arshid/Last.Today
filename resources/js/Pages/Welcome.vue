<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { reactive } from 'vue'
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
  canLogin: Boolean,
    canRegister: Boolean,
    datetimestring: String,
    hashtags:Array,
    total_views:Object,
    topsearch:Array,
    first31post:Array,
    // firstbigpost:Array,
    // second2post:Array,
    // secondbigpost:Array,
    // third8post:Array
    user_comment_avatar:String,
})


 const form = reactive({
      search: null,
    })
    function searchform() {
      Inertia.post('/app/search', form)
    }
</script>
<script>
export default {
  methods: {
    gmail() {
      window.open("https://mail.google.com/", "_blank");
    },
    twitter() {
      window.open("https://twitter.com/", "_blank");
    }
    ,
    youtube() {
      window.open("https://youtube.com/", "_blank");
    }
    ,
    instagram() {
      window.open("https://instagram.com/", "_blank");
    }
    ,
    telegram() {
      window.open("https://web.telegram.org/", "_blank");
    }
    ,
    google() {
      window.open("https://google.com/", "_blank");
    }
    ,
    spotify() {
      window.open("https://open.spotify.com/", "_blank");
    }
    ,
    imdb() {
      window.open("https://imdb.com/", "_blank");
    }
    ,
    dailymail() {
      window.open("https://dailymail.co.uk", "_blank");
    }
    ,
    wikipedia() {
      window.open("https:/wikipedia.org", "_blank");
    }
    ,
    microsoftonline() {
      window.open("https://login.microsoftonline.com/", "_blank");
    }
    ,
    amazon() {
      window.open("https://amazon.co.uk", "_blank");
    }
    ,
    cnn() {
      window.open("https://edition.cnn.com/", "_blank");
    }
    ,
    archive() {
      window.open("https://web.archive.org/", "_blank");
    }
    ,
    linkedin() {
      window.open("https://linkedin.com", "_blank");
    }
    ,
    decentraland() {
      window.open("https://play.decentraland.org/", "_blank");
    }
  },
};
</script>

   
<template>
<AppLayout title="Home">
 
 <br/> <br/> <br/> 

 <section class="search-container">
                <form @submit.prevent="searchform" class="lg:w-5/12 md:w-8/12 w-10/12 mx-auto">
                    <h1 class="text-2xl items-center text-center mx-auto mb-5 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200">Expand your mind with LT</h1>
                    <label class="relative block">
                        <span class="sr-only">Search</span>
                        <span class="search-icon">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.5 21.5">
                                <path d="M11.5,1.25A10.25,10.25,0,1,0,21.75,11.5,10.26,10.26,0,0,0,11.5,1.25Zm0,19a8.75,8.75,0,1,1,8.75-8.75A8.76,8.76,0,0,1,11.5,20.25Z"
                                      transform="translate(-1.25 -1.25)"></path>
                                <path d="M22.53,21.47l-2-2a.75.75,0,0,0-1.06,1.06l2,2a.75.75,0,0,0,1.06,0A.75.75,0,0,0,22.53,21.47Z"
                                      transform="translate(-1.25 -1.25)"></path>
                            </svg>
            </span>
                        <input class="search-form-control" placeholder="Search for anything..."
                               type="text" v-model="form.search"/>

                    </label>
                    <div class="text-center">
                        <button type="submit"
                                class="btn btn-primary text-white px-10 py-3 mt-4">
                            LT Search
                        </button>
                        
                    </div>
                </form>
            </section>

            <!-- <section class="md:w-6/12 w-11/12 mx-auto">
                <div class="text-2xl items-center text-center mx-auto mb-5 mt-8">
                    <h2 class="mb-10 text-center text-gray-800 dark:text-gray-50 dark:text-slate-200">Check other App</h2>
                    <button @click="gmail()"><img src="/files/icons/icons8-gmail-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button  @click="twitter()"><img src="/files/icons/icons8-twitter-100 (1).png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="youtube()"><img src="/files/icons/icons8-youtube-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="instagram()"><img src="/files/icons/icons8-instagram-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="telegram()"><img src="/files/icons/icons8-telegram-app-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="google()"><img src="/files/icons/icons8-google-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="soundcloud()"><img src="/files/icons/icons8-soundcloud-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="imdb()"><img src="/files/icons/icons8-imdb-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="dailymail()"><img src="/files/icons/dailymail.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="wikipedia()"><img src="/files/icons/icons8-wikipedia-logo-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="microsoftonline()"><img src="/files/icons/office.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="cnn()"><img src="/files/icons/cnn.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="linkedin()"><img src="/files/icons/icons8-linkedin-100 (1).png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                    <button @click="decentraland()"><img src="/files/icons/icons8-metaverse-100.png" class="grayscale hover:grayscale-0 nav-item opacity-50 hover:opacity-100"></button>
                </div>
            </section> -->


            <div class="lg:w-5/12 md:w-8/12 w-10/12 mx-auto">
                                    <div class="section-title text-center mt-5 mb-5">
                                        <h3 class="mb-10 text-center text-gray-800 dark:text-gray-50 dark:text-slate-200">Today Top Searchs</h3>
                                    </div>


<ul class="flex flex-wrap  text-left items-center mb-6 text-gray-900 dark:text-white">
    <li v-for="search_result in topsearch" :key="search_result.name">
      <Link :href="`/app/search/${search_result.name}`"  class="mr-4 hover:underline md:mr-6 ">{{search_result.name}}</Link>
    </li>
</ul>


                                </div>

   
                           
                              <div class="lg:w-5/12 md:w-8/12 w-10/12 mx-auto">
                                    <div class="section-title text-center mt-5 mb-5">
                                        <h3 class="mb-10 text-center text-gray-800 dark:text-gray-50 dark:text-slate-200">Today Trendy Hashtags</h3>
                                    </div>
                                    <ul class="flex flex-wrap  text-left items-center mb-6 text-gray-900 dark:text-white">
    <li  v-for="hashtag in hashtags" :key="hashtag.name">
      <Link :href="`/app/tags/${hashtag.name}`"  class="mr-4 hover:underline md:mr-6 ">#{{hashtag.name}}</Link>
    </li>
</ul>
                                </div>
                          
                                <br/><br/><br/><br/><br/><br/><br/>
</AppLayout>

</template>

