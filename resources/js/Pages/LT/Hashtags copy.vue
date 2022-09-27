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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-md-12 col-12">
            <div class="d-block">
                <h1 class="float-start mt-5">
                 {{name}}
                </h1>
                
                      <p v-if="follow_checker == 0"><Link :href="`/user/tags/${name}/follow`" class="btn btn-primary float-end mt-5 mb-3">Follow</Link></p>
                      <p v-if="follow_checker == 2"><Link :href="`/user/tags/${name}/unfollow`" class="btn btn-primary float-end mt-5 mb-3">Unfollow</Link></p>
            </div>
            <div class="clearfix"></div>
            <div class="mt-5">
<div class="card-columns">
                        <div class="mb-4" v-for="article in articles2" :key="article.id">
                        <div class="card">
                            <div class="card-body">

                                 <Link :href="`/app/articles/${article.slug}`" >   <div class="CardImg mb-3" v-html="article.image"></div>
                                <p class="card-text" v-html="article.content"></p></Link>
                                <div class="d-flex justify-content-between align-items-center">
                                    <Link :href="`/app/articles/${article.slug}`" class="btn btn-primary btn-sm me-2 pe-3 ps-3">
                                Read more</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        <pagination class="mt-6" :links="articles.links" />
        </div>
    </div>
</div>

    </AppLayout>
</template>
