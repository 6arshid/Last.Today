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
})


 const form = reactive({
      search: null,
    })

    function searchform() {
      Inertia.post('/search', form)
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
 
<div class="MainBg">
<br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-sm-10 col-10">
                <div class="search-container">
                
                    <h2 class="mt-2 mb-4">Expand your mind with LT<br><br>
                    Search any thing here</h2>
                    <br><br>
                            <form @submit.prevent="searchform" class="d-flex">
                          <div class="search-icon">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 21.5 21.5">
                                    <path d="M11.5,1.25A10.25,10.25,0,1,0,21.75,11.5,10.26,10.26,0,0,0,11.5,1.25Zm0,19a8.75,8.75,0,1,1,8.75-8.75A8.76,8.76,0,0,1,11.5,20.25Z"
                                          transform="translate(-1.25 -1.25)"></path>
                                    <path d="M22.53,21.47l-2-2a.75.75,0,0,0-1.06,1.06l2,2a.75.75,0,0,0,1.06,0A.75.75,0,0,0,22.53,21.47Z"
                                          transform="translate(-1.25 -1.25)"></path>
                                </svg>
                            </div>
                             <input class="form-control search-form-control me-2" type="search"
                                   placeholder="Search in Last.Today"
                                   aria-label="Search" v-model="form.search" >
                                 
                                
    </form>

                    <div class="mt-2">
                  
   <br><br><br>

                             <section id="links mt-5">
<div class="justify-content-center mt-4">
<div class="col-md-12 text-center justify-content-center">


    <button @click="gmail()"><img src="/images/icons/icons8-gmail-100.png" class="zoomappindex" /></button>
    <button @click="twitter()"><img src="/images/icons/icons8-twitter-100 (1).png" class="zoomappindex" /></button>
    <button @click="youtube()"><img src="/images/icons/icons8-youtube-100.png" class="zoomappindex" /></button>
    <button @click="instagram()"><img src="/images/icons/icons8-instagram-100.png" class="zoomappindex" /></button>
    <button @click="telegram()"><img src="/images/icons/icons8-telegram-app-100.png" class="zoomappindex" /></button>
    <button @click="google()"><img src="/images/icons/icons8-google-100.png" class="zoomappindex" /></button>
    <button @click="soundcloud()"><img src="/images/icons/icons8-soundcloud-100.png" class="zoomappindex" /></button>
    <button @click="imdb()"><img src="/images/icons/icons8-imdb-100.png" class="zoomappindex" /></button>
    <button @click="dailymail()"><img src="/images/icons/dailymail.png" class="zoomappindex" /></button>
    <button @click="wikipedia()"><img src="/images/icons/icons8-wikipedia-logo-100.png" class="zoomappindex" /></button>
    <button @click="microsoftonline()"><img src="/images/icons/office.png" class="zoomappindex" /></button>
    <button @click="cnn()"><img src="/images/icons/cnn.png" class="zoomappindex" /></button>
    <button @click="linkedin()"><img src="/images/icons/icons8-linkedin-100 (1).png" class="zoomappindex" /></button>
    <button @click="decentraland()"><img src="/images/icons/icons8-metaverse-100.png" class="zoomappindex" /></button>


</div>
</div>
</section>

                               <div class="categories">
                                    <div class="section-title text-center mt-5 mb-5">
                                        <h3>Today Top Searchs</h3>
                                    </div>
                                    <Link :href="`/search/${search_result.name}`" class="btn btn-light me-1 mb-1 zoom myraduis"  v-for="search_result in topsearch" :key="search_result.name">{{search_result.name}}</Link>
                                </div>

   
                           
                              <div class="categories">
                                    <div class="section-title text-center mt-5 mb-5">
                                        <h3>Today Trendy Hashtags</h3>
                                    </div>
                                    <Link :href="`/tags/${hashtag.name}`" class="btn btn-light me-1 mb-1 zoom myraduis"  v-for="hashtag in hashtags" :key="hashtag.name">#{{hashtag.name}}</Link>
                                </div>
                          
  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</AppLayout>

</template>

