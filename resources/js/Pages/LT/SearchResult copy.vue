<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
keyword: String,user_search: Array,articles: Array,twitter: String,youtube: String,instagram: String,facebook: String,linkedin: String,reddit: String,wikipedia: String,britannica: String,linktr: String,archive: String,google: String,googlefinance: String,googlemaps: String,googlenews: String,googledrive: String,timeanddate: String,weatherforecast: String,cnn: String,foxnews: String,bbc: String,cbc: String,nationalpost: String,nytimes: String,dailymail: String,independent: String,newyorker: String,
aljazeera: String,spotify: String,soundcloud: String,allmusic: String,azlyrics: String,lastfm: String,espn: String,skysports: String,si: String,imdb: String,netflix: String,apple: String,rottentomatoes: String,yahoofinance: String,investopedia: String,forbes: String,businessinsider: String,algolia: String,ibtimes: String,seekingalpha: String,amazon: String,ebay: String,ikea: String,etsy: String,kohls: String,overstock: String,duckduckgo: String,bing: String,
yandex: String,ecosia: String,qwant: String,lt: String,pinterest: String,tumblr: String,dribbble: String,giphy: String,imgur: String,pexels: String,istockphoto: String,houzz: String,dwell: String,homedepot: String,yelp: String,stackoverflow: String,stackexchange: String,github: String,codepen: String,sourceforge: String,quora: String,fiverr: String,jw: String,bible: String,quran: String,pornhub: String,xhamster: String,imlive: String,
})
    const form = reactive({
      search: null,
    })
    function searchform() {
      Inertia.post('/search', form)
    }
</script>
<template>
    <AppLayout title="Search Result">
       

