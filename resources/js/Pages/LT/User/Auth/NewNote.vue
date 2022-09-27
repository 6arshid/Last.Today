<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
const form = useForm({
      content: null,
      color:null,
      filenames: [],
    })

    function submit() {
      form.post('/user/note/submit')
    }

</script>

<template>
    <AppLayout title="Add Note">

        <div class="md:w-11/12 w-11/12 mx-auto mb-4">
           <div class="d-flex justify-content-between align-items-center pt-5 mb-5">
                    <h1>
                        Add Note
                    </h1>
                     <Link :href="route('notes')" class="btn btn-light">
                        <i class="bi bi-arrow-left me-2"></i>All Notes
                    </Link>
                </div>


                    <div class="grid grid-cols-11 gap-4">
  <div class="col-start-5 col-span-3">
    <form @submit.prevent="submit">
  <div>
 <textarea class="w-full mt-5 mb-5 description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" v-model="form.content" placeholder="Enter Text"></textarea>

  </div>
  <div>
    <div class="border border-dashed border-gray-500 relative">
    <input type="file"  @input="form.attachfiles = $event.target.files"  multiple class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
    <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
        <h4>
            Drop files anywhere to upload
            <br/>or
        </h4>
        <p class="">Select Files</p>
    </div>
</div>
  </div>
                                  <div class="d-flex justify-content-start align-items-center mb-3">
                                    <h6 class="me-3">Note Background</h6>
                                    <div class="color-switcher">
                                        <div class="d-flex justify-content-start">
                                            <div class="setxo-white">
                                                <input class="form-check-input" value="#fff" type="radio" v-model="form.color"
                                                       id="setxo-white" checked="">
                                            </div>
                                            <div class="setxo-pink">
                                                <input class="form-check-input" value="#f4ade3" type="radio" v-model="form.color"
                                                       id="setxo-pink">
                                            </div>
                                            <div class="setxo-yellow">
                                                <input class="form-check-input" value="#ffd8c0" type="radio" v-model="form.color"
                                                       id="setxo-grey">
                                            </div>
                                            <div class="setxo-blue">
                                                <input class="form-check-input" value="#a4e3f9" type="radio" v-model="form.color"
                                                       id="setxo-blue">
                                            </div>
                                            <div class="setxo-purple">
                                                <input class="form-check-input" value="#e0bfff" type="radio" v-model="form.color"
                                                       id="setxo-lightgreen">
                                            </div>
                                            <div class="setxo-green">
                                                <input class="form-check-input" value="#a1f5cf" type="radio" v-model="form.color"
                                                       id="setxo-green">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                      <div class="row">
     <article v-for="afile in getfiles" :key="afile.f_id" class="col-1 w-50 mb-2 mt-3">
 <img :src="`${afile.f_path}`" class="img-thumbnail"/>
 </article>
 </div>
  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
 </progress>
        <button type="submit" class="mt-3 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300 w-full">Submit</button>

    </form>
  </div>

</div>


</div>



    </AppLayout>
</template>
