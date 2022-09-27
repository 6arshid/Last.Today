<script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import Welcome from '@/Jetstream/Welcome.vue';
  import { Link ,useForm } from '@inertiajs/inertia-vue3'
  import { Inertia } from '@inertiajs/inertia'
  const props = defineProps({
    uid:String,
        msfinder: Object,
        msfinder2: Array,

})
const form = useForm({
        uid: props.uid,
        message: null,
      attachfiles: [],
    })

    function submit() {
      form.post('/app/messages/deliveryproblem')
  }
  </script>
  <script>
    import Pagination from '@/Components/Pagination'
      
    export default {
      components: {
        Pagination
      },

    }
    </script>
    <template>
        <AppLayout title="Report checker">
        
    
            <div class="py-3">
                <div class="mx-auto md:w-6/12 sm:w-11/12">
                  <div class="overflow-auto h-72 relative mt-5 ">
                    <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                      <div class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-gray-700">
                        <div  v-for="msfinderrow in msfinder2" :key="msfinderrow.id" class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-violet-400">
                          <h3 class="text-xl font-semibold tracking-wide text-gray-800 dark:text-gray-50 dark:text-slate-200"><Link :href="`/${msfinderrow.sender}`">{{msfinderrow.sender}}</Link></h3>
                          <time class="text-xs tracking-wide uppercase text-gray-400"> {{msfinderrow.time}} </time>
                          <p class="mt-3"> {{msfinderrow.content}} </p>
                          {{uid}}
                        </div>
                       
                   
                      
                      </div></div>
                  </div>
                  <form @submit.prevent="submit">
  <div>
<input type="text" v-model="form.message" placeholder="Enter Comment" class="mb-4 flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"/>
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
  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
 </progress>
        <button type="submit" class="mt-3 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300 w-full">Submit</button>

    </form>
                </div>
            </div>
        </AppLayout>
    </template>
    