<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-sm-10 col-10">
                <div class="search-container">
                 
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
                               
    <input id="search" v-model="form.search" class="form-control search-form-control me-2"  type="search" :placeholder="`${keyword}`"   />
  

                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="main-container">
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-xl-10 col-md-12 col-12">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-12 mb-5">

 <h2 class="mt-5 mb-3">Result for {{keyword}}</h2>
                                 <div class="sidebar-widget tags mb-3">
                                        <h4 class="mb-3"> Popular Apps
                                             </h4>
                                        <div class="tag-list">
                                            <ul class="list-style">

           
                                                <li> <a :href="`${twitter}`" target="_blank">Twitter</a></li>
                                                <li> <a :href="`${youtube}`" target="_blank">Youtube</a></li>
                                                <li> <a :href="`${instagram}`" target="_blank">Instagram</a></li>
                                                <li> <a :href="`${facebook}`" target="_blank">Facebook</a></li>
                                                <li> <a :href="`${linkedin}`" target="_blank">Linkedin</a></li>
                                                <li> <a :href="`${reddit}`" target="_blank">Reddit</a></li>
                                                <li> <a :href="`${wikipedia}`" target="_blank">Wikipedia</a></li>
                                                <li> <a :href="`${britannica}`" target="_blank">Britannica</a></li>
                                                <li> <a :href="`${linktr}`" target="_blank">Linktree</a></li>
                                                <li> <a :href="`${archive}`" target="_blank">Web Archive</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>


   <div class="sidebar-widget tags mb-3">
                                        <h4 class="mb-3"> Popular Apps
                                             </h4>
                                        <div class="tag-list">
                                            <ul class="list-style">

           
                                                <li> <a :href="`${twitter}`" target="_blank">Twitter</a></li>
                                                <li> <a :href="`${youtube}`" target="_blank">Youtube</a></li>
                                                <li> <a :href="`${instagram}`" target="_blank">Instagram</a></li>
                                                <li> <a :href="`${facebook}`" target="_blank">Facebook</a></li>
                                                <li> <a :href="`${linkedin}`" target="_blank">Linkedin</a></li>
                                                <li> <a :href="`${reddit}`" target="_blank">Reddit</a></li>
                                                <li> <a :href="`${wikipedia}`" target="_blank">Wikipedia</a></li>
                                                <li> <a :href="`${britannica}`" target="_blank">Britannica</a></li>
                                                <li> <a :href="`${linktr}`" target="_blank">Linktree</a></li>
                                                <li> <a :href="`${archive}`" target="_blank">Web Archive</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>




                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-badge-ad-fill zoom"
                                                     viewBox="0 0 16 16">
                                                    <path d="M11.35 8.337c0-.699-.42-1.138-1.001-1.138-.584 0-.954.444-.954 1.239v.453c0 .8.374 1.248.972 1.248.588 0 .984-.44.984-1.2v-.602zm-5.413.237-.734-2.426H5.15l-.734 2.426h1.52z"/>
                                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm6.209 6.32c0-1.28.694-2.044 1.753-2.044.655 0 1.156.294 1.336.769h.053v-2.36h1.16V11h-1.138v-.747h-.057c-.145.474-.69.804-1.367.804-1.055 0-1.74-.764-1.74-2.043v-.695zm-4.04 1.138L3.7 11H2.5l2.013-5.999H5.9L7.905 11H6.644l-.47-1.542H4.17z"/>
                                                </svg>
                                            </div>
                                             Top
                                        </div>
                                        
                                    </h3>
                                    <p class="card-text row">
                                     <a :href="`${twitter}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-twitter-100 (1).png" class="zoomappindex" /></a>
    <a :href="`${youtube}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-youtube-100.png"  class="zoom" /></a>
    <a :href="`${instagram}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-instagram-100.png"  class="zoomappindex" /></a>
    <a :href="`${facebook}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-facebook-100 (1).png"  class="zoomappindex" /></a>
    <a :href="`${linkedin}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-linkedin-100 (1).png"  class="zoomappindex" /></a>
    <a :href="`${reddit}`" target="_blank" class="searchicons"><img src="/images/icons/849484_reddit_512x512.png"  class="zoomappindex" /></a>
    <a :href="`${wikipedia}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-wikipedia-logo-100.png"  class="zoomappindex" /></a>
    <a :href="`${britannica}`" target="_blank" class="searchicons"><img src="/images/icons/britannica.png"  class="zoomappindex" /></a>
    <a :href="`${linktr}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-linktree-100.png"  class="zoomappindex" /></a>
    <a :href="`${archive}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-archive-100.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                <svg viewBox="0 0 563.2 563.2" xmlns="http://www.w3.org/2000/svg"  class="zoom">
                                                    <path d="M139.07 335.008l-17.822 66.532-65.139 1.378C36.642 366.811 25.6 325.5 25.6 281.6c0-42.451 10.324-82.483 28.624-117.732h.014L112.23 174.5l25.404 57.644c-5.317 15.501-8.215 32.141-8.215 49.456.002 18.792 3.406 36.797 9.651 53.408z"
                                                          fill="#fbbb00"></path>
                                                    <path d="M533.127 233.776c2.94 15.486 4.473 31.479 4.473 47.824 0 18.328-1.927 36.206-5.598 53.451-12.462 58.683-45.025 109.925-90.134 146.187l-.014-.014-73.044-3.727-10.338-64.535c29.932-17.554 53.324-45.025 65.646-77.911h-136.89V233.776z"
                                                          fill="#518ef8"></path>
                                                    <path d="M441.853 481.224l.014.014C397.996 516.501 342.266 537.6 281.6 537.6c-97.491 0-182.252-54.491-225.491-134.681l82.961-67.91c21.619 57.698 77.278 98.771 142.53 98.771 28.047 0 54.323-7.582 76.87-20.818z"
                                                          fill="#28b446"></path>
                                                    <path d="M445.004 84.536l-82.933 67.896c-23.335-14.586-50.919-23.012-80.471-23.012-66.729 0-123.429 42.957-143.965 102.724l-83.397-68.276h-.014C96.83 81.723 182.66 25.6 281.6 25.6c62.115 0 119.068 22.126 163.404 58.936z"
                                                          fill="#f14336"></path>
                                                </svg>
                                            </div>
                                                                                       Google

                                        </div>
                                      
                                      
                                    </h3>
                                   
                                    <p class="card-text row">
                                        <a :href="`${google}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-google-100.png"  class="zoomappindex" /></a>
    <a :href="`${googlefinance}`" target="_blank" class="searchicons"><img src="/images/icons/google finance.png"  class="zoomappindex" /></a>
    <a :href="`${googlemaps}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-google-maps-100.png"  class="zoomappindex" /></a>
    <a :href="`${googlenews}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-google-news-100.png"  class="zoomappindex" /></a>
    <a :href="`${googledrive}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-google-drive-100.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>
                        
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
<img src="/images/icons/icons8-news-64.png" class="zoom"/>

                                            </div>
                                              News
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                      <a :href="`${cnn}`" target="_blank" class="searchicons"><img src="/images/icons/cnn.png"  class="zoomappindex" /></a>
    <a :href="`${foxnews}`" target="_blank" class="searchicons"><img src="/images/icons/foxnews.png"  class="zoomappindex" /></a>
    <a :href="`${bbc}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-bbc-100.png"  class="zoomappindex" /></a>
    <a :href="`${cbc}`" target="_blank" class="searchicons"><img src="/images/icons/CBCca.png"  class="zoomappindex" /></a>
    <a :href="`${nationalpost}`" target="_blank" class="searchicons"><img src="/images/icons/nationalpost.png"  class="zoomappindex" /></a>
    <a :href="`${nytimes}`" target="_blank" class="searchicons"> <img src="/images/icons/nyt.png"  class="zoomappindex" /></a>
    <a :href="`${dailymail}`" target="_blank" class="searchicons"> <img src="/images/icons/dailymail.png"  class="zoomappindex" /></a>
    <a :href="`${independent}`" target="_blank" class="searchicons"><img src="/images/icons/independent.png"  class="zoomappindex" /></a>
    <a :href="`${newyorker}`" target="_blank" class="searchicons"><img src="/images/icons/aljazeera.png"  class="zoomappindex" /></a>
    <a :href="`${aljazeera}`" target="_blank" class="searchicons"><img src="/images/icons/new yorker.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>
                                    <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
