<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    </script>
    <script>
    import Pagination from '@/Components/Pagination'
      
    export default {
      components: {
        Pagination
      },
      props: {
        articles: Object,articles2: Array,name:String,follow_checker:String
      },
    }
    </script>
    <template>
    <AppLayout :title="`${name}`">
    
    
    
            <div class="w-11/12 md:w-11/12 mx-auto  pt-10">
                <div class="flex">
                    <div  class="text-left">
                    <h1>
                    {{name}}
                </h1>
                
                </div>
                <div  class="text-right mx-5">
                    <p v-if="follow_checker == 0"><Link :href="`/user/tags/${name}/follow`" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 float-text">+</Link></p>
                      <p v-if="follow_checker == 2"><Link :href="`/user/tags/${name}/unfollow`" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700  float-text">-</Link></p>

                
                </div>
                </div>
             


                   <hr/>
                   <br/>
                   <div class="columns-1 md:columns-2 lg:columns-3 2xl:columns-4 gap-6 [column-fill:_balance] box-border mx-auto before:box-inherit after:box-inherit">
                        <Article  v-for="first31postrow in articles2" :key="first31postrow.id" class="break-inside-avoid mb-6">
                            <div class="card p-4">
                                <Link :href="`/app/articles/${first31postrow.slug}`">
                                                                    <h3 class="mb-3"> {{first31postrow.title}}</h3>
                               
                                <div class="CardImg mb-3" v-html="first31postrow.image"></div>
                               
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" v-html="first31postrow.content"></p>
                            </Link>
                                <div class="flex justify-between items-center">
                                    <!-- Views: <div class="ml-1 text-gray-400 text-ms"> {{first31postrow.view}}</div> -->
                                    <!-- <a href="#" class="card-link">#Forex</a> -->
    <br/>
                                    <div class="flex justify-end w-full d-inline-block">
                                         
        
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
                        </Article>
    
    
    
                        
                 
                    </div>
                   
    
            </div>
    
            <pagination class="mt-6" :links="articles.links" />

            <br/><br/><br/><br/><br/>
      
        </AppLayout>
    </template>
    