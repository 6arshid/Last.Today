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
 
 <br/> <br/> <br/> <br/>


  


   

                <div class="items-center mx-auto">
                
                        <form @submit.prevent="searchform" class="md:w-6/12 w-11/12 mx-auto">
        <h1 class="text-xl font-bold leading-2 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-slate-200">Expand your mind with LT </h1>
        <br/><br/>
        <label class="relative block">
            <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
              <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input class="w-full bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-white focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue rounded-lg" placeholder="Search for anything..."
                   type="text"   aria-label="Search" v-model="form.search"/>

        </label>
        <button  type="button" class="float-right mt-4 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
Search  </span>
</button>
   
    </form>
<div class="clear-both"></div>

 <br/>
    <section class="md:w-10/12 w-11/12 mx-auto">
        <div class="text-2xl items-center text-center mx-auto mb-5 mt-8">
            <h2 class="mb-10 mt-3 dark:text-white">Check other programs</h2>
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
    </section>

    <br/>
    <section class="md:w-10/12 w-11/12 mx-auto">
        <div class="text-2xl items-center text-center mx-auto mb-5 mt-8">
            <h2 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-slate-200">Today Top Searches</h2>
            <Link :href="`/app/search/${search_result.name}`" v-for="search_result in topsearch" :key="search_result.name" class="py-2 px-2 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
  <h2 class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 py-2 px-2 font-large zoomappindex dark:text-white ">
      {{search_result.name}}
  </h2>
</Link>

        </div>
    </section>
    <br/>
    <section class="md:w-10/12 w-11/12 mx-auto">
        <div class="text-2xl items-center text-center mx-auto mb-5 mt-8">
            <h2 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-slate-200">Today Trendy Hashtags</h2>
  <Link :href="`/app/tags/${hashtag.name}`"  v-for="hashtag in hashtags" :key="hashtag.name" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-pink-600 dark:bg-pink-800 dark:border-gray-700 dark:text-white dark:hover:bg-blue-400 mr-2 mb-2">
      #{{hashtag.name}}
</Link>
        </div>
    </section>


            
<section class="text-gray-800 mt-4 mx-auto ">
               <h2 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-slate-200 mb-10 mt-3">Trending content</h2>

	<div class="items-center mx-auto md:w-8/12 w-11/12 ">
