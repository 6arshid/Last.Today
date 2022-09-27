<script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { reactive } from 'vue'
  import { Link ,useForm } from '@inertiajs/inertia-vue3'
  import { Inertia } from '@inertiajs/inertia'
  // const props = defineProps({
  //     user_info:Object,
  // })
  const logout = () => {
  Inertia.post(route('logout'));
};
  

  </script>

  <template>
  <AppLayout title="Dashboard">
   
 <main class="mx-auto">
      <div class="w-11/12 md:w-12/12 mx-auto">
         
ssss

      </div>
  </main>
  
  
  </AppLayout>
  
  </template>
  
  