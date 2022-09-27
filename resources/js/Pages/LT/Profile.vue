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
    user: Object,avatar: String,articles: Array,follow_checker:String,shop_checker:String,background_img:String,add_new_articles:String
  },
}
</script>
<template>
    <AppLayout :title="`${user.username}`">


        <div class="MainBg" :style="`${background_img}`"></div>
        <div class="w-10/12 mx-auto">
            <div class="text-center">
                <div class="ProfileAvatar">
                     <img :src="avatar">
                </div>
                <h1 v-if="user.name != null || user.family != null">
                              
                              {{user.name}}
                              {{user.family}}
                              
                              
                             </h1>
                             <!-- <a class="button" href="#popup1">Let me Pop up</a>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2>I am a popup, just fill up the form :)</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<p>We love helping small businesses succeed, and by letting us know who you are, we will include you in our mailing list so that you can keep up to date on what is happening in Central Alberta.</p>
			<p>Don't forget to follow us on Social Media as well!</p>
			<form name="downloadform" method="post" action="">
				<input type="text" name="first_name" placeholder="First Name">
				<input type="text" name="last_name" placeholder="Last Name">
				<input type="email" name="email" placeholder="Email">
				<input type="text" name="town" placeholder="Town / City">
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
</div> -->
                             <element  v-if="add_new_articles == 1" :href="`/app/articles/new`"> 
                                <Link :href="route('new_article')" :active="route().current('new_article')">

                                <img src="/files/icons/icons8-pen-48.png" class="mx-auto w-10">
                            </Link>
                            </element>

                             <h3 class="mt-3 border-bottom pb-5" v-if="user.bio != null">
                                {{user.bio}}
                                </h3>


            <div class="mt-4 mb-4">
            <Link  v-if="follow_checker == 0" :href="`/user/${user.username}/follow`" class="btn btn-primary text-white px-8 py-3 mx-2">Follow</Link>
                     <Link v-if="follow_checker == 1" class="btn btn-primary text-white px-8 py-3 mx-2">Waiting for  approved</Link>
                      <Link v-if="follow_checker == 2" :href="`/user/${user.username}/unfollow`" class="btn btn-primary text-white px-8 py-3 mx-2">Unfollow</Link>
                      <Link v-if="follow_checker == 3"> </Link>
                    <!-- <Link :href="`/${user.username}/sms`" class="btn btn-success inline-flex items-center px-8 py-3 my-2 text-md text-white hover:text-white mx-2">Message</Link> -->
                    <Link v-if="shop_checker == 1"  :href="`/${user.username}/shop`" class="btn btn-secondary inline-flex items-center px-8 py-3 my-2 text-md text-white hover:text-white mx-2">Store</Link>
                    <a :href="`https://bank.last.today/${user.username}/pay/10`" target="_blank" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mx-2">Wallet</a>
                      <Link :href="`/app/${user.username}/report`" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900 mx-2">Report</Link>

           </div>



                <div class="flex flex-wrap justify-center items-center p-4">
                  
                    <p class="mx-3"  v-if="user.url != null">
                        <a href="" class="btn btn-outline-primary px-2 py-2 mb-2">
     <a :href="`${user.url}`" target="_blank">{{user.url}}</a>
                        </a>
                    </p>
                    <p>
                        <Link :href="`${user.instagram}`" class="mx-2 btn btn-outline-primary px-1 py-2 mb-2">
                            <i class="fa-brands fa-facebook mx-2"></i></Link>
                            <Link :href="`${user.instagram}`" class="mx-2 btn btn-outline-primary px-1 py-2 mb-2">
                            <i class="fa-brands fa-twitter mx-2"></i></Link>
                            <Link :href="`${user.instagram}`" class="mx-2 btn btn-outline-primary px-1 py-2 mb-2">
                            <i class="fa-brands fa-linkedin mx-2"></i></Link>
                            <Link :href="`${user.instagram}`" class="mx-2 btn btn-outline-primary px-1 py-2 mb-2">
                            <i class="fa-brands fa-instagram mx-2"></i></Link>
                            <Link :href="`${user.instagram}`" class="mx-2 btn btn-outline-primary px-1 py-2 mb-2">
                            <i class="fa-brands fa-youtube mx-2"></i></Link>
                            <Link :href="`${user.instagram}`" class="mx-2 btn btn-outline-primary px-1 py-2 mb-2">
                            <i class="fa-brands fa-github mx-2"></i></Link>


                    </p>
                </div>
            </div>

                <div class="columns-1 md:columns-2 lg:columns-3 2xl:columns-4 gap-6 [column-fill:_balance] box-border mx-auto before:box-inherit after:box-inherit">
                    <div v-for="article in articles" :key="article.id" class="break-inside-avoid mb-6">
                        <div class="card p-4">
                            <Link :href="`/app/articles/${article.slug}`">
                                <h3 class="mb-3">  {{article.title}} </h3>
                                                </Link>
                           
                                                <div class="CardImg mb-3" v-html="article.image"></div>
                        
                            <div class="flex justify-between items-center">
                              
                                <Link  class="btn btn-secondary inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white hover:text-white" :href="`/app/articles/${article.slug}`">
                                Read more
                            </Link>
                            </div>
                        </div>
                    </div>
                  
                </div>

        </div>

    </AppLayout>
</template>