<div class="columns-1">

          <div v-for="first31postrow in first31post" :key="first31postrow.id" :id="`${first31postrow.slug}`" class="bg-white dark:bg-slate-800 dark:text-white shadow rounded-lg mt-10 mb-4 ">
                <div class="flex flex-row px-2 py-3 mx-3">
                  
                    <div class="w-auto h-auto rounded-full border-2 border-green-500">
                      <Link :href="`/${first31postrow.username}`"> <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer"  src="{{first31postrow.avatar}}"></Link>
                    </div>
                    <div class="flex flex-col mb-2 ml-4 mt-1">
                        <div class="dark:text-white text-gray-600 text-sm font-semibold"> <Link :href="`/${first31postrow.username}`"> {{first31postrow.username}}</Link></div>
                        <div class="flex w-full mt-1">
                            <div class="dark:text-white text-blue-700 font-base text-xs mr-1 cursor-pointer">
                              {{first31postrow.job}}
                            </div>
                            <div class="dark:text-white text-gray-400 font-thin text-xs">
                                • <Link :href="`/app/articles/${first31postrow.slug}`">{{first31postrow.time}}</Link>
                            </div>
                        </div>
                        
                    </div>
                   <div class="mt-3 mx-5 w-full flex justify-end text-xs">
                        <div class="flex dark:text-white text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Views: <div class="dark:text-white ml-1 text-gray-400 text-ms"> {{first31postrow.view}}</div></div>
                    </div>
                </div>
                <div class="border-b border-gray-100"></div>
                <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
                <Link :href="`/app/articles/${first31postrow.slug}`"> <div v-html="first31postrow.image"></div></Link>    
                </div>
                <div class="font-semibold  mb-2 mx-3 px-2"><Link class="dark:text-slate-200 text-gray-600" :href="`/app/articles/${first31postrow.slug}`"> {{first31postrow.title}}
                
                </Link></div>
               <Link class="font-semibold  mb-2 mx-3 px-2" :href="`/app/articles/${first31postrow.slug}`">   <p class="dark:text-white text-gray-600 mb-2 mx-3 px-2" v-html="first31postrow.content"></p></Link>

                <div class="d-inline-block">
                                            <Link :href="`/app/user/reaction/like/${first31postrow.id}`" method="post" as="button" type="button"  class="d-inline-block  p-2 m-2 zoom">
                                           <img src="/images/emoji/thumbs_up (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{likecout}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/dislike/${first31postrow.id}`" method="post" as="button" type="button"  class=" zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/thumbs_down (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{dislikecout}}</small>
                                            </Link>
                                             <Link :href="`/app/user/reaction/love/${first31postrow.id}`" method="post" as="button" type="button" class="  zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/smiling_face_with_hearts (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{lovecout}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/boring/${first31postrow.id}`" method="post" as="button" type="button" class="zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/upside_down_face.gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{boring}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/lol/${first31postrow.id}`" method="post" as="button" type="button" class=" zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/rolling_on_the_floor_laughing.gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{lol}}</small>
                                            </Link>
            
                                             <Link :href="`/app/user/reaction/crying/${first31postrow.id}`" method="post" as="button" type="button"  class=" zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/crying_face (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{inlove}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/popper/${first31postrow.id}`" method="post" as="button" type="button"  class="  zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/party_popper.gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{poop}}</small>
                                            </Link>
                                              <Link :href="`/app/user/reaction/poo/${first31postrow.id}`" method="post" as="button" type="button" class="zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/pile_of_poo (1).gif" class="emoji"  width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{poo}}</small>
                                            </Link>

                                     
                                     </div>
                                     
                                     <div class="flex justify-start mb-4 border-t border-gray-100">
                 
                    <div class="flex justify-end w-full mt-1 pt-2 pr-5">
                 
                        
                                        <div class="flex justify-end w-full d-inline-block mb-4">
                                       

<a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-whatsapp-100.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/twitter?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-twitter-100 (1).png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/facebook?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank"  class="d-inline-block zoom">
<img src="/images/icons/icons8-facebook-100 (1).png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-linkedin-100 (1).png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/telegram?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-telegram-app-100.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/email?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-mail-48.png" width="22" height="22">
</a>
<a :href="`https://www.addtoany.com/add_to/reddit?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/849484_reddit_512x512.png" width="22" height="22">
    </a>
<a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-gmail-100.png" width="22" height="22">
    </a>
<a :href="`https://www.addtoany.com/add_to/print?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-print-48.png" width="22" height="22">
    </a>
<a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=/app/articles/${first31postrow.slug}&amp;linkname=${first31postrow.title}`" target="_blank" class="d-inline-block zoom">
<img src="/images/icons/icons8-facebook-messenger-48.png" width="22" height="22">
</a>       
 </div>

                    </div>


                </div>

               
    
            </div>



</div>
          <Link :href="route('articles')" :active="route().current('articles')" class="m-5">
<p class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
Show More  </span>
</p>
</Link>
	</div>

</section>


    <section class="md:w-10/12 w-11/12 mx-auto">
        <div class="text-2xl items-center text-center mx-auto mb-5 mt-8">
            <h2 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-white">DW News livestream</h2>
            <p class="text-2xl font-semibold leading-4 text-center text-gray-800 dark:text-gray-50 mb-10 mt-3 dark:text-white">Headline news from around the world</p>
<iframe width="100%" height="600" src="https://www.youtube.com/embed/GE_SfNVNyqk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </section>

  <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                    <!-- </div> -->
                </div>
        


</AppLayout>

</template>

