<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
  user_info: Object,


})
// const form = useForm({
//       name: props.user_info.name,
//       email: props.user_info.email,
//       username: props.user_info.username,
//       avatar: null,
//     })
//  function submit() {
//       Inertia.post('/users', {form, _method: 'put'})
//     }
//     function submit() {
//       Inertia.post(`/user/updateinfo`, {
//         _method: 'put',
//         name: form.name,
//         email: form.email,
//         username: form.username,
//         avatar: form.avatar,
//       })
//     }
</script>


<template>
    <AppLayout title="Profile">
        

  <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

 
 <nav>
  <div class="nav nav-tabs nav-pills nav-justified" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-basicinfo-tab" data-bs-toggle="tab" data-bs-target="#nav-basicinfo" type="button" role="tab" aria-controls="nav-basicinfo" aria-selected="true">Basic Info</button>
    <button class="nav-link" id="nav-socialnetwork-tab" data-bs-toggle="tab" data-bs-target="#nav-socialnetwork" type="button" role="tab" aria-controls="nav-socialnetwork" aria-selected="false">Social Network</button>
    <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false">Password</button>
    <button class="nav-link" id="nav-twofactorsessions-tab" data-bs-toggle="tab" data-bs-target="#nav-twofactorsessions" type="button" role="tab" aria-controls="nav-twofactorsessions" aria-selected="false">TwoFactor + Sessions</button>
    <button class="nav-link" id="nav-delete-tab" data-bs-toggle="tab" data-bs-target="#nav-delete" type="button" role="tab" aria-controls="nav-delete" aria-selected="false">Delete</button>
  </div>
</nav>
<div class="tab-content pt-4 pb-5 mb-5" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-basicinfo" role="tabpanel" aria-labelledby="nav-basicinfo-tab" tabindex="0">
jjjj


  </div>
 <div class="tab-pane fade show" id="nav-socialnetwork" role="tabpanel" aria-labelledby="nav-socialnetwork-tab" tabindex="0">
socialnetwork

  </div> 
  <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab" tabindex="0">
password
  </div>
  <div class="tab-pane fade" id="nav-twofactorsessions" role="tabpanel" aria-labelledby="nav-twofactorsessions-tab" tabindex="0">
   twofactorsessions
  </div>
  <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab" tabindex="0">
        delete
  </div>
</div>

</div>


    </AppLayout>
</template>

