<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
article: Object,time:String,avatar:String,article_view:String,image: String,likecout: String,dislikecout: String,cryingcout: String,hotcout: String,lovecout: String,angrycout: String,tiredcout: String,vomitingcout: String,poop:String,boring:String,lol:String,inlove:String,wink:String,getcomments: Array,getfiles: Array,showhashtagpost:Array,button1:String,button2:String,button3:String,lastarticles:Array,users:Array,article_url:String,user_article_url:String,user_article_support_money:String
})
    const form = useForm({
           contentcomment: null,

    })
    function submitcomment() {
    Inertia.post(`/user/comment/a/${props.article.article_id}`,form)
    }

</script>

<template>
    <AppLayout :title="`${article.article_title}`">
     
<div class="Single">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 mb-5">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="Avatar-base">
                                            <div class="Avatar">
                                                <!-- {{avatar}} -->
                                                <Link :href="`${user_article_url}`"><img :src="`${avatar}`"></Link>
                                            </div>
                                            <h1 v-html="article.article_title"></h1>
                                        </div>
<!--                                        <button type="button" class="btn btn-primary btn-sm">Report</button>-->
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                                        <small class="text-muted">Posted on  {{time}}</small>
                                        <small class="text-muted"> {{article_view}}
                                            View
                                        </small>
                                    </div>
                                  

                                    <p class="card-text" v-html="article.article_content"></p>
                                    <Link :href="`/app/translate/${article.article_content}`" class="btn btn-info btn-sm mt-2 mb-2">Trannslate</Link>
                                  

                                    <Link v-for="afile in getfiles" :key="afile.f_id" :href="`${afile.f_path}`" target="_blank" >
                                        <div class="CardImg mb-3">
                                            <img :src="`${afile.f_path}`" />
                                        </div>
                                    </Link>



                                  
                                    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-5">
       
                                      
                                      <Link v-for="hashtag in showhashtagpost" :key="hashtag"  :href="`/tags/${hashtag}`" class="btn btn-light btn-sm">#{{hashtag}}</Link>
                                        <Link :href="`/user/articles/edit/${article.article_slug}`" v-if="button1 == 1"  class="btn btn-success btn-sm">Edit</Link>
                                        <Link :href="`/user/articles/delete/${article.article_slug}`" v-if="button2 == 1" method="delete" as="button" type="button"  class="btn btn-danger btn-sm">Delete</Link>
                                        <Link :href="`/user/nft/add/${article.article_slug}`" v-if="button3 == 1" class="btn btn-primary btn-sm">NFT This</Link>
                                        <Link :href="`/app/articles/report/${article.article_slug}`" v-if="button1 == 0" class="btn btn-info btn-sm">Report</Link>
                                        <a :href="`${user_article_support_money}`" v-if="button3 == 0" class="btn btn-light btn-sm" target="_blank">$ Money Support</a>
                                    </div>
                                    <div class="mb-5 border-bottom pb-5">
                                        <h6 class="mb-3">
                                            What's your reaction?
                                        </h6>



                                        <div class="d-inline-block">
                                            <Link :href="`/app/user/reaction/like/${article.article_id}`" method="post" as="button" type="button"  class="card d-inline-block emoji p-2 m-2">
                                           <img
                                                    src="/assets/img/icons8-facebook-like.gif">
                                            
                                                <small class="d-block click-btn btn-style5">{{likecout}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/dislike/${article.article_id}`" method="post" as="button" type="button"  class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/icons8-facebook-like.gif" class="thumb-down zoom">
                                                <small class="d-block click-btn btn-style5">{{dislikecout}}</small>
                                            </Link>
                                             <Link :href="`/app/user/reaction/love/${article.article_id}`" method="post" as="button" type="button" class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/icons8-heart.gif" class="zoom">
                                                <small class="d-block click-btn btn-style5">{{lovecout}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/boring/${article.article_id}`" method="post" as="button" type="button" class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/icons8-boring.gif" class="zoom">
                                                <small class="d-block click-btn btn-style5">{{boring}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/lol/${article.article_id}`" method="post" as="button" type="button" class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/icons8-lol.gif" class="zoom">
                                                <small class="d-block click-btn btn-style5">{{lol}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/wink/${article.article_id}`" method="post" as="button" type="button" class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/icons8-wink.gif" class="zoom">
                                                <small class="d-block click-btn btn-style5">{{wink}}</small>
                                            </Link>

                                             <Link :href="`/app/user/reaction/inlove/${article.article_id}`" method="post" as="button" type="button"  class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/icons8-in-love.gif" class="inlove">
                                                <small class="d-block click-btn btn-style5">{{inlove}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/poop/${article.article_id}`" method="post" as="button" type="button"  class="card d-inline-block emoji p-2 m-2"><img
                                                    src="/assets/img/poop.png" class="poop">
                                                <small class="d-block click-btn btn-style5">{{poop}}</small>
                                            </Link>
                            
                                     
                                     </div>




                                     
                                    </div>


                                    <div class="mb-5 border-bottom pb-5">
                                        <h6 class="mb-3">
                                           Share
                                        </h6>



                                        <div class="d-inline-block">
                                       

<a :href="`https://www.addtoany.com/add_to/whatsapp?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-whatsapp-100.png" width="42" height="42">
</a>
<a :href="`https://www.addtoany.com/add_to/twitter?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-twitter-100 (1).png" width="42" height="42">
</a>
<a :href="`https://www.addtoany.com/add_to/facebook?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank"  class="d-inline-block">
<img src="/images/icons/icons8-facebook-100 (1).png" width="42" height="42">
</a>
<a :href="`https://www.addtoany.com/add_to/linkedin?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-linkedin-100 (1).png" width="42" height="42">
</a>
<a :href="`https://www.addtoany.com/add_to/telegram?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-telegram-app-100.png" width="42" height="42">
</a>
<a :href="`https://www.addtoany.com/add_to/email?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-mail-48.png" width="42" height="42">
</a>
<a :href="`https://www.addtoany.com/add_to/reddit?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/849484_reddit_512x512.png" width="42" height="42">
    </a>
<a :href="`https://www.addtoany.com/add_to/google_gmail?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-gmail-100.png" width="42" height="42">
    </a>
<a :href="`https://www.addtoany.com/add_to/print?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-print-48.png" width="42" height="42">
    </a>
<a :href="`https://www.addtoany.com/add_to/facebook_messenger?linkurl=${article_url}&amp;linkname=${article.article_title}`" target="_blank" class="d-inline-block">
<img src="/images/icons/icons8-facebook-messenger-48.png" width="42" height="42">
</a>       
 </div>




                                     
                                    </div>

                                    <div class="mb-3">
                                        <h6>Enter Comments</h6>
                                        <form @submit.prevent="submitcomment">
    <input v-model="form.contentcomment" class="form-control form-control-lg mt-3" placeholder="Enter Comment" />
  </form>

                                       
                                    </div>
                                    <div class="mb-5 border-bottom pb-5">
                                        <!-- <h6>528 Comments</h6> -->

                                        <article class="comments-body mt-3" v-for="comment in getcomments" :key="comment.c_id">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="Avatar-base suggest">
                                                    <div class="Avatar">
                                                        <a href=""><img :src="`/${comment.c_avatar}`"></a>
                                                    </div>
                                                    <h3 class="ms-3">
                                                        <Link :href="`/${comment.c_uiun}`">{{comment.c_uiun}}</Link>
                                                    </h3>
                                                    <small class="text-muted ms-3"> {{comment.c_time}}</small>
                                                </div>
                                            </div>
                                            <p class="mt-2 mb-2">
                                               {{comment.c_content}}
                                            </p>
                                            <!-- <a class="btn btn-light btn-sm" data-bs-toggle="collapse"
                                               href="#collapseExample3" role="button" aria-expanded="false"
                                               aria-controls="collapseExample">
                                                <i class="bi bi-reply me-2"></i>reply
                                            </a> -->
                                            <!-- <button type="button" class="btn btn-link btn-sm">
                                                752<i class="bi bi-hand-thumbs-up ms-1"></i></button>
                                            <button type="button" class="btn btn-link btn-sm">
                                                18<i class="bi bi-hand-thumbs-down ms-1"></i></button> -->
                                            <div class="collapse" id="collapseExample3">
                                                <textarea type="email" class="form-control form-control-lg mt-3"
                                                          id="exampleDropdownFormEmail1-3"
                                                          placeholder="Enter Comment"></textarea>
                                                <!-- <button type="button" class="btn btn-secondary btn-sm mt-3">Send reply
                                                </button> -->
                                            </div>
                                        </article>


                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-5">
                            <h3 class="card-title mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                     class="bi bi-badge-ad-fill" viewBox="0 0 16 16">
                                    <path d="M11.35 8.337c0-.699-.42-1.138-1.001-1.138-.584 0-.954.444-.954 1.239v.453c0 .8.374 1.248.972 1.248.588 0 .984-.44.984-1.2v-.602zm-5.413.237-.734-2.426H5.15l-.734 2.426h1.52z"></path>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm6.209 6.32c0-1.28.694-2.044 1.753-2.044.655 0 1.156.294 1.336.769h.053v-2.36h1.16V11h-1.138v-.747h-.057c-.145.474-.69.804-1.367.804-1.055 0-1.74-.764-1.74-2.043v-.695zm-4.04 1.138L3.7 11H2.5l2.013-5.999H5.9L7.905 11H6.644l-.47-1.542H4.17z"></path>
                                </svg>
                                Your Ad Here
                            </h3>
                            <a href="#">
                                <div class="CardImg mb-3">
                                    <img src="/images/ads/ads2.png">
                                </div>
                            </a>
                            <h3 class="card-title mt-5">
                                New Updated
                            </h3>
                            <p class="card-text">
                                <nav class="news-link" style="direction:rtl">
                                    <Link class="nav-link" v-for="article in lastarticles" :key="article.id" :href="`/app/articles/${article.slug}`"  >
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- {{article.image}} -->
                                            <!-- <img :src="`${article.image}`"> -->
                                            <p v-html="article.image" class="mt-1 mbb-1"></p>
                                            <div class="ms-3 text-start" v-html="article.title"></div>
                                        </div>
                                    </Link>
                                   
                                </nav>
                            </p>
                            <div class="d-grid">
                                <Link :href="route('articles')" class="btn btn-primary btn-sm pe-3 ps-3 mt-2">Show more</Link>
                            </div>
                            <div class="sticky-top">
                                <h3 class="card-title mt-5 mb-3">
                                    Suggest User
                                </h3>
                                <div class="card mb-3"  v-for="user in users" :key="user.id" >
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="Avatar-base suggest">
                                              <div class="Avatar">
                                                    <Link :href="`/${user.username}`"> <img :src="`${user.avatar}`"></Link> 
                                                </div>
                                                <h3 class="ms-3">
                                                 <Link :href="`/${user.username}`">    {{user.name}} </Link> 
                                                </h3>
                                               
                                            </div>
                                            <Link  v-if="user.follow_checker == 0" :href="`/user/@${user.username}/follow`" class="btn btn-primary btn-sm">Follow</Link>
                                            <Link v-if="user.follow_checker == 1" class="btn btn-primary btn-sm">Waiting for  approved</Link>
                                            <Link v-if="user.follow_checker == 2" :href="`/user/@${user.username}/unfollow`" class="btn btn-primary btn-sm">Unfollow</Link>
                                            <Link v-if="user.follow_checker == 3"> </Link>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

     
    </AppLayout>
</template>
