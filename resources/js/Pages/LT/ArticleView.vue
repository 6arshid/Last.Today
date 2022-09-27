<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Welcome from '@/Jetstream/Welcome.vue';
    import { Link ,useForm } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'
    const props = defineProps({
    article: Object,time:String,avatar:String,article_view:String,image: String,likecout: String,dislikecout: String,cryingcout: String,hotcout: String,lovecout: String,angrycout: String,tiredcout: String,vomitingcout: String,poop:String,boring:String,lol:String,inlove:String,wink:String,getcomments: Array,getfiles: Array,showhashtagpost:Array,button1:String,button2:String,button3:String,lastarticles:Array,users:Array,article_url:String,user_article_url:String,user_article_support_money:String,user_username:String
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
         
            <div class="md:w-10/12 px-6 py-16 mx-auto">
	<article class="space-y-8 ">
		<div class="space-y-6">
            <h1 v-html="article.article_title" class="text-4xl font-bold md:tracking-tight md:text-5xl pt-5 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200"></h1>
			<div class="flex flex-col items-start justify-between w-full md:flex-row md:items-center dark:text-gray-400">
				<div class="flex items-center md:space-x-2">
					<Link :href="`${user_article_url}`"><img :src="`${avatar}`"  class="w-4 h-4 border rounded-full dark:bg-gray-500 dark:border-gray-700"></Link>
					<p class="text-sm">Posted on  {{time}} </p>

                                      


				</div>
				<p class="flex-shrink-0 mt-3 text-sm md:mt-0">• {{article_view}}  View</p>
			</div>
		</div>
		<div class="dark:text-gray-100"> 
            <p class="card-text mb-3" v-html="article.article_content"></p>
                                        <Link :href="`/app/translate/${article.article_content}`" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-4">Trannslate</Link>
                                      

                                        

                                        <Link v-for="afile in getfiles" :key="afile.f_id">
                                            <div v-html="`${afile.f_path}`" class="CardImg mb-3"></div>
                                        </Link>
		</div>
	</article>
	<div>
        <br/>

                                            <Link :href="`/user/articles/edit/${article.article_slug}`" v-if="button1 == 1"  class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 m-2">Edit</Link>
                                            <Link :href="`/user/articles/delete/${article.article_slug}`" v-if="button2 == 1" method="delete" as="button" type="button"  class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 m-2">Delete</Link>
                                            <Link :href="`/user/nft/add/${article.article_slug}`" v-if="button3 == 1" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 m-2">NFT This</Link>
                                            <Link :href="`/app/articles/report/${article.article_slug}`" v-if="button1 == 0" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 m-2">Report</Link>
                                            <a :href="`${user_article_support_money}`" v-if="button3 == 0" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" target="_blank">$ Money Support</a>



                                            <!-- <div class="flex">
                                            <Link :href="`/app/user/reaction/like/${id}`" method="post" as="button" type="button"  class="d-inline-block  p-2 m-2 zoom">
                                           <img src="/images/emoji/thumbs_up (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{likecout}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/dislike/${id}`" method="post" as="button" type="button"  class=" zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/thumbs_down (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{dislikecout}}</small>
                                            </Link>
                                             <Link :href="`/app/user/reaction/love/${id}`" method="post" as="button" type="button" class="  zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/smiling_face_with_hearts (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{lovecout}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/boring/${id}`" method="post" as="button" type="button" class="zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/upside_down_face.gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{boring}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/lol/${id}`" method="post" as="button" type="button" class=" zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/rolling_on_the_floor_laughing.gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{lol}}</small>
                                            </Link>
            
                                             <Link :href="`/app/user/reaction/crying/${id}`" method="post" as="button" type="button"  class=" zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/crying_face (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{inlove}}</small>
                                            </Link>
                                            <Link :href="`/app/user/reaction/popper/${id}`" method="post" as="button" type="button"  class="  zoom d-inline-block  p-2 m-2"><img
                                                    src="/images/emoji/pile_of_poo (1).gif" class="emoji" width="47" height="47">
                                                <small class="d-block click-btn btn-style5">{{poop}}</small>
                                            </Link>
                                   
                                     
                                     </div> -->


		<div class="flex">
			<a rel="noopener noreferrer"  v-for="hashtag in showhashtagpost" :key="hashtag" :href="`/app/tags/${hashtag}`" class="px-3 py-1 rounded-sm hover:underline dark:bg-violet-400 dark:text-gray-900">#{{hashtag}}</a>
			
		</div>



        
        <h4 class="text-lg font-semibold  text-gray-800 dark:text-gray-50 mb-3 pt-3 dark:text-slate-200">Share</h4>


        <div class="flex">
                                           
    
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







                                        <div class="mb-3">
                                        <h6 class="text-lg font-semibold  text-gray-800 dark:text-gray-50 mb-3 pt-3 dark:text-slate-200">Enter Comments</h6>
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



		<div class="space-y-2">
            <h4 class="text-lg font-semibold  text-gray-800 dark:text-gray-50 mb-3 pt-3 dark:text-slate-200">Related posts</h4>

			<ul class="ml-4 space-y-1 list-disc">
                <Link  v-for="article in lastarticles" :key="article.id" :href="`/app/articles/${article.slug}`"  >
                    <li>
                        <div class="hover:underline text-gray-800 dark:text-gray-50 mb-3 pt-3 dark:text-slate-200" v-html="article.title"></div>
                    </li>

                 </Link>
				
			</ul>
		</div>
	</div>
</div>

        </AppLayout>
    </template>
    