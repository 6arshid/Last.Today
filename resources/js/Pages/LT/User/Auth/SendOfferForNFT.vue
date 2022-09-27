<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
const props = defineProps({
  article: Array,
  username:String

})
const form = useForm({
      name: null,
      price : null,
      content: null,
      attachfiles: null,
    })

    function submit() {
    //   form.post(`/user/nft/submit/${props.article.product_uniqid}`)
      form.post(`/user/nft/submit/${props.article.product_uniqid}`)
      
    }
</script>

<template>
    <AppLayout title="Send Offer For NFT">
    
 <section class="row justify-content-center">
                    <div class="col-md-6">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg card-body">
                 
<form @submit.prevent="submit">

    <input type="number" v-model="form.price" class="form-control mb-3"  placeholder="Enter Price" required="true"/>
      <h3>Offer Expiration</h3>
    <input type="date" class="form-control" v-model="form.date" placeholder="Enter Price" required="true" />

    <button type="submit" class="btn btn-primary mt-4">Submit</button>
  </form>

                </div>
            </div>
        </div>
          </div>
  </section>
    </AppLayout>
</template>