<img src="/images/icons/icons8-sport-64.png" class="zoom"/>

                                            </div>
                                             Sport
                                        </div>
                                    
                                    </h3>
                                    
                                    <p class="card-text row">
                                     <a :href="`${espn}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-espn-100.png"  class="zoomappindex" /></a>
    <a :href="`${skysports}`" target="_blank" class="searchicons"><img src="/images/icons/skysports.png"  class="zoomappindex" /></a>
    <a :href="`${si}`" target="_blank" class="searchicons"><img src="/images/icons/si.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>

                             <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                    <img src="/images/icons/icons8-movie-64.png" class="zoom"/>

                                            </div>
                                             Movie
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                <a :href="`${imdb}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-imdb-100.png"  class="zoomappindex" /></a>
    <a :href="`${netflix}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-netflix-100.png"  class="zoomappindex" /></a>
    <a :href="`${apple}`" target="_blank" class="searchicons"><img src="/images/icons/apple.png"  class="zoomappindex" /></a>
    <a :href="`${rottentomatoes}`" target="_blank" class="searchicons"><img src="/images/icons/rottentomatoes.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>
 <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                                                <img src="/images/icons/icons8-money-bag-80.png" class="zoom"/>

                                            </div>
                                             Finance
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                     <a :href="`${yahoofinance}`" target="_blank" class="searchicons"><img src="/images/icons/yahoo finance.png"  class="zoomappindex" /></a>
    <a :href="`${investopedia}`" target="_blank" class="searchicons"><img src="/images/icons/investopedia.png"  class="zoomappindex" /></a>
    <a :href="`${forbes}`" target="_blank" class="searchicons"><img src="/images/icons/forbes.png"  class="zoomappindex" /></a>
    <a :href="`${businessinsider}`" target="_blank" class="searchicons"><img src="/images/icons/businessinsider.png"  class="zoomappindex" /></a>
    <a :href="`${algolia}`" target="_blank" class="searchicons"><img src="/images/icons/investopedia.png"  class="zoomappindex" /></a>
    <a :href="`${ibtimes}`" target="_blank" class="searchicons"><img src="/images/icons/ibtimes.png"  class="zoomappindex" /></a>
    <a :href="`${seekingalpha}`" target="_blank" class="searchicons"><img src="/images/icons/seekingalpha.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>




                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
             <img src="/images/icons/icons8-shopping-basket-80.png" class="zoom"/>

                                            </div>
                                            Shop
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                 <a :href="`${amazon}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-amazon-100.png"  class="zoomappindex" /></a>
    <a :href="`${ebay}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-ebay-100.png"  class="zoomappindex" /></a>
    <a :href="`${ikea}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-ikea-100.png"  class="zoomappindex" /></a>
    <a :href="`${etsy}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-etsy-100.png" width="35px" class="zoom" /></a>
    <a :href="`${kohls}`" target="_blank" class="searchicons"><img src="/images/icons/kohls.png"  class="zoomappindex" /></a>
    <a :href="`${overstock}`" target="_blank" class="searchicons"><img src="/images/icons/overstock.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>



                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                        <img src="/images/icons/icons8-view-80.png"  class="zoom"/>

                                            </div>
                                              Search Engine
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                     <a :href="`${bing}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-bing-100.png"  class="zoomappindex" /></a>
    <a :href="`${yandex}`" target="_blank" class="searchicons"><img src="/images/icons/yandex_logo_icon_170668.png" width="35px" class="zoom" /></a>
    <a :href="`${ecosia}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-ecosia-100.png"  class="zoomappindex" /></a>
    <a :href="`${qwant}`" target="_blank" class="searchicons"><img src="/images/icons/qwant.png"  class="zoomappindex" /></a>
    <a :href="`${lt}`" target="_blank"><img src="/images/icons/lt.png" width="40px" class="zoom" /></a>
                                    </p>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                                                                   <img src="/images/icons/icons8-film-roll-80.png" class="zoom"/>

                                            </div>
                                              Photo
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                       <a :href="`${pinterest}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-pinterest-100.png"  class="zoomappindex" /></a>
    <a :href="`${tumblr}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-tumblr-100.png"  class="zoomappindex" /></a>
    <a :href="`${dribbble}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-dribbble-100.png"  class="zoomappindex" /></a>
    <a :href="`${giphy}`" target="_blank" class="searchicons"><img src="/images/icons/giphyicon.png"  class="zoomappindex" /></a>
    <a :href="`${imgur}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-imgur-100.png"  class="zoomappindex" /></a>
    <a :href="`${pexels}`" target="_blank" class="searchicons"><img src="/images/icons/pexels.png"  class="zoomappindex" /></a>
    <a :href="`${istockphoto}`" target="_blank" class="searchicons"><img src="/images/icons/istockphoto-logo-EE5A2AB2C7-seeklogo.com.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>



                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
     <img src="/images/icons/icons8-house-80.png"  class="zoom"/>

                                            </div>
                                             Home
                                        </div>
                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                  <a :href="`${houzz}`" target="_blank" class="searchicons">
        <img src="/images/icons/icons8-houzz.png" width="35px" class="zoom" />
    </a>
    <a :href="`${dwell}`" target="_blank" class="searchicons"><img src="/images/icons/d.png"  class="zoomappindex" /></a>
    <a :href="`${homedepot}`" target="_blank" class="searchicons"><img src="/images/icons/homedepot.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                    <img src="/images/icons/icons8-workspace-80.png" class="zoom"/>

                                            </div>
                                             Developer
                                        </div>
                                        
                                    </h3>
                                    
                                    <p class="card-text row">
                                   <a :href="`${stackoverflow}`" target="_blank" class="searchicons"><img src="/images/icons/stackoverflow.png"  class="zoomappindex" /></a>
    <a :href="`${stackexchange}`" target="_blank" class="searchicons"><img src="/images/icons/stackexchange.png"  class="zoomappindex" /></a>
    <a :href="`${github}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-github-100.png"  class="zoomappindex" /></a>
    <a :href="`${codepen}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-codepen-100.png"  class="zoomappindex" /></a>
    <a :href="`${sourceforge}`" target="_blank" class="searchicons"><img src="/images/icons/sourceforge.png"  class="zoomappindex" /></a>
    <a :href="`${quora}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-quora-is-a-place-to-gain-and-share-knowledge-100.png"  class="zoomappindex" /></a>
    <a :href="`${fiverr}`" target="_blank" class="searchicons"><img src="/images/icons/icons8-fiverr-100.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>

    <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                                                                     <img src="data:image/png;base64,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"  class="zoom">

                                            </div>
                                             Weather
                                        </div>
                                      
                                    </h3>
                                    
                                    <p class="card-text row">
                                          <a :href="`${timeanddate}`" class="searchicons"> <img src="/images/icons/timeanddate.png"  class="zoomappindex" /></a>
    <a :href="`${weatherforecast}`" target="_blank" class="searchicons"> <img src="/images/icons/weather-forecast.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                              <img src="/images/icons/icons8-knowledge-sharing-80.png" class="zoom">
                                            </div>
                                             Holy Book
                                        </div>

                                       
                                    </h3>
                                    
                                    <p class="card-text row">
                                   <a :href="`${jw}`" target="_blank" class="searchicons"><img src="/images/icons/jw.png"  class="zoomappindex" /></a>
    <a :href="`${bible}`" target="_blank" class="searchicons"><img src="/images/icons/en-66b75f79abc080b66cb2d914d4c3a676.png"  class="zoomappindex" /></a>
    <a :href="`${quran}`" target="_blank" class="searchicons"><img src="/images/icons/quran.png"  class="zoomappindex" /></a>
                                    </p>
                                </div>
                            </div>





                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 mb-5">
                     


                            <div class="card mb-3">
                                <div class="card-body"  v-for="user in user_search" :key="user.id">
                                 <Link :href="`/@${user.name}`">
                                    <h3 class="card-title mb-2">
                                        <div class="float-start icon me-2">
                                            <div class="search-icon-box">
                                               <img :src="`/${user.profile_photo_path}`" class="rounded zoomappindex"/>
                                            </div>
                                               {{user.name}}
                                        </div>
                                    </h3>
                                      </Link>
                                </div>
                            </div>




                            




                            <p class="card-text">
                                <nav class="news-link">
                                    <Link :href="`/articles/${article.slug}`" class="nav-link"  v-for="article in articles" :key="article.id">
                                        <i class="bi bi-arrow-right-square me-2"></i>
                                       {{article.title}}
                                    </Link>
                                   
                                </nav>
                            </p>
                         

                                <h3 class="card-title mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-badge-ad-fill" viewBox="0 0 16 16">
                                    <path d="M11.35 8.337c0-.699-.42-1.138-1.001-1.138-.584 0-.954.444-.954 1.239v.453c0 .8.374 1.248.972 1.248.588 0 .984-.44.984-1.2v-.602zm-5.413.237-.734-2.426H5.15l-.734 2.426h1.52z"></path>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm6.209 6.32c0-1.28.694-2.044 1.753-2.044.655 0 1.156.294 1.336.769h.053v-2.36h1.16V11h-1.138v-.747h-.057c-.145.474-.69.804-1.367.804-1.055 0-1.74-.764-1.74-2.043v-.695zm-4.04 1.138L3.7 11H2.5l2.013-5.999H5.9L7.905 11H6.644l-.47-1.542H4.17z"></path>
                                </svg>
                                Your Ad Here
                            </h3>
                           
                            <a href="https://www.un.org/en" target="_blank">
                                <div class="CardImg mb-3">
                                   <img src="/images/ads/ads2.png">
                                </div>
                           </a>
                             <a href="https://www.icrc.org/en" target="_blank">
                                <div class="CardImg mb-3">
                                   <img src="/images/ads/ads3.png">
                                </div>
                           </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </AppLayout>
</template>