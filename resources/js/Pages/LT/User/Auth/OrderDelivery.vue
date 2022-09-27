<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link,useForm } from '@inertiajs/inertia-vue3'
    const props = defineProps({
        address: String,
        uniqid:String
    })
    const form = useForm({
        uniqid: props.uniqid,
      image: [],
    })


    function submit() {
      form.post('/user/products/accept/delivery')
    }


    </script>
    
    <template>
        <AppLayout title="OrderDelivery">
       
         <br/><br/><br/><br/>
         <form @submit.prevent="submit" class="mt-5 md:w-5/12 sm:w-11/12 mx-auto">
         <h2 class="text-2xl items-center text-center mx-auto mb-5 text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50 mb-10 pt-10 dark:text-slate-200"> Video or photo of product delivery</h2>
            <input class="form-check-input" type="hidden" v-model="form.uniqid">

            <label for="dropzone-file" class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
    </svg>

    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Payment File</h2>

    <p class="mt-2 text-gray-500 tracking-wide">Upload or darg &amp; drop your file MP4 , MP3 , PNG, JPG or GIF. </p>

    <input id="dropzone-file" type="file" class="hidden" @input="form.image = $event.target.files"  multiple="multiple">
  
</label>



    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
    </progress>
<div class="text-center ">
    <button type="submit" class="mt-5 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Send
              </button>
            </div>
         </form>
        </AppLayout>
    </template>
    