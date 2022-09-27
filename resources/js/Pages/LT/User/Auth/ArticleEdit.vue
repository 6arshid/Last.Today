<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
  article: Object,
    image: String,
    getfiles: Array

})
const form = useForm({
      title: props.article.article_title,
      content: props.article.article_content,
      lang: props.article.article_lang,
      image: null,
    })

    function submit() {
      Inertia.post(`/user/articles/update/${props.article.article_slug}`, {
        _method: 'put',
        title: form.title,
        content: form.content,
        lang: form.lang,
        image: form.image,
      })
    }

</script>

<template>
    <AppLayout title="Edit Article">
        <div class="py-12 row">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
   
  <form @submit.prevent="submit">
  
    <textarea  v-model="form.content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
   <div class="row">
      <article v-for="afile in getfiles" :key="afile.f_id" class="col-md-4 mb-2 mt-3">
 <img :src="`${afile.f_path}`"/>
 </article>
   </div>
  <input type="file" @input="form.image = $event.target.files"  multiple="multiple" />
    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
    </progress>
      <h4>Language</h4>
    <input type="text" v-model="form.lang" class="form-control" />
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
  </form>
  </div>
</div>

            </div>
        </div>
    </AppLayout>
</template>
