<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link ,useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
product: Object,creator:String,owner:String,getfiles:Array
})
    const form = useForm({
           contentcomment: null,

    })
    function submitcomment() {
    Inertia.post(`/user/comment/n/${props.product.product_id}`,form)
    }


</script>
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>



   
<template>
    <AppLayout :title="`${product.product_name}`">

<div class="min-w-screen min-h-screen  flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                <div class="relative">
                    <img v-for="afile in getfiles" :key="afile.f_id" :src="`/${afile.f_path}`" class="w-full relative z-10">
                    <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-10">
                <div class="mb-10">
                    <h1 class="font-bold uppercase text-2xl mb-5">{{product.product_name}}</h1>
                    <p class="text-sm">{{ product.product_description}}</p>
                    Creator :  <Link :href="`/${creator}/nfts`" class="btn btn-info mb-3">{{creator}}</Link>
        <br>
        Owner : <Link :href="`/${owner}/nfts`" class="btn btn-light mb-3">{{owner}}</Link>
                </div>
                <div>
                    <div class="inline-block align-bottom mr-5">
                        <span class="text-2xl leading-none align-baseline">$</span>
                        <span class="font-bold text-5xl leading-none align-baseline">{{product.product_price}}</span>
                    </div>
                    <div class="inline-block align-bottom">
                        <a :href="`https://bank.last.today/${creator}/nft/${product.product_price}/${product.product_uniqid}/`" target="_blank" class="bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
<br />
        <article v-for="afile in getfiles" :key="afile.f_id" class="w-20 h-20">
 <a :href="`/${afile.f_path}`" target="_blank"><img :src="`/${afile.f_path}`"/></a>
 </article>
 <form @submit.prevent="submitcomment">
    <input v-model="form.contentcomment" class="form-control" placeholder="Enter Comment" />
  </form>
    </div>
</div>


    </AppLayout>
</template>
