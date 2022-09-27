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
    articles2: Object,
    user: Object,avatar: String,articles: Array,follow_checker:String,shop_checker:String,background_img:String
  },
}
</script>
<template>
    <AppLayout :title="`${user.username}`">
    <div class="Profile">
   <div class="MainBg" :style="`${background_img}`">
        <div class="profile-container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-md-12 col-12">
                        <div class="text-center">
                            <div class="ProfileAvatar">
                                <img :src="avatar" class="mx-auto d-block">
                            </div>
                            
                            <h1 v-if="user.name != null || user.family != null">
                              
                             {{user.name}}
                             {{user.family}}
                             
                            </h1>


                               <Link  v-if="follow_checker == 0" :href="`/user/${user.username}/follow`" class="btn btn-primary  btn-lg mt-3 mb-3 me-3">Follow</Link>
                     <Link v-if="follow_checker == 1" class="btn btn-primary  btn-lg mt-3 mb-3 me-3">Waiting for  approved</Link>
                      <Link v-if="follow_checker == 2" :href="`/user/${user.username}/unfollow`" class="btn btn-primary  btn-lg mt-3 mb-3 me-3">Unfollow</Link>
                      <Link v-if="follow_checker == 3"> </Link>
                    <Link :href="`/${user.username}/sms`" class="btn btn-success  btn-lg mt-3 mb-3 me-3">Message</Link>
                    <Link v-if="shop_checker == 1"  :href="`/${user.username}/shop`" class="btn btn-info  btn-lg mt-3 mb-3 me-3">Store</Link>
                    <a :href="`https://bank.last.today/${user.username}/pay/10`" target="_blank" class="btn btn-primary btn-lg mt-3 mb-3 me-3">Wallet</a>
                      <Link :href="`/user/${user.username}/report`" class="btn btn-warning  btn-lg mt-3 mb-3 me-3">Report</Link>




                        
<p class="mt-3 border-bottom pb-5" v-if="user.bio != null">
                       {{user.bio}}
                    </p>
                                <p v-if="user.url != null">
                            <i class="bi bi-link-45deg me-1"></i><a :href="`${user.url}`" target="_blank">{{user.url}}</a>
                        </p>
        <p>
                            <Link :href="`${user.instagram}`" v-if="user.instagram != null"><i class="bi bi-instagram me-3"></i></Link>
                            <Link :href="`${user.youtube}`" v-if="user.youtube != null"><i class="bi bi-youtube me-3"></i></Link>
                            <Link :href="`${user.facebook}`" v-if="user.facebook != null"><i class="bi bi-facebook me-3"></i></Link>
                            <Link :href="`${user.twitter}`" v-if="user.twitter != null"><i class="bi bi-twitter me-3"></i></Link>
                            <Link :href="`${user.linkedin}`" v-if="user.linkedin != null"><i class="bi bi-linkedin me-3"></i></Link>
                            <Link :href="`${user.youtube}`" v-if="user.youtube != null"><i class="bi bi-youtube me-3"></i></Link>
                            <Link :href="`${user.github}`" v-if="user.github != null"><i class="bi bi-github me-3"></i></Link>
                        </p>
                        </div>
                        <div class="mt-5">
            <div class="card-columns">
                                <div class="mb-4" v-for="article in articles" :key="article.id" >
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title mb-3">
                                                <Link :href="`/app/articles/${article.slug}`">
                                                    {{article.title}} 
                                                </Link>
                                            </h3>

                                            <Link :href="`/app/articles/${article.slug}`">
                                            <div class="CardImg mb-3" v-html="article.image"></div>
                                            </Link>
                                          
                                        </div>
                                    </div>
                                </div>
                  
                            </div>
                        </div>
                          <pagination class="mt-5 mb-5" style="margin-bottom:400px" :links="articles2.links" />
                    </div>
                </div>
            </div>




        </div>
    </div>
          
    </div>
    </AppLayout>
</template>